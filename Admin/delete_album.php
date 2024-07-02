<?php
include 'admin.php';
$conn = connectDatabase();
// Kiểm tra xem ID đã được gửi đến và có giá trị hợp lệ hay không
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Lấy ID từ dữ liệu gửi đến và loại bỏ khoảng trắng
    $id = trim($_GET['id']);

    // Kiểm tra xem ID có phải là một số nguyên dương không
    if(!is_numeric($id) || $id <= 0) {
        echo "Lỗi: ID không hợp lệ";
        exit; // Dừng việc thực thi mã PHP tiếp theo
    }

    // Thực hiện truy vấn xoá với prepared statement để tránh SQL injection
    $stmt = $conn->prepare("DELETE FROM albums WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Thực thi truy vấn
    if ($stmt->execute()) {
        // Hiển thị thông báo xóa thành công và chuyển hướng về trang admin.php
        echo '<script>';
        echo 'alert("Bạn đã xóa album thành công");';
        echo 'window.location.href = "ad.php#albums";'; // Chuyển hướng về trang admin.php
        echo '</script>';
    } else {
        // Hiển thị thông báo nếu có lỗi khi xóa
        echo '<script>';
        echo 'alert("Xóa album không thành công");';
        echo '</script>';
    }

    // Đóng prepared statement và kết nối
    $stmt->close();
    $conn->close();
} else {
    // Nếu không có hoặc ID không hợp lệ được gửi đến, hiển thị thông báo lỗi
    echo "Lỗi: Không có ID hợp lệ được cung cấp";
}
?>
