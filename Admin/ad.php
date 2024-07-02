
<!DOCTYPE html>
<html lang="en" style="scroll-behavior:smooth">
<?php include 'admin.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOUNDSAPCE ADMIN</title>
    <link rel="stylesheet" href="../Admin/main.css">
    <link rel="icon" type="image/png" href="/SoundSpace/assets/images/icons/icon-logo.png" />
</head>
<body>
    <div class="navadmin">
        <header>=
            <h1>SOUNDSAPCE ADMIN</h1>
        </header>
        <nav>
            <ul>
                <li><a href="#albums">Albums</a></li>
                <li><a href="#artists">Artists</a></li>
                <li><a href="#banners">Banners</a></li>
                <li><a href="#genres">Genres</a></li>
                <li><a href="#playlists">Playlists</a></li>
                <li><a href="#playlistsongs">Playlistsongs</a></li>
                <li><a href="#songs">Songs</a></li>
                <li><a href="#users">Users</a></li>
                <li><a href="#admin_ac">Admin_ac</a></li>
            </ul>
        </nav>
    </div>
    <div class="infoadmin">
        <main>
            <section id="albums">
                <h2>Albums</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Genre</th>
                            <th>Artwork Path</th>
                            <th>Country</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php displayAlbums(); ?>
                    </tbody>
                </table>
            </section>
    
            <section id="artists">
                <h2>Artists</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php displayArtists(); ?>
                    </tbody>
                </table>
            </section>
    
            <section id="banners">
                <h2>Banners</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Genre</th>
                            <th>Banner Path</th>
                            <th>Country</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php displayBanners(); ?>
                    </tbody>
                </table>
            </section>
    
            <section id="genres">
                <h2>Genres</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php displayGenres(); ?>
                    </tbody>
                </table>
            </section>
    
            <section id="playlists">
                <h2>Playlists</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php displayPlaylists(); ?>
                    </tbody>
                </table>
            </section>
    
            <section id="playlistsongs">
                <h2>Playlistsongs</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Song Id</th>
                            <th>Playlist Id</th>
                            <th>Playlist Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php displayPlaylistsongs(); ?>
                    </tbody>
                </table>
            </section>
    
            <section id="songs">
                <h2>Songs</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Album</th>
                            <th>Genre</th>
                            <th>Duration</th>
                            <th>Path</th>
                            <th>Album Order</th>
                            <th>Plays</th>
                            <th>Banner</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php displaySongs(); ?>
                    </tbody>
                </table>
            </section>
    
            <section id="users">
                <h2>Users</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Sign Up Date</th>
                            <th>Profile Pic</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php displayUsers(); ?>
                    </tbody>
                </table>
            </section>
            <section id="admin_ac">
                <h2>Admin</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Admin_name</th>
                            <th>Password</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php displayAdmin_ac(); ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>