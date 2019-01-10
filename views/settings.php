<!DOCTYPE>
<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');
?>
<html>
<head>
<title>Settings</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


</head>
<body>
<div class="topnav">
	<div class="container">
	  <a href="../index.php">Home</a>
	  <a href="bookings.php">Bookings</a>
	  <a href="dashboard.php">Dashboard</a>
	  <a class="active">Account</a>
	  <a href="../actions/logout.php" id="lout">Log out</a>
	 </div>
</div>
<div class="centered">
<div id="box">
<h3>Change Password</h3>
<form id="pwdchange" method="POST" action="../actions/changepwd.php/">
	<div class="form group">
		<label for="current">Current Password:</label>
		<input type="type" class="form-control" name="current"  required>
	</div>
	<div class="form group">
		<label for="newpass">New Password:</label>
		<input type="text" class="form-control" name="newpass"  required>
	</div>
	<div class="form group">
		<label for="confirm">Confirm New Password:</label>
		<input type="text" class="form-control" name="confirm"  required>
	</div>
	<div class="leftbutton">
	<div class="form group">
		<input type="submit" class="btn btn-primary" name="submit" value="Submit">
	</div>
	</div>
</form>
</div>
</body>
</html>
