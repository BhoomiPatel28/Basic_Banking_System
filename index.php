<?php 

include 'connection.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: main.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conf, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: main.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.');
		window.location='index.php'; </script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Axis Bank | SignIn</title>

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
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign In</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Sign In</button>
			</div>
			<p class="login-register-text">Don't have an account?<a href="signup.php">Sign Up Here</a>.</p>
		</form>
	</div>
</body>
</html>

