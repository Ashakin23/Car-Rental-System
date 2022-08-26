<?php
session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name = "viewport" content= "width= device-width" initial-scale="1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<title>Welcome!</title>
		
	</head>
	<body style="background:#E9E9E9;">
		<?php
			
		    include_once 'loregdb.php';
		    $username = $_SESSION['username'];
		    $sql = "SELECT username,fullname,email,phone,NID FROM owner_cred WHERE username='$username';";
		    $res = mysqli_query($conn,$sql);
		    $row = mysqli_fetch_assoc($res);
		?>
		<div class="container">
			<div class="main-body">
				<div class="row gutters-sm" style="padding-top:50px;">
					<div class="col-md-4 mb-3">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-column align-items-center text-center">
									<img src="https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" 
                                    alt="Admin" class="rounded-circle"
                                     width="250px" style="padding:50px 20px 5px 20px;">
                                     
									<div class="mt-3">
										<h4 style="font-weight:700; padding:30px; color: #444C89;">
											<?php echo $username ?>
										</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row" style="padding:0px 20px;">
									<div class="col-sm-3">
										<h6 class="mb-0">Full Name</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<?php echo $row['fullname'] ?>
									</div>
								</div>
								<hr>
								<div class="row" style="padding:0px 20px;">
									<div class="col-sm-3">
										<h6 class="mb-0">NID Number</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<?php echo $row['NID'] ?>
									</div>
								</div>
								<hr>
								<div class="row" style="padding:0px 20px;">
									<div class="col-sm-3">
										<h6 class="mb-0">Email</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<?php echo $row['email'] ?>
									</div>
								</div>
								<hr>
								<div class="row" style="padding:0px 20px;">
									<div class="col-sm-3">
										<h6 class="mb-0">Phone</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<?php echo $row['phone'] ?>
									</div>
								</div>
								<hr>
                                <div class="row" style="padding:0px 20px;">
									<div class="col-sm-3">
										<h6 class="mb-0">Net Profit</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<?php echo $row['phone'] ?>
									</div>
								</div>
                                <hr>
								<div style="display:flex;justify-content: center;">
								<form action="http://localhost://new/dashboard_owner.php" method = "post">
									<button type="submit" class="btn btn-dark" name = 'addcars 'value="addcars" style="margin: 0px 20px;">Add Cars<strong>+</strong></button>
								</form>
									<button type="button" class="btn btn-secondary" style="margin: 0px 20px;">Check Booking History</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			if (isset($_POST['addcars_'])) {
				echo '
				<div class="container" style="max-width:600px; padding:30px">
				<form action="http://localhost/new/addcar.php" method="post">
					<div class="form-group">
						<label for="carnumber" style="padding:8px">Car Number</label>
						<input type="text" class="form-control" id="carnumber" placeholder="Car Number" name="carnumber" style="padding:8px" required>
					</div>
					<div class="form-group">
						<label for="modelnumber" style="padding:8px">Model Number</label>
						<input type="text" class="form-control" id="modelnumber" name="modelnumber" placeholder="Model Number" style="padding:8px" required>
					</div>
					<label for="cartype" style="padding:8px">Car Type</label>
					<select class="form-select" aria-label="Default select example" id="cartype" name="cartype" style="padding:8px">
						<option value="1" selected>4 sitter</option>
						<option value="2">7 sitter</option>
						<option value="3">9 sitter</option>
					</select>
					<label for="carquality" style="padding:8px">Car Condition</label>
					<select class="form-select" aria-label="Default select example" name="carquality" id="cartype" style="padding:8px">
						<option value="1" selected>Regular</option>
						<option value="2">Premium</option>
					</select>
					<button type="submit" class="btn btn-dark" name = "addcarsubmit" value="addcarsubmit" style="margin: 20px 20px 20px 200px;display:flex;justify-content: center;">Adding Car<strong>+</strong></button>
				</form>
			</div>';
			};
		?>
		<form action="http://localhost/new/login_owner.php" method="post" style="display:flex;justify-content: center;">

		<button class="button login__submit btn btn-primary" type="submit" name = 'logout 'value="logout" style="padding:10px 20px; margin-top:50px;">
            <span class="button__text">Logout</span>
		</form>
	</body>
</html>
