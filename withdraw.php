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

		$login_del = "DELETE FROM user_login WHERE user_id='$id'";
		$result = $conn->query($login_del);

		$info_del = "DELETE FROM user_info WHERE user_id='$id'";
		$result2 = $conn->query($info_del);

		if ( $result && $result2 ){

		?>
			<script>alert("delete success")</script>

		<?php		
			header("Location: logout.php");

		}else{

			?>
			<script>alert("database error")</script>
			<?php
		}



	}

?>