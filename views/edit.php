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
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Edit</title>
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
		<h2> Update current booking</h2>
		<h2>or go <a href="bookings.php" class="btn btn-success" value="back">back</a></h2>
	</div>


<div class="container">

			<?php
				$id = $_GET['id'];
				$info=array();
				$info = showForEdit($id,$link);
			?>
		
			<form id="updateable" method="post" action="../actions/edit_action.php">
			<div class="form group">
				<input type="hidden" name="reference" value= "<?php echo $info[0]; ?>"/>
			</div>
			<div class="form group">
				<input type="text" class="form-control" name="newfname" value="<?php echo $info[1]; ?>">
			</div>
			<div class="form group">
				<input type="text" class="form-control" name="newlname" value="<?php echo $info[2]; ?>">
			</div>
			<div class="form group">
				<input type="text" class="form-control" name="covers" id="newcovers" value="<?php echo $info[3]; ?>">
			</div>
			<div class="form group">
				<input type="date" class="form-control" name="newdate" id="date" value="<?php echo $info[4]; ?>">
			</div>
			<div class="form group">
				<input type="time" class="form-control" name="newtime" id="time" value="<?php echo $info[5]; ?>">
			</div>
			<div class="form group">
				<input type="text" class="form-control" name="newemail" value="<?php echo $info[6]; ?>">	
			</div>
			<div class="form group">
				<input type="text" class="form-control" name="newphone" value="<?php echo $info[7]; ?>">
			</div>
			<div class="form group">
				<textarea name="newcomment" class="form-control" form="updateable"><?php echo $info[8]; ?></textarea>
			</div>
			<div class="form group">
				<select id="type" name="type" class="form-control"> 
						<option selected><?php echo $info[9]; ?></option>
						<option value="phone" id="phonetype">phone</option>										
						<option value="walk-in"id="walkintype">walk-in</option>

				</select>
			</div>
			<div class="form group">
				<input type="text" class="form-control" name="status" value="<?php echo $info[10]; ?>">
			</div>				

	<div class="leftbutton">
				<input type="submit" class="btn btn-primary" name="update" value="update">
	</div>
</div>	
</div>
			
</body>
</html>