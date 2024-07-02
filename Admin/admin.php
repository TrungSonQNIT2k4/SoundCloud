<?php
function connectDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbsoundspace";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
function displayAlbums() {
    $conn = connectDatabase();
    $sql = "SELECT * FROM albums";
    $result = $conn->query($sql);
    echo"<a href='../Admin/add_album.php' style='text-decoration: none; color: black;'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='15' height='15'><path d='M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z'/ ></svg>Thêm Album</a>";


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['artist'] . "</td>";
            echo "<td>" . $row['genre'] . "</td>";
            echo "<td>" . $row['artworkPath'] . "</td>";
            echo "<td>" . $row['Country'] . "</td>";
            echo "<td style='text-align: center'><a href='../Admin/edit_album.php?id=" . $row['id'] . "'>Sửa</a> <a href='../Admin/delete_album.php?id=" . $row['id'] . "'>Xoá</a></td>";
            echo "</tr>";
            
        }
    } else {
        echo "<tr><td colspan='6'>No data available</td></tr>";
    }

    $conn->close();

    
// Kiểm tra xem có thông báo xóa thành công được gửi từ trang delete_album.php không
if (isset($_GET['delete_success']) && $_GET['delete_success'] == 'true') {
    echo '<script>alert("Bạn đã xóa dữ liệu thành công.");</script>';
}
}


function displayArtists() {
    $conn = connectDatabase();
    $sql = "SELECT * FROM artists";
    $result = $conn->query($sql);
    echo "<a href='add_artist.php' style='text-decoration: none; color: black;'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='15' height='15'><path d='M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z'/ ></svg>Thêm Artist</a>";

    // Hiển thị dữ liệu
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td style='text-align: center'><a href='edit_artist.php?id=" . $row['id'] . "'>Sửa</a> <a href='delete_artist.php?id=" . $row['id'] . "'>Xoá</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No data available</td></tr>";
    }

    // Đóng kết nối
    $conn->close();
    // Kiểm tra xem có thông báo xóa thành công được gửi từ trang artists.php không
if (isset($_GET['delete_success']) && $_GET['delete_success'] == 'true') {
    echo '<script>alert("Bạn đã xóa dữ liệu thành công.");</script>';
}
}

function displayBanners() {
    $conn = connectDatabase();
    $sql = "SELECT * FROM banners";
    $result = $conn->query($sql);
    echo "<a href='add_banner.php' style='text-decoration: none; color: black;'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='15' height='15'><path d='M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z'/ ></svg>Thêm hình banner</a>";

    // Hiển thị dữ liệu
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['artist'] . "</td>";
            echo "<td>" . $row['genre'] . "</td>";
            echo "<td>" . $row['bannerPath'] . "</td>";
            echo "<td>" . $row['Country'] . "</td>";
            echo "<td style='text-align: center'><a href='edit_banner.php?id=" . $row['id'] . "'>Sửa</a> <a href='delete_banner.php?id=" . $row['id'] . "'>Xoá</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No data available</td></tr>";
    }

    // Đóng kết nối
    $conn->close();
    // Kiểm tra xem có thông báo xóa thành công được gửi từ trang banners_album.php không
if (isset($_GET['delete_success']) && $_GET['delete_success'] == 'true') {
    echo '<script>alert("Bạn đã xóa dữ liệu thành công.");</script>';
}
}

function displayGenres() {
    $conn = connectDatabase();
    $sql = "SELECT * FROM genres";
    $result = $conn->query($sql);
    echo "<a href='add_genre.php' style='text-decoration: none; color: black;'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='15' height='15'><path d='M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z'/ ></svg>Thêm thể loại</a>";

    // Hiển thị dữ liệu
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td style='text-align: center'><a href='edit_genre.php?id=" . $row['id'] . "'>Sửa</a> <a href='delete_genre.php?id=" . $row['id'] . "'>Xoá</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No data available</td></tr>";
    }

    // Đóng kết nối
    $conn->close();
    // Kiểm tra xem có thông báo xóa thành công được gửi từ trang genres_album.php không
if (isset($_GET['delete_success']) && $_GET['delete_success'] == 'true') {
    echo '<script>alert("Bạn đã xóa dữ liệu thành công.");</script>';
}
}

function displayPlaylists() {
    $conn = connectDatabase();
    $sql = "SELECT * FROM playlists";
    $result = $conn->query($sql);
    echo"<a href='../Admin/add_playlist.php' style='text-decoration: none; color: black;'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='15' height='15'><path d='M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z'/ ></svg>Thêm Playlist</a>";

    // Hiển thị dữ liệu
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['owner'] . "</td>";
            echo "<td>" . $row['dateCreated'] . "</td>";
            echo "<td style='text-align: center'><a href='edit_playlist.php?id=" . $row['id'] . "'>Sửa</a> <a href='delete_playlist.php?id=" . $row['id'] . "'>Xoá</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No data available</td></tr>";
    }

    // Đóng kết nối
    $conn->close();
    // Kiểm tra xem có thông báo xóa thành công được gửi từ trang delete_playlist.php không
if (isset($_GET['delete_success']) && $_GET['delete_success'] == 'true') {
    echo '<script>alert("Bạn đã xóa dữ liệu thành công.");</script>';
}
}

function displayPlaylistSongs() {
    $conn = connectDatabase();
    $sql = "SELECT * FROM playlistsongs";
    $result = $conn->query($sql);
    echo"<a href='../Admin/add_playlistsong.php' style='text-decoration: none; color: black;'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='15' height='15'><path d='M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z'/ ></svg>Thêm Song vào Playlist</a>";

    // Hiển thị dữ liệu
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['songId'] . "</td>";
            echo "<td>" . $row['playlistId'] . "</td>";
            echo "<td>" . $row['playlistOrder'] . "</td>";
            echo "<td style='text-align: center'><a href='edit_playlistsong.php?id=" . $row['id'] . "'>Sửa</a> <a href='delete_playlistsong.php?id=" . $row['id'] . "'>Xoá</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No data available</td></tr>";
    }

    // Đóng kết nối
    $conn->close();
    // Kiểm tra xem có thông báo xóa thành công được gửi từ trang delete_playlistsong.php không
if (isset($_GET['delete_success']) && $_GET['delete_success'] == 'true') {
    echo '<script>alert("Bạn đã xóa dữ liệu thành công.");</script>';
}
}

function displaySongs() {
    $conn = connectDatabase();
    $sql = "SELECT * FROM songs";
    $result = $conn->query($sql);
    echo"<a href='../Admin/add_songs.php' style='text-decoration: none; color: black;'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='15' height='15'><path d='M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z'/ ></svg>Thêm Bài hát</a>";

    // Hiển thị dữ liệu
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['artist'] . "</td>";
            echo "<td>" . $row['album'] . "</td>";
            echo "<td>" . $row['genre'] . "</td>";
            echo "<td>" . $row['duration'] . "</td>";
            echo "<td>" . $row['path'] . "</td>";
            echo "<td>" . $row['albumOrder'] . "</td>";
            echo "<td>" . $row['plays'] . "</td>";
            echo "<td>" . $row['banner'] . "</td>";
            echo "<td style='text-align: center'><a href='edit_songs.php?id=" . $row['id'] . "'>Sửa</a> <a href='delete_song.php?id=" . $row['id'] . "'>Xoá</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>No data available</td></tr>";
    }

    // Đóng kết nối
    $conn->close();
    // Kiểm tra xem có thông báo xóa thành công được gửi từ trang delete_song.php không
if (isset($_GET['delete_success']) && $_GET['delete_success'] == 'true') {
    echo '<script>alert("Bạn đã xóa dữ liệu thành công.");</script>';
}
}

function displayUsers() {
    $conn = connectDatabase();
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    echo"<a href='../Admin/add_users.php' style='text-decoration: none; color: black;'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='15' height='15'><path d='M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z'/ ></svg>Thêm người dùng</a>";

    // Hiển thị dữ liệu
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['signUpDate'] . "</td>";
            echo "<td>" . $row['profilePic'] . "</td>";
            echo "<td style='text-align: center'><a href='edit_users.php?id=" . $row['id'] . "'>Sửa</a> <a href='delete_users.php?id=" . $row['id'] . "'>Xóa</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No data available</td></tr>";
    }

    // Đóng kết nối
    $conn->close();
    
// Kiểm tra xem có thông báo xóa thành công được gửi từ trang delete_Users.php không
if (isset($_GET['delete_success']) && $_GET['delete_success'] == 'true') {
    echo '<script>alert("Bạn đã xóa dữ liệu thành công.");</script>';
}
}
function displayAdmin_ac() {
$conn = connectDatabase();
$sql = "SELECT * FROM admin_ac";
$result = $conn->query($sql);
echo"<a href='../Admin/add_admin.php' style='text-decoration: none; color: black;'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='15' height='15'><path d='M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z'/ ></svg>Thêm Admin</a>";

// Hiển thị dữ liệu
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['admin_name'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td style='text-align: center'><a href='edit_admin.php?id=" . $row['id'] . "'>Sửa</a> <a href='delete_admin.php?id=" . $row['id'] . "'>Xoá</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>No data available</td></tr>";
}

// Đóng kết nối
$conn->close();
// Kiểm tra xem có thông báo xóa thành công được gửi từ trang delete_song.php không
if (isset($_GET['delete_success']) && $_GET['delete_success'] == 'true') {
echo '<script>alert("Bạn đã xóa dữ liệu thành công.");</script>';
}
}


?>
