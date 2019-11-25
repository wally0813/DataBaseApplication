<?php

include "header.php";

?>


<?php

if(!isset($_SESSION['user_id'])){

   ?>
   <script>alert("invalid access. Please Login!");</script>
   <?php
   header("Location: login.php");

}else{

   $id = $_SESSION['user_id'];
   ?>

   <main role="main" style="text-align:center; padding-top:500px;">

      <div class="album py-5 bg-light">
         <div class="container" style="text-align:center; padding-top:10px; padding-bottom:200px;">
            <h1 style="text-align:center; padding-bottom:50px;"> MYPAGE <?php echo $id; ?> </h1>

            <div class="row"> 
               <div class="col-6">
                  <h1 style="padding-bottom: 10px"> MY INFO </h1>
                  <?php

                  $query_info = "SELECT * FROM user_info WHERE user_id='$id'";

                  $result = $conn->query($query_info);

                  while($row = $result->fetch_array(MYSQLI_ASSOC)){

                     $genre_idx = $row['genre_idx'];

                     $query_idx = "SELECT genre FROM movie_genre WHERE genre_idx='$genre_idx'";
                     $result_idx = $conn->query($query_idx);
                     $row_idx = $result_idx->fetch_array(MYSQLI_ASSOC);
                     ?>
                     <table class="table table-striped" style="font-size:15px">
                        <tr>
                           <td style='text-align:center'> <?php
                           echo "<b>사용자 아이디</b></td><td style='padding-left: 9px'>" . $row['user_id']; ?> </td></tr> <tr><td><?php 
                           echo "<b>좋아하는 장르</b></td><td style='padding-left: 9px'>" . $row_idx['genre']; ?> </td></tr> <tr><td><?php 
                           echo "<b>생년월일</b></td><td style='padding-left: 9px'>" . $row['birth']; ?> </td></tr> <tr><td><?php 
                           echo "<b>성별</b></td><td style='padding-left: 9px'>" . $row['gender']; ?> </td></tr> <tr><td><?php 
                           echo "<b>이메일 주소</b></td><td style='padding-left: 9px'>" . $row['email']; ?> </td> </tr></table><?php 

                        }
                        ?>

                        <div style='padding-top: 15px; padding-left: 240px;'>
                          <button type="button" class="btn btn-outline-dark"><a style="color: black;" href="./withdraw.php">회원탈퇴</a></button>
                          <button type="button" class="btn btn-outline-dark"><a style="color: black;" href="./changeinfo.php">회원정보 수정</a></button>
                          <button type="button" class="btn btn-outline-dark"><a style="color: black;" href="./index.php">메인화면으로</a></button>
                          <button type="button" class="btn btn-outline-dark"><a style="color: black;" href="./logout.php">로그아웃</a></button>
                       </div>
                    </div>
                    <div class="col-6">
                     <h1 style="padding-bottom: 10px"> MY REVIEW </h1>
                     <?php

                     $query_info = "SELECT * FROM user_review WHERE user_id='$id'";

                     $result = $conn->query($query_info);

                     while($row = $result->fetch_array(MYSQLI_ASSOC)){
                        ?>

                        <form class="form-horizontal" role="form" name="user_review" method="post" action="writereview.php">
                           <table  class="table table-striped" style="font-size:12px">
                              <tr>

                                 <?php
                                 echo "<td><b>MOVIE TITLE</b></td><td>". $row['movie_title']; ?></td></tr> 
                                 <?php
                                 echo "<td><b>MOVIE RATING</b></td><td> <input type='text' name='movie_rating' value='". $row['movie_rating']."'>"; ?></td></tr>
                                 <?php
                                 echo "<td><b>MOVIE REVIEW</b></td><td> <input type='text' name='movie_review' value='". $row['movie_review']."'>"; ?></td></tr>

                                 <input type="hidden" name="review_idx" value="<?php echo $row['review_idx']?>">

                                 <div style='padding-top: 5px; padding-bottom: 5px; padding-left: 450px;'>
                                    <button type="submit" class="btn btn-outline-dark">
                                       수정
                                    </button>
                                    <button type="button" class="btn btn-outline-dark">
                                       <a style="color: black;" href="./deletereview.php?idx=<?php echo $row['review_idx'] ?>">
                                          삭제
                                       </a>
                                    </button>
                                 </div>
                              </table>
                           </form>

                           <?php 

                        }
                        ?>


                     </div>
                  </div>

               </div>
            </div>
         </main>

   <!--
      <font color="#1b3c33"><h1 style='background-color:black; padding-top:10px;padding-bottom:20px;padding-left: 10px; margin-right:500px; font-family: "Nanum Gothic", sans-serif;'>마이 페이지 <?php echo $id; ?> </h1></font>
      <h2 style='color:#1b3c33; padding-left:10px; font-family: "Nanum Gothic", sans-serif;'> 회원 정보 </h2>
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

            <div style='padding-top: 5px; padding-left: 257px;'>
             <button type="button" class="btn btn-sm"><a href="./withdraw.php">회원탈퇴</a></button>
             <button type="button" class="btn btn-sm"><a href="./changeinfo.php">회원정보 수정</a></button>
             <button type="button" class="btn btn-sm"><a href="./index.php">메인화면으로</a></button>
             <button type="button" class="btn btn-sm"><a href="./logout.php">로그아웃</a></button>
          </div>

          <hr class="line">
          <h2 style='color:#1b3c33; padding-left:10px; margin-bottom:10px; font-family: "Nanum Gothic", sans-serif;'> MY REVIEW </h2>

          <?php

          $query_info = "SELECT * FROM user_review WHERE user_id='$id'";

          $result = $conn->query($query_info);

          while($row = $result->fetch_array(MYSQLI_ASSOC)){
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


      -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.js"></script>
   </body>
