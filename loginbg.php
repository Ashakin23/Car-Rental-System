<?php

session_start();
require_once 'loregdb.php';
require_once 'errf.php';

$usOrem = $_POST['username'];
$pwd = $_POST['password'];


// $sql = "SELECT password FROM user_cred WHERE username = $usOrem;";
// //$res = ;
// $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));


// if($row['password'] === $pwd){
// 	header("location: dashboard.php? $username = $usOrem");

// }
// else{
// 	header("location: login.php?error=WrongPassword");

	$restf;
	if (isset($_POST['user_submit'])){
		if(mysqli_num_rows(mysqli_query($conn, "SELECT username FROM user_cred WHERE username = '$usOrem';"))){
		$restf = true;
		
		}
		else{
			$restf = false;
			header("location: login_owner.php?error='UsernameNotFound'");
		
		}
	}
	if ($restf==false){
		header("location: login_owner.php?error='UsernameNotFound'");
	};
	if (isset($_POST['owner_submit'])){
		if(mysqli_num_rows(mysqli_query($conn, "SELECT username FROM owner_cred WHERE username = '$usOrem';"))){
		$restf = true;
		
		}
		else{
			$restf = false;
		
		}
	}
	
	
	if ($restf === true){
		if (isset($_POST['user_submit'])){
			$dbpas = mysqli_fetch_assoc(mysqli_query($conn, "SELECT password FROM user_cred WHERE username = '$usOrem';"));
		}
		if (isset($_POST['owner_submit'])){
			$dbpas = mysqli_fetch_assoc(mysqli_query($conn, "SELECT password FROM owner_cred WHERE username = '$usOrem';"));
		}
		
		if ($dbpas['password'] === $pwd){
			$_SESSION['username'] = $usOrem;
			$_SESSION['password'] = $pwd;
			if (isset($_POST['user_submit'])){
				header("location: dashboard_user.php?");
			}
			else{
				header("location: dashboard_owner.php?");
			}
		}
		else{
			if (isset($_POST['user_submit'])){
				header("location: login_user.php?error='WrongPassword'");
			}
		 	else{
		 		header("location: login_owner.php?error='WrongPassword'");
		 	}
		 }
	
	}



// if ($pwd !== $row['password']){
// 	header("location: login.php?error=WrongPassword");
// }


