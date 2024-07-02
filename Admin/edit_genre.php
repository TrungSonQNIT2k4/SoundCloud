<?php
include 'admin.php'; // Import file admin.php chứa hàm connectDatabase()

// Kiểm tra xem có ID genre được gửi qua URL không
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = trim($_GET['id']);

    if (!is_numeric($id) || $id <= 0) {
        echo "Error: Invalid ID";
        exit;
    }

    $conn = connectDatabase();
    $sql = "SELECT * FROM genres WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $genre = $result->fetch_assoc();
    } else {
        echo "No genre found with ID $id";
        exit;
    }

    $conn->close();
} else {
    echo "Error: No valid genre ID provided";
    exit;
}

if (isset($_POST['save'])) {
    $name = $_POST['name'];

    $conn = connectDatabase();
    $sql = "UPDATE genres SET name='$name' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Hiển thị thông báo xóa thành công và chuyển hướng về trang admin.php
        echo '<script>';
        echo 'alert("Bạn đã sửa thể loại thành công");';
        echo 'window.location.href = "ad.php#genres";'; // Chuyển hướng về trang admin.php
        echo '</script>';
    } else {
        // Hiển thị thông báo nếu có lỗi khi xóa
        echo '<script>';
        echo 'alert("Sửa thể loại không thành công");';
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
    <title>Edit Genre</title>
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
    <h2>Edit Genre</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($genre['name']) ? htmlspecialchars($genre['name']) : ''; ?>" required>

        <input type="submit" name="save" value="Save">
    </form>
</body>
</html>
