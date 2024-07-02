<?php
include 'admin.php';

$conn = connectDatabase();

$username = isset($_POST['username']) ? $_POST['username'] : '';
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$signUpDate = isset($_POST['signUpDate']) ? $_POST['signUpDate'] : '';
$profilePic = isset($_POST['profilePic']) ? $_POST['profilePic'] : '';
$message = ''; // Biến để lưu thông báo

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO users (username, firstName, lastName, email, password, signUpDate, profilePic) VALUES ('$username', '$firstName', '$lastName', '$email', '$password', '$signUpDate', '$profilePic')";

    if ($conn->query($sql) === TRUE) {
        $message = "Bạn đã thêm dữ liệu thành công";
    } else {
        $message = "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            height: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        window.onload = function() {
            var message = "<?php echo $message; ?>"; // Lấy giá trị của biến message từ PHP
            if (message) {
                alert(message); // Hiển thị message box
                window.location.href = "ad.php#users"; // Chuyển hướng người dùng đến trang ad.php
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Add User</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>

            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>" required>

            <label for="password">Password:</label>
            <input type="text" id="password" name="password" value="<?php echo $password; ?>" required>

            <label for="signUpDate">Sign UpDate:</label>
            <input type="text" id="signUpDate" name="signUpDate" value="<?php echo $signUpDate; ?>" required>

            <label for="profilePic">Profile Pic:</label>
            <input type="text" id="profilePic" name="profilePic" value="<?php echo $profilePic; ?>" required>

            <input type="submit" value="Add User">
        </form>
    </div>
</body>
</html>
