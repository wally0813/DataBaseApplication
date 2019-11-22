<?php

	session_start();

	include "config.php";

	if(!isset($_GET['idx'])){

		?>
		<script>alert("invalid access.");history.go(-1);</script>
		<?php

	}else{

		$idx = $_GET['idx'];

		$review_del = "DELETE FROM user_review WHERE review_idx='$idx'";
		$result = $conn->query($review_del);


		if ( $result ){

		?>
			<script>alert("delete success");history.go(-1);</script>

		<?php		

		}else{

			?>
			<script>alert("database error");history.go(-1);</script>
			<?php
		}



	}

?>