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

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Dashboard</title>
</head>
<body>
<div class="topnav">
	<div class="container">
	  <a href="../index.php">Home</a>
	  <a href="bookings.php">Bookings</a>
	  <a class="active">Dashboard</a>
	  <a href="settings.php">Account</a>
	  <a href="../actions/logout.php" id="lout">Log out</a>
	 </div>
</div>
<div class="centered">
<div class="container">
		<h2>Leave a message for your coworkers </h2>
		<h3><?php echo getTodaysDate()?></h3>

</div>
<div class="centered">
	<table id="calendar">
	<?php 
		$today = todaysDate();
		echo buildCalendar($today);
	?>
	</table>
</div>
<div class="centered">
	<table id="msgbox">
		<?php 
			$day = getTodaysDate();
			echo showDashboard($link);
		?>
	</table>
</div>
<div class="container">
		<?php 
		
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$message = $info = "";
			$message = $_POST['message'];
			$message = stripslashes(trim($message));
			$message = mysqli_real_escape_string($link,$message);
			$sql = "INSERT INTO dashboard (comments)
						 VALUES ('$message')";
								 
			$success = mysqli_query($link,$sql);
			if($success === false) {
				echo mysqli_error($link);
			} else {
				header("Location: dashboard.php?=success");
				
			}
			

		
		}
	?>
	<form id="dboard" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="form group">
				<label for="message"><i class="fa fa-comments" style="font-size:36px"></i> Your comment: </label>
				<input type="text" name="message" id ="dash"  class="form-control" required> </textarea>			
			</div>
			<div class="leftbutton">				
					<input type="submit" class="btn btn-primary" name="submit" value="Submit">
			</div>
	</form>
	
</div>
</div>
<div class="footer">
  <p>Restaurant Reservation Web App - vszabo02 - BBK -2018</p>
</div>	
</body>
</html>
