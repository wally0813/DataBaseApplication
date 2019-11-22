<?php

	session_start();
	include "config.php";

	if( !empty($_POST['review_idx']) ){
		// modify

		$idx = $_POST['review_idx'];

		$rate = $_POST['movie_rating'];
		$review =  $_POST['movie_review'];

		$query = "UPDATE `user_review` SET movie_rating='$rate', movie_review='$review' WHERE review_idx='$idx'";
		$result = $conn->query($query);

		if ( $result ){
			?> <script>
				alert("modify success!");
				history.go(-1);
			</script> 

			<?
		}else{
			?> <script>
				alert("database error");
				history.go(-1);
			</script> <?
		}


	}else{
		// write

		$idx = $_POST['movie_idx'];
		$rate = $_POST['movie_rating'];
		$review =  $_POST['movie_review'];
		$title = $_POST['movie_title'];

		$id = $_SESSION['user_id'];

		if ( !isset($_SESSION['user_id']) ){

			?>
      		<script>alert("Please Login First");</script>
      		<?php
      		header("Location: login.php");

		}else{

			$query = "INSERT INTO user_review(user_id, movie_idx, movie_title, movie_rating, movie_review) VALUES ('$id','$idx','$title','$rate','$review')";

			$result = $conn->query($query);
			
			if ( $result ){

				?>
      				<script>alert("add success!");
      					history.go(-1);
      				</script>
      			<?php

			}else{
				?>
      				<script>alert("database error");
      					history.go(-1);
      				</script>
      			<?php
			}
			

		}


	}

?>

<!DOCTYPE html>
<meta charset="utf-8" />
<html>
<head>
   <title> review </title>
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