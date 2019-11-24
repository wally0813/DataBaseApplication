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

		<div class="vc_row element-row row vc_custom_1478727859541">
			<div class="wpb_column vc_column_container vc_col-sm-12">
				<div class="wpb_wrapper">
					<div class="fw-section hb-fw-599b22a654ae9 without-border no-overlay light-style"
					style="
					background-image: url(./images/theater.png);
					min_height:1000px;
					background-size: contain;
					background-color: #FFFFFF; 
					background-repeat: no-repeat;
					background-position: center center;
					padding-top: 40px;
					padding-bottom: 100px;
					"/>
					<div class="row fw-content-wrap">
						<div class="col-12 nbm">
							<div id="learning-automated-div" style="text-align: center; font-size: 48px;
							line-height: 52px; padding: 100px 5px 10px 5px;">

							<span style="color:#FFFFFF;"><b><?php echo $row['theater_name']; ?></b></span></div>
							<div style="text-align: center; font-size: 18px; line-height: 22px; padding: 0 5px 40px 5px;">
								<span style="color:#FFFFFF;"><?php echo $row['theater_address']; ?> </span></div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<main role="main">


			<?php } ?>
			<div class="album py-5 bg-light">
				<div class="container">
					<h2 style="text-align: center; margin-bottom: 30px;"> 현재 상영중인 영화 </h2>

					<?php

					$query_info = "SELECT m.filename, m.movie_idx, m.movie_title FROM movie_info as m JOIN screen_info as s ON m.movie_idx=s.movie_idx WHERE theater_idx='$idx'";
					$result = $conn->query($query_info);
					$i = 0;
					while($row = $result->fetch_array(MYSQLI_ASSOC)){
						if ( $i % 3 == 0 ){
							?> </br> <?php 
						}else{
							?> &nbsp;&nbsp;&nbsp;&nbsp; <?php  
						}

						$i++;


						?>
						<div class="row row-flex">
							<div class="col-md-4" style="margin-bottom:30px;">
								<div class="card mb-4 box-shadow">
									<img class="card-img-top" src=<?php echo './posters/'.$row['filename'];?> width=200; alt="Card image cap">
									<div class="card-body">
										<p class="card-text"><b><?php echo $row['movie_title']; ?></b></p>
										<div class="d-flex justify-content-between align-items-center">
											<button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='movie.php?idx=<?php echo $row['movie_idx'] ?>'" style="margin-bottom:20px;">자세히</button>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>

					</div>
				</div>
			</div>
			<h2 style="text-align: center; margin-bottom: 100px;"> STORE </h2>
			<div class="table-responsive">
				<?php

				$query_info = "SELECT * FROM menu_info WHERE theater_idx='$idx'";

				$result = $conn->query($query_info);

				?>
				<table class="table table-striped tabl-sm">
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


			</main>

			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
			<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
			<script src="../../assets/js/vendor/popper.min.js"></script>
			<script src="../../dist/js/bootstrap.min.js"></script>
			<script src="../../assets/js/vendor/holder.min.js"></script>
		</body>
		</html>
