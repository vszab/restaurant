<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');

function changeTheDate(){
$newDate = '';
$today = todaysDate();
$updateBy = $_POST['updateable'];
		
	if($updateBy == 1){
		$newDate = updateDate($today,1);
			
	} else if ($updateBy == -1){
			
		$newDate = updateDate($today,-1);
	} else {
		$newDate = $updateBy;
	}
	
return $newDate;		
}
		
$changeDay = changeTheDate();

//echo $changeDay;
function changeRetrieve($date,$link){
	
	echo showForDay($date,$link);
}

echo changeRetrieve($changeDay,$link);



?>