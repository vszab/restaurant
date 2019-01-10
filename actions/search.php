<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');
$html =  '<tr>
				<th>ID</th>
				<th colspan="2">Name</th>
				<th>Covers</th>
				<th>Date</th>
				<th>Time</th>
				<th>Comment</th>
				<th colspan="3">Action</th>
			</tr>';
			
	$keyword = $_POST['term'];
	$sql = $link->prepare("SELECT id, firstname, lastname, guests, date, time, message FROM reservations WHERE (firstname LIKE '%".$keyword."%') OR (lastname LIKE '%".$keyword."%') OR (message LIKE '%".$keyword."%')");

	if($sql->execute()){
		$sql->bind_result($id, $fname, $lname, $guests, $date, $time, $message);
			while ($sql->fetch()){
					$html .= '<td>'.htmlentities($id).'</td>';
					$html .= '<td>'.htmlentities($fname).'</td>';
					$html .= '<td>'.htmlentities($lname).'</td>';
					$html .= '<td>'.htmlentities($guests).'</td>';
					$html .= '<td>'.htmlentities($date).'</td>';
					$html .= '<td>'.htmlentities($time).'</td>';
					$html .= '<td>'.htmlentities($message).'</td>';
					$html .= '<td><a href="edit.php?id='.$id.'" class="btn btn-primary" value="edit">edit</a>';
					$html .= '<a href="read.php?id='.$id.'" class="btn btn-success" value="view">view </a>';
					$html .= '<a href="delete_view.php?id='.$id.'" class="btn btn-danger" value="delete">delete</a></td></tr>';
			}
			
	} else {
			echo mysqli_error($link);
	}
	
	echo $html;

	$sql->close(); 
	$link->close();	

?>