<!Doctype html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="stsht.css" />
</head>
	<body class="bg">
		<div class="title">
			<h3 >Sign Up</h3>
			<form action="http://localhost/new/signupbg.php" method="POST">
				<label for="Full Name" class="m1" ><b>Name:</b>
				</label><br />
				<input type="text" name="fullname" id="fullname" placeholder="Name" /><br />


				<label for="username" class="m1"><b>Username:</b>
				</label><br />
				<input type="text" name="username" id="username" placeholder="Username"/><br />

				<label for="email" class="m1"><b>Email:</b>
				</label><br />
				<input type="email" name="email" id="email" placeholder="Email"/><br />

				<label for="password">
					<b>Password:</b>
				</label><br />
				<input type="password" name="password"  />
				<br />
				<label for="password">
					<b>Confirm Password:</b>
				</label><br />
				<input type="password" name="cpassword"  />
				<br /><br />
				<input type="submit" value="submit" />
				<input type="reset">
			</form>
			<footer>
			<a class="icn" href="https://fb.com/kazi.ashakin"><img src="fb_ic.png" class="icn"/>
			</a></footer>

			</div>
		</body>
</html>