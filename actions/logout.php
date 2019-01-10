<?php
session_start();
session_destroy();
header("Location: ../actions/login.php");

?>