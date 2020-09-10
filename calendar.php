<!DOCTYPE html>

<!-- On my honor, I have neither given nor received any academic aid or information that would violate the Honor Code of Mars Hill University.  -->

<html lang = "en-US">
	<head>
		<meta charset = "utf-8">
		<title>Calendar</title>
		<link rel = "stylesheet" href = "calendar.css"/>
		
		<?php require "calendarFunctions.php"?>
		<?php
			//Declare time variables using POST
			//The function could also work with GET but POST is better
			$year = $_POST['year'];
			$month = $_POST['month'];
		?>
		
		<style>
			<?php
				//Don't display results if the user hasn't done anything or reset
				if (!$year && !$month)
					echo "#results {display: none;}";
			?>
		</style>
	</head>
	<body>
		<h1>Calendar Generator</h1>
		
		<form method = "post" action = "<?php echo basename($_SERVER['PHP_SELF']);?>">
			<!-- Do I have to comment on everything cause if so this is gonna be annoying -->
			<!-- Oh well, this is what's known as a "label" and a "text box" -->
			<label for = "year">Year</label>
			<input type = "text" name = "year" value = ""/>
			
			<!-- The label needs no explaining but there's something funky with that select -->
			<label for = "month">Month</label>
			<select name = "month">
				<?php
					//Place the blank month option
					echo "<option value = '0'></option>";
					
					//Place the options for January-December
					for ($i = 1; $i < 13; $i++) {
						$monthOp = "2000-" . $i . "-01";
						$monthOp = strtotime($monthOp);
						$monthOp = date("F", $monthOp);
						echo "<option value = '$i'>$monthOp</option>";
					}
					
					//Place the option for the whole year
					echo "<option value = '13'>Whole Year</option>";
				?>
			</select>
			<!-- Whew -->
			
			<!-- One tries to print a calendar, one tries to not print anything -->
			<button type = "submit" value = "Submit">Submit</button>
			<button type = "button"><a href = "<?php echo basename($_SERVER['PHP_SELF']); ?>">Reset</a></button>
		</form>
		
		<div id = "results">
			<?php
				//Hannah added this and I don't know why but OK
				date_default_timezone_set("America/New_York");
				
				//If it's an invalid year, the script freaks out
				//Otherwise, it prints things like the levelheaded child it is
				if ($month == 0) {
					echo "<h2 id = \"error\">Error</h2>";
					echo "<p>ERROR: Please enter a month</p>";
				} else if (!is_numeric($year)) {
					echo "<h2 id = \"error\">Error</h2>";
					echo "<p>ERROR: Year must be numeric</p>";
				} else if (!validYear($year)) {
					echo "<h2 id = \"error\">Error</h2>";
					echo "<p>ERROR: Year must be 1583 or later</p>";
				} else if ($month < 0 || $month > 13) {
					echo "<p>Hey buddy quit messing with my code</p>";
				} else if ($month == 13) {
					yearCalendar($year);
				} else {
					monthCalendar($year, $month);
				}
			?>
		</div>
	</body>
</html>
