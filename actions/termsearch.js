$(function (){
		var searchterm = "";
		$("#search").click(function(){
		searchterm = $("#searchtext").val();
			$("#bookings").load("../actions/search.php", {term: searchterm});
});
});