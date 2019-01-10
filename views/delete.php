<?php
require_once('../includes/config.php');
$sql = $link->prepare("DELETE FROM reservations WHERE id=?");
$sql->bind_param('i', $_GET['id']);
$sql->execute();
$sql->close();
header('Location: ../views/bookings.php?=successful');

?>