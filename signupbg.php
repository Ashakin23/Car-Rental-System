
<?php
    include_once 'loregdb.php';

	$fullname = $_POST["fullname"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$cpassword = $_POST["cpassword"];
	$phone = $_POST['phone'];
	if (isset($_POST['owner_signup'])){
		$nid = $_POST['nid'];
	}
	require_once 'loregdb.php';
	require_once 'errf.php';

	$emt = emptyField($fullname,$username, $email,$password,$cpassword);
	$invem = invemail($email);
	$psm = psmth($password,$cpassword);
	$usex = unameexists($conn,$username);

	$usexOwner = unameexistsOwner($conn,$username);


	if ($emt !== false){
		if (isset($_POST['user_signup'])){
			header("location: signup_user.php?error=emptyfield");
		}
		else{
			header("location: signup_owner.php?error=emptyfield");
		}
	}
	if ($invem !== false){
		if (isset($_POST['user_signup'])){
			header("location: signup_user.php?error=invalidemail");
		}
		else{
			header("location: signup_owner.php?error=invalidemail");
		}
	}
	if ($psm !== false){
		if (isset($_POST['user_signup'])){
			header("location: signup_user.php?error=Passwordnotmatch");
		}
		else{
			header("location: signup_owner.php?error=Passwordnotmatch");
		}
	}
	// if ($usex !== false){
	// 	if (isset($_POST['user_signup'])){
	// 		header("location: signup_owner.php?error=Usernamealreadyexists");
	// 	}
	// 	else{
	// 		header("location: signup_owner.php?error=Usernamealreadyexists");
	// 	}
	// }	
echo "here1";
	if (isset($_POST['user_signup'])){
		echo "here4";
		if ($usex !== false){
			header("location: signup_user.php?error=Usernamealreadyexists");
			
		}
	}
	if (isset($_POST['owner_signup'])){
		echo "here5";
		if ($usexOwner !== false){
			header("location: signup_owner.php?error=Usernamealreadyexists");
			
		}
	}
echo "here2";if ($usexOwner===false){echo "usexOwner: false";}
	
	if ($emt === false && $invem === false && $psm === false && ($usex === false || $usexOwner === false)){
		echo "here6";

			#$hsdpswd = password_hash($password, PASSWORD_DEFAULT);
		if (isset($_POST['user_signup'])){
			$sql = "INSERT INTO user_cred values ('$fullname','$username','$email','$password','$phone');";
			mysqli_query($conn,$sql);
			echo "here3";
			echo '<script>alert("Registration Successfull!")</script>';
			header("location: login_user.php");
		}
		else{
			$sql = "INSERT INTO owner_cred values ('$username','$nid','$fullname','$email','$password','$phone');";
			mysqli_query($conn,$sql);
			echo '<script>alert("Registration Successfull!")</script>';
			header("location: login_owner.php");
		}
			
			

			

			// if (isset($_POST['user_signup'])){
			// header("location: login_user.php");
			// }
			// else{
			// 	header("location: login_owner.php");
			// }
	}
	
	




	

	



