<?php
include("includes/includedFiles.php");
?>

<div class="playlistContainer">
	
	<div class="PlaylistViewContainer">
		
		<h2>THƯ VIỆN</h2>

		<div class="buttonItems">
			<button class="button green" onclick="createPlaylist()">TẠO PLAYLIST MỚI</button>
		</div>


		<?php
			$username = $userLoggedIn->getUsername();
			$playlistQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner = '$username'");


			if(mysqli_num_rows($playlistQuery) == 0) {
				echo "<span class='noResults'>You don't have any playlist yet.</span>";
			}
			while($row = mysqli_fetch_array($playlistQuery)) {

				$playlist = new Playlist($con, $row);

				echo "<div class='gridViewItem' role='link' tabindex='0' onclick='openPage(\"playlist.php?id=" . $playlist->getId() ."\")'>
						

						<div class='playlistImage'>

							<img src='assets/images/artwork/playlist.jpg'/>

						</div>
						<div class='gridViewInfo'>"
								. $playlist->getName() .
							"</div>

						</div>";



			}
		?>

	</div>

</div>