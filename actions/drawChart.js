<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Covers', 'Per service time'],
  ['Breakfast', $breakfastCovers],
  ['Lunch', $lunchCovers],
  ['Tea Time', $teaCovers],
  ['Dinner', $dinnerCovers],
]); 


var options = {'title':'Number of guests', 'width':500, 'height':400};
var chart = new google.visualization.PieChart(document.getElementById('coverSum'));
  chart.draw(data, options);

}
</script>