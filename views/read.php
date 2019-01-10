<!DOCTYPE>
<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');
// get the selected user id from the request URI 
// it will be needed when querying the database

?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>View</title>
</head>
<body>

<div class="topnav">
	<div class="container">
	  <a href="../index.php">Home</a>
	  <a class="active">Bookings</a>
	  <a href="dashboard.php">Dashboard</a>
	  <a href="settings.php">Account</a>
	  <a href="actions/logout.php" id="lout">Log out</a>
	 </div>
</div>
<div class="centered">
	<div class="instruction">
		<h2> See full details</h2>
		<h2>or go <a href="bookings.php" class="btn btn-success" value="back">back</a></h2>	
	</div>
	

		<table id="read">
		<?php
			$id = $_GET['id'];

			echo view($id,$link);
		?>
		</table>
	
</div>	
</body>
</html>
