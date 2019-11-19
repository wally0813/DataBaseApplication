<?php

	session_start();

	include "config.php";

	if(!isset($_SESSION['user_id'])){
?>

<!DOCTYPE html>
<meta charset="utf-8" />
<html>
<head>
	<title> index </title>
</head>
<body>
	<a href="./login.php">login</a>
	<a href="./register.php">register</a>

<?php

	}else{

?>
	<b> HELLO! <?php echo $_SESSION['user_id'] ?> </b>
	<a href="./mypage.php">mypage</a>
	<a href="./logout.php">logout</a>

	<h1> SELECT THEATER </h1>

<?php

	$query_info = "SELECT * FROM theater_info";


	$result = $conn->query($query_info);
	
	while($row = $result->fetch_array(MYSQLI_ASSOC)){

		?>
		<a href="theater.php?idx=<?php echo $row['theater_idx'] ?>"> <?php echo $row['theater_name']."\t"; ?> </a> <?php
	}

	
	}

?>

</body>
</html>