<?php
include("includes/includedFiles.php");

$username = $userLoggedIn->getUsername();

?>

<div class="entityInfo">

    <div class="centerSection">
        <div class="userInfo">
            <h1><?php echo $username; ?></h1>
        </div>
    </div>

    <div class="tracklistContainer borderBottom">
        <h2>Bài hát đã nghe gần đây</h2>
        <ul class="tracklist">
            <?php
            $stmt = $con->prepare("SELECT song_id FROM recently_played WHERE username = ? ORDER BY played_at DESC LIMIT 20");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $songsQuery = $stmt->get_result();

            if(mysqli_num_rows($songsQuery) == 0) {
                echo "<span class='noResults'>Không có bài hát nào được nghe gần đây.</span>";
            }

            $songIdArray = array();

            $i = 1;
            while($row = mysqli_fetch_array($songsQuery)) {
                if($i > 15) {
                    break;
                }

                array_push($songIdArray, $row['song_id']);
                $albumSong = new Song($con, $row['song_id']);
                $albumArtist = $albumSong->getArtist();

                echo "<li class='tracklistRow'>
                        <div class='trackCount'>
                            <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'>
                            <span class='trackNumber'>$i</span>
                        </div>

                        <div class='trackInfo'>
                            <span class='trackName'>" . $albumSong->getTitle() . "</span>
                            <span class='artistName'>" . $albumArtist->getName() . "</span>
                        </div>

                        <div class='trackOptions'>
                            <input type='hidden' class='songId' value='". $albumSong->getId() . "'>
                            <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
                        </div>

                        <div class='trackDuration'>
                            <span class='duration'>" . $albumSong->getDuration() . "</span>
                        </div>
                    </li>";

                $i = $i + 1;
            }
            ?>

            <script>
                var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
                tempPlaylist = JSON.parse(tempSongIds);
            </script>
        </ul>
    </div>
</div>