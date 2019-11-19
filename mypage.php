<?php

	session_start();

	include "config.php";

	if(!isset($_SESSION['user_id'])){

		?>
		<script>alert("invalid access. Please Login!");</script>
		<?php
		header("Location: login.php");

	}else{
?>

<!DOCTYPE html>
<meta charset="utf-8" />
<html>
<head>
	<title> index </title>
</head>
<body>

	<h1> MYPAGE <?php echo $_SESSION['user_id'] ?> </h1>

<?php

	$query_info = "SELECT * FROM user_info WHERE user_id='$id'";

	$result = $conn->query($query_id);

	if( $result ){

		$myinfo = $result->fetch_array(MYSQLI_ASSOC);


	}else{
		?>
		<script>alert("database error")</script>
		<?php
	}

?>

</body>
</html>