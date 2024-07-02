<?php include("includes/includedFiles.php");

if(isset($_GET['id'])) {
	$bannerId = trim($_GET['id']);
}
else {
	header("Location: index.php");
}

$banner = new Banner($con, $bannerId);
$artist = $banner->getArtist();
?>

<div class="entityInfo">

	<div class="leftSection">
		<img src="<?php echo $banner->getBannerPath(); ?>">
	</div>

	<div class="rightSection">
		<h2><?php echo $banner->getTitle(); ?></h2>
		<p>Nghệ sĩ: <?php echo $artist->getName(); ?></p>
		<p><?php echo $banner->getNumberOfSongs(); ?> bài hát</p>

	</div>

</div>


<div class="tracklistContainer">
	<ul class="tracklist">
		
		<?php
		$songIdArray = $banner->getSongIds();

		$i = 1;
		foreach($songIdArray as $songId) {

			$bannerSong = new Song($con, $songId);
			$bannerArtist = $bannerSong->getArtist();

			echo "<li class='tracklistRow'>
					<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $bannerSong->getId() . "\", tempPlaylist, true)'>
						<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo'>
						<span class='trackName' onclick='setTrack(\"" . $bannerSong->getId() . "\", tempPlaylist, true)'>" . $bannerSong->getTitle() . "</span>
						<span class='artistName'>" . $bannerArtist->getName() . "</span>
					</div>

					<div class='trackOptions'>

						<input type='hidden' class='songId' value='". $bannerSong->getId() . "'>

						<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
					</div>

					<div class='trackDuration'>
						<span class='duration'>" . $bannerSong->getDuration() . "</span>
					</div>


				</li>";

			$i = $i + 1;
		}

		?>

		<script>
			
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';		
			tempPlaylist = JSON.parse(tempSongIds);
			console.log(tempPlaylist);
		</script>


	</ul>
</div>


<nav class="optionsMenu">
	

	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>
