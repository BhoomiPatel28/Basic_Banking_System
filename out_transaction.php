<?php 

include 'connection.php'; 

error_reporting(0);

if(isset($_POST['submit']))
{
    $faccno = $_POST['faccno'];
    $taccno = $_POST['taccno'];
    $amount = $_POST['amount'];

    $sql1 = "SELECT * FROM transfer_money WHERE account_no='$faccno'";
    $query = mysqli_query($conf,$sql1);
	$sql1 = mysqli_fetch_assoc($query);

	$sql2 = "SELECT * FROM transfer_money WHERE account_no='$taccno'";
    $qu = mysqli_query($conf,$sql2);
	$sql2 = mysqli_fetch_assoc($qu);

	if($faccno != $taccno)
	{
		if(!$query->num_rows > 0)
		{
			echo "<script> alert('Sender Account Does not Exist.'); 
			window.location = 'out_transaction.php';</script>";
		}
		else
		{
			if(!$qu->num_rows > 0)
			{
				echo "<script> alert('Receiver Account Does not Exist.'); 
				window.location = 'out_transaction.php';</script>";		
			}
			else
			{
				if ($amount <= 0)
			   	{
			        echo "<script>alert('oops! Enter a positive amount. '); 
					window.location = 'out_transaction.php';</script>";
			    }
			  	
			  	else if($amount > $sql1['balance']) 
			    {
			        
			       echo "<script>alert('Bad Luck! Insufficient Balance'); 
					window.location = 'out_transaction.php';</script>";	
			  
			    }
			  
			    else
			    {
			        $newbalance = $sql1['balance'] - $amount;
			        $sql = "UPDATE transfer_money set balance=$newbalance where account_no='$faccno'";
			        mysqli_query($conf,$sql);
			     
			        $newbalance = $sql2['balance'] + $amount;
			        $sql = "UPDATE transfer_money set balance=$newbalance where account_no='$taccno'";
			        mysqli_query($conf,$sql);
			        
			        $sender = $sql1['first_name'];
			        $receiver = $sql2['first_name'];
			        $sql = "INSERT INTO history(sender,receiver,balance) VALUES ('$sender','$receiver','$amount')";
			        $query=mysqli_query($conf,$sql);

			        if($query)
			        {
			             echo "<script> alert('Transaction Successful');
			                             window.location='history.php';
			                   </script>";
			            
			        }

			        $newbalance= 0;
			        $amount =0;
			    }
			}
		}
	}
	else
	{
		echo "<script>alert('Please Enter Different Account Numbers.');
		window.location = 'out_transaction.php';</script>";	
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Axis Bank | Transfer Money</title>

		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	    <link rel="stylesheet" type="text/css" href="CSS/style.css">

	    <style type="text/css">
	    	
	    	.bgdiv
			{
		    	width: 100%;
			    min-height: 100vh;
			    background-image: linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.3)), url(images/bg4.jpg);
			    background-position: center;
			    background-size: cover;
			    display: flex;
			    justify-content: center;
			    align-items: center;	
			}

			.login-text {
			    color: white;
			    font-weight: 500;
			    font-size: 1.5rem;
			    text-align: center;
			    display: block;
			    text-transform: capitalize;
			    margin: auto;
			}

		</style>

</head>
<body>

	<div class="bgdiv">
		<div class="signinup pt-10" style="width: 550px; background: rgba(0,0,0,0.5); ">
		<p class="login-text" style="font-size: 2rem; font-weight: 800;">Transfer Money</p>
		<form action="" method="POST" class="login-email">
			<div class="form-row">
				<div class="col-12 col-sm-3 align-self-center">
					<p class="login-text">From</p>
				</div>
				<div class="input-group col-12 col-sm-9">
					<input type="text" placeholder="Account No" name="faccno" value="<?php echo $faccno; ?>" required>
				</div>
			</div>
			
			<div class="form-row">
				<div class="col-12 col-sm-3 align-self-center">
					<p class="login-text">To</p>
				</div>
				<div class="input-group col-12 col-sm-9">
					<input type="text" placeholder="Account No" name="taccno" value="<?php echo $taccno; ?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 col-sm-3 align-self-center">
					<p class="login-text">Amount</p>
				</div>	
				<div class="input-group col-12 col-sm-9">
					<input type="number" placeholder="Amount" name="amount" value="<?php echo $amount; ?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="input-group col-12 col-sm-6">
						<button name="submit" class="btn">Transfer</button>
				</div>
				<div class="input-group col-12 col-sm-6">

						<button type="button" name="back" class="btn">
							<a href="customers.php" style="text-decoration: none; color: black;">Back</a>
						</button>
				</div>			
			</div>

			</form>
		</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>