<?php

include "header.php";

?>

<div class="vc_row element-row row vc_custom_1478727859541" >
  <div class="wpb_column vc_column_container vc_col-sm-12">
    <div class="wpb_wrapper">

      <div class="row fw-content-wrap">
        <div class="col-12 nbm">
          <div id="learning-automated-div" style="text-align: center; font-size: 48px;
          line-height: 52px; padding-left: 800px; padding-top: 300px;">
          <?php
          $query_info = "SELECT movie_idx, movie_title FROM user_review GROUP BY movie_idx ORDER BY AVG(movie_rating) DESC;";
          $result = $conn->query($query_info);
          $row = $result->fetch_array(MYSQLI_ASSOC); 
          ?>
          <span style="color:#FFFFFF;">
            <b> <?php echo $row['movie_title']."\n";?> </b>
          </span>
        </div>
        <div style="text-align: center; font-size: 18px; line-height: 22px; padding-left: 800px; ">
          <span style="color:#FFFFFF;">Best Movie Of The Week
          </span>
        </div>
        <div style="text-align: center; ">
          <a class="btn best-movie" href="movie.php?idx=<?php echo $row['movie_idx'] ?>" style="color: white; padding-left: 800px;"> >> Show Details </a> </br> <?php

          ?>
        </div>
      </div>
    </div>
  </div>
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