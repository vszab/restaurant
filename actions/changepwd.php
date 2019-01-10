<?php

require_once('../includes/config.php');
session_start();

$message = '';
if(isset($_POST['submit'])) {
	$user = $_SESSION['username'];
	$oldpass = mysqli_real_escape_string($link,$_POST["current"]);
	$newpass = mysqli_real_escape_string($link,$_POST["newpass"]);
	$confirmPass = mysqli_real_escape_string($link,$_POST["confirm"]);
	$sql = "UPDATE admins SET password = '$newpass' WHERE username='$user' and password = '$oldpass'";
	if($newpass === $confirmPass){
		$result = mysqli_query($link,$sql);
		header('Location: ../settings2.php');
		} else {
		header('Location: ../views/settings.php?=error');	
		echo mysqli_error($link);
	} 
	
 echo '<div class="container"><h3>'.$message.'</h3></div>';
	
}

?>
