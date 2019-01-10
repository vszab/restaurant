<!DOCTYPE>
<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');
?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Add Booking</title>
</head>

<body>

	<div class="topnav">
	<div class="container">
	  <a href="../index.php">Home</a>
	  <a class="active">Bookings</a>
	  <a class="dashboard.php">Dashboard</a>
	  <a href="settings.php">Account</a>
	  <a href="../actions/logout.php" id="lout">Log out</a>
	  </div>
</div>
<div class="centered">
	<div class="instruction">
		<h2> Add new Booking</h2>
		<h2>or go <a href="bookings.php" class="btn btn-success" value="back">back</a></h2>
	</div>


<?php

//Form validation
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	addManually($link);
}



?>
<div id="manually">
	<form id="addnew" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="form group">
			<label for="firstname">First name:</label>
			<input type="text" class="form-control" name="fname"  required>
		</div>	
		
		<div class="form group">
			<label for="lastname">Last name:</label>
			<input type="text" class="form-control" name="lname"  required>
		</div>
		
		<div class="form group">
			<label for="covers">Number of guests:</label>	
			<input type="text" class="form-control" name="covers" required>
		</div>
		
		<div class="form group">		
			<label for="date">Date:</label>	
			<input type="date"  class="form-control" name="date" min="<?php echo todaysDate()?>" required>
		</div>
	
		<div class="form group">
			<label for="time">Time:</label>	
			<input type="time" class="form-control" name="time" min="09:00" max="22:00" required>
		</div>

		<div class="form group">
			<label for="email">E-mail:</label>
			<input type="text" class="form-control" name="email" required>
		</div>
		
		<div class="form group">
			<label for="phone">Telephone Number:</label>
			<input type="text" class="form-control" name="phone"  required>
		</div>	
				
		<div class="form group">
			<label for="type">Type:</label>
			<select class="form-control" name="type" required>
				<option name="walk-in">Walk-in</option>
				<option name="phone">Phone</option>
			</select>
		</div>
		
		<div class="form group">
			<label for="comment">Comments:</label>
			<textarea name="comment" class="form-control" form="addnew" value=""> </textarea>			
		</div>
		<div class="leftbutton">
		<div class="form group">
			<input type="submit" class="btn btn-primary " name="submit" value="Submit">
		</div>
		</div>
			</form>
		</div>
</div>
</body>
</html>