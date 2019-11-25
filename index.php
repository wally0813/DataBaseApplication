<?php

include "header.php";

?>


<div class="container">
  <div class="center-block" style="text-align: center;padding-top: 300px;">
    <span style="text-align: center; font-size: 50px; color:#FFFFFF;">
      <br> \ Best Movie Of The Week \ </br>
    </span>
    <div id="learning-automated-div" style="text-align: center; font-size: 48px; ">
      <?php
      $query_info = "SELECT movie_idx, movie_title FROM user_review GROUP BY movie_idx ORDER BY AVG(movie_rating) DESC;";
      $result = $conn->query($query_info);
      $row = $result->fetch_array(MYSQLI_ASSOC); 
      ?>
      <span style="color:#FFFFFF;">
        <b> 
          <?php echo $row['movie_title']."\n";?> 
        </b>
      </span>
    </div>
    <a href="movie.php?idx=<?php echo $row['movie_idx'] ?>" style="color: white;"> 
      >> Show Details 
    </a>
  </div>
</div>



<br><br><br><br>
<div class="row" style="padding-left: 70px; padding-top:400px; padding-bottom: 100px">
 <div class="col-lg-4" style="float: left; width: 30%; text-align: center; ">
  <div class="circle" >
    <img class="mb-4" src="./images/cgv.jpg" width="216" height="216"></div>
    <h2 style="font-size:17px;">CGV ARTREON</h2>
    <a href="theater.php?idx=1" class="btn btn-dark">View details &raquo;</a>
  </div>
  <div class="col-lg-4" style="float: left; width: 30%; text-align: center;">
    <div class="circle" >
      <img class="mb-4" src="./images/mega.jpg" alt="" width="216" height="216"></div>
      <h2 style="font-size:17px">MEGABOX</h2>
      <a class="btn btn-dark" href="theater.php?idx=2">View details &raquo;</a>
    </div>
    <div class="col-lg-4" style="float: left; width: 30%; text-align: center;">
      <div class="circle" >
        <img class="mb-4" src="./images/momo.jpg" alt="" width="216" height="216" ></div>
        <h2 style="font-size:17px">ART HOUSE MOMO</h2>
        <a class="btn btn-dark" href="theater.php?idx=3">View details &raquo;</a>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>