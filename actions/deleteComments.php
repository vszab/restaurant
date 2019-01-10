<?php
require_once('../includes/config.php');
$id = $_GET['id'];
$sql = "DELETE FROM dashboard WHERE id=$id";
$result = mysqli_query($link,$sql);
if($result === true){
	header('Location: ../views/dashboard.php?=successful');
}


?>