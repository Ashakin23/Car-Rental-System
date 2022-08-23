
<?php
    include_once 'loregdb.php';

	$fullname = $_POST["fullname"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$cpassword = $_POST["cpassword"];

	require_once 'loregdb.php';
	require_once 'errf.php';

	$emt = emptyField($fullname,$username, $email,$password,$cpassword);
	$invem = invemail($email);
	$psm = psmth($password,$cpassword);
	$usex = unameexists($conn,$username);


	if ($emt !== false){
		header("location: signup.php?error=emptyfield");
	}
	if ($invem !== false){
			header("location: signup.php?error=invalidemail");
		}
	if ($psm !== false){
			header("location: signup.php?error=Passwordnotmatch");
		}
	if ($usex !== false){
			header("location: signup.php?error=Usernamealreadyexists");
		}	
	
	if ($emt === false && $invem === false && $psm === false && $usex === false){

			#$hsdpswd = password_hash($password, PASSWORD_DEFAULT);
		
			$sql = "INSERT INTO user_cred values ('$fullname','$username','$email','$password');";
			mysqli_query($conn,$sql);

			echo "Registration successfull<br>";


			echo "<a href='http://localhost/new/Login.php'>LOGIN</a>";
	}
	
	




	

	



