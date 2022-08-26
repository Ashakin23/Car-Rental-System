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
		    $sql = "SELECT username,fullname,email,phone FROM user_cred WHERE username='$username';";
		    $res = mysqli_query($conn,$sql);
		    $row = mysqli_fetch_assoc($res);

			// echo "Hello User ",$username,".Your email address is: ",$row['email'];

		?>
		<div class="container" style="padding:30px;">
			<div class="main-body">

			
				<div class="row gutters-sm" style="padding-top:50px;">
					<div class="col-md-4 mb-3">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-column align-items-center text-center">
									<img src="https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" alt="Admin" class="rounded-circle" width="250px" style="padding:50px 20px 5px 20px;">
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
						<div class="card mb-3" style="padding:50px;">
							<div class="card-body">
								<div class="row" style="padding:10px 20px;">
									<div class="col-sm-3">
										<h6 class="mb-0">Full Name</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<?php echo $row['fullname'] ?>
									</div>
								</div>
								<hr>
								<div class="row" style="padding:10px 20px;">
									<div class="col-sm-3">
										<h6 class="mb-0">Email</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<?php echo $row['email'] ?>
									</div>
								</div>
								<hr>
								<div class="row" style="padding:10px 20px;">
									<div class="col-sm-3">
										<h6 class="mb-0">Phone</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<?php echo $row['phone'] ?>
									</div>
								</div>
								<hr>
								<form method="get" action="<?php echo $_SERVER['PHP_SELF']?>">
								<button type="submit" name = 'chk_car' class="btn btn-dark">Check Cars </button>
								</form>
                        		<button type="button" class="btn btn-secondary">Check Booking History</button>
							</div>
						</div>
					</div>
				</div>



			</div>
		</div>
  		<?php 
  			if (isset($_GET['chk_car'])){
			  	$restf = false;
				if(mysqli_num_rows(mysqli_query($conn, "SELECT type,model,quality FROM car WHERE booked = '0';"))){
				$restf = true;
				
				}
				else{
					$restf = false;		
				}
				if ($restf === true){
					$sql = "SELECT type,model,quality FROM car WHERE booked='0';";
				    $res = mysqli_query($conn,$sql);
				    while ($row=mysqli_fetch_assoc($res)){
				    	echo $row['type']," ",$row['model']," ",$row['quality'];
				    }
				}
  				
  			}
  		?>

		<form action="http://localhost/new/login_user.php" method="post" style="display:flex;justify-content: center;">
		<button class="button login__submit btn btn-primary" type="submit" name = 'logout 'value="logout" style="padding:10px 20px;"><span class="button__text">Logout</span>
		</form>

        
        
        
	



	</body>
</html>