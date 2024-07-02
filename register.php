<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<title>Chào mừng bạn đến với SoundSpace</title>

	<link rel="stylesheet" type="text/css" href="assets/css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
	<link rel="icon" type="image/png" href="/SoundSpace/assets/images/icons/icon-logo.png" />
</head>
<body>
	<?php

	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}

	?>
	

	<div id="background">

		<div id="loginContainer">

			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>ĐĂNG NHẬP</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Tên đăng nhập</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="Số điện thoại, tên, email" value="<?php getInputValue('loginUsername') ?>" required>
					</p>
					<p>
						<label for="loginPassword">Mật khẩu</label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="Nhập mật khẩu" required>
					</p>

					<button type="submit" name="loginButton">Đăng nhập</button>

					<div class="hasAccountText">
						<span id="hideLogin">Bạn chưa có tài khoản? Đăng ký ngay tại đây.</span>
					</div>
					
				</form>



				<form id="registerForm" action="register.php" method="POST">
					<h2>Tạo tài khoản miễn phí</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<label for="username">Tên đăng nhập</label>
						<input id="username" name="username" type="text" placeholder="SĐT, Email hoặc tên người dùng" value="<?php getInputValue('username') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="firstName">Tên</label>
						<input id="firstName" name="firstName" type="text" placeholder="Mời bạn nhập tên" value="<?php getInputValue('firstName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="lastName">Họ</label>
						<input id="lastName" name="lastName" type="text" placeholder="Mời bạn nhập họ" value="<?php getInputValue('lastName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="Hãy nhập vào email của bạn" value="<?php getInputValue('email') ?>" required>
					</p>

					<p>
						<label for="email2">Xác nhận email</label>
						<input id="email2" name="email2" type="email" placeholder="Vui lòng nhập lại email của bạn" value="<?php getInputValue('email2') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="password">Mật khẩu</label>
						<input id="password" name="password" type="password" placeholder="Đặt mật khẩu" required>
					</p>

					<p>
						<label for="password2">Xác nhận mật khẩu</label>
						<input id="password2" name="password2" type="password" placeholder="Vui lòng nhập lại mật khẩu lần nữa" required>
					</p>

					<button type="submit" name="registerButton">Đăng ký</button>

					<div class="hasAccountText">
						<span id="hideRegister">Bạn đã có tài khoản? Đăng nhập ngay tại đây.</span>
					</div>
					
				</form>


			</div>

			<div id="loginText">
				<h1>Bạn muốn tận hưởng Âm nhạc hãy đến với SoundSpace</h1>
				<h2>Dễ dàng truy cập vào thế giới âm nhạc của bạn với trang web nghe nhạc trực tuyến của chúng tôi!</h2>
				<ul>
					<li>Sử dụng miễn phí - Tiết kiệm và thưởng thức</li>
					<li>Playlist cá nhân - Tạo ra danh sách phát của riêng bạn</li>
					<li>Nghe nhạc không giới hạn - Hãy trải nghiệm ngay</li>
				</ul>
			</div>

		</div>
	</div>

</body>
</html>