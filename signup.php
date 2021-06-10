<?php 

include 'config.php';

error_reporting(0);

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script> alert('User Registration Completed. Please SignIn.');
                             window.location='index.php';
                   </script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.');
				window.location='signup.php';</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.');
			window.location='signup.php';</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.');
		window.location='signup.php';</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">

	<title>Axis Bank | Sign Up</title>
	
	<style type="text/css">
	
		body 
		{
	    	width: 100%;
		    min-height: 100vh;
		     background-image: linear-gradient(rgba(0,0,0,.2), rgba(0,0,0,.2)), url(images/bg.jpg);
		    background-position: center;
		    background-size: cover;
		    display: flex;
		    justify-content: center;
		    align-items: center;
			
		}

	</style>

</head>
<body>
	<div class="signinup">
		<form action=" " method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign Up</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Sign Up</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Sign In Here</a>.</p>
		</form>
	</div>
</body>
</html>