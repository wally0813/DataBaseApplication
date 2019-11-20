<?php

	session_start();

	include "config.php";

	if(!isset($_SESSION['user_id'])){
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
    <title>Carousel Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">

    <!-- Bootstrap core CSS -->
	<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
</head>
<body>
	<a href="./login.php">login</a>
	<a href="./register.php">register</a>

<?php

	}else{

?>
  <div style="text-align:center; padding-left:100px">
  <b> HELLO! <?php echo $_SESSION['user_id'] ?> </b>
  <div style="float:right;">
		<button><a class="btn btn-secondary" href="./mypage.php" role="button">mypage</a></button>
		<button><a class="btn btn-secondary" href="./logout.php" role="button">logout</a></button>
  </div></div>
  </br>
<?php
  $query_info = "SELECT movie_title FROM user_review WHERE movie_rating = (SELECT MAX(movie_rating) FROM user_review);";
  $result = $conn->query($query_info);
  $row = $result->fetch_array(MYSQLI_ASSOC); 
  }
?>
<div class="vc_row element-row row vc_custom_1478727859541">
<div class="wpb_column vc_column_container vc_col-sm-12">
<div class="wpb_wrapper">
<div class="fw-section hb-fw-599b22a654ae9 without-border no-overlay light-style"
 style="
   background-image: url(/images/theater.png);
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
<span style="color:#000000;"><b><?php echo $row['movie_title']."\n";?></b></span></div>
<div style="text-align: center; font-size: 18px; line-height: 22px; padding: 0 5px 40px 5px;">
<span style="color:#000000;">이화인이 뽑은 금주의 베스트 무비를 지금 확인해보세요!</span></div>
<div style="text-align: center;">
<a class="btn best-movie" href="">영화 보기>></a>
</div>
</div>
</div>
</div></div></div>

<h1 style="text-align:center"> SELECT THEATER </h1>
<?php
	$query_info = "SELECT * FROM theater_info";
	$result = $conn->query($query_info);	
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		?>
		<a href="theater.php?idx=<?php echo $row['theater_idx'] ?>"> <?php echo $row['theater_name']."\t"; ?> </a> </br> <?php
	}	
?>
	<div class="row" style="padding-bottom: 500px">
	  <div class="col-lg-4" style="padding-left: 60px; float: left; width: 30%; text-align: center;">
        <img class="mb-4" src="/images/cgv.jpg" alt="" width="216" height="216">
		<h2>신촌 cgv 아트레온</h2>
		<button><a class="btn btn-secondary" href="theater.php?idx=1" role="button">View details &raquo;</a></button>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4" style="float: left; width: 30%; text-align: center;">
        <img class="mb-4" src="/images/mega.jpg" alt="" width="216" height="216">
		<h2>신촌 메가박스</h2>
        <button><a class="btn btn-secondary" href="theater.php?idx=2" role="button">View details &raquo;</a></button>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4" style="float: left; width: 30%; text-align: center;">
        <img class="mb-4" src="/images/momo.jpg" alt="" width="216" height="216">
		<h2>아트하우스 모모</h2>
        <button><a class="btn btn-secondary" href="theater.php?idx=3" role="button">View details &raquo;</a></button>
      </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->
</body>
</html>