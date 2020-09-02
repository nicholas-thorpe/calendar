<!DOCTYPE html>

<!-- Insert honor pledge here -->

<html lang = "en-US">
	<head>
		<meta charset = "utf-8">
		<title>Calendar</title>
	</head>
	<body>
		<h1>Calendar Generator</h1>
		
		<form action = "">
			<label for = "Year">Year</label>
			<input type = "text" name = "year" value = ""/>
			
			<label for = "Month">Month"</label>
			<select name = "month">
				<?php
					for ($1 = 0; $i < 13; $i++) {
						
					}
				?>
			</select>
			
			<button type = "submit" value = "Submit">Submit</button>
			<button type = "button"><a href = "<?php echo basename($_SERVER['PHP_SELF'];?>">Reset</a></button>
		</form>
		<div id = "results">
			
		</div>
	</body>
</html>
