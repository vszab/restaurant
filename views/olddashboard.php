<div class="container">
		<h2>Leave a message for your coworkers</h2>
		<h3><?php echo "Today is ". getTodaysDate().""?></h3>
	</div>
<span>
	<div class="container">
		<label for="message">Their comment: </label>
		<?php
		$render = "SELECT * FROM dashboard (comments)
						 VALUES ('$message')";
		?>
	</div>
		<?php 
		$day = getTodaysDate();
		//echo showDashboard();
		
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$message = $info = "";
			$message = $_POST['message'];
			$message = stripslashes(trim($message));
			$message = mysqli_real_escape_string($link,$message);
			$sql = "INSERT INTO dashboard (comments)
						 VALUES ('$message')";
								 
			$success = mysqli_query($link,$sql);
			if($success === false) {
				echo mysqli_error($link);
			} else {
				//header("Location: bookings.php?=time");
				$info .= '<p>Comment has been recorded</p>';
			}
			
			echo $info;
				}
	?>
	
	<div class="container">
	<form id="dboard" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="form group">
				<label for="message">Your comment: </label>
				<textarea name="message" id ="dash" rows="4" cols="15" class="form-control" form="dboard" value=""> </textarea>			
			</div>
		
			<div class="form group">
				<input type="submit" class="btn btn-primary" name="submit" value="Submit">
			</div>
	</form>
	</div>
</span>