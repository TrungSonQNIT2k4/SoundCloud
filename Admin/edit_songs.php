<?php
include 'admin.php'; // Import file admin.php chứa hàm connectDatabase()

// Kiểm tra xem có ID song được gửi qua URL không
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = trim($_GET['id']);

    if(!is_numeric($id) || $id <= 0) {
        echo "Error: Invalid ID";
        exit;
    }

    $conn = connectDatabase();
    $sql = "SELECT * FROM songs WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $song = $result->fetch_assoc();
    } else {
        echo "No song found with ID $id";
        exit;
    }

    $conn->close();
} else {
    echo "Error: No valid song ID provided";
    exit;
}

if(isset($_POST['save'])) {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $album = $_POST['album'];
    $genre = $_POST['genre'];
    $duration = $_POST['duration'];
    $path = $_POST['path'];
    $albumOrder = $_POST['albumOrder'];
    $plays = $_POST['plays'];
    $banner = $_POST['banner'];

    $conn = connectDatabase();
    $sql = "UPDATE songs SET title='$title', artist='$artist', album='$album', genre='$genre', duration='$duration', path='$path', albumOrder='$albumOrder', plays='$plays', banner='$banner' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Hiển thị thông báo xóa thành công và chuyển hướng về trang admin.php
        echo '<script>';
        echo 'alert("Bạn đã sửa bài hát thành công");';
        echo 'window.location.href = "ad.php#songs";'; // Chuyển hướng về trang admin.php
        echo '</script>';
    } else {
        // Hiển thị thông báo nếu có lỗi khi xóa
        echo '<script>';
        echo 'alert("Sửa bài hát không thành công");';
        echo '</script>';
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Song</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        h2 {
            text-align: center;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Edit Song</h2>
    <form method="post" action="">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $song['title']; ?>" required>

        <label for="artist">Artist:</label>
        <input type="text" id="artist" name="artist" value="<?php echo $song['artist']; ?>" required>

        <label for="album">Album:</label>
        <input type="text" id="album" name="album" value="<?php echo $song['album']; ?>" required>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" value="<?php echo $song['genre']; ?>" required>

        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" value="<?php echo $song['duration']; ?>" required>

        <label for="path">Path:</label>
        <input type="text" id="path" name="path" value="<?php echo $song['path']; ?>" required>

        <label for="albumOrder">Album Order:</label>
        <input type="text" id="albumOrder" name="albumOrder" value="<?php echo $song['albumOrder']; ?>" required>

        <label for="plays">Plays:</label>
        <input type="text" id="plays" name="plays" value="<?php echo $song['plays']; ?>" required>

        <label for="banner">Banner:</label>
        <input type="text" id="banner" name="banner" value="<?php echo $song['banner']; ?>" required>

        <input type="submit" name="save" value="Save">
    </form>
</body>
</html>
