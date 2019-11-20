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
				<th> 아이디 </th>
				<td> <input type="text" name="user_id"> </td>
			</tr>
			<tr>
				<th> 패스워드 </th>
				<td> <input type="password" name="user_pw"> </td>
			</tr>
			<tr> 
				<th> 좋아하는 장르 </th>
				<td> 
				<select name="genre" size="1">
					<option value=""> choose </option>
					<option value="범죄"> 범죄 </option>
					<option value="액션"> 액션 </option>
					<option value="드라마"> 드라마 </option>
					<option value="로맨스"> 로맨스 </option>
					<option value="다큐멘터리"> 다큐멘터리 </option>
					<option value="sf"> SF </option>
					<option value="스릴러"> 스릴러 </option>
					<option value="코미디"> 코미디 </option>
					<option value="어드벤쳐"> 어드벤쳐 </option>
					<option value="애니메이션"> 애니메이션 </option>
					<option value="호러"> 호러 </option>
					<option value="가족"> 가족 </option>
					<option value="멜로"> 멜로 </option>
				</select>
				</td>
			</tr>
			<tr> 
				<th> 생년월일 </th>
				<td> 
				<select name="birth_year" size="1">
					<option value=""> year </option>
					<option value="2001"> 2001 </option>
					<option value="2000"> 2000 </option>
					<option value="1999"> 1999 </option>
					<option value="1998"> 1998 </option>
					<option value="1997"> 1997 </option>
					<option value="1996"> 1996 </option>
					<option value="1995"> 1995 </option>
					<option value="1994"> 1994 </option>
					<option value="1993"> 1993 </option>
					<option value="1992"> 1992 </option>
					<option value="1991"> 1991 </option>
					<option value="1990"> 1990 </option>
					<option value="1989"> 1989 </option>
					<option value="1988"> 1988 </option>
					<option value="1987"> 1987 </option>
				</select>
				<select name="birth_month" size="1">
					<option value=""> month </option>
					<option value="12"> 12 </option>
					<option value="11"> 11 </option>
					<option value="10"> 10 </option>
					<option value="9"> 9 </option>
					<option value="8"> 8 </option>
					<option value="7"> 7 </option>
					<option value="6"> 6 </option>
					<option value="5"> 5 </option>
					<option value="4"> 4 </option>
					<option value="3"> 3 </option>
					<option value="2"> 2 </option>
					<option value="1"> 1 </option>
				</select>
				<select name="birth_date" size="1">
					<option value=""> month </option>
					<option value="31"> 31 </option>
					<option value="30"> 30 </option>
					<option value="29"> 29 </option>
					<option value="28"> 28 </option>
					<option value="27"> 27 </option>
					<option value="26"> 26 </option>
					<option value="25"> 25 </option>
					<option value="24"> 24 </option>
					<option value="23"> 23 </option>
					<option value="22"> 22 </option>
					<option value="21"> 21 </option>
					<option value="20"> 20 </option>
					<option value="19"> 19 </option>
					<option value="18"> 18 </option>
					<option value="17"> 17 </option>
					<option value="16"> 16 </option>
					<option value="15"> 15 </option>
					<option value="14"> 14 </option>
					<option value="13"> 13 </option>
					<option value="12"> 12 </option>
					<option value="11"> 11 </option>
					<option value="10"> 10 </option>
					<option value="9"> 9 </option>
					<option value="8"> 8 </option>
					<option value="7"> 7 </option>
					<option value="6"> 6 </option>
					<option value="5"> 5 </option>
					<option value="4"> 4 </option>
					<option value="3"> 3 </option>
					<option value="2"> 2 </option>
					<option value="1"> 1 </option>
				</select>
				</td>
			</tr>
			<tr> 
				<th> 성별 </th>
				<td> 
				<select name="gender" size="1">
					<option value=""> choose </option>
					<option value="woman"> woman </option>
					<option value="man"> man </option>
				</select>
				</td>
			</tr>
			<tr>
				<th> 이메일 </th>
				<td>
				<input type="text" name="email">@
				<input type="text" name="email_dns">
				</td>
			</tr>
			<tr>
				<td>
				<input type="submit" value="register">
				<input type="reset" value="cancel">
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