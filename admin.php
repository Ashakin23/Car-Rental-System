<?php
session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name = "viewport" content= "width= device-width" initial-scale="1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<title>Admin Console</title>
		
	</head>
	<body style="background:#E9E9E9;">
		<?php
			
		    include_once 'loregdb.php';
			$username = $_GET['usOrem'];
		    // $username = $_SESSION['username'];
		    
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
								
								<hr>
								<div class="row" style="padding:0px 20px;">
									<div class="col-sm-3">
										<h6 class="mb-0">Admin Name :</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<?php echo $username; ?>
									</div>
								</div>
								<hr>
								
								
								<div style="display:flex;justify-content: center;">
								</form>
								<form method="post" action="http://localhost/new/admin.php?usOrem=<?=$username?>">
                                    <button type="submit" name = 'ban_usr' class="btn btn-dark">Ban a user</button>
									<button type="submit" name = 'cncl' class="btn btn-dark" style="margin: 0px 20px;">Cancel Car Contract</button>
									<button type="submit" name = 'chk_usr' class="btn btn-dark">Check users</button>
									<button type="submit" name = 'chk_own' class="btn btn-dark">Check Owner</button>
								</form>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="display:flex;justify-content: center;">
			<?php 
				if 	(isset($_POST['ban_usr'])){
					
						echo '
						<form action = "http://localhost/new/admin.php?usOrem=<?=$username?>" method = "post" style="margin:20px; text-align: center; width:600px">
						<input type="text" name = "ban_usnm" placeholder = "username"> 
						<button type="submit" name = "ban_btn" class="btn btn-secondary" method="post">Ban User</button></form>';
					}

				if (isset($_POST['ban_btn'])){
					$usnm = $_POST['ban_usnm'];
					$sql = "DELETE FROM user_cred WHERE username = '$usnm';";
					mysqli_query($conn,$sql);
					echo "User Banned";
				}

				if (isset($_POST['chk_usr'])){
					$sql = "SELECT fullname,username,email,phone FROM user_cred;";
					$res = mysqli_query($conn,$sql);
					echo '
					<table class="table">
					<thead style="background:#BCBCBE">
						<tr>
						<th scope="col">Username</th>
						<th scope="col">Full Name</th>
						<th scope="col">Email</th>
						<th scope="col">Phone</th>
						</tr>
					</thead>
					<tbody>
					';
					while ($row = mysqli_fetch_assoc($res)){
						if ($row['username']!='admin'){
						echo '
						<tr>
							<td>'.$row["username"].'</td>
							<td>'.$row["fullname"].'</td>
							<td>'.$row["email"].'</td>
							<td>'.$row["phone"].'</td>
						</tr>
						';
						}
					}
					echo '</tbody>
					</table>
					</div>';
				}
				if (isset($_POST['chk_own'])){
					$sql = "SELECT fullname,NID,username,email,phone FROM owner_cred;";
					$res = mysqli_query($conn,$sql);
					echo '
					<table class="table">
					<thead style="background:#BCBCBE">
						<tr>
						<th scope="col">Username</th>
						<th scope="col">Full Name</th>
						<th scope="col">NID</th>
						<th scope="col">Email</th>
						<th scope="col">Phone</th>
						</tr>
					</thead>
					<tbody>
					';
					while ($row = mysqli_fetch_assoc($res)){
						if ($row['username']!='admin'){
							echo '
							<tr>
								<td>'.$row["username"].'</td>
								<td>'.$row["fullname"].'</td>
								<td>'.$row["NID"].'</td>
								<td>'.$row["email"].'</td>
								<td>'.$row["phone"].'</td>
							</tr>
							';
							}
						}
						echo '</tbody>
						</table>
						</div>';
				}
				if 	(isset($_POST['cncl'])){
					
						echo '
						<form action = "http://localhost/new/admin.php?usOrem=<?=$username?>" method = "post">
						<input type="text" name = "ban_car" placeholder = "Car Number" style="margin:20px; text-align: center; width:600px"> 
						<button type="submit" name = "cncl_car" class="btn btn-secondary" method="post">Ban User</button></form>';
					}

				if (isset($_POST['cncl_car'])){
					$usnm = $_POST['ban_car'];
					$sql = "DELETE FROM car WHERE c_number = '$usnm';";
					mysqli_query($conn,$sql);
					echo "Car Contract Cancelled!";
				}
				
			?></div>
		</div>

		<form action="http://localhost/new/login_user.php" method="post" style="display:flex;justify-content: center;">

		<button class="button login__submit btn btn-primary" type="submit" name = 'logout 'value="logout" style="padding:10px 20px; margin-top:50px;">
            <span class="button__text">Logout</span>
		</form>
	</body>
</html>
