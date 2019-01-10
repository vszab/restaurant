<!DOCTYPE>
<?php

require_once('../includes/config.php');
session_start();
?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Account Changes</title>
</head>
<body>
<div class="topnav">
	<div class="container">
	  <a href="../index.php">Home</a>
	  <a href="bookings.php">Bookings</a>
	  <a class="dashboard.php">Dashboard</a>
	  <a href="active">Account</a>
	  <a href="../actions/logout.php" id="lout">Log out</a>
	 </div>
</div>
<div class="container">
<h2>Your password has been successfully updated, please <a href="../actions/login.php">sign in</a> again</h2>
</div>
<div class="footer">
  <p>Restaurant Reservation Web App - vszabo02 - BBK -2018</p>
</div>	
</body>
</html>