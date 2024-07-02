<?php
	class Banner {
		private $con;
		private $id;
		private $title;
		private $artistId;
		private $genre;
		private $bannerPath;
	
		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
	
			$query = mysqli_query($this->con, "SELECT * FROM banners WHERE id='$this->id'");
			$banner = mysqli_fetch_array($query);
	
			$this->title = $banner['title'];
			$this->artistId = $banner['artistId']; // Kiểm tra tên cột trong cơ sở dữ liệu
			$this->genre = $banner['genre'];
			$this->bannerPath = $banner['bannerPath'];
		}
	
		public function getTitle() {
			return $this->title;
		}
	
		public function getArtist() {
			return new Artist($this->con, $this->artistId);
		}
	
		public function getGenre() {
			return $this->genre;
		}
	
		public function getBannerPath() {
			return $this->bannerPath;
		}
	
		public function getNumberOfSongs() {
			$query = mysqli_query($this->con, "SELECT id FROM songs WHERE banner='$this->id'");
			return mysqli_num_rows($query);
		}
	
		public function getSongIds() {
			$query = mysqli_query($this->con, "SELECT id FROM songs WHERE banner='$this->id' ORDER BY bannerOrder ASC");
	
			$array = array();
	
			while($row = mysqli_fetch_array($query)) {
				array_push($array, $row['id']);
			}
	
			return $array;
		}
	}	
?>