<?php

session_start();

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

<div class="vc_row element-row row vc_custom_1478727859541">
<div class="wpb_column vc_column_container vc_col-sm-12">
<div class="wpb_wrapper">
<div class="fw-section hb-fw-599b22a654ae9 without-border no-overlay light-style"
 style="
   background-image: url(./images/theater.png);
   min_height:200px;
    background-size: cover;
   background-color: #FFFFCC; 
   background-repeat: no-repeat;
   background-position: center center;
    padding-top: 40px;
   padding-bottom: 100px;
   "/>
<div class="row fw-content-wrap">
<div class="col-12 nbm">
<div id="learning-automated-div" style="text-align: center; font-size: 48px;
 line-height: 52px; padding: 100px 5px 10px 5px;">
 <?php
  $query_info = "SELECT movie_idx, movie_title FROM user_review WHERE movie_rating = (SELECT MAX(movie_rating) FROM user_review);";
  $result = $conn->query($query_info);
  $row = $result->fetch_array(MYSQLI_ASSOC); 
  ?>
<span style="color:#000000;"><b><?php echo $row['movie_title']."\n";?></b></span></div>
<div style="text-align: center; font-size: 18px; line-height: 22px; padding: 0 5px 40px 5px;">
<span style="color:#000000;">이화인이 뽑은 금주의 베스트 무비를 지금 확인해보세요!</span></div>
<div style="text-align: center;">
  <a class="btn best-movie" href="movie.php?idx=<?php echo $row['movie_idx'] ?>"> 영화 보기>> </a> </br> <?php
  }
?>
</div>
</div>
</div>
</div></div></div>

<h1 style="text-align:center"> SELECT THEATER </h1>
<br><br><br><br>
	<div class="row" style="padding-left: 70px; padding-bottom: 300px">
	  <div class="col-lg-4" style="float: left; width: 30%; text-align: center;">
    <div class="circle" >
      <img class="mb-4" src="./images/cgv.jpg" width="216" height="216"></div>
        <h2 style="font-size:20px">신촌 cgv 아트레온</h2>
        <a href="theater.php?idx=1" class="btn btn-success">View details &raquo;</a>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4" style="float: left; width: 30%; text-align: center;">
      <div class="circle" >
        <img class="mb-4" src="./images/mega.jpg" alt="" width="216" height="216"></div>
		<h2 style="font-size:20px">신촌 메가박스</h2>
        <a class="btn btn-success" href="theater.php?idx=2">View details &raquo;</a>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4" style="float: left; width: 30%; text-align: center;">
      <div class="circle" >
        <img class="mb-4" src="./images/momo.jpg" alt="" width="216" height="216" ></div>
		<h2 style="font-size:20px">아트하우스 모모</h2>
        <a class="btn btn-success" href="theater.php?idx=3">View details &raquo;</a>
      </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>