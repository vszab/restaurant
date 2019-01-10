<?php
/* Helper functions
** Separation of logic from content
*/


////////////////////////////////////////////////////////////
/// DATE FORMATTING FUNCTIONS
////////////////////////////////////////////////////////////


/*
* used in dashboard.php 
* returned format: day of month in year
*/

function getTodaysDate() {
	date_default_timezone_set('UTC');
	$t = time();
	$d = date('l jS \of F Y',$t);	
	return $d;
}

/*
** returned format: Year month day
*/
function todaysDate(){
	$t = time();
	$d = date("Y-m-d",$t);
	$d = date_create($d);
	$d = date_format($d, 'Y-m-d');
	return $d;
	
}
/*
** returned format: hour and minute
*/
function currentTime(){
	$t = time();
	$d = date("H:i",$t);
	return $d;	
}

/*
** param date, number
** returned format: year month day
** param number is added to the day
*/
function updateDate($date, $number){
	$date = date_create($date);
	$date = date_modify($date,"+".$number. "day");
	$date = date_format($date, 'Y-m-d');
	return $date;
	
}

function getDayOfWeek($date){
	$date = date_create($date);
	$date = date_format($date, 'F');
	return $date;
}

////////////////////////////////////////////////////////////
/// FORM VALIDATING FUNCTIONS
////////////////////////////////////////////////////////////

function nameVal($name){
	// name can only contain letters
	$name_regex='/^[a-zA-Z]*$/';
	$valid = true;
	if(!preg_match($name_regex,$name)){
		$valid = false;
	}
	return $valid;
}


function phoneVal($number){
		//phone number can only contain 11 numbers - UK mobile
		$num_regex = "/[0-9]{11}/";
		$valid = true;
		if(!preg_match($num_regex,$number)){
			$valid = false;
		}
		
		return $valid;	
}

function emailVal($email){
	$valid = true;
	if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		$valid = false;
	} 
	return $valid;
}

function dateVal($date){
	$valid = true;
	$d = todaysDate();	
	if($date < $d){
		$valid = false;
	}
	return $valid;
}

function timeVal($time){
	$valid = true;
	if($time === '') {
		$valid=false;
	}	
	return $valid;	
}


function guestVal($number){
		$num_regex = "/[0-9]{1,2}/";
		$valid = true;
		if(!preg_match($num_regex,$number)){
			$valid = false; 
		}

		return $valid;
		
		
}

////////////////////////////////////////////////////////////
/// DB INTERACTION FUNCTIONS
////////////////////////////////////////////////////////////

/*
** process booking details after form submission
** @param connection  
*/
function addNewBooking($link) {
		$info = '';
		$type = 'online';
		$fname = $lname = $guests = $date = $time = $email = $phone = $msg = $errorMsg = "";
		$error = false;
	
	//validate name fields
	if(nameVal($_POST['fname']) === false){
		$error = true;
		$errorMsg = "firstname";
		
	} else {
		$fname = trim($_POST['fname']);
		$fname =  mysqli_real_escape_string($link,$fname);
		
	}
	
	
	if(nameVal($_POST['lname']) === false){
		$error = true;
		$errorMsg = "lastname";
	} else {
		$lname = trim($_POST['lname']);
		$lname =  mysqli_real_escape_string($link,$lname);
	}

	// validate guests field	
	if(guestVal($_POST['covers']) === false){
		$error = true;
		$errorMsg = "guests";
	} else {
		$guests = trim($_POST['covers']);
		$guests =  mysqli_real_escape_string($link,$guests);
	}
	
	// validate email field
	if(emailVal($_POST['email']) === false){
		$error = true;
		$errorMsg = "email";
		
	} else {
		$email = trim($_POST['email']);
		$email =  mysqli_real_escape_string($link,$email);
	
	}
	
	// validate phone field

	if(phoneVal($_POST['phone']) === false){
		$error = true;
		$errorMsg = "phone";
		
	} else {
		$phone = trim($_POST['phone']);
		$phone =  mysqli_real_escape_string($link,$phone);
	
	}
	//validate date field
	if(dateVal($_POST['date']) === false){
		$error = true;
		$errorMsg = "date";
		
	} else {
		$date = trim($_POST['date']);
		$date = mysqli_real_escape_string($link,$date);
	
	}
	// validate time field
	if(timeVal($_POST['time']) === false){
		$error = true;
		$errorMsg = "time";
		
	} else {
		$time = $_POST['time'];
		$time = mysqli_real_escape_string($link,$time);
	}
	if(!($_POST['comment'] === '')){
		$msg = mysqli_real_escape_string($link, $_POST['comment']);
	} else {
		$msg = "-";
	}
	
	if($error === true){
		header('Location: restaurant.php?='.$errorMsg.'');
	} else{
		$sql = $link->prepare("INSERT INTO reservations (firstname, lastname, guests, date, time, email, phone, message, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");  
		$sql->bind_param("ssissssss", $fname, $lname, $guests, $date, $time, $email, $phone, $msg, $type); 
		if($sql->execute()) {
			$info = '<div class="instruction"><h3>Booking successfully recorded! Thanks </h3><h3><a href="restaurant.php" class="btn btn-primary">new booking</a></h3></div>';
		} else {
			echo mysqli_error($link);
		}
		echo $info;
		
		$sql->close();   
		$link->close();
}
}

/*
** processing reservation added to system by admin
** @param connection  
*/

function addManually($link){
	$info = $fname = $lname = $guests = $date = $time = $email = $phone = $msg = $type ='';
	$error = false;
	if(nameVal($_POST['fname']) === false) {
		$error = true;
		$errorMsg = "firstname";
	} else {
		$fname = mysqli_real_escape_string($link,$_POST['fname']);
	}
	
	if(nameVal($_POST['lname']) === false) {
		$error = true;
		$errorMsg = "lastname";
	} else {
		$lname = mysqli_real_escape_string($link,$_POST['lname']);
	}
	
	if(guestVal($_POST['covers']) === false) {
		$error = true;
		$errorMsg = "covers";
	} else {
		$guests = mysqli_real_escape_string($link, $_POST['covers']);
	}
	
	if(dateVal($_POST['date']) === false) {
		$error = true;
		$errorMsg = "fdatepast";
	} else {
		$date = mysqli_real_escape_string($link, $_POST['date']);
	}
	if(timeVal($_POST['time']) === false) {
		$error = true;
		$errorMsg = "time";

	} else {
		$time = mysqli_real_escape_string($link, $_POST['time']);
	}	
	if(emailVal($_POST['email']) === false) {
		$error = true;
		$errorMsg = "email";
	} else {
		$email = mysqli_real_escape_string($link, $_POST['email']);
	}
	if(phoneVal($_POST['phone']) === false) {
		$error = true;
		$errorMsg = "phone";
	} else {
		$phone = mysqli_real_escape_string($link, $_POST['phone']);
	}	
	if($_POST['type'] == 'phone'){
		$type = 'phone';
	} else {
		$type = 'walk-in';
	}
	if(!($_POST['comment'] == '')){
		$msg = mysqli_real_escape_string($link, $_POST['comment']);
	} else {
		$msg = "-";
	}
	
	 
	
	if($error === true){
		header('Location: create.php?='.$errorMsg.'');
	} else{
		
		$sql = $link->prepare("INSERT INTO reservations (firstname, lastname, guests, date, time, email, phone, message, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");  
		$sql->bind_param("ssissssss", $fname, $lname, $guests, $date, $time, $email, $phone, $msg, $type); 
		if($sql->execute()) {
			$info = '<div class="instruction"><h3>Booking successfully recorded! Thanks </h3></div>';
		} else {
			echo mysqli_error($link);
		}
		echo $info;
		
		$sql->close();   
		$link->close();
}	
}

/*
** display today's bookings
** @param date, connection  
*/
function showForDay($date,$link){
	
	// start the html output
	$html ='<tr>
				<th>ID</th>
				<th>First name</th>
				<th>Last Name</th>
				<th>Covers</th>
				<th>Time</th>
				<th>Comment</th>
				<th colspan="3">Action</th>
			</tr>';
	$sql = $link->prepare("SELECT id, firstname, lastname, guests, time, message FROM reservations WHERE date='$date' ORDER BY time ASC");
	if($sql->execute()){
		$sql->bind_result($id, $fname, $lname, $guests, $time, $message);
		while($sql->fetch()){
					$html .= '<td>'.htmlentities($id).'</td>';
					$html .= '<td>'.htmlentities($fname).'</td>';
					$html .= '<td>'.htmlentities($lname).'</td>';
					$html .= '<td>'.htmlentities($guests).'</td>';
					$html .= '<td>'.htmlentities($time).'</td>';
					$html .= '<td>'.htmlentities($message).'</td>';
					$html .= '<td><a href="edit.php?id='.$id.'" class="btn btn-primary" value="edit">edit</a>';
					$html .= '<a href="read.php?id='.$id.'" class="btn btn-success" value="view">view </a>';
					$html .= '<a href="delete_view.php?id='.$id.'" class="btn btn-danger" value="delete">delete</a></td></tr>';
		}

	} else {
		
			echo mysqli_error($link);

	}
	return $html;		
	$sql->close(); 
	$link->close();	
	
}

/*
** display full information held in database table about selected booking
** @param id, connection  
*/
function view($id,$link){
$html = '<tr>
				<th>ID</th>
				<th colspan="2">Name</th>
				<th>Covers</th>
				<th>Date</th>
				<th>Time</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Comment</th>
				<th>Type</th>
				<th>Status</th>
				<th colspan="2">Action</th>
			</tr>';
	

$sql = $link->prepare("SELECT * FROM reservations WHERE id='$id'");
if($sql->execute()){
	
	$sql->bind_result($id, $fname, $lname, $guests,$date, $time, $email, $phone, $message, $type, $status);


	while($sql->fetch()){ 
				$html .= '<tr><td>'.$id.'</td>';
				$html .= '<td>'.htmlentities($fname).'</td>';
				$html .= '<td>'.htmlentities($lname).'</td>';
				$html .= '<td>'.htmlentities($guests).'</td>';
				$html .= '<td>'.htmlentities($date).'</td>';
				$html .= '<td>'.htmlentities($time).'</td>';
				$html .= '<td>'.htmlentities($email).'</td>';
				$html .= '<td>'.htmlentities($phone).'</td>';
				$html .= '<td>'.htmlentities($message).'</td>';
				$html .= '<td>'.htmlentities($type).'</td>';
				$html .= '<td>'.htmlentities($status).'</td>';
				$html .= '<td><a href="edit.php?id='.$id.'" class="btn btn-primary" value="edit"><i class="fa fa-edit" style="font-size:24px"></i></a>';
				$html .= '<a href="delete.php?id='.$id.'" class="btn btn-danger" value="delete"><i class="fa fa-trash" style="font-size:24px"></i></a></td></tr>';
	}
	
} else {
		
	echo mysqli_error($link);
}

	return $html;
	$sql->close(); 
	$link->close();	
}

/*
** display full information about booking selected for deletion
** @param id, connection  
*/
function showForDeletion($id,$link){
	$html = 'Are you sure you want to delete?';
	$html = '<tr>
						<th>ID</th>
						<th colspan="2">Name</th>
						<th>Covers</th>
						<th>Date</th>
						<th>Time</th>
						<th>Comment</th>
						<th>Action</th>
			</tr>';
	$sql = $link->prepare("SELECT id, firstname, lastname, guests, date, time, message FROM reservations WHERE id='$id'");
	if($sql->execute()){
		$sql->bind_result($id, $fname, $lname, $guests, $date, $time, $message);
		while($sql->fetch()){ 
					$html .= '<tr><td>'.$id.'</td>';
					$html .= '<td>'.htmlentities($fname).'</td>';
					$html .= '<td>'.htmlentities($lname).'</td>';
					$html .= '<td>'.htmlentities($guests).'</td>';
					$html .= '<td>'.htmlentities($date).'</td>';
					$html .= '<td>'.htmlentities($time).'</td>';
					$html .= '<td>'.htmlentities($message).'</td>';
					$html .= '<td><a href="delete.php?id='.$id.'" class="btn btn-danger" value="delete"><i class="fa fa-trash" style="font-size:24px"></i></a></td></tr>';
		}
	} else {
		echo mysqli_error($link);
	}
		return $html;
		$sql->close(); 
		$link->close();	
}

/////////////////////////////////////////////////////////
// USED IN EDIT.PHP
////////////////////////////////////////////////////////


/*
** display table entry that was selected for editing 
** @param id, connection  - not used in prototype
*/

function showForEdit($id,$link){
	
$udata = array();
$sql = "SELECT * FROM reservations WHERE id='$id'";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);
for($i = 0; $i< 11; $i++){
	$udata[$i] = $row[$i];
}
return $udata;		
	
}

///////////////////////////////////////////////////////////////
// HOME - PIE CHART FUNCTIONS
//////////////////////////////////////////////////////////////



/*
* query database for guest numbers  
* @param upper and lower time interval limits, date, connection 
*
*/

function sumOfDailyCovers($time1,$time2,$date,$link){
	$sum = 0;
	$sql = "SELECT SUM(guests) FROM reservations WHERE ('$time1' < time AND time < '$time2') AND (date = '$date')";
	$result = mysqli_query($link,$sql);
	
	 if($result === false){
		echo mysqli_error($link);
		
	} else {
	$row = mysqli_fetch_row($result);
	$sum = $row[0];
		
	}
	return $sum;
}



/*	function called at home.php
** displays comments from 'comment' table
** @param connection  
*/
function showDashboard($link){
	$html = '<tr><th colspan="2"><i class="fa fa-thumb-tack" style="font-size:24px"></i> To Do List:</th><tr>';
	$sql = "SELECT * FROM dashboard";
	$result = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($result)){ 
				$html .= '<tr><td>'.htmlentities($row['comments']).'</td>';
				$html .= '<td><a href="../actions/deleteComments.php?id='.$row['id'].'" class="btn btn-danger" value="delete"><i class="fa fa-check"></i></a></td></tr>';
	}
	return $html;
}

/*
** builds the calendar view
** @param date object  
*/

function buildCalendar($date){
	$today = date_create($date);
	$currentDay = date('j');
	$currentMonth = date('F');
	$currentYear = date('Y');
	$numOfDays = date("t");
	$subtract = $currentDay - 1;
	// include condition to check whether today is the first day 
	$startDate = date_modify($today, "-".$subtract."day");
	$startDay =  date_format($startDate, 'N');
	$padding = '';
	$remainder = 0;
	$cols = 7;
	$rows = 1;
	$countUp = 1;
	
	$html = '<tr>
				<th colspan="7" >'.$currentMonth.' - '.$currentYear.'</th>	
			</tr>';
			
	$html .='<tr>
				<td>Mon</td>
				<td>Tue</td>
				<td>Wed</td>
				<td>Thu</td>
				<td>Fri</td>
				<td>Sat</td>
				<td>Sun</td>
			</tr><tr>';

	//build the table
	// first row
	
	$endOfCal = $numOfDays + $startDay;
	for($i = 1; $i < $endOfCal; $i++){		
		
		if($i < $startDay){
			$html .= '<td> </td>';			

		} else if ($i >= $startDay){ 
			$html .= '<td> '.$countUp.' </td>';
			$countUp++;			
		} 
		// insert new row whenever seven cells on the same row have been populated
		if ($i % 7 == 0){
			$html .= '</tr><tr>';
			$rows++;
		} 
		
	}
	// Fill out the rest of the calendar
	$remainder = (($rows*$cols) - ($endOfCal-1));
	$padding = str_repeat('<td></td>',$remainder);
	$html .= $padding;
	$html .= '</tr>';
	
return $html;
}

?>
