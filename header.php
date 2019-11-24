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

  </style>

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
</head>
<body style="padding-left:30px; padding-right:30px">

<?php

if(!isset($_SESSION['user_id'])){
?>
	<a href="./login.php">login</a>
	<a href="./register.php">register</a>

<?php

	}else{

?>
  <div style="text-align:center; margin-top:-20px; margin-bottom:-10px; padding-left:150px;">
  <b style="font-size:25px"> HELLO! <?php echo $_SESSION['user_id'] ?> </b>
  <div style="float:right; margin-right:-10px">
		<button type="button" class="btn btn-sm"><a href="./mypage.php" role="button">mypage</a></button>
		<button type="button" class="btn btn-sm"><a href="./logout.php" role="button">logout</a></button>
  </div></div>
  </br>
<?php

	}
	
?>