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
	<style>
		th, td {
			border: 1px solid #444444;
		}
		table {
			width: 600px;
			border: 1px solid #444444;
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<font color=white><h1 style='background-color:green; padding-left: 10px;'> 마이페이지 <?php echo $id ?> </h1></font>
	<h2 style='padding-left:10px'> 내 정보 </h2>

<?php

	$query_info = "SELECT * FROM user_info WHERE user_id='$id'";

	$result = $conn->query($query_info);

	while($row = $result->fetch_array(MYSQLI_ASSOC)){

		$genre_idx = $row['genre_idx'];

		$query_idx = "SELECT genre FROM movie_genre WHERE genre_idx='$genre_idx'";
		$result_idx = $conn->query($query_idx);
		$row_idx = $result_idx->fetch_array(MYSQLI_ASSOC);
		?>
		<table>
		<tr>
		<td width=120 style='background-color:#009900; text-align:center'> <?php
		echo "<b>사용자 아이디</b></td><td style='padding-left: 9px'>" . $row['user_id']; ?> </td></tr> <tr><td style='background-color:#009900; text-align:center'><?php 
		echo "<b>좋아하는 장르</b></td><td style='padding-left: 9px'>" . $row_idx['genre']; ?> </td></tr> <tr><td style='background-color:#009900; text-align:center'><?php 
		echo "<b>생년월일</b></td><td style='padding-left: 9px'>" . $row['birth']; ?> </td></tr> <tr><td style='background-color:#009900; text-align:center'><?php 
		echo "<b>성별</b></td><td style='padding-left: 9px'>" . $row['gender']; ?> </td></tr> <tr><td style='background-color:#009900; text-align:center'><?php 
		echo "<b>이메일 주소</b></td><td style='padding-left: 9px'>" . $row['email']; ?> </td> </tr></table><?php 

	}
?>

<div style='padding-top: 5px; padding-left: 457px;'>
	<button><a class="btn btn-secondary" href="./changeinfo.php" role="button">change info</a></button>
	<button><a class="btn btn-secondary" href="./logout.php" role="button">logout</a></button>
</div>

	<h2 style='padding-left:10px; margin-bottom:-5px'> MY REVIEW </h2>

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
		<table>
		<tr>
		<?php
		echo "<td width=120 style='background-color:#009900; text-align:center'><b>MOVIE TITLE</b></td><td style='padding-left: 9px'>" . $row['movie_title']; ?></td></tr> <?php 
		echo "<tr><td style='background-color:#009900; text-align:center'><b>MY RATING</b></td><td style='padding-left: 9px'>" . $row['movie_rating']; ?> </td></tr> <?php 
		echo "<tr><td style='background-color:#009900; text-align:center'><b>MY REVIEW</b></td><td style='padding-left: 9px'>" . $row['movie_review']; ?> </td></tr> </br> <?php 

	}
?>


<?php

}

?>
</body>
</html>