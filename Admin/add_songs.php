<?php
include 'admin.php';

$conn = connectDatabase();

$title = isset($_POST['title']) ? $_POST['title'] : '';
$artist = isset($_POST['artist']) ? $_POST['artist'] : '';
$album = isset($_POST['album']) ? $_POST['album'] : '';
$genre = isset($_POST['genre']) ? $_POST['genre'] : '';
$duration = isset($_POST['duration']) ? $_POST['duration'] : '';
$path = isset($_POST['path']) ? $_POST['path'] : '';
$albumOrder = isset($_POST['albumOrder']) ? $_POST['albumOrder'] : '';
$plays = isset($_POST['plays']) ? $_POST['plays'] : '';
$banner = isset($_POST['banner']) ? $_POST['banner'] : '';
$message = ''; // Biến để lưu thông báo

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO songs (title, artist, album, genre, duration, path, albumOrder, plays, banner) VALUES ('$title', '$artist', '$album', '$genre', '$duration', '$path', '$albumOrder', '$plays', '$banner')";

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
    <title>Add Song</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            height: 800px;
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
                window.location.href = "ad.php#songs"; // Chuyển hướng người dùng đến trang ad.php
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Add Song</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $title; ?>" required>

            <label for="artist">Artist:</label>
            <input type="text" id="artist" name="artist" value="<?php echo $artist; ?>" required>

            <label for="album">Album:</label>
            <input type="text" id="album" name="album" value="<?php echo $album; ?>" required>

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" value="<?php echo $genre; ?>" required>

            <label for="duration">Duration:</label>
            <input type="text" id="duration" name="duration" value="<?php echo $duration; ?>" required>

            <label for="path">Path:</label>
            <input type="file" id="path" name="path" value="<?php echo $path; ?>" required>

            <label for="albumOrder">Album Order:</label>
            <input type="text" id="albumOrder" name="albumOrder" value="<?php echo $albumOrder; ?>" required>

            <label for="plays">Plays:</label>
            <input type="text" id="plays" name="plays" value="<?php echo $plays; ?>" required>

            <label for="banner">Banner:</label>
            <input type="text" id="banner" name="banner" value="<?php echo $banner; ?>">

            <input type="submit" value="Add Song">
        </form>
    </div>
</body>
</html>
