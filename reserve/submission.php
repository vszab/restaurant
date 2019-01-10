<!DOCTYPE>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>	
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Success</title>
</head>
<body>


<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');
// Script that validates data submitted by the user 
// If data passes validation, after sanitising it, gets added to the relevant table
// and customer is informed of successful/unsuccesful reservation


//check if form has been submitted
if(isset($_POST['submit'])) {		
		
	addNewBooking($link);
} else {
	echo "Error.";
}

?>


</body>
</html>