<?php
/*
	Checks if a given year combination is valid
*/
function isValid($year) {
	//All years beyond 1582 are apparently fine
	return ($year >= 1583);
}

/*
	
*/
function displayCalendar($year, $month) {
	//Creates needed variables
	$date = strtotime("$month/1/$year");
	$weeks = date("w", $Date);
	$days = date("t", $Date);
	
	//Adds labels
	$printMonth = date("F", $date);
	echo "$printMonth\n";
	echo "$year\n";
	
	//Begin the table and load the day headings
	echo "<table>";
	echo "<tr>";
	echo "<th>Sunday</th>";
	echo "<th>Monday</th>";
	echo "<th>Tuesday</th>";
	echo "<th>Wednesday</th>";
	echo "<th>Thursday</th>";
	echo "<th>Friday</th>";
	echo "<th>Saturday</th>";
	echo "</tr>";
	
	//Start the first row and load the leading empty spaces
	echo "<tr>";
	for($i = 0; $i < $weeks; $i++) {
		echo "<td>&nbsp</td>";
		$weeks = $i;
	}
	
	//Load in the actual days
	for($i = 1; $i <= $daysInMonth; $i++) {
		echo "<td>$i</td>";
		$weeks++;
		
		if(($weeks % 7) == 0)
			echo "</tr> <tr>";
	}
	
	//Close out the table	
	echo "</tr>";
	echo "</table>";
}
?>
