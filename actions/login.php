<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Login</title>
</head>
<body>


<div id="lin">
	<h1>Login Here:</h1>

	<form id ="reservation" method="POST" action="authenticate.php">


		<div class="form group">
			<label for="firstname"><i class="fa fa-user"></i> User:</label>
			<input type="text" class="form-control"  name="uname" id="uname"  value="" placeholder="username" required>
		</div>	
		
		<div class="form group">
			<label for="lastname"><i class="fa fa-unlock-alt"></i> Pass: </label>
			<input type="password" class="form-control" width="60%" name="pwd" id="pwd" value="" placeholder="password" required>
		</div>
		
		<div class="form group">
			<input type="submit" class="btn btn-primary" name="submit" value="Submit">
		</div>
</form>
</div>

</body>
</html>


