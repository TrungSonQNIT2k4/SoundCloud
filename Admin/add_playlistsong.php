<?php
include 'admin.php';

$conn = connectDatabase();

$songId = isset($_POST['songId']) ? $_POST['songId'] : '';
$playlistId = isset($_POST['playlistId']) ? $_POST['playlistId'] : '';
$playlistOrder = isset($_POST['playlistOrder']) ? $_POST['playlistOrder'] : '';
$message = ''; // Biến để lưu thông báo

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO playlistsongs (songId, playlistId, playlistOrder) VALUES ('$songId',$playlistId', '$playlistOrder')";

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
    <title>Add Playlistsongs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            height: 400px;
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
                window.location.href = "ad.php#playlistsongs"; // Chuyển hướng người dùng đến trang ad.php
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Add Playlistsongs</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="songId">Song Id:</label>
            <input type="text" id="songId" name="songId" value="<?php echo $songId; ?>" required>

            <label for="playlistId">Playlist Id:</label>
            <input type="text" id="playlistId" name="playlistId" value="<?php echo $playlistId; ?>" required>

            <label for="playlistOrder">Playlist Order:</label>
            <input type="text" id="playlistOrder" name="playlistOrder" value="<?php echo $playlistOrder; ?>" required>

            <input type="submit" value="Add Playlistsongs">
        </form>
    </div>
</body>
</html>
