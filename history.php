<!DOCTYPE html>				
<html>
<head>
	<title>Axis Bank | Transaction History</title>

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
			 	display: flex;
			    background-position: center;
			    background-size: cover;
			    justify-content: center;
			    align-items: center;
	    	}

	    	@media only screen and (max-width: 500px) {
  			body {
			    background-position: center;
			    background-size: cover;
			    justify-content: center;
			    align-items: center;
  			}
		   	
		   	.table-responsive {
		        width: 100%;
		    }   
  		}
	    	.center-div table
			{
			   border-radius: 10px;
			    border:2px solid black;
			    margin: auto;
			    background: rgba(0,0,0,0.5);
			}

			.center-div th, td
			{
			    border: 2px solid black;
			    padding: 15px 25px;
			    text-align: center;
			    color: white;		
			    font-size: 13px;
			}

			.center-div th
			{
			    font-weight: 400px;
			    background: green;
			    font-size: 16px;
			    color: black;
			}
	    </style>

</head>
<body>

  	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  		<a class="navbar-brand" href="main.php">Axis Bank</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      	<li class="nav-item">
		        	<a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="customers.php">Customers</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="out_transaction.php">TransferMoney</a>
		      	</li>
		      	<li class="nav-item active">
		        	<a class="nav-link" href="history.php">History</a>
		      	</li>   
		    </ul>
	  			<div>
					<a href="signout.php">
						<button class="btn btn-outline-info" type="button" id="signout" >
							<b>Sign Out</b>
						</button>
					</a>
				</div>
  		</div>	
	</nav>

	<div class="table-responsive" style="width: 70%;">
   			<div class="center-div pt-4 pb-4">

   				<div class="pt-5 m-auto">
   					<p class="login-register-text" style="font-size: 1.5rem;">Transaction History</p>
   				</div>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Sender</th>
							<th scope="col">Receiver</th>
							<th scope="col">Balance</th>
							<th scope="col">Date & Time</th>
						</tr>
					</thead>

					<tbody>

						<?php 

						include 'connection.php';

							$sel_cust = "SELECT * FROM history ";
							$res = mysqli_query($conf, $sel_cust);
							
							$i = 1;
							while($ans = mysqli_fetch_array($res))
							{
							?>
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $ans['sender'] ?></td>
									<td><?php echo $ans['receiver'] ?></td>
									<td><?php echo $ans['balance'] ?></td>
									<td><?php echo $ans['date_time'] ?></td>
								</tr>
							<?php
							$i = $i+1;
							}
							?>
					</tbody>
				</table>
			</div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>

