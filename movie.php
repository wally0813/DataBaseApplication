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

?>

<!DOCTYPE html>
<meta charset="utf-8" />
<html>
<head>
	<title> movie </title>
	<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800&amp;subset=korean" rel="stylesheet">
	<style>
		#divPosition{
			font-family: "Nanum Gothic", sans-serif;
			border:1px solid #F2F2F2;
			position: absolute;
			margin: -150px 0px 0px -200px;
			left: 50%;
			top: 200px;
			padding: 5px;
			text-align: center;
		}
	</style>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body><div class="row" id="divPosition" style="padding-left:20px; padding-right:20px">


	<h2> MOVIE INFO </h2>

<?php

	$query = "SELECT * FROM movie_info WHERE movie_idx='$idx'";
	$result = $conn->query($query);

	$row = $result->fetch_array(MYSQLI_ASSOC);

	$genre_idx = $row['genre_idx'];

	$query_idx = "SELECT genre FROM movie_genre WHERE genre_idx='$genre_idx'";
	$result_idx = $conn->query($query_idx);
	$row_idx = $result_idx->fetch_array(MYSQLI_ASSOC);

	?> <h1> 
	<img class="card-img-top" src=<?php echo './posters/'.$row['filename'];?> width=200; alt="Card image cap">
	<br><br>
	<?php 
	echo $row['movie_title']; ?> </h1>  
	<table style="width: 350px; border: 1px solid #666666; border-collapse: collapse;">
	<tr style="border:1px solid #666666"> 
	<td width=80 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'>
	<?php
	echo "감독</td><td>" . $row['director']; ?> </td> </tr><tr style="border:1px solid #666666"><td width=80 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'><?php 
	echo "주연</td><td>" . $row['main_actor']; ?> </td> </tr><tr style="border:1px solid #666666"><td width=80 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'> <?php 
	echo "장르</td><td>" . $row_idx['genre']; ?> </td> </tr><tr style="border:1px solid #666666"><td width=80 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'> <?php 
	echo "상영시간</td><td>" . $row['running_time']; ?>  </td> </tr></table> <?php 
	
	$query = "SELECT movie_rating, age, gender FROM movie_review WHERE movie_idx='$idx' GROUP BY movie_idx";
	$result = $conn->query($query);
	$row2 = $result->fetch_array(MYSQLI_ASSOC);
	
	echo "<h2> ☆☆ 평점 : " . $row2['movie_rating']." ☆☆</h2>"; ?> <?php 
	if($row2['gender']=="f"){
		echo " 이 영화를 " . $row2['age']."대 여성들이 좋아합니다";
	}else{
		echo " 이 영화를 " . $row2['age']."대 남성들이 좋아합니다";
	}?> </br> <?php 
	
?>

	<h2> MOVIE REVIEW </h2>
	<div style="padding-left:50px">
	<form name="user_review" method="post" action="writereview.php">

		<table>
			<tr> 
				<th> RATING </th>
				<td> <input type="text" name="movie_rating"> </td>
			</tr>
			<tr>
				<th> REVIEW </th>
				<td> <input type="text" name="movie_review"> </td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="movie_idx" value="<?php echo $row['movie_idx']?>">
					<input type="hidden" name="movie_title" value="<?php echo $row['movie_title']?>">
					<input type="submit" value="추가">
				</td>
			</tr>

		</table>
	</form>
	</div>
      
	<h2> User Review </h2>
<?php

	$query_info = "SELECT * FROM user_review WHERE movie_idx='$idx'";

	$result = $conn->query($query_info);

	while($row = $result->fetch_array(MYSQLI_ASSOC)){
/*
		$movie_idx = $row['movie_idx'];

		$query_idx = "SELECT movie_title FROM movie_info WHERE movie_idx='$movie_idx'";
		$result_idx = $conn->query($query_idx);
		$row_idx = $result_idx->fetch_array(MYSQLI_ASSOC);
*/ ?>
		<table style="width: 350px; border: 1px solid #666666; border-collapse: collapse;">
		<tr style="border:1px solid #666666"> 
		<td width=80 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'> <?php
		echo "USER ID</td><td>" . $row['user_id']; ?> </td> </tr><tr style="border:1px solid #666666"><td width=80 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'> <?php 
		echo "MY RATING</td><td>" . $row['movie_rating']; ?> </td> </tr><tr style="border:1px solid #666666"><td width=80 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'> <?php 
		echo "MY REVIEW</td><td>" . $row['movie_review']; ?> </td></tr></table><br> 
		<?php
		}
		?>
		<?php 
		$query = "SELECT AVG(movie_rating) FROM user_review WHERE movie_idx='$idx' GROUP BY movie_idx";
		$result = $conn->query($query);
		$row2 = $result->fetch_array(MYSQLI_ASSOC);
		echo "사용자 평균 평점은 ".$row2['AVG(movie_rating)']."점 입니다.";?><br>
		<?php
		$query = "SELECT ifnull(COUNT(user_id),0) FROM user_review WHERE movie_idx='$idx' GROUP BY movie_idx";
		$result = $conn->query($query);
		$row3 = $result->fetch_array(MYSQLI_ASSOC);
		echo "총 ".$row3['ifnull(COUNT(user_id),0)']."명의 사용자가 후기를 남겼습니다.\n";
		
	
	?><br>

	<h2> MOVIE SCREEN INFO </h2>

<?php

	$query_info = "SELECT t.theater_idx, t.theater_name FROM theater_info as t JOIN screen_info as s ON t.theater_idx=s.theater_idx WHERE movie_idx='$idx'";

	$result = $conn->query($query_info);

	while($row = $result->fetch_array(MYSQLI_ASSOC)){
/*
		$movie_idx = $row['movie_idx'];

		$query_idx = "SELECT movie_title FROM movie_info WHERE movie_idx='$movie_idx'";
		$result_idx = $conn->query($query_idx);
		$row_idx = $result_idx->fetch_array(MYSQLI_ASSOC);
*/
		?><div style="padding-bottom:5px">
		<a type="button" class="btn btn-success" href="theater.php?idx=<?php echo $row['theater_idx'] ?>"> <?php echo $row['theater_name']."\t"; ?> </a> </div> <?php

	}
?>


<?php

}

?><div style="padding-top:10px; margin-botton:20px">
<a type="button" class="btn btn-default btn-sm" href="index.php">메인화면</a>
</div>
</div>
</body>
</html>