<?php

include "header.php";

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
			<div style="text-align:center; padding-top: 100px">
				<?php echo "password is invalid</br>please try again";?>
				<div style='padding-top: 10px; text-align: center;'>
					<button>
						<a style="color:black" href="./login.php" role="button">back to login</a>
					</button>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div style="text-align:center; padding-top: 100px">
			<?php echo "id is invalid</br>please try again";?>
			<div style='padding-top: 10px; text-align: center;'>
				<button class="btn btn-secondary">
					<a style="color:black" href="./login.php" role="button">back to login</a>
				</button>
			</div>
			<?php

		}

	}else{
		?>

		<body>
			<div id="learning-automated-div" style="text-align: center; font-size: 48px; line-height: 52px; padding: 200px 5px 200px 5px;">

				<span style="color:#FFFFFF;">
					<b> LOGIN PAGE </b>
				</span>
			</div>

			<main role="main">
				<div class="album py-5 bg-light">
					<div class="container" style="text-align:center; padding-top:50px; padding-bottom:200px;">
						<form class="form-signin" style="padding-left:200px; padding-right:200px;" name="user_login" method="post" action="./login.php">
							<img class="mb-4" src="./images/ewha.svg" alt="" width="216" height="216">
							<h1 style="font-size:40px">Ewha Moviegoer</h1>
							<h1 style="padding-bottom: 10px">Please sign in</h1>

							<input style="padding-bottom: 10px; font-size:17px; height:40px" type="text" name="user_id", class="form-control" placeholder="user id" required autofocus>

							<input style="padding-bottom: 10px; font-size:17px; height:40px" type="password" name="user_pw" class="form-control" placeholder="password" required>

						</br>
						<button class="btn btn-lg btn-outline-secondary"  type="submit" value="login">Sign in</button>
						<a class="btn btn-lg btn-outline-secondary" href="admin.php">Sign in as admin</a>
						<p style="padding-top:10px;">Don't have an account? <a style="color:red" href="register.php">Sign up now</a>.</p>
					</form>
				</div>
			</div>
		</main>
	</body>
	</html>


	<?php

}

?>