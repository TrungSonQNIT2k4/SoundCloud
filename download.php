<?php
// file config để kết nối cơ sở dữ liệu
include("config.php");

$songId = intval($_GET['id']);

$sql = "SELECT path, title FROM songs WHERE id = $songId";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $filePath = $row['path'];
    $fileName = $row['title'] . ".mp3";

    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "Song not found.";
}

mysqli_close($con);
?>
