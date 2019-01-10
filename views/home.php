<!DOCTYPE>
<?php
require_once('includes/config.php');
require_once('includes/functions.php');
?>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	</head>
<body>

<?php

$today = todaysDate();
// setting the time intervals
$breakfast1 = '09:00';
$breakfast2 = '11:59';
$lunch1 = '12:00';
$lunch2 = '14:59';
$teaTime1 = '15:00';
$teaTime2 = '17:59';
$dinner1 = '18:00';
$dinner2 = '22:00';
$dinnerCovers = sumOfDailyCovers($dinner1, $dinner2, $today, $link);
$teaCovers = sumOfDailyCovers($teaTime1, $teaTime2, $today, $link);
$lunchCovers = sumOfDailyCovers($lunch1, $lunch2, $today, $link);
$breakfastCovers = sumOfDailyCovers($breakfast1, $breakfast2, $today, $link);

?>
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Covers', 'Per service time'],
  ['Breakfast', <?php echo $breakfastCovers;?>],
  ['Lunch', <?php echo $lunchCovers;  ?>],
  ['Tea Time',<?php echo $teaCovers; ?>],
  ['Dinner', <?php echo $dinnerCovers; ?>],
]); 


var options = {'title':'Number of guests today', 
				 
					'width':600, 
					'height':500};
var chart = new google.visualization.PieChart(document.getElementById('coverSum'));
  chart.draw(data, options);

}
</script>
</body>
</html>