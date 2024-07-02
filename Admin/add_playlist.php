<?php
include 'admin.php';

$conn = connectDatabase();

$name = isset($_POST['name']) ? $_POST['name'] : '';
$owner = isset($_POST['owner']) ? $_POST['owner'] : '';
$dateCreated = isset($_POST['dateCreated']) ? $_POST['dateCreated'] : '';
$message = ''; // Biến để lưu thông báo

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO playlists (name, owner, dateCreated) VALUES ('$name', '$owner', '$dateCreated')";

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
    <title>Add Playlists</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            height: 350px;
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
                window.location.href = "ad.php#playlists"; // Chuyển hướng người dùng đến trang ad.php
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Add Playlists</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>

            <label for="owner">Owner:</label>
            <input type="text" id="owner" name="owner" value="<?php echo $owner; ?>" required>

            <label for="genre">Date Created:</label>
            <input type="text" id="dateCreated" name="dateCreated" value="<?php echo $dateCreated; ?>">

            <input type="submit" value="Add Playlists">
        </form>
    </div>
</body>
</html>
