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
		    $username = $_POST["username"];
		    $sql = "SELECT username,email FROM user_cred WHERE username='$username';";
		    $res = mysqli_query($conn,$sql);
		    $row = mysqli_fetch_assoc($res);

			echo "Hello User ",$_POST['username'],".Your email address is: ",$row['email'];

		?>
		<button class="button login__submit" type="submit" value="submit">
                        <span class="button__text"><a href = "http://localhost/new/Login.php">Logout</span>
	



	</body>
</html>