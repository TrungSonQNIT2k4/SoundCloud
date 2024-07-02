<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng ký</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="icon" type="image/png" href="icon-logo.png" />
</head>
<body>
<?php
session_start();
ob_start();
include "connect.php"; // Ensure the path is correct

// Xử lý đăng ký khi người dùng gửi form
if ((isset($_POST['dangky'])) && ($_POST['dangky'])) {
    // Lấy dữ liệu từ form đăng ký
    $admin_account=$_POST['admin_name'];
    $pass=md5($_POST['password']);

    // Kiểm tra xem tên đăng nhập đã tồn tại chưa
    $sql_check = "SELECT * FROM admin_ac WHERE admin_name = '$admin_account'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Thông báo lỗi nếu tên đăng nhập đã tồn tại
        echo "<script>alert('Tên đăng nhập đã tồn tại'); window.location.href='Sign_in.php';</script>";
        exit;
    } else {
        // Thêm tài khoản mới vào cơ sở dữ liệu
        $sql_insert = "INSERT INTO admin_ac (admin_name, password) VALUES ('$admin_account', '$pass')";
        if ($conn->query($sql_insert) === TRUE) {
            // Chuyển hướng đến trang đăng nhập sau khi đăng ký thành công
            echo "<script>alert('Đăng ký thành công'); window.location.href='log_in.php';</script>";
            exit;
        } else {
            // Thông báo lỗi nếu không thể thêm tài khoản vào cơ sở dữ liệu
            echo "<script>alert('Đăng ký không thành công'); window.location.href='Sign_in.php';</script>";
            exit;
        }
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
}
?>
<style>
    .container {
  max-width: 20%;
  background: #f8f9fd;
  background: linear-gradient(to bottom, #05999E, #CBE7E3);
  border-radius: 40px;
  padding: 25px 35px;
  border: 5px solid rgb(255, 255, 255);
  box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 30px 30px -20px;
  margin-left: auto;
  margin-right: auto;
}

.heading {
  text-align: center;
  font-weight: 600;
  font-size: 30px;
  color: black;
}

.form {
  margin-top: 20px;
}

.form .input {
  width: 100%;
  background: white;
  border: none;
  padding: 15px 20px;
  border-radius: 20px;
  margin-top: 15px;
  box-shadow: #cff0ff 0px 10px 10px -5px;
  border-inline: 2px solid transparent;
}

.form .input::-moz-placeholder {
  color: black;
}

.form .input::placeholder {
  color: black;
}

.form .input:focus {
  outline: none;
  border-inline: 2px solid #12b1d1;
}

.form .forgot-password {
  display: block;
  margin-top: 10px;
  margin-left: 10px;
}

.form .forgot-password a {
  font-size: 11px;
  color: black;
  text-decoration: none;
}

.form .login-button {
  display: block;
  width: 100%;
  font-weight: bold;
  background: #05999E;
  color: white;
  padding-block: 15px;
  margin: 20px auto;
  border-radius: 20px;
  box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
  border: none;
  transition: all 0.2s ease-in-out;
}

.form .login-button:hover {
  transform: scale(1.03);
  box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 23px 10px -20px;
}

.form .login-button:active {
  transform: scale(0.95);
  box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 15px 10px -10px;
}

.social-account-container {
  margin-top: 25px;
}

.social-account-container .title {
  display: block;
  text-align: center;
  font-size: 15px;
  color: black;
}

.social-account-container .social-accounts {
  width: 100%;
  display: flex;
  justify-content: center;
  gap: 15px;
  margin-top: 5px;
}

.social-account-container .social-accounts .social-button {
  background: linear-gradient(45deg, rgb(0, 0, 0) 0%, rgb(112, 112, 112) 100%);
  border: 5px solid white;
  padding: 5px;
  border-radius: 50%;
  width: 40px;
  aspect-ratio: 1;
  display: grid;
  place-content: center;
  box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 12px 10px -8px;
  transition: all 0.2s ease-in-out;
}

.social-account-container .social-accounts .social-button .svg {
  fill: white;
  margin: auto;
}

.social-account-container .social-accounts .social-button:hover {
  transform: scale(1.2);
}

.social-account-container .social-accounts .social-button:active {
  transform: scale(0.9);
}

.agreement {
  display: block;
  text-align: center;
  margin-top: 15px;
}

.agreement a {
  text-decoration: none;
  color: black;
  font-size: 15px;
}
a{
    text-decoration: none;
    color: white;
}
</style>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form">
    <div class="container">
        <div class="heading">Đăng ký</div>
        <input
            placeholder="Tên đăng nhập"
            id="admin_name"
            name="admin_name"
            type="text"
            class="input"
            required=""
        />
        <input
            placeholder="Password"
            id="password"
            name="password"
            type="password"
            class="input"
            required=""
        />
        <input value="Đăng ký" type="submit" class="login-button" name="dangky"/>
        <p>Bạn đã có tài khoản hãy bấm tại đây </p><a href="/SoundSpace/Admin/log_in.php">Đăng nhập</a>
    </div>
</form>
</body>
</html>
