<?php
require_once('../includes/config.php');
session_start();

/* function which authenticates admin login
**
*/
$content = "";

if(isset($_POST['submit'])) {

	$user = mysqli_real_escape_string($link,$_POST["uname"]);
	$pass = mysqli_real_escape_string($link,$_POST["pwd"]);
	
	$result = mysqli_query($link, "SELECT * FROM admins WHERE username='" . $user . "' and password = '". $pass."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		header("Location: login.php?=loginfailed");
	
		//echo mysqli_error($link);
	} else {
		$_SESSION['username'] = $user;
		header("Location: ../index.php");
	}

	
}
