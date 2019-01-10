<?php

/*
** this file stores the database login credentials
** establishing mysquli connection
*/

$config['db_host'] = 'localhost';
$config['db_user'] = 'root';
$config['pwd'] = "";
$config['db_name'] = 'final_project';

$link = mysqli_connect(
	$config['db_host'],
	$config['db_user'],
	$config['pwd'],
	$config['db_name']
	
	);
	
/* check connection succeeded */
if (mysqli_connect_errno()) {
	
	exit(mysqli_connect_error());
}

?>
