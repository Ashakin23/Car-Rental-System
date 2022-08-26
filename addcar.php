<?php
    session_start();
    include_once 'loregdb.php';
    $carnumber = $_POST["carnumber"];
	$modelnumber = $_POST["modelnumber"];
	$cartype = $_POST["cartype"];
	$carquality = $_POST["carquality"];
    $username = $_SESSION['username'];
	require_once 'loregdb.php';

    $ownerinfo = "SELECT username,NID FROM owner_cred WHERE username='$username';";
    $ownerresult = mysqli_query($conn,$ownerinfo);
    $ownerrow = mysqli_fetch_assoc($ownerresult);
    $nid = $ownerrow['NID'];

    $sql = "INSERT INTO car values (NULL,'$carnumber','$cartype','$modelnumber','$username','$nid', '$carquality','0');";
    mysqli_query($conn,$sql);
    echo "here3";
    echo '<script>alert("Registration Successfull!")</script>';
    header("location: dashboard_owner.php");
?>