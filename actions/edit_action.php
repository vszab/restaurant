<!DOCTYPE>
<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');
// get the selected user id from the request URI 
// it will be needed when querying the database

if(isset($_POST['update'])){
	
	$id = $_POST['reference'];
	$fname = $_POST['newfname'];
	$lname = $_POST['newlname'];
	$guests = $_POST['covers'];
	$date = $_POST['newdate'];
	$time = $_POST['newtime'];
	$email = $_POST['newemail'];
	$phone = $_POST['newphone'];
	$type = $_POST['type'];
	if($_POST['newcomment'] === ''){
		$msg = '-';
	} else {
		$msg = $_POST['newcomment'];
	}
	if($_POST['status'] ===''){
		$status = '-';
	} else {
		$status = $_POST['status'];
	}
	
	$sql = $link->prepare("UPDATE reservations SET firstname=?, lastname=?, guests=?, date=?, time=?, email=?, phone=?, message=?, type=?, status=? WHERE id=$id");
	$sql -> bind_param("ssisssssss", $fname, $lname, $guests, $date, $time, $email, $phone, $msg, $type,  $status);
	if($sql->execute()) {
		header('Location: ../views/read.php?id='.$id.'');
		
	} else {
		echo mysqli_error($link);
	}	
	echo $info;	
	$sql->close();
}
?>