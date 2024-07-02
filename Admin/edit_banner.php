<?php
include 'admin.php'; // Import file admin.php chứa hàm connectDatabase()

// Kiểm tra xem có ID banner được gửi qua URL không
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = trim($_GET['id']);

    if (!is_numeric($id) || $id <= 0) {
        echo "Error: Invalid ID";
        exit;
    }

    $conn = connectDatabase();
    $sql = "SELECT * FROM banners WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $banner = $result->fetch_assoc();
    } else {
        echo "No banner found with ID $id";
        exit;
    }

    $conn->close();
} else {
    echo "Error: No valid banner ID provided";
    exit;
}

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $genre = $_POST['genre'];
    $bannerPath = $_POST['bannerPath'];
    $country = $_POST['country'];

    $conn = connectDatabase();
    $sql = "UPDATE banners SET title='$title', artist='$artist', genre='$genre', bannerPath='$bannerPath', country='$country' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Hiển thị thông báo xóa thành công và chuyển hướng về trang admin.php
        echo '<script>';
        echo 'alert("Bạn đã sửa banner thành công");';
        echo 'window.location.href = "ad.php#banners";'; // Chuyển hướng về trang admin.php
        echo '</script>';
    } else {
        // Hiển thị thông báo nếu có lỗi khi xóa
        echo '<script>';
        echo 'alert("Sửa banner không thành công");';
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
    <title>Edit Banner</title>
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
    <h2>Edit Banner</h2>
    <form method="post" action="">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo isset($banner['title']) ? htmlspecialchars($banner['title']) : ''; ?>" required>

        <label for="artist">Artist:</label>
        <input type="text" id="artist" name="artist" value="<?php echo isset($banner['artist']) ? htmlspecialchars($banner['artist']) : ''; ?>" required>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" value="<?php echo isset($banner['genre']) ? htmlspecialchars($banner['genre']) : ''; ?>" required>

        <label for="bannerPath">Banner Path:</label>
        <input type="text" id="bannerPath" name="bannerPath" value="<?php echo isset($banner['bannerPath']) ? htmlspecialchars($banner['bannerPath']) : ''; ?>">

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?php echo isset($banner['country']) ? htmlspecialchars($banner['country']) : ''; ?>">

        <input type="submit" name="save" value="Save">
    </form>
</body>
</html>
