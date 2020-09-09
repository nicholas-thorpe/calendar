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
			$year = $_POST['year'];
			$month = $_POST['month'];
		?>
		
		<style>
			<?php
				if (!$year && !$month)
					echo "#results {display: none;}";
			?>
		</style>
	</head>
	<body>
		<h1>Calendar Generator</h1>
		
		<form method = "post" action = "<?php echo basename($_SERVER['PHP_SELF']);?>">
			<label for = "year">Year</label>
			<input type = "text" name = "year" value = ""/>
			
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
			
			<button type = "submit" value = "Submit">Submit</button>
			<button type = "button"><a href = "<?php echo basename($_SERVER['PHP_SELF']); ?>">Reset</a></button>
		</form>
		<div id = "results">
			<?php
				if (!isValid($year)) {
			?>
			
			<h2 id = "error">Error</h2>
			
			<?php
				} else {
			?>
			
			<h2 id = "success"><?php echo $year;?></h2>
			
			<?php
				generateCalendar($year, $month, );
			?>
		</div>
	</body>
</html>
