<?php

	include "config.php";

	if (!empty($_POST['user_id'])){

		$id = $_POST['user_id'];
		$pw = $_POST['user_pw'];
		$genre = $_POST['genre'];
		$birth = $_POST['birth_year'] * 10000 + $_POST['birth_month'] * 100 + $_POST['birth_date'];
		$gender = $_POST['gender'];
		$email = $_POST['email'].'@'.$_POST['email_dns'];

		$query_id = "SELECT user_id FROM user_login WHERE user_id='$id'";

		$result = $conn->query($query_id);

		if( $result ){

			$row = $result->fetch_array(MYSQLI_ASSOC);

			if ( $row['user_id'] ){

			?>
				<script>alert("user id is duplicate")</script>
			<?php
			}else{

				$query_genre = "SELECT genre_idx FROM movie_genre WHERE genre='$genre'";
				$result = $conn->query($query_genre);
				$row = $result->fetch_array(MYSQLI_ASSOC);

				$genre_idx = $row['genre_idx'];

				if ( $genre_idx ){
					$info_ins = "INSERT INTO user_info(user_id, genre_idx, birth, gender, email) VALUES ('$id', '$genre_idx', '$birth', '$gender','$email')";
					$result = $conn->query($info_ins);

					$login_ins = "INSERT INTO user_login(user_id, user_pw) VALUES ('$id', '$pw')";
					$result2 = $conn->query($login_ins);

					if ( $result && $result2 ){

						?>
						<script>alert("register success")</script>

						<?php		
						header("Location: login.php");

					}else{

						?>
						<script>alert("database error")</script>
						<?php
					}

				}else{

					?>
					<script>alert("no such genre")</script>
					<?php
				}

			}

		}else{

			?>
				<script>alert("database error")</script>
			<?php
		}

	}else{
?>

<!DOCTYPE html>
<meta charset="utf-8" />
<html>
<head>
	<title> register </title>
</head>
<body>

	<form name="register_user" method="post" action="register.php">
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
				<th> favorite genre </th>
				<td> 
				<select name="genre" size="1">
					<option value=""> choose </option>
					<option value="romance"> romance </option>
					<option value="sf"> SF </option>
				</select>
				</td>
			</tr>
			<tr> 
				<th> birth </th>
				<td> 
				<select name="birth_year" size="1">
					<option value=""> year </option>
					<option value="1997"> 1997 </option>
					<option value="1996"> 1996 </option>
				</select>
				<select name="birth_month" size="1">
					<option value=""> month </option>
					<option value="12"> 12 </option>
					<option value="11"> 11 </option>
				</select>
				<select name="birth_date" size="1">
					<option value=""> month </option>
					<option value="31"> 31 </option>
					<option value="30"> 30 </option>
				</select>
				</td>
			</tr>
			<tr> 
				<th> gender </th>
				<td> 
				<select name="gender" size="1">
					<option value=""> choose </option>
					<option value="woman"> woman </option>
					<option value="man"> man </option>
				</select>
				</td>
			</tr>
			<tr>
				<th> email </th>
				<td>
				<input type="text" name="email">@
				<input type="text" name="email_dns">
				</td>
			</tr>
			<tr>
				<td>
				<input type="submit" value="register">
				<input type="reset" value="cancle">
				</td>
			</tr>
			</tr>
		</table>
	</form>

</body>
</html>


<?php

	}

?>