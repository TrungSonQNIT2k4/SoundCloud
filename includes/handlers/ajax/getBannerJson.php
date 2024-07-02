<?php
include("../../config.php");

if(isset($_POST['bannerId'])) {
    $bannerId = $_POST['bannerId'];

    $query = mysqli_query($con, "SELECT * FROM banners WHERE id='$bannerId'");

    $resultArray = mysqli_fetch_array($query);

    echo json_encode($resultArray);
}
?>