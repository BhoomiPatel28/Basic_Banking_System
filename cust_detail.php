<?php 
			
	include 'connection.php'; 

	$ids = $_GET['id'];

	$show = "SELECT * FROM transfer_money WHERE id='$ids'";
	$see = mysqli_query($conf, $show);
	$ans = mysqli_fetch_array($see);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Axis Bank | Details </title>

		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <link rel="stylesheet" type="text/css" href="CSS/style.css">
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	    <style type="text/css">
	
			body 
			{
		    	width: 100%;
			    min-height: 100vh;
			 	background-image: linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.3)), url(images/bg2.jpg);
			    background-position: center;
			    background-size: cover;
			    display: flex;
			    justify-content: center;
			    align-items: center;
			}

			.text {
			    color: white;
			    font-weight: 500;
			    font-size: 1.1rem;
			  	display: block;
			  	margin-left: 10px;
			   	margin-bottom: 15px;
			   	justify-content: left;
			   	align-items: left;
			}

		</style>
</head>
<body>

	<div class="signinup" style="width: 500px; background: rgba(0,0,0,0.5);">
		<p class="login-text" style="font-size: 2rem; font-weight: 800;">Details</p>
		<form action="" method="POST" class="login-email">
			<div class="form-row">
				<div class="col-4">
					<p class="text">Account No &nbsp;</p>
				</div>
				<div class="col-8">
					<p class="text"><?php echo $ans['account_no'] ?></p>
				</div>
			</div>
			<div class="form-row">
				<div class="col-4">
					<p class="text">Full Name &nbsp;</p>
				</div>
				<div class="col-8">
					<p class="text"><?php echo $ans['first_name'], $ans['last_name'] ?></p>
				</div>
			</div>
			<div class="form-row">
				<div class="col-4">
					<p class="text">Mobile No &nbsp;</p>
				</div>
				<div class="col-8">
					<p class="text"><?php echo $ans['mobile_no'] ?></p>
				</div>
			</div>

			<div class="form-row">
				<div class="col-4">
					<p class="text">Email &nbsp;</p>
				</div>
				<div class="col-8">
					<p class="text"><?php echo $ans['email'] ?></p>
				</div>
			</div>

			<div class="form-row">
				<div class="col-4">
					<p class="text">Balance &nbsp;</p>
				</div>
				<div class="col-8">
					<p class="text"><?php echo $ans['balance'] ?></p>
				</div>
			</div>
			
				<div class="input-group">
						<button name="submit" class="btn">
							<a href="transaction.php?id=<?php echo $ans['ID']; ?>"  style="text-decoration: none; color: black;">Transfer
							</a>
						</button>
				</div>
					<p class="login-register-text">Don't want to transfer Money?
						<a href="customers.php">Go Back</a>.
					</p>
		</form>
	</div>
  
</body>
</html>