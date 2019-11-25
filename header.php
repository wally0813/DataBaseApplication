<?php session_start();

include "config.php";

?>

<!DOCTYPE html>
<meta charset="utf-8" />
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Jekyll v3.8.5">
	<title>MOVIE</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">

	<link rel="stylesheet" href="css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Song+Myung&display=swap&subset=korean" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<style>

		.circle{
			/*margin-left:11.5rem;*/

			display:inline-block;
			text-align: center;
			width: 216px;
			height: 216px;
			border-radius: 50%;
			overflow: hidden;
			box-shadow: 3px 3px 5px 3px;			
		}
		.circle img {
			display:inline;
			width: auto;
			height: 100%;
			object-fit: cover;
		}

		.div{
			font-family: 'Song Myung', 'sans-serif';
		}

		.b{
			font-family: 'Song Myung', 'sans-serif';
		}

		body{
			font-family: "Song Myung";
			font-size: 17px;
			background-image: url(./images/theater.png);
			min_height:1000px;
			background-size: cover;
			background-color: #000000; 
			background-repeat: no-repeat;
			background-position: top;
		}

		#divPosition{
			font-family: "Song Myung", sans-serif;	
			font-size: 17px;
			width:600px;
			top: 200px;
			padding: 5px;
			text-align: center;
		}

		.container {
			font-family: "Song Myung";
			font-size: 17px;
			padding-right: 15px;
			padding-left: 15px;
			margin-right: auto;
			margin-left: auto;

		}

		.jumbotron {
			font-family: "Song Myung";
			font-size: 17px;
			padding: $jumbotron-padding ($jumbotron-padding / 2);
			margin-bottom: $jumbotron-padding;
			background-color: $jumbotron-bg;
			@include border-radius($border-radius-lg);

			@include media-breakpoint-up(sm) {
				padding: ($jumbotron-padding * 2) $jumbotron-padding;
			}
		}

	</style>

	<!-- Custom styles for this template -->
	<link href="carousel.css" rel="stylesheet">
</head>
<body style="padding-left:30px; padding-right:30px; font-family: 'Song Myung', 'sans-serif';" >

	<?php

	if(!isset($_SESSION['user_id']) and !isset($_SESSION['admin_id'])){
		?>

		<div style="text-align:center; margin-top:-20px; margin-bottom:10px; padding-left:150px; padding-bottom:30px;font-family: 'Song Myung', 'sans-serif';" >
			
			<div style="float:right; margin-right:-10px">
				<button type="button" class="btn btn-dark"><a href="./login.php" style="color: white" role="button">login</a></button>
				<button type="button" class="btn btn-dark"><a href="./register.php" style="color: white" role="button">register</a></button>
			</div>

		</div>


		<?php

	}else{

		?>
		<div style="text-align:center; margin-top:-20px; margin-bottom:-10px; padding-left:150px; padding-bottom:30px; font-family: 'Song Myung', 'sans-serif';" >
			
			<div style="float:right; margin-right:-10px">
				<?php 

				if(isset($_SESSION['admin_id'])){
					?>
					<button type="button" class="btn btn-dark"><a href="./admin.php" style="color: white" role="button">mypage</a></button>
					<?php
				}else{
					?>
					<button type="button" class="btn btn-dark"><a href="./mypage.php" style="color: white" role="button">mypage</a></button>
				<?php } ?>
				<button type="button" class="btn btn-dark"><a href="./logout.php" style="color: white" role="button">logout</a></button>
			</div>
		</div>
	</br>
	<?php

}

?>