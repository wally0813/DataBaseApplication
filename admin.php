<?php

include "header.php"

?>
<body>
   <div id="learning-automated-div" style="text-align: center; font-size: 48px; line-height: 52px; padding: 200px 5px 200px 5px;">

      <span style="color:#FFFFFF;">
         <b> <?php echo $id ?> 관리자 페이지 </b>
      </span>
   </div> 

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

      <div class="album py-5 bg-light">
         <div class="container" style="text-align:center; padding-top:50px; padding-bottom:200px;">
            <div class="row"> 
               <div class="col-6">
                  <h1> 현재 상영 영화 </h1>


                  <?php

      // 해당 영화관 상영 영화의 movie_info 읽어오기

                  $query_info = "SELECT * FROM movie_info as m LEFT OUTER JOIN screen_info as s ON m.movie_idx=s.movie_idx LEFT OUTER JOIN admin_info as a ON a.theater_idx = s.theater_idx WHERE a.admin_id='$id'";

                  $result = $conn->query($query_info);

                  while($row = $result->fetch_array(MYSQLI_ASSOC)){

                     ?>


                     <form name="yes" method="post">
                        <table class="table table-striped table-hover" style="text-align:center;">


                           <tr>

                              <?php
                              echo "<td><b>MOVIE TITLE</b></td><td>". $row['movie_title']; ?>
                           </td>
                        </tr> 
                        <tr>
                           <?php
                           echo "<td><b>DIRECTOR</b></td><td> ". $row['director'];  ?>
                        </td>
                     </tr>
                     <tr>
                        <?php
                        echo "<td><b>MAIN ACTOR</b></td><td>". $row['main_actor'] ?>
                     </td>
                  </tr>
                  <tr>
                     <?php
                     echo "<td><b>RUNNING TIME</b></td><td> ". $row['running_time'] ?>
                  </td>
               </tr>

               <input type="hidden" name="movie_idx" value="<?php echo $row['movie_idx']?>">

               <div style='padding-top: 10px; padding-bottom: 5px; padding-left: 500px;'>

                  <button type="button" class="btn btn-sm btn-outline-secondary">
                     <a style="color:black" href="./admin.php?func=del&idx=<?php echo $row['movie_idx'] ?>">
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
   <div class="col-6">
      <h1> 비상영 영화 </h1>
      <?php

      $query_info = "SELECT * FROM movie_info WHERE movie_idx NOT IN (SELECT movie_idx FROM screen_info as s LEFT OUTER JOIN admin_info as a ON a.theater_idx = s.theater_idx WHERE a.admin_id='$id')";

      $result = $conn->query($query_info);

      while($row = $result->fetch_array(MYSQLI_ASSOC)){

         ?>


         <form name="no" method="post">
            <table class="table table-striped table-hover">


               <tr>

                  <?php
                  echo "<td><b>MOVIE TITLE</b></td><td>". $row['movie_title']; ?></td></tr> 
                  <tr>
                     <?php
                     echo "<td><b>DIRECTOR</b></td><td> ". $row['director'];  ?></td></tr>
                     <tr>
                        <?php
                        echo "<td><b>MAIN ACTOR</b></td><td>". $row['main_actor'] ?></td></tr>
                        <tr>
                           <?php
                           echo "<td><b>RUNNING TIME</b></td><td> ". $row['running_time'] ?></td></tr>

                           <input type="hidden" name="movie_idx" value="<?php echo $row['movie_idx']?>">

                           <div style='padding-top: 10px; padding-bottom: 5px; padding-left: 500px;'>

                              <button type="button" class="btn btn-sm btn-outline-secondary">
                                 <a style="color:black" href="./admin.php?func=add&idx=<?php echo $row['movie_idx'] ?>">추가</a></button>
                              </div>
                           </table>
                        </form>

                        <?php
                     }

                     ?>
                  </div>
                  <?php
               }else{

                  ?>
                  <div class="album py-5 bg-light">
                     <div class="container" style="text-align:center; padding-top:50px; padding-bottom:200px;">
                        <?php

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

                                 <main role="main">
                                    <div class="album py-5 bg-light">
                                       <div class="container" style="text-align:center; padding-top:50px; padding-bottom:200px;">
                                          <form class="form-signin" style="padding-left:200px; padding-right:200px;" name="user_login" method="post" action="./admin.php">
                                             <img class="mb-4" src="./images/ewha.svg" alt="" width="216" height="216">
                                             <h1>Please sign in</h1> </br>

                                             <input style="padding-bottom: 10px; font-size:17px; height:40px" type="text" name="user_id", class="form-control" placeholder="user id" required autofocus>

                                             <input style="padding-bottom: 10px; font-size:17px; height:40px" type="password" name="user_pw" class="form-control" placeholder="password" required>

                                          </br>
                                             <button class="btn btn-lg btn-outline-secondary"  type="submit" value="login">Sign in</button>
                                             <a class="btn btn-lg btn-outline-secondary" href="login.php">Sign in as user</a>
                                          </form>


                                          <?php

                                       }
                                    }

                                    ?>

                                 </div>
                              </div>


                           </body>
                           </html>