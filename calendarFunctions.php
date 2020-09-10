<?php
/*
	Checks if a given year is valid
*/
function validYear($year) {
	//All years beyond 1582 are apparently fine
	return ($year >= 1583);
}

/*
	Prints a single month calendar in a table
*/
function monthCalendar($year, $month) {
	//Gets the date in a format PHP likes
	$date = strtotime("$month/1/$year");
	
	//Add year/month headings
	$printMonth = date("F", $date);
	echo "<h2 id = \"success\">$printMonth $year</h2>";
	
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
	
	//Variable to track the number of blank days at the start of a given month
	$blankDays = date("w", $date);
	
	//Variable to track the number of days in a given month
	$days = date("t", $date);

	//Variable to track where in the week the script is
	$weekTrack = 0;
	
	//Start the first row and load the leading empty spaces
	echo "<tr>";
	for($i = 0; $i < $blankDays; $i++) {
		echo "<td>&nbsp</td>";
		$weekTrack++;
	}
	
	//Load in the actual days
	for($i = 0; $i < $days; $i++) {
		$number = ($i + 1);
		echo "<td>$number</td>";
		
		$weekTrack++;
		if(($weekTrack % 7) == 0)
			echo "</tr> <tr>";
	}
	
	//Close out the table	
	echo "</tr>";
	echo "</table>";
}

/*
	Prints a full year calendar in several tables
*/
function yearCalendar($year) {
	//Calls the month calendar function for every month in a given year
	for ($i = 0; $i < 12; $i++)
		monthCalendar($year, ($i + 1));
}
?>
