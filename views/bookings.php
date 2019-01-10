<!DOCTYPE>
<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');

?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
	<script src="../actions/dateupdate.js"></script>
	<script src="../actions/termsearch.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bookings</title>
</head>
<body>
<div class="topnav">
	<div class="container">
	  <a href="../index.php">Home</a>
	  <a class="active">Bookings</a>
	  <a href="dashboard.php">Dashboard</a>
	  <a href="settings.php">Account</a>
	  <a href="../actions/logout.php" id="lout">Log out</a>
	</div>
</div>
<div class="centered">
	<div class="container">
	
		<h2>See Today's Bookings - <?php echo getTodaysDate();?></h2>
	</div>
					<span>
							<a href="create.php" class="btn btn-success" value="create">ADD <i class="fa fa-calendar-plus-o"></i></a>
							<button id="ysd" class="btn btn-success" value="yesterday"><i class="fa fa-reply"></i> yesterday</button>
							<button id="tmr" class="btn btn-success" value="tomorrow">tomorrow <i class="fa fa-share"></i></button>
							<label for="date">Or pick a date: </label>	
							<input type="date" id="datepick" class="form-control-sm" name="datepick" value="">
							<button id="go" class="btn btn-primary"value="go">go</button></form>
							<button onclick="window.print()" class="btn btn-danger text-right" value="print">print <i class="fa fa-print"></i></button>
							<label for="search">Search:</label><input type="text" id="searchtext">
							<button id="search" class="btn btn-primary"value="search"><i class="fa fa-search"></i></button></form>
					</span>	
	
	
	
	
		<table id="bookings">
			<?php
				$today = todaysDate();
				
				echo showForDay($today,$link);
			?>
		</table>
	</div>
</body>
</html>
