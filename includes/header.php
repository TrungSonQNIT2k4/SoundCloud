<?php
include ("includes/config.php");
include ("includes/classes/User.php");
include ("includes/classes/Artist.php");
include ("includes/classes/Album.php");
include ("includes/classes/Banner.php");
include ("includes/classes/Song.php");
include ("includes/classes/Playlist.php");

//session_destroy(); LOGOUT

if (isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
	$username = $userLoggedIn->getUsername();
	echo "<script>userLoggedIn = '$username';</script>";
} else {
	header("Location: register.php");
}

?>
<!DOCTYPE html>
<html lang="vi" style="scroll-behavior: smooth;">

<head>
	<meta charset="UTF-8">
	<title>SoundSpace</title>
	<link rel="icon" href="../assets/images/icons/play.png" type="image/x-icon" />
	<link rel="shortcut icon" href="../assets/images/icons/play.png" type="image/x-icon" />

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="icon" type="image/png" href="/SoundSpace/assets/images/icons/icon-logo.png" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Young+Serif&display=swap" rel="stylesheet">

	<script src="/SoundSpace/assets/js/script.js"></script>
</head>

<body>

	<div id="mainContainer">

		<div id="topContainer">

			<?php include ("includes/navBarContainer.php"); ?>

			<div id="mainViewContainer">

				<div id="mainContent">
				</div>
				<?php include ("includes/footerSection.php"); ?>

			</div>