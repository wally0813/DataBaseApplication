<?php

include "header.php";

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

	<title>theater</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

	<!-- Bootstrap core CSS -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="album.css" rel="stylesheet">
	<style>
		img.card-img-top {
			display: block;
			margin: 0 auto;
		}
		.card-body{
			text-align:center;
			margin-top: 10px;
		}
		.row.display-flex {
			display: flex;
			flex-wrap: wrap;
		}
		.row.display-flex > [class*='col-'] {
			display: flex;
			flex-direction: column;
		}

		.container {
			padding-right: 15px;
			padding-left: 15px;
			margin-right: auto;
			margin-left: auto;
			background: transparent;
		}
	</style>

</head>

<body>
	<?php

	if(!isset($_GET['idx'])){

		?>
		<script>alert("invalid theater index");</script>
		<?php
		header("Location: index.php");

	}else{

		$id = $_SESSION['user_id'];

		$idx = $_GET['idx'];

		$query = "SELECT * FROM theater_info WHERE theater_idx='$idx'";
		$result = $conn->query($query);
		$row = $result->fetch_array(MYSQLI_ASSOC);

		?>


		<div id="learning-automated-div" style="text-align: center; font-size: 48px; line-height: 52px; padding: 200px 5px 10px 5px;">

			<span style="color:#FFFFFF;">
				<b><?php echo $row['theater_name']; ?></b>
			</span>
		</div>

		<div style="text-align: center; font-size: 18px; line-height: 22px; padding: 0 5px 200px 5px;">
			<span style="color:#FFFFFF;">
				<?php echo $row['theater_address']; ?> 
			</span>
		</div>

		<main role="main">


		<?php } ?>
		<div class="album py-5 bg-light">
			<div class="container">
				<h1 style="text-align: center; margin-bottom: 30px;"> 
					SCREEN INFO 
				</h1>

				<?php

				$query_info = "SELECT m.filename, m.movie_idx, m.movie_title FROM movie_info as m JOIN screen_info as s ON m.movie_idx=s.movie_idx WHERE theater_idx='$idx'";
				$result = $conn->query($query_info);
				$i = 0;
				while($row = $result->fetch_array(MYSQLI_ASSOC)){
					if ( $i % 3 == 0 ){
						?> <div class="row"> <?php 
					}else{
						?> <?php  
					}

					$i++;


					?>
					<div class="col-4">
						<div class="card mb-3 box-shadow">
							<img class="card-img-top" src="<?php echo './posters/'.$row['filename'];?>" alt="Card image cap">
							<div class="card-body">
								<p class="card-text">
									<b>
										<?php echo $row['movie_title']; ?>
									</b>
								</p>
								
									<button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='movie.php?idx=<?php echo $row['movie_idx'] ?>'">
										자세히
									</button>
								
							</div>
						</div>
					</div>


					<?php 

					if ( $i % 3 == 0 ){
						?> </div> <?php 
					}else{
						?> <?php  
					}

				} 
				?>

			</div>


			<h1 style="text-align: center; margin-top: 100px; margin-bottom: 50px;">
				STORE 
			</h1>
			<div style="font-size:17px; padding-left: 100px; padding-right: 100px; padding-bottom: 200px;" >
				<?php

				$query_info = "SELECT * FROM menu_info WHERE theater_idx='$idx' ORDER BY price DESC";

				$result = $conn->query($query_info);

				?>
				<table class="table table-bordered table-hover">
					<thread>
						<tr>
							<th>메뉴이름</th>
							<th>가    격</th>
							<th>부가설명</th>
						</tr>
					</thread>

					<tbody>
						<?php

						while($row = $result->fetch_array(MYSQLI_ASSOC)){

							?>
							<tr>
								<td><?php echo $row['menu_id']; ?> </td>
								<td><?php echo $row['price']; ?> </td>
								<td><?php echo $row['description']; ?> </td>
							</tr>
						</tbody>
						<?php
					}
					?>
				</table>
			</div>
		</div>
	</main>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
	<script src="../../assets/js/vendor/popper.min.js"></script>
	<script src="../../dist/js/bootstrap.min.js"></script>
	<script src="../../assets/js/vendor/holder.min.js"></script>
</body>
</html>
