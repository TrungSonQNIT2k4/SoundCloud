<?php
include 'admin.php'; // Import file admin.php chứa hàm connectDatabase()

// Kiểm tra xem có ID user được gửi qua URL không
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = trim($_GET['id']);

    if (!is_numeric($id) || $id <= 0) {
        echo "Error: Invalid ID";
        exit;
    }

    $conn = connectDatabase();
    $sql = "SELECT * FROM admin_ac WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "No user found with ID $id";
        exit;
    }

    $conn->close();
} else {
    echo "Error: No valid user ID provided";
    exit;
}

if (isset($_POST['save'])) {
    $admin_name = $_POST['admin_name'];
    $password = $_POST['password'];

    $conn = connectDatabase();
    $sql = "UPDATE admin_ac SET admin_name='$admin_name', password='$password' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Hiển thị thông báo xóa thành công và chuyển hướng về trang admin.php
        echo '<script>';
        echo 'alert("Bạn đã sửa thông tin admin thành công");';
        echo 'window.location.href = "ad.php#admin_ac";'; // Chuyển hướng về trang admin.php
        echo '</script>';
    } else {
        // Hiển thị thông báo nếu có lỗi khi xóa
        echo '<script>';
        echo 'alert("Sửa thông tin admin không thành công");';
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
    <title>Edit User</title>
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
    <h2>Edit User</h2>
    <form method="post" action="">
        <label for="admin_name">admin_name:</label>
        <input type="text" id="admin_name" name="admin_name" value="<?php echo $user['admin_name']; ?>" required>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" value="<?php echo $user['password']; ?>" required>

        <input type="submit" name="save" value="Save">
    </form>
</body>
</html>
