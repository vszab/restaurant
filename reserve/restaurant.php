<!DOCTYPE>
<?php
require_once('../includes/functions.php');
/*
** Reservation form
*/
?>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Booking</title>

</head>
<body>
	<script>
		$.("#date").datepicker({ minDate: 0});
	</script>
<div class="centered">
<div class="container">
	<h1>Reserve a table</h1>
	<form id ="reservation" method="POST" action="submission.php">

		<div class="form group">
			<label for="firstname">First name: *</label>
			<input type="text" class="form-control" name="fname" required>
		</div>	
		
		<div class="form group">
			<label for="lastname">Last name: *</label>
			<input type="text" class="form-control" name="lname"  required>
		</div>
		
		<div class="form group">
			<label for="covers">Number of guests: *</label>	
			<input type="text" class="form-control" name="covers"  required>
		</div>
		
		<div class="form group">		
			<label for="date">When would you like to visit: *</label>	
			<input type="date"  class="form-control" name="date" id="date" min="<?php echo todaysDate();?>" required>
		</div>
	
		<div class="form group">
			<label for="time">What time would you like to visit: *</label>	
			<input type="time" class="form-control" name="time" min="09:00" max="22:00" required>
		</div>

		<div class="form group">
			<label for="email">E-mail: *</label>
			<input type="text" class="form-control" name="email"  required>
		</div>
		
		<div class="form group">
			<label for="phone">Telephone Number: *</label>
			<input type="text" class="form-control" name="phone"   required>
		</div>	
		
		<div class="form group">
			<label for="message">Anything else you would like us to know?: </label>
			<textarea name="comment" class="form-control" form="reservation" required> </textarea>			
		</div>
		
		<div class="form group">
			<input type="submit" class="btn btn-primary" name="submit" value="Submit">
		</div>
	</form>
</div>
</div>

</body>
</html>
