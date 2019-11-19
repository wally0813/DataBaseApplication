<?php

	session_start();

	include "config.php";

	if(!isset($_SESSION['user_id'])){

		?>
		<script>alert("invalid access. Please Login!");</script>
		<?php
		header("Location: login.php");

	}else{

		$id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<meta charset="utf-8" />
<html>
<head>
	<title> mypage </title>
</head>
<body>

	<h1> MYPAGE <?php echo $id ?> </h1>
	<h2> MYINFO </h2>

<?php

	$query_info = "SELECT * FROM user_info WHERE user_id='$id'";

	$result = $conn->query($query_info);

	while($row = $result->fetch_array(MYSQLI_ASSOC)){

		$genre_idx = $row['genre_idx'];

		$query_idx = "SELECT genre FROM movie_genre WHERE genre_idx='$genre_idx'";
		$result_idx = $conn->query($query_idx);
		$row_idx = $result_idx->fetch_array(MYSQLI_ASSOC);

		echo "USER ID: " . $row['user_id']; ?> </br> <?php 
		echo "GENRE: " . $row_idx['genre']; ?> </br> <?php 
		echo "BIRTH: " . $row['birth']; ?> </br> <?php 
		echo "GENDER: " . $row['gender']; ?> </br> <?php 
		echo "EMAIL: " . $row['email']; ?> </br> <?php 

	}
?>

	<h2> MYREVIEW </h2>

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
		echo "MOVIE TITLE: " . $row['movie_title']; ?> </br> <?php 
		echo "MY RATING: " . $row['movie_rating']; ?> </br> <?php 
		echo "MY REVIEW: " . $row['movie_review']; ?> </br> <?php 

	}
?>


<?php

}

?>
</body>
</html>