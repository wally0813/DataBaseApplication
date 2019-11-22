<?php

	session_start();

	include "config.php";

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Album example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
	<style>
	img.card-img-top {
		display: block;
		margin: 0 auto;
	}
	.card-body{
		text-align:center;
		margin-top: 10px;
	}
	.row.display-flex {
	  display: flex;
	  flex-wrap: wrap;
	}
	.row.display-flex > [class*='col-'] {
	  display: flex;
	  flex-direction: column;
	}
	</style>

  </head>

  <body>
 <?php

	if(!isset($_GET['idx'])){

		?>
		<script>alert("invalid theater index");</script>
		<?php
		header("Location: index.php");

	}else{

		$id = $_SESSION['user_id'];

		$idx = $_GET['idx'];

?>
    <main role="main">

      <section class="jumbotron text-center" style="background-color: #fdfcf0; margin-bottom: 70px;">
	  <?php

	$query = "SELECT * FROM theater_info WHERE theater_idx='$idx'";
	$result = $conn->query($query);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	?>
        <div class="container" style="background-color: #fdfcf0;">
          <h1 class="jumbotron-heading" style="font-size:50px;"><b><?php echo $row['theater_name']; ?></b></h1>
          <p class="lead text-muted"><?php echo $row['theater_address']; ?> </br></p>
          
        </div>
      </section>
	  <?php } ?>
      <div class="album py-5 bg-light">
	  <h2 style="text-align: center; margin-bottom: 30px;"> 현재 상영중인 영화 </h2>
        <div class="container">
		<?php

		$query_info = "SELECT m.filename, m.movie_idx, m.movie_title FROM movie_info as m JOIN screen_info as s ON m.movie_idx=s.movie_idx WHERE theater_idx='$idx'";
		$result = $conn->query($query_info);
		$i = 0;
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			if ( $i % 3 == 0 ){
				?> </br> <?php 
			}else{
				?> &nbsp;&nbsp;&nbsp;&nbsp; <?php  
			}

			$i++;

		
	?>
          <div class="row row-flex">
            <div class="col-md-4" style="margin-bottom:30px;">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src=<?php echo './posters/'.$row['filename'];?> width=200; alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><b><?php echo $row['movie_title']; ?></b></p>
                  <div class="d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='movie.php?idx=<?php echo $row['movie_idx'] ?>'" style="margin-bottom:20px;">자세히</button>
                  </div>
                </div>
              </div>
            </div>
			<?php } ?>
            
          </div>
        </div>
      </div>
	  <h2 style="text-align: center; margin-bottom: 100px;"> STORE </h2>
	  <div class="table-responsive">
	  <?php

	$query_info = "SELECT * FROM menu_info WHERE theater_idx='$idx'";

	$result = $conn->query($query_info);

	?>
	  <table class="table table-striped tabl-sm">
	 <thread>
		<tr>
			<th>메뉴이름</th>
			<th>가    격</th>
			<th>부가설명</th>
		</tr>
	</thread>
	
	<tbody>
	<?php

	while($row = $result->fetch_array(MYSQLI_ASSOC)){

	?>
		<tr>
			<td><?php echo $row['menu_id']; ?> </td>
			<td><?php echo $row['price']; ?> </td>
			<td><?php echo $row['description']; ?> </td>

		</tr>
	</tbody>
	<?php
	}
	?>
	</table>
 <table> 

    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
  </body>
</html>
