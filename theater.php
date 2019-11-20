<?php

	session_start();

	include "config.php";

	if(!isset($_GET['idx'])){

		?>
		<script>alert("invalid theater index");</script>
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
	<title> theater </title>
</head>
<body>


<?php

	$query = "SELECT * FROM theater_info WHERE theater_idx='$idx'";
	$result = $conn->query($query);
	$row = $result->fetch_array(MYSQLI_ASSOC);

	?> <h1> <?php echo $row['theater_name']; ?> </h1> <?php 
	echo $row['theater_address']; ?> </br> <?php 

?>

	<h2> MOVIE INFO </h2>

<?php

	$query_info = "SELECT m.movie_idx, m.movie_title FROM movie_info as m JOIN screen_info as s ON m.movie_idx=s.movie_idx WHERE theater_idx='$idx'";

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
		<a href="movie.php?idx=<?php echo $row['movie_idx'] ?>"> <?php echo $row['movie_title']."\t"; ?> </a> <?php

	}
?>

	<h2> STORE </h2>

<?php

	$query_info = "SELECT * FROM menu_info WHERE theater_idx='$idx'";

	$result = $conn->query($query_info);

	?> <table> <?php

	while($row = $result->fetch_array(MYSQLI_ASSOC)){

		?>
			<tr>
				<th><?php echo $row['menu_id']; ?> </th>
				<td> 
					<th><?php echo $row['price']; ?> </th>
					<th><?php echo $row['description']; ?> </th>

				</td>
			</tr>

		<?php
	}
?>

	</table>
<?php

}

?>
</body>
</html>