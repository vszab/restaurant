$(function (){
		var number = 0;
		var selected = "";
		$("#tmr").click(function(){
			number = 1;
			$("#bookings").load("../actions/retrieve.php",{ updateable: number});
			number = 0;;
		});
		$("#ysd").click(function(){
			number = -1;
			$("#bookings").load("../actions/retrieve.php",{ updateable: number});
			number = 0;
		});
		$("#go").click(function(){
			selected = $("#datepick").val();
			$("#bookings").load("../actions/retrieve.php", {updateable: selected});
			
		});
		
		
	});