<!DOCTYPE html>

<!-- Insert honor pledge here -->

<html lang = "en-US">
	<head>
		<meta charset = "utf-8">
		<title>Calendar</title>
		
		<?php include "calendarFunctions.php" ?>
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
		
		<form method = "post" action = "">
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
				?>
			</select>
			
			<button type = "submit" value = "Submit">Submit</button>
			<button type = "button"><a href = "<?php echo basename($_SERVER['PHP_SELF']); ?>">Reset</a></button>
		</form>
		<div id = "results">
			
		</div>
	</body>
</html>
