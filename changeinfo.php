<?php

session_start();
include "config.php";

if (!empty($_POST['user_pw'])){

	$id = $_SESSION['user_id'];
	echo "sdfsf".$id;
	$pw = $_POST['user_pw'];
	$genre = $_POST['genre'];
	$birth = $_POST['birth_year'] * 10000 + $_POST['birth_month'] * 100 + $_POST['birth_date'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];

	$query_id = "SELECT user_id FROM user_login WHERE user_id='$id'";

	$result = $conn->query($query_id);

	if( $result ){

		$row = $result->fetch_array(MYSQLI_ASSOC);

		if ( empty($row['user_id']) ){

			?>
			<script>alert("no such user id")</script>
			<?php
			
		}else{

			$query_genre = "SELECT genre_idx FROM movie_genre WHERE genre='$genre'";
			$result = $conn->query($query_genre);
			$row = $result->fetch_array(MYSQLI_ASSOC);

			$genre_idx = $row['genre_idx'];

			if ( $genre_idx ){

				try{

					$conn->autocommit(FALSE);
					$info_ins = "UPDATE `user_info` SET genre_idx='$genre_idx', birth='$birth', gender='$gender', email='$email' WHERE user_id='$id'";
					
					$result = $conn->query($info_ins);
					if ( !$result ) {
						$result->free();
						throw new Exception($conn->error);
					}

					$login_ins = "UPDATE `user_login` SET user_pw='$pw' WHERE user_id='$id'";
					$result = $conn->query($login_ins);
					if ( !$result ) {
						$result->free();
						throw new Exception($conn->error);
					}

					$conn->commit();
					$conn->autocommit(TRUE);

					?>
					<script>alert("modify success")</script>

					<?php		
					header("Location: mypage.php");



				}catch ( Exception $e ) {

					$conn->rollback(); 
					$conn->autocommit(TRUE);  
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
		<title> changeInfo </title>
		<link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
		<link href="form-validation.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800&amp;subset=korean" rel="stylesheet">
		<style>
			#divPosition{
				font-family: "Nanum Gothic", sans-serif;
				border:1px solid #F2F2F2;
				position: absolute;
				height: 670px;
				width: 400px;
				margin: -150px 0px 0px -200px;
				left: 50%;
				top: 25%;
				padding: 5px;
				background-color: #F2F2F2;
			}
			body{
				font-family: "Nanum Gothic", sans-serif;
				background-color: #F2F2F2;
			}
		</style>
	</head>
	<body>
		<div class="row" id="divPosition" style="padding-left:20px; padding-right:20px">
			<div>
				<img class="mb-4" style="margin-left: auto; margin-right: auto; display: block;" src="./images/ewha.svg" alt="" width="72" height="72">
				<h4 class="mb-3" style="text-align:center"><b>회원 정보 수정</b></h4>
			</br>
			<form name="register_user" method="post" action="changeinfo.php">
				<div>
					<label>패스워드</label>
					<input type="password" class="form-control" name="user_pw">
				</div>
			</br>

			<div class="mb-3">
				<div>
					<label style="padding-right:10px;">좋아하는 장르</label>
					<select class="custom-select d-block w-100" name="genre" size="1">
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
				</br>
			</div>
			<div style="padding-top:20px;">
				<label style="padding-right:10px;">생년월일</label>
				<select class="custom-select d-block w-40" name="birth_year" size="1">
					<option value=""> year </option>
					<option value="01"> 2001 </option>
					<option value="00"> 2000 </option>
					<option value="99"> 1999 </option>
					<option value="98"> 1998 </option>
					<option value="97"> 1997 </option>
					<option value="96"> 1996 </option>
					<option value="95"> 1995 </option>
					<option value="94"> 1994 </option>
					<option value="93"> 1993 </option>
					<option value="92"> 1992 </option>
					<option value="91"> 1991 </option>
					<option value="90"> 1990 </option>
					<option value="89"> 1989 </option>
					<option value="88"> 1988 </option>
					<option value="87"> 1987 </option>
				</select>
				<select class="custom-select d-block w-40" name="birth_month" size="1">
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
				<select class="custom-select d-block w-40" name="birth_date" size="1">
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
			</br>
		</div>
		<div style="padding-top:20px;">
			<label style="padding-right:10px;">성별</label>
			<select class="custom-select d-block w-100" name="gender" size="1">
				<option value=""> choose </option>
				<option value="f"> 여성 </option>
				<option value="m"> 남성 </option>
			</select>
		</br>
	</div>
</div>
<div class="mb-3" style="padding-top:20px;">
	<label>이메일 </label>
	<input type="text" class="form-control" name="email">
</div>
</br>
<button class="btn btn-success btn-lg btn-block" type="submit" value="modify">회원정보수정</button>
<button class="btn btn-success btn-lg btn-block" type="reset" value="cancel">다시 작성하기</button>
<a class="btn btn-success btn-lg btn-block" href="mypage.php">마이페이지로 돌아가기</a>
</form>
</div>
</div>
</body>
</html>


<?php

}

?>