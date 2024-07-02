<?php
include ("includes/includedFiles.php");
?>


<!DOCTYPE html>
<html>
<head>
    <style>
        .pageHeadingBig {
            text-align: center;
        }

        .gridViewContainer {
            position: relative;
            width: 100%;
            height: 300px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
			mask-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,1) 20%, rgba(0,0,0,1) 80%, rgba(0,0,0,0));
        }

        .Banner {
            position: absolute;
            width: 450px;
            height: 250px;
            opacity: 0;
            transition: opacity 1s ease-in-out;
			margin: 0 5px; /* Điều chỉnh khoảng cách giữa các banner */
    box-sizing: border-box;
        }

        .Banner.show {
            opacity: 1;
        }

        .center {
            width: 50%; /* Kích thước banner lớn ở trung tâm */
            z-index: 2;
        }

        .left, .right {
            width: 30%; /* Kích thước của hai banner ở hai bên */
            z-index: 1;
        }

        .left {
            left: -20%; /* Vị trí bên trái */
        }

        .right {
            right: -20%; /* Vị trí bên phải */		
        }

        @keyframes slide {
            0% { opacity: 0; transform: translateX(100%); }
            10% { opacity: 1; transform: translateX(0); }
            90% { opacity: 1; transform: translateX(0); }
            100% { opacity: 0; transform: translateX(-100%); }
        }

        .Banner.show {
            animation: slide 6s infinite;
        }

        .Banner img {
            width: 450px;
            height: 250px;
            object-fit: cover; /* Đảm bảo hình ảnh vừa với kích thước của banner */
            border-radius: 20px; /* Độ cong viền */
        }
    </style>
</head>
<body>
    <h1 class="pageHeadingBig">Chào mừng đã đến với thế giới âm nhạc SoundSpace</h1>
    <div class="gridViewContainer">
        <?php
        $bannerQuery = mysqli_query($con, "SELECT * FROM banners ORDER BY RAND()");

        $firstBanner = true;
        while ($row = mysqli_fetch_array($bannerQuery)) {
            $class = 'Banner';
            if ($firstBanner) {
                $class .= ' center show';
                $firstBanner = false;
            } else {
                $class .= ' left'; // Bạn có thể chọn 'right' cho banner bên phải nếu cần
            }

            echo "<div class='$class'>
                    <span role='link' tabindex='0' onclick='openPage(\"banner.php?id=" . $row['id'] . "\")'>
                        <img src='" . $row['bannerPath'] . "'>
                    </span>
                </div>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            var banners = $('.Banner');
            var currentIndex = 0;
            var totalBanners = banners.length;

            function showBanner(index) {
                banners.removeClass('center left right show');
                banners.eq(index).addClass('center show');
                banners.eq((index + 1) % totalBanners).addClass('right show');
                banners.eq((index + 2) % totalBanners).addClass('left show');
            }

            function nextBanner() {
                currentIndex = (currentIndex + 1) % totalBanners;
                showBanner(currentIndex);
            }

            showBanner(currentIndex); // Hiển thị banner đầu tiên
            setInterval(nextBanner, 6000); // Chuyển banner mỗi 6 giây
        });
    </script>
</body>
</html>


<h2 class="pageHeadingBig">Những bài hát On Top</h2>
<div class="SongDisContainer">
	<div class="song-titles">
		<style>
			.SongDisContainer {
				display: flex;
				justify-content: center;
				align-items: center;
				padding: 0;
			}

			.songViewInfo {
				display: flex;
				flex-direction: row;
				align-items: flex-start;
				padding-left: 100px;
				transition: all 0.6s;
			}

			.songViewInfo:hover {
				transform: scale(1.1);
			}

			.songViewInfo img {
				height: 40px;
				width: 40px;
				border-radius: 5px;
				margin-right: 10px;
			}

			.song-info {
				display: flex;
				flex-direction: column;
				justify-content: flex-start;
				margin: 0;
				padding: 0;
			}

			.song-info p {
				margin: 0;
				text-align: left
			}

			.column {
				flex: 1 1 30%; /* Đảm bảo mỗi cột chiếm khoảng 30% không gian, để có khoảng cách giữa các cột */
				box-sizing: border-box;
				padding: 10px; /* Khoảng cách giữa các cột */
			}
		</style>
		<?php
		$albumQuery = mysqli_query($con, "SELECT songs.id, songs.title, artists.name as artist, albums.artworkPath as album_cover FROM songs 
        INNER JOIN artists ON songs.artist=artists.id 
        INNER JOIN albums ON songs.album=albums.id 
        ORDER BY plays DESC LIMIT 9");

		$count = 0;
		while ($song = mysqli_fetch_assoc($albumQuery)):
			?>
			<div class="column">
				<span role="link" tabindex="0" onclick="setTrack('<?php echo $song['id']; ?>', tempPlaylist, true)">
					<div class="songViewInfo">
						<img src="<?php echo $song['album_cover']; ?>" alt="Album Cover">
						<div class="song-info">
							<p><?php echo $song['title']; ?></p>
							<p><?php echo $song['artist']; ?></p>
						</div>
					</div>
				</span>
			</div>
			<?php
			$count++;
		endwhile;
		?>
	</div>
</div>


<h2 class="pageHeadingBig">Nhạc Việt Nam</h2>

<div class="gridViewContainer">
	<button onclick="prevAlbumVN()"
		style="height: 30px; width: 30px; background-color: rgba(0, 0, 0, 0);border: none;"><img
			src="/SoundSpace/assets/images/icons/arrow_back_ios_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""
			style="height: 30px; width: 30px"></button>
	<?php
	$albumQuery = mysqli_query(
		$con,
		"SELECT * FROM albums WHERE Country = 'Việt Nam' ORDER BY RAND()"
	);

	$iVN = 0;
	while ($row = mysqli_fetch_array($albumQuery)) {
		echo "<div class='gridViewItem' id='albumVN$iVN' style='display: none;'>
          <span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")''>
            <img src='" . $row['artworkPath'] . "'>
  
            <div class='gridViewInfo'>"
			. $row['title'] .
			"</div>
          </span>
        </div>";
		$iVN++;
	}
	?>
	<button onclick="nextAlbumVN()"
		style="height: 30px; width: 30px; background-color: rgba(0, 0, 0, 0);border: none;"><img
			src="/SoundSpace/assets/images/icons/arrow_forward_ios_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""
			style="height: 30px; width: 30px"></button>

	<script>
		var albumsVN = <?php echo json_encode(range(0, $iVN - 1)); ?>;
		var currentAlbumVN = 0;

		// Hiển thị 4 album đầu tiên
		for (var i = 0; i < 4; i++) {
			if (document.getElementById('albumVN' + albumsVN[i])) {
				document.getElementById('albumVN' + albumsVN[i]).style.display = 'block';
			}
		}

		function nextAlbumVN() {
			// Ẩn album hiện tại
			if (document.getElementById('albumVN' + albumsVN[currentAlbumVN])) {
				document.getElementById('albumVN' + albumsVN[currentAlbumVN]).style.display = 'none';
			}

			// Tăng currentAlbumVN và hiển thị album tiếp theo
			currentAlbumVN = (currentAlbumVN + 1) % albumsVN.length;
			if (document.getElementById('albumVN' + albumsVN[(currentAlbumVN + 3) % albumsVN.length])) {
				document.getElementById('albumVN' + albumsVN[(currentAlbumVN + 3) % albumsVN.length]).style.display = 'block';
			}
		}

		function prevAlbumVN() {
			// Ẩn album cuối cùng trong danh sách hiện tại
			if (document.getElementById('albumVN' + albumsVN[(currentAlbumVN + 3) % albumsVN.length])) {
				document.getElementById('albumVN' + albumsVN[(currentAlbumVN + 3) % albumsVN.length]).style.display = 'none';
			}

			// Giảm currentAlbumVN và hiển thị album trước đó
			currentAlbumVN = (currentAlbumVN - 1 + albumsVN.length) % albumsVN.length;
			if (document.getElementById('albumVN' + albumsVN[currentAlbumVN])) {
				document.getElementById('albumVN' + albumsVN[currentAlbumVN]).style.display = 'block';
			}
		}
	</script>
</div>

<h2 class="pageHeadingBig">Nhạc US-UK</h2>

<div class="gridViewContainer">
	<button onclick="prevAlbumUS()"
		style="height: 30px; width: 30px; background-color: rgba(0, 0, 0, 0);border: none;"><img
			src="/SoundSpace/assets/images/icons/arrow_back_ios_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""
			style="height: 30px; width: 30px"></button>

	<?php
	$albumQuery = mysqli_query(
		$con,
		"SELECT * FROM albums WHERE Country = 'US-UK' ORDER BY RAND()"
	);

	$iUS = 0;
	while ($row = mysqli_fetch_array($albumQuery)) {
		echo "<div class='gridViewItem' id='albumUS$iUS' style='display: none;'>
                    <span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")''>
					<img src='" . $row['artworkPath'] . "'>

					<div class='gridViewInfo'>"
			. $row['title'] .
			"</div>
				</span>

			</div>";
		$iUS++;
	}
	?>
	<button onclick="nextAlbumUS()"
		style="height: 30px; width: 30px; background-color: rgba(0, 0, 0, 0);border: none;"><img
			src="/SoundSpace/assets/images/icons/arrow_forward_ios_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""
			style="height: 30px; width: 30px"></button>
	<script>
		var albumsUS = <?php echo json_encode(range(0, $iUS - 1)); ?>;
		var currentAlbumUS = 0;

		// Hiển thị 4 album đầu tiên
		for (var i = 0; i < 4; i++) {
			if (document.getElementById('albumUS' + albumsUS[i])) {
				document.getElementById('albumUS' + albumsUS[i]).style.display = 'block';
			}
		}

		function nextAlbumUS() {
			// Ẩn album hiện tại
			if (document.getElementById('albumUS' + albumsUS[currentAlbumUS])) {
				document.getElementById('albumUS' + albumsUS[currentAlbumUS]).style.display = 'none';
			}

			// Tăng currentAlbumUS và hiển thị album tiếp theo
			currentAlbumUS = (currentAlbumUS + 1) % albumsUS.length;
			if (document.getElementById('albumUS' + albumsUS[(currentAlbumUS + 3) % albumsUS.length])) {
				document.getElementById('albumUS' + albumsUS[(currentAlbumUS + 3) % albumsUS.length]).style.display = 'block';
			}
		}

		function prevAlbumUS() {
			// Ẩn album cuối cùng trong danh sách hiện tại
			if (document.getElementById('albumUS' + albumsUS[(currentAlbumUS + 3) % albumsUS.length])) {
				document.getElementById('albumUS' + albumsUS[(currentAlbumUS + 3) % albumsUS.length]).style.display = 'none';
			}

			// Giảm currentAlbumUS và hiển thị album trước đó
			currentAlbumUS = (currentAlbumUS - 1 + albumsUS.length) % albumsUS.length;
			if (document.getElementById('albumUS' + albumsUS[currentAlbumUS])) {
				document.getElementById('albumUS' + albumsUS[currentAlbumUS]).style.display = 'block';
			}
		}
	</script>
</div>
<h2 class="pageHeadingBig">Nhạc Hàn Quốc</h2>

<div class="gridViewContainer">
	<button onclick="prevAlbumHQ()"
		style="height: 30px; width: 30px; background-color: rgba(0, 0, 0, 0);border: none;"><img
			src="/SoundSpace/assets/images/icons/arrow_back_ios_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""
			style="height: 30px; width: 30px"></button>

	<?php
	$albumQuery = mysqli_query(
		$con,
		"SELECT * FROM albums WHERE Country = 'Hàn Quốc' ORDER BY RAND()"
	);

	$iHQ = 0;
	while ($row = mysqli_fetch_array($albumQuery)) {
		echo "<div class='gridViewItem' id='albumHQ$iHQ' style='display: none;'>
                    <span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")''>
                        <img src='" . $row['artworkPath'] . "'>

                        <div class='gridViewInfo'>"
			. $row['title'] .
			"</div>
                    </span>

                </div>";
		$iHQ++;
	}
	?>
	<button onclick="nextAlbumHQ()"
		style="height: 30px; width: 30px; background-color: rgba(0, 0, 0, 0);border: none;"><img
			src="/SoundSpace/assets/images/icons/arrow_forward_ios_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""
			style="height: 30px; width: 30px"></button>

	<script>
		var albumsHQ = <?php echo json_encode(range(0, $iHQ - 1)); ?>;
		var currentAlbumHQ = 0;

		// Hiển thị 4 album đầu tiên
		for (var i = 0; i < 4; i++) {
			if (document.getElementById('albumHQ' + albumsHQ[i])) {
				document.getElementById('albumHQ' + albumsHQ[i]).style.display = 'block';
			}
		}

		function nextAlbumHQ() {
			// Ẩn album hiện tại
			if (document.getElementById('albumHQ' + albumsHQ[currentAlbumHQ])) {
				document.getElementById('albumHQ' + albumsHQ[currentAlbumHQ]).style.display = 'none';
			}

			// Tăng currentAlbumHQ và hiển thị album tiếp theo
			currentAlbumHQ = (currentAlbumHQ + 1) % albumsHQ.length;
			if (document.getElementById('albumHQ' + albumsHQ[(currentAlbumHQ + 3) % albumsHQ.length])) {
				document.getElementById('albumHQ' + albumsHQ[(currentAlbumHQ + 3) % albumsHQ.length]).style.display = 'block';
			}
		}

		function prevAlbumHQ() {
			// Ẩn album cuối cùng trong danh sách hiện tại
			if (document.getElementById('albumHQ' + albumsHQ[(currentAlbumHQ + 3) % albumsHQ.length])) {
				document.getElementById('albumHQ' + albumsHQ[(currentAlbumHQ + 3) % albumsHQ.length]).style.display = 'none';
			}

			// Giảm currentAlbumHQ và hiển thị album trước đó
			currentAlbumHQ = (currentAlbumHQ - 1 + albumsHQ.length) % albumsHQ.length;
			if (document.getElementById('albumHQ' + albumsHQ[currentAlbumHQ])) {
				document.getElementById('albumHQ' + albumsHQ[currentAlbumHQ]).style.display = 'block';
			}
		}
	</script>
</div>

<h2 class="pageHeadingBig">Thể loại</h2>

<div class="gridViewContainer">
	<button onclick="prevAlbum()"
		style="height: 30px; width: 30px; background-color: rgba(0, 0, 0, 0);border: none;"><img
			src="/SoundSpace/assets/images/icons/arrow_back_ios_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""
			style="height: 30px; width: 30px"></button>

	<?php
	$albumQuery = mysqli_query(
		$con,
		"SELECT * FROM albums WHERE artist = 19 ORDER BY RAND()"
	);

	$i = 0;
	while ($row = mysqli_fetch_array($albumQuery)) {
		echo "<div class='gridViewItem' id='album$i' style='display: none;'>
                    <span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")''>
                        <img src='" . $row['artworkPath'] . "'>

                        <div class='gridViewInfo'>"
			. $row['title'] .
			"</div>
                    </span>

                </div>";
		$i++;
	}
	?>
	<button onclick="nextAlbum()"
		style="height: 30px; width: 30px; background-color: rgba(0, 0, 0, 0);border: none;"><img
			src="/SoundSpace/assets/images/icons/arrow_forward_ios_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""
			style="height: 30px; width: 30px"></button>
	<script>
		var albums = <?php echo json_encode(range(0, $i - 1)); ?>;
		var currentAlbum = 0;

		// Hiển thị 4 album đầu tiên
		for (var i = 0; i < 4; i++) {
			if (document.getElementById('album' + albums[i])) {
				document.getElementById('album' + albums[i]).style.display = 'block';
			}
		}

		function nextAlbum() {
			// Ẩn album hiện tại
			if (document.getElementById('album' + albums[currentAlbum])) {
				document.getElementById('album' + albums[currentAlbum]).style.display = 'none';
			}

			// Tăng currentAlbum và hiển thị album tiếp theo
			currentAlbum = (currentAlbum + 1) % albums.length;
			if (document.getElementById('album' + albums[(currentAlbum + 3) % albums.length])) {
				document.getElementById('album' + albums[(currentAlbum + 3) % albums.length]).style.display = 'block';
			}
		}

		function prevAlbum() {
			// Ẩn album cuối cùng trong danh sách hiện tại
			if (document.getElementById('album' + albums[(currentAlbum + 3) % albums.length])) {
				document.getElementById('album' + albums[(currentAlbum + 3) % albums.length]).style.display = 'none';
			}

			// Giảm currentAlbum và hiển thị album trước đó
			currentAlbum = (currentAlbum - 1 + albums.length) % albums.length;
			if (document.getElementById('album' + albums[currentAlbum])) {
				document.getElementById('album' + albums[currentAlbum]).style.display = 'block';
			}
		}
	</script>
</div>