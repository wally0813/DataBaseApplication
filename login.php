<?php

	session_start();

	include "config.php";

	if (!empty($_POST['user_id'])){

		$id = $_POST['user_id'];
		$pw = $_POST['user_pw'];

		$query_id = "SELECT * FROM user_login WHERE user_id='$id'";

		$result = $conn->query($query_id);

		if( $result ){
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if( $row['user_pw'] == $pw ){

				$_SESSION['user_id'] = $id;

				?>
					<script>alert("login success");</script>
				<?php
				header("Location: index.php");

			}else{

				echo "password is invalid";

			}
		}else{

			echo "id is invalid";

		}

	}else{
?>
<!DOCTYPE html>
<meta charset="utf-8" />
<html>
<head>
	<title> login </title>
</head>
<body>

	<form name="user_login" method="post" action="./login.php">

		<table>
			<tr>
				<th> user id </th>
				<td> <input type="text" name="user_id"> </td>
			</tr>
			<tr>
				<th> user password </th>
				<td> <input type="password" name="user_pw"> </td>
			</tr>
			<tr>
				<td>
				<input type="submit" value="login">
				<input type="reset" value="cancle">
				</td>
			</tr>
		</table>

	</form>
</body>
</html>

<?php

	}

?>