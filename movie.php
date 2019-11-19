<?php

	session_start();

	include "config.php";

	if(!isset($_GET['idx'])){

		?>
		<script>alert("invalid movie index");</script>
		<?php
		header("Location: index.php");

	}else{

		$id = $_SESSION['user_id'];

		$idx = $_GET['idx'];

?>

<!DOCTYPE html>
<meta charset="utf-8" />
<html>
<head>
	<title> movie </title>
</head>
<body>

	<h2> MOVIE INFO </h2>

<?php

	$query = "SELECT * FROM movie_info WHERE movie_idx='$idx'";
	$result = $conn->query($query);

	while($row = $result->fetch_array(MYSQLI_ASSOC)){

		$genre_idx = $row['genre_idx'];

		$query_idx = "SELECT genre FROM movie_genre WHERE genre_idx='$genre_idx'";
		$result_idx = $conn->query($query_idx);
		$row_idx = $result_idx->fetch_array(MYSQLI_ASSOC);

		?> <h1> <?php echo $row['movie_title']; ?> </h1> <?php 
		echo "DIRECTOR: " . $row['director']; ?> </br> <?php 
		echo "ACTORS: " . $row['main_actor']; ?> </br> <?php 
		echo "GENRE: " . $row_idx['genre']; ?> </br> <?php 
		echo "RUNNING_TIME: " . $row['running_time']; ?> </br> <?php 

	}
?>

	<h2> MOVIE REVIEW </h2>

<?php

	$query_info = "SELECT * FROM user_review WHERE movie_idx='$idx'";

	$result = $conn->query($query_info);

	while($row = $result->fetch_array(MYSQLI_ASSOC)){
/*
		$movie_idx = $row['movie_idx'];

		$query_idx = "SELECT movie_title FROM movie_info WHERE movie_idx='$movie_idx'";
		$result_idx = $conn->query($query_idx);
		$row_idx = $result_idx->fetch_array(MYSQLI_ASSOC);
*/
		echo "USER ID: " . $row['user_id']; ?> </br> <?php 
		echo "MY RATING: " . $row['movie_rating']; ?> </br> <?php 
		echo "MY REVIEW: " . $row['movie_review']; ?> </br> <?php 

	}
?>

	<h2> MOVIE SCREEN INFO </h2>

<?php

	$query_info = "SELECT t.theater_idx, t.theater_name FROM theater_info as t JOIN screen_info as s ON t.theater_idx=s.theater_idx WHERE movie_idx='$idx'";

	$result = $conn->query($query_info);

	while($row = $result->fetch_array(MYSQLI_ASSOC)){
/*
		$movie_idx = $row['movie_idx'];

		$query_idx = "SELECT movie_title FROM movie_info WHERE movie_idx='$movie_idx'";
		$result_idx = $conn->query($query_idx);
		$row_idx = $result_idx->fetch_array(MYSQLI_ASSOC);
*/
		?>
		<a href="theater.php?idx=<?php echo $row['theater_idx'] ?>"> <?php echo $row['theater_name']."\t"; ?> </a> </br> <?php

	}
?>


<?php

}

?>
</body>
</html>