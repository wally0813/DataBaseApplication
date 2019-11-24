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
	<title>Index</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">

	<link rel="stylesheet" href="css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800&amp;subset=korean" rel="stylesheet">
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
			font-family: 'Nanum Gothic', 'sans-serif';
		}

		.b{
			font-family: 'Nanum Gothic', 'sans-serif';
		}

	</style>

	<!-- Custom styles for this template -->
	<link href="carousel.css" rel="stylesheet">
</head>
<body style="padding-left:30px; padding-right:30px; font-family: 'Nanum Gothic', 'sans-serif';" >

	<?php

	if(!isset($_SESSION['user_id'])){
		?>

		<div style="text-align:center; margin-top:-20px; margin-bottom:10px; padding-left:150px; padding-bottom:30px;font-family: 'Nanum Gothic', 'sans-serif';" >
			
			<div style="float:right; margin-right:-10px">
				<button type="button" class="btn btn-sm"><a href="./login.php" role="button">login</a></button>
				<button type="button" class="btn btn-sm"><a href="./register.php" role="button">register</a></button>
			</div>

		</div>


		<?php

	}else{

		?>
		<div style="text-align:center; margin-top:-20px; margin-bottom:-10px; padding-left:150px; padding-bottom:30px; font-family: 'Nanum Gothic', 'sans-serif';" >
			
			<div style="float:right; margin-right:-10px">
				<button type="button" class="btn btn-sm"><a href="./mypage.php" role="button">mypage</a></button>
				<button type="button" class="btn btn-sm"><a href="./logout.php" role="button">logout</a></button>
			</div>
		</div>
	</br>
	<?php

}

?>