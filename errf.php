<?php
include_once 'loregdb.php';
function emptyField($fullname,$username, $email,$password,$cpassword){
	$restf;
	if (empty($fullname) || empty($username) || empty($email) || empty($password) || empty($cpassword)){
		$restf = true;
	}
	else {
		$restf = false;
	}
	return $restf;
}

function invemail($email){
	$restf;
	if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$restf = true;
	}
	else {
		$restf = false;
	}
	return $restf;
}

function psmth($password,$cpassword){
	$restf;
	if ($password !== $cpassword){
		$restf = true;
	}
	else {
		$restf = false;
	}
	return $restf;
}

function unameexists($conn,$username){
	// $restf;
	// $sql = "SELECT username FROM user_cred;";
	// $res = mysqli_query($conn,$sql);

	// while ($row = mysqli_fetch_assoc($res)){
	// 	if ($row['username']=== $username){
	// 		$restf = true;
	// 	}
	// 	else{
	// 		$restf = false;
	// 	}
		
	// }
	// return $restf;
	$restf;
	if(mysqli_num_rows(mysqli_query($conn, "SELECT username FROM user_cred WHERE username = '$username'"))){
		$restf = true;
		return $restf;
	}
	else{
		$restf = false;
		return $restf;
	}

}

function emptyFieldlogin($usOrem,$password){
	$restf;
	if (empty($usOrem) || empty($password)){
		$restf = true;
	}
	else {
		$restf = false;
	}
	return $restf;
}

function emailexistslogin($conn,$usOrem){
	$echk;
	$sql = "SELECT email FROM user_cred;";
	$res = mysqli_query($conn,$sql);

	while ($row = mysqli_fetch_assoc($res)){
		if ($row['email']=== $usOrem){
			$echk = true;
		}
		else{
			$echk = false;
		}
		
	}
	return $restf;
}


