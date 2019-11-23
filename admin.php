<?php

   session_start();

   include "config.php";

?>

<!DOCTYPE html>
<meta charset="utf-8" />
<html>
<head>
   <title> admin page </title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="css/bootstrap.css">
   <link href="signin.css" rel="stylesheet">
   <style>
      th, td {
         border: 1px solid #444444;
      }
      table {
         width: 600px;
         margin:auto;
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
      .au {
        overflow: auto;
      }
      .box {
        width: 100% ;
        height: 110%;     
        float: left;
        margin-left: 20px;
        margin-right: 10px;}
   </style>
</head>

<?php

   if ( isset($_SESSION['admin_id']) ){

      $id = $_SESSION['admin_id'];

      if ( isset($_GET['func']) && isset($_GET['idx']) ){

         $idx = $_GET['idx'];

         $query = "SELECT theater_idx FROM admin_info WHERE admin_id='$id'";
         $res = $conn->query($query);
         $admin = $res->fetch_array(MYSQLI_ASSOC);
         $theater = $admin['theater_idx'];

         if ( $_GET['func'] == 'del'){

            $info_del = "DELETE FROM screen_info WHERE movie_idx='$idx' and theater_idx='$theater'";
            echo $info_del;
            echo $theater;
            $result = $conn->query($info_del);
            ?><script>history.go(-1);</script><?php

         }else if ( $_GET['func'] == 'add' ){

            $info_add = "INSERT INTO screen_info(movie_idx, theater_idx) VALUES('$idx','$theater')";
            $result = $conn->query($info_add);
            echo $info_add;
            ?><script>history.go(-1);</script><?php

         }

      }
      //로그인 된 경우

      ?>
<div class="box au" style="text-align:center">
      <h1> <?php echo $id ?> 관리자 페이지 </h1>

      <h3> 현재 상영 영화 </h3>
      <button type="button" class="btn btn-sm"><a href="./logout.php">로그아웃</a></button>
      <div>
      <?php

      // 해당 영화관 상영 영화의 movie_info 읽어오기

      $query_info = "SELECT * FROM movie_info as m LEFT OUTER JOIN screen_info as s ON m.movie_idx=s.movie_idx LEFT OUTER JOIN admin_info as a ON a.theater_idx = s.theater_idx WHERE a.admin_id='$id'";

      $result = $conn->query($query_info);

   while($row = $result->fetch_array(MYSQLI_ASSOC)){
/*
      $movie_idx = $row['movie_idx'];

      $query_idx = "SELECT movie_title FROM movie_info WHERE movie_idx='$movie_idx'";
      $result_idx = $conn->query($query_idx);
      $row_idx = $result_idx->fetch_array(MYSQLI_ASSOC);
*/
      ?>


      <form name="yes" method="post">
      <table style="background-color:#f7f0e4; border:solid 5px #1b3c33;">


      <tr>

      <?php
      echo "<td width=120 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'><b>MOVIE TITLE</b></td><td style='padding-left: 9px'>". $row['movie_title']; ?></td></tr> 
      <?php
      echo "<td width=120 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'><b>DIRECTOR</b></td><td style='padding-left: 9px'> ". $row['director'];  ?></td></tr>
      <?php
      echo "<td width=120 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'><b>MAIN ACTOR</b></td><td style='padding-left: 9px'>". $row['main_actor'] ?></td></tr>
      <?php
      echo "<td width=120 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'><b>RUNNING TIME</b></td><td style='padding-left: 9px'> ". $row['running_time'] ?></td></tr>

      <input type="hidden" name="movie_idx" value="<?php echo $row['movie_idx']?>">

      <div style='padding-top: 10px; padding-bottom: 5px; padding-left: 555px;'>
         
         <button type="button" class="btn btn-sm"><a href="./admin.php?func=del&idx=<?php echo $row['movie_idx'] ?>">삭제</a></button>
      </div>


<?php
      }

?>
      <h3> 비상영 영화 </h3>
<?php

      $query_info = "SELECT * FROM movie_info as m LEFT OUTER JOIN screen_info as s ON m.movie_idx=s.movie_idx LEFT OUTER JOIN admin_info as a ON a.theater_idx = s.theater_idx WHERE a.admin_id!='$id'";

      $result = $conn->query($query_info);

      while($row = $result->fetch_array(MYSQLI_ASSOC)){
/*
      $movie_idx = $row['movie_idx'];

      $query_idx = "SELECT movie_title FROM movie_info WHERE movie_idx='$movie_idx'";
      $result_idx = $conn->query($query_idx);
      $row_idx = $result_idx->fetch_array(MYSQLI_ASSOC);
*/
      ?>


      <form name="no" method="post">
      <table style="background-color:#f7f0e4; border:solid 5px #1b3c33;">


      <tr>

      <?php
      echo "<td width=120 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'><b>MOVIE TITLE</b></td><td style='padding-left: 9px'>". $row['movie_title']; ?></td></tr> 
      <?php
      echo "<td width=120 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'><b>DIRECTOR</b></td><td style='padding-left: 9px'> ". $row['director'];  ?></td></tr>
      <?php
      echo "<td width=120 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'><b>MAIN ACTOR</b></td><td style='padding-left: 9px'>". $row['main_actor'] ?></td></tr>
      <?php
      echo "<td width=120 style='color:#f7f0e4; background-color:#1b3c33; text-align:center'><b>RUNNING TIME</b></td><td style='padding-left: 9px'> ". $row['running_time'] ?></td></tr>

      <input type="hidden" name="movie_idx" value="<?php echo $row['movie_idx']?>">

      <div style='padding-top: 10px; padding-bottom: 5px; padding-left: 555px;'>
         
         <button type="button" class="btn btn-sm"><a href="./admin.php?func=add&idx=<?php echo $row['movie_idx'] ?>">추가</a></button>
      </div>

      </div></div>

   <?php
}
   }else{

      
      if (!empty($_POST['user_id'])){

      $id = $_POST['user_id'];
      $pw = $_POST['user_pw'];

      $query_id = "SELECT * FROM admin_info WHERE admin_id='$id'";

      $result = $conn->query($query_id);

      if( $result ){
         $row = $result->fetch_array(MYSQLI_ASSOC);
         if( $row['admin_pw'] == $pw ){

            $_SESSION['admin_id'] = $id;

            ?>
               <script>alert("login success");</script>
            <?php
            header("Location: admin.php");

         }else{
            ?>
            <div style="text-align:center; padding-top: 100px"><?php
            echo "password is invalid</br>please try again";?>
            <div style='padding-top: 10px; text-align: center;'>
            <button><a class="btn btn-secondary" href="./admin.php" role="button">back to login</a></button></div></div>
            <?php
         }
      }else{
         ?>
         <div style="text-align:center; padding-top: 100px"><?php
         echo "id is invalid</br>please try again";?>
         <div style='padding-top: 10px; text-align: center;'>
         <button><a class="btn btn-secondary" href="./admin.php" role="button">back to login</a></button></div>
         <?php

      }

   }else{


      ?>

      <body class="text-center">
      <form class="form-signin" name="user_login" method="post" action="./admin.php">
      <img class="mb-4" src="./images/ewha.svg" alt="" width="216" height="216">
      <h1 class="h3 mb-3 font-weight-normal">ADMIN PAGE</h1>
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">user id</label>
      <input type="text" name="user_id", class="form-control" placeholder="user id" required autofocus>
      <label for="inputPassword" class="sr-only">password</label>
      <input type="password" name="user_pw" class="form-control" placeholder="password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" value="login">Sign in</button>
      <a type="button" class="btn btn-lg btn-primary btn-block" href="login.php">Sign in as user</a>
      </form>


      <?php

   }
}

?>

</body>
</html>