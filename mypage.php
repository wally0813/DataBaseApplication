<?php

   session_start();

   include "config.php";

?>

<!DOCTYPE html>
<meta charset="utf-8" />
<html>
<head>
   <title> mypage </title>
   <link rel="stylesheet" href="css/bootstrap.css">
   <style>
      th, td {
         border: 1px solid #444444;
      }
      table {
         width: 600px;
         border: 1px solid #444444;
         border-collapse: collapse;
      }
      hr.line{
         width:1000px;
         border-bottom:0px;
         text-align:left;
         margin-left:0px;
         margin-top: 50px;
         border: thin solid rgb(201, 201, 201);
      }
   </style>
</head>

<?php

   if(!isset($_SESSION['user_id'])){

      ?>
      <script>alert("invalid access. Please Login!");</script>
      <?php
      header("Location: login.php");

   }else{

      $id = $_SESSION['user_id'];
?>


<body bgcolor = "#f2f0ed" style="margin-bottom:100px; padding-left:30px;">
   <font color="#1b3c33"><h1 style='background-color:white; padding-top:10px;padding-bottom:20px;padding-left: 10px; margin-right:500px;'>마이 페이지 <?php echo $id; ?> </h1></font>
   <h2 style='color:#1b3c33; padding-left:10px;'> 회원 정보 </h2>

<?php

   $query_info = "SELECT * FROM user_info WHERE user_id='$id'";

   $result = $conn->query($query_info);

   while($row = $result->fetch_array(MYSQLI_ASSOC)){

      $genre_idx = $row['genre_idx'];

      $query_idx = "SELECT genre FROM movie_genre WHERE genre_idx='$genre_idx'";
      $result_idx = $conn->query($query_idx);
      $row_idx = $result_idx->fetch_array(MYSQLI_ASSOC);
      ?>
      <table width="550" height="300"  style="background-color:#f7f0e4; border:solid 5px #1b3c33;">
      <tr>
      <td width=120 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'> <?php
      echo "<b>사용자 아이디</b></td><td style='padding-left: 9px'>" . $row['user_id']; ?> </td></tr> <tr><td style='color:#f7f0e4;background-color:#1b3c33; text-align:center'><?php 
      echo "<b>좋아하는 장르</b></td><td style='padding-left: 9px'>" . $row_idx['genre']; ?> </td></tr> <tr><td style='color:#f7f0e4;background-color:#1b3c33; text-align:center'><?php 
      echo "<b>생년월일</b></td><td style='padding-left: 9px'>" . $row['birth']; ?> </td></tr> <tr><td style='color:#f7f0e4;background-color:#1b3c33; text-align:center'><?php 
      echo "<b>성별</b></td><td style='padding-left: 9px'>" . $row['gender']; ?> </td></tr> <tr><td style='color:#f7f0e4;background-color:#1b3c33; text-align:center'><?php 
      echo "<b>이메일 주소</b></td><td style='padding-left: 9px'>" . $row['email']; ?> </td> </tr></table><?php 

   }
?>

<div style='padding-top: 5px; padding-left: 430px;'>
   <button type="button" class="btn btn-sm"><a href="./changeinfo.php">회원정보 수정</a></button>
   <button type="button" class="btn btn-sm"><a href="./withdraw.php">회원탈퇴</a></button>
</div>
<hr class="line">
   <h2 style='color:#1b3c33; padding-left:10px; margin-bottom:10px;'> MY REVIEW </h2>

<?php

   $query_info = "SELECT * FROM user_review WHERE user_id='$id'";

   $result = $conn->query($query_info);

   while($row = $result->fetch_array(MYSQLI_ASSOC)){
/*
      $movie_idx = $row['movie_idx'];

      $query_idx = "SELECT movie_title FROM movie_info WHERE movie_idx='$movie_idx'";
      $result_idx = $conn->query($query_idx);
      $row_idx = $result_idx->fetch_array(MYSQLI_ASSOC);
*/
      ?>


      <form name="user_review" method="post" action="writereview.php">
      <table style="background-color:#f7f0e4; border:solid 5px #1b3c33;">


      <tr>

      <?php
      echo "<td width=120 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'><b>MOVIE TITLE</b></td><td style='padding-left: 9px'>". $row['movie_title']; ?></td></tr> 
      <?php
      echo "<td width=120 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'><b>MOVIE RATING</b></td><td style='padding-left: 9px'> <input type='text' name='movie_rating' value='". $row['movie_rating']."'>"; ?></td></tr>
      <?php
      echo "<td width=120 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'><b>MOVIE REVIEW</b></td><td style='padding-left: 9px'> <input type='text' name='movie_review' value='". $row['movie_review']."'>"; ?></td></tr>

      <input type="hidden" name="review_idx" value="<?php echo $row['review_idx']?>">

      <div style='padding-top: 5px; padding-bottom: 5px; padding-left: 503px;'>
         <button type="submit" class="btn btn-sm">수정</button>
         <button type="button" class="btn btn-sm"><a href="./deletereview.php?idx=<?php echo $row['review_idx'] ?>">삭제</a></button>
      </div>
      <?php 

   }
?>


<?php

}

?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
