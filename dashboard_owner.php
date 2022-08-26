<?php
session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name = "viewport" content= "width= device-width" initial-scale="1.0">
		<title>Welcome!</title>
		
	</head>
	<body>
		<?php
			
		    include_once 'loregdb.php';
		    $username = $_SESSION['username'];
		    $fullname = $_SESSION['fullname'];
		    $sql = "SELECT username,email FROM owner_cred WHERE username='$username';";
		    $res = mysqli_query($conn,$sql);
		    $row = mysqli_fetch_assoc($res);

			echo "Hello Car Owner ",$fullname,".Your email address is: ",$row['email'];

		?>

		<form action="http://localhost/new/login_owner.php" method="post">
		<button class="button login__submit" type="submit" name = 'logout 'value="logout"><span class="button__text">Logout</span>
		</form>