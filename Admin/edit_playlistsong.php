<?php
include 'admin.php'; // Import file admin.php chứa hàm connectDatabase()

// Kiểm tra xem có ID playlistsong được gửi qua URL không
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = trim($_GET['id']);

    if(!is_numeric($id) || $id <= 0) {
        echo "Lỗi: ID không hợp lệ";
        exit;
    }

    $conn = connectDatabase();
    $sql = "SELECT * FROM playlistsongs WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $playlistsong = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy playlistsong có ID là $id";
        exit;
    }

    $conn->close();
} else {
    echo "Lỗi: Không có ID playlistsong hợp lệ được cung cấp";
    exit;
}

if(isset($_POST['save'])) {
    $songId = $_POST['songId'];
    $playlistId = $_POST['playlistId'];
    $playlistOrder = $_POST['playlistOrder'];

    $conn = connectDatabase();
    $sql = "UPDATE playlistsongs SET songId='$songId', playlistId='$playlistId', playlistOrder='$playlistOrder' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Hiển thị thông báo xóa thành công và chuyển hướng về trang admin.php
        echo '<script>';
        echo 'alert("Bạn đã sửa playlistsong thành công");';
        echo 'window.location.href = "ad.php#playlistsongs";'; // Chuyển hướng về trang admin.php
        echo '</script>';
    } else {
        // Hiển thị thông báo nếu có lỗi khi xóa
        echo '<script>';
        echo 'alert("Sửa playlistsong không thành công");';
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
    <title>Sửa Playlist Song</title>
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
    <h2>Sửa Playlist Song</h2>
    <form method="post" action="">
        <label for="songId">SongID:</label>
        <input type="text" id="songId" name="songId" value="<?php echo $playlistsong['songId']; ?>" required>

        <label for="playlistId">PlaylistID:</label>
        <input type="text" id="playlistId" name="playlistId" value="<?php echo $playlistsong['playlistId']; ?>" required>

        <label for="playlistOrder"> PlaylistOrder:</label>
        <input type="text" id="playlistOrder" name="playlistOrder" value="<?php echo $playlistsong['playlistOrder']; ?>" required>

        <input type="submit" name="save" value="Save">
    </form>
</body>
</html>
