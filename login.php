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
				?>
				<div style="text-align:center; padding-top: 100px"><?php
				echo "password is invalid</br>please try again";?>
				<div style='padding-top: 10px; text-align: center;'>
				<button><a class="btn btn-secondary" href="./login.php" role="button">back to login</a></button></div></div>
				<?php
			}
		}else{
			?>
			<div style="text-align:center; padding-top: 100px"><?php
			echo "id is invalid</br>please try again";?>
			<div style='padding-top: 10px; text-align: center;'>
			<button><a class="btn btn-secondary" href="./login.php" role="button">back to login</a></button></div>
			<?php

		}

	}else{
?>
<!DOCTYPE html>
<meta charset="utf-8" />
<html>
<head>
	<title> login </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
	<link href="/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800&amp;subset=korean" rel="stylesheet">
	<style>
		.bd-placeholder-img {
			font-family: "Nanum Gothic", sans-serif;
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
			font-size: 3.5rem;
			}
		}
		.body{
			font-family: "Nanum Gothic", sans-serif;
		}
	</style>
	<!-- Custom styles for this template -->
	<link href="signin.css" rel="stylesheet">
</head>
<body style="font-family: 'Nanum Gothic', sans-serif;" class="text-center">
	<form class="form-signin" name="user_login" method="post" action="./login.php">
		<img class="mb-4" src="./images/ewha.svg" alt="" width="216" height="216">
		<h1 class="h3 mb-3 font-weight-normal">Ewha Moviegoer</h1>
		<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
		<label for="inputEmail" class="sr-only">user id</label>
		<input type="text" name="user_id", class="form-control" placeholder="user id" required autofocus>
		<label for="inputPassword" class="sr-only">password</label>
		<input type="password" name="user_pw" class="form-control" placeholder="password" required>
		<button style="font-family: 'Nanum Gothic', sans-serif;" class="btn btn-lg btn-primary btn-block" type="submit" value="login">Sign in</button>
		<a type="button" class="btn btn-lg btn-primary btn-block" href="admin.php">Sign in as admin</a>
		<p style="padding-top:10px; font-family: 'Nanum Gothic', sans-serif;">Don't have an account? <a href="register.php">Sign up now</a>.</p>
	</form>
</body>
</html>


<?php

	}

?>