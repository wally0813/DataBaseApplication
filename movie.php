<?php

include "header.php";

if(!isset($_GET['idx'])){

	?>
	<script>alert("invalid movie index");</script>
	<?php
	header("Location: index.php");

}else{

	$id = $_SESSION['user_id'];

	$idx = $_GET['idx'];

	$query = "SELECT * FROM movie_info WHERE movie_idx='$idx'";
	$result = $conn->query($query);

	$row = $result->fetch_array(MYSQLI_ASSOC);

	$genre_idx = $row['genre_idx'];

	$query_idx = "SELECT genre FROM movie_genre WHERE genre_idx='$genre_idx'";
	$result_idx = $conn->query($query_idx);
	$row_idx = $result_idx->fetch_array(MYSQLI_ASSOC);

	?>


	<div id="learning-automated-div" style="text-align: center; font-size: 48px; line-height: 52px; padding: 200px 5px 200px 5px;">

		<span style="color:#FFFFFF;">
			<b><?php echo $row['movie_title']; ?> </b>
		</span>
	</div>

	<main role="main">
		<div class="album py-5 bg-light">
			<div class="container" style="text-align:center; padding-top:50px; padding-bottom:200px;">
				<h2 style="margin-bottom: 30px;"> MOVIE INFO </h2> 

				<div class="row"> 
					<div class="col-6">
						<img class="card-img-top" width=200; src="<?php echo './posters/'.$row['filename'];?>" alt="Card image cap">
					</br>
					<table class="table" style="">
						<tr style=""> 
							<td width=80 style='text-align:center'>
								<?php echo "감독</td><td>" . $row['director']; ?> 
							</td> 
						</tr>
						<tr style="">
							<td width=80 style='text-align:center'>
								<?php echo "주연</td><td>" . $row['main_actor']; ?> 
							</td> 
						</tr>
						<tr style="">
							<td width=80 style='text-align:center'> 
								<?php echo "장르</td><td>" . $row_idx['genre']; ?> 
							</td> 
						</tr>
						<tr style="">
							<td width=80 style='text-align:center'> <?php 
							echo "상영시간</td><td>" . $row['running_time']; ?> 
						</td>
					</tr>
				</table> 
			</div>
			<div class="col-6">
				<form class="form-horizontal" role="form" name="user_review" method="post" action="writereview.php">

					<table>
						<div class="form-group">

							<h1> MOVIE REVIEW </h1>
						</div>
						<div class="form-group">

							<?php 

							$query = "SELECT movie_rating, age, gender FROM movie_review WHERE movie_idx='$idx' GROUP BY movie_idx";
							$result = $conn->query($query);
							$row2 = $result->fetch_array(MYSQLI_ASSOC);

							echo "<h4>☆☆ 평점 : " . $row2['movie_rating']." ☆☆</h4>"; ?> 
						</div>
						<div>
							<h4>
								<?php 
								if($row2['gender']=="f"){
									echo " 이 영화를 " . $row2['age']."대 여성들이 좋아합니다";
								}else{
									echo " 이 영화를 " . $row2['age']."대 남성들이 좋아합니다";
								}?> 
							</h4>
						</div>
						<div class="form-group">
						</br></br>
						<h1> ADD REVIEW </h1>
					</div>
					<div class="form-group">

						<h4>
							RATING
						</h4>
						<input class="form-control" placeholder="Score" type="text" name="movie_rating">


					</div>
					<div class="form-group">
					</br>
					<h4>
						REVIEW
					</h4>
					<textarea class="form-control" placeholder="Text input" type="text" name="movie_review"> </textarea>

				</div>
				<div class="form-group">

					<input type="hidden" name="movie_idx" value="<?php echo $row['movie_idx']?>">
					<input type="hidden" name="movie_title" value="<?php echo $row['movie_title']?>">
					<input class="form-control" type="submit" value="추가">
				</div>

			</table>
		</form>

	</br></br>
	<h1> USER REVIEW </h1>
</br>
<?php

$query_info = "SELECT * FROM user_review WHERE movie_idx='$idx'";

$result = $conn->query($query_info);

while($row = $result->fetch_array(MYSQLI_ASSOC)){
	?>
	<table class="table">
		<tr style=""> 
			<td width=80 style='text-align:center'>
				<?php echo "USER ID</td><td>" . $row['user_id']; ?> 
			</td>
		</tr>
		<tr style="">
			<td width=80 style='text-align:center'> 
				<?php echo "RATING</td><td>" . $row['movie_rating']; ?> 
			</td> 
		</tr>
		<tr style="">
			<td width=80 style='text-align:center'> 
				<?php echo "REVIEW</td><td>" . $row['movie_review']; ?>
			</td>
		</tr>
	</table> 
<?php 

}

?>
<?php 
		$query = "SELECT AVG(movie_rating) FROM user_review WHERE movie_idx='$idx' GROUP BY movie_idx";
		$result = $conn->query($query);
		$row2 = $result->fetch_array(MYSQLI_ASSOC);
		echo "사용자 평균 평점은 "?><b><?php echo $row2['AVG(movie_rating)']?></b><?php echo "점 입니다.";?><br>
		<?php
		$query = "SELECT ifnull(COUNT(user_id),0) FROM user_review WHERE movie_idx='$idx' GROUP BY movie_idx";
		$result = $conn->query($query);
		$row3 = $result->fetch_array(MYSQLI_ASSOC);
		echo "총 ".$row3['ifnull(COUNT(user_id),0)']."명의 사용자가 후기를 남겼습니다.\n";
		
	
	?><br>

</br>
<h1> MOVIE SCREEN INFO </h1>
</br>
<table class="table">
	<?php

	$query_info = "SELECT t.theater_idx, t.theater_name FROM theater_info as t JOIN screen_info as s ON t.theater_idx=s.theater_idx WHERE movie_idx='$idx'";

	$result = $conn->query($query_info);

	while($row = $result->fetch_array(MYSQLI_ASSOC)){

		?>
		<tr style="">
			<td width=80 style='text-align:center'> 
				<?php echo $row['theater_name']."\t"; ?> 
			</td>
		</tr>
		<?php

	}
	?>
</table>
<?php

}
?>

</div>
</div>
</div>
</div>
</main>

</body>
</html>