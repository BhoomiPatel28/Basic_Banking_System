<?php 

include 'connection.php'; 

error_reporting(0);

if(isset($_POST['submit'])) {
	$accno = $_POST['accno'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mobno = $_POST['mobno'];
	$cemail = $_POST['cemail'];
	$bal = $_POST['bal'];

	$insql = "SELECT * FROM transfer_money WHERE account_no='$accno'";
	$cresult = mysqli_query($conf, $insql);
		
		if (!$cresult->num_rows > 0) 
		{
			$insql = "INSERT INTO transfer_money(account_no, first_name, last_name, mobile_no, email, balance) VALUES ('$accno', '$fname', '$lname', '$mobno', '$cemail', '$bal')";
			$query = mysqli_query($conf, $insql);

			if($query) 
			{
				echo "<script> alert('Account Created Successfully.');
                             window.location='customers.php';
                   </script>";
			}
			else
			{
			echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} 
		else 
		{
			echo "<script>alert('Woops! Account Already Exists.')</script>";
		}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Axis Bank | Create Account</title>

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
			 	background-image: linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.3)), url(images/bg5.jpg);
			    background-position: center;
			    background-size: cover;
			    display: flex;
			    justify-content: center;
			    align-items: center;
			}

		</style>
</head>
<body>

	<div class="signinup" style="width: 800px; background: rgba(0,0,0,0.5);">
		<p class="login-text" style="font-size: 2rem; font-weight: 800;">Create Account</p>
		<form action="" method="POST" class="login-email">
			<div class="form-row">
				<div class="input-group col-12 col-sm-6">
					<input type="text" placeholder="Account No" name="accno" value="<?php echo $accno; ?>" required>
				</div>
				<div class="input-group col-12 col-sm-6">
					<input type="text" placeholder="First Name" name="fname" value="<?php echo $fname; ?>" required>
				</div>
			</div>
			
			<div class="form-row">
				<div class="input-group col-12 col-sm-6">
					<input type="text" placeholder="Last Name" name="lname" value="<?php echo $lname; ?>" required>
				</div>
				<div class="input-group col-12 col-sm-6">
						<input type="text" placeholder="Mobile No" name="mobno" value="<?php echo $mobno; ?>" required>
				</div>
			</div>
			
			<div class="form-row">
				<div class="input-group col-12 col-sm-6">
					<input type="email" placeholder="Email" name="cemail" value="<?php echo $cemail; ?>" required>
				</div>	
				<div class="input-group col-12 col-sm-6">
					<input type="number" placeholder="Balance" name="bal" value="<?php echo $bal; ?>" required>
				</div>
			</div>
			
				<div class="input-group">
						<button name="submit" class="btn">ADD</button>
				</div>
					<p class="login-register-text">Already have an account? <a href="customers.php">Check your Details</a>.</p>
		</form>
	</div>
  
</body>
</html>