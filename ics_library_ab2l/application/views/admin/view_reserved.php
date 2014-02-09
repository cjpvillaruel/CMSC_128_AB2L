<!--View for Model model_reserved.php
	Displays the necessary information gathered about the reserved books in table form.
	Columns chosen were based from the sample GUI in the SRS.
	Included simple CSS for the results and table.
-->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Reserved Book</title>

<style type = "text/css">
#results{
	border:solid black 2px;
	margin: 5px;
	font-size: 20px;
}

td, th{
	border:solid black 1px;
	padding: 5px;
}
</style>
</head>

<body>
<div id="container">
	<h1>List of Reserved Books</h1>
	<?php
	//column headers
	echo "<table id = 'results'>";
	echo "<tr>";
	echo "<th>"."Course Number"."</th>";
	echo "<th>"."Title"."</th>";
	echo "<th>"."Author"."</th>";
	echo "<th>"."Type"."</th>";
	echo "<th>"."Borrower"."</th>";
	echo "<th>"."Approve"."</th>";
	echo "</tr>";
	
	//table data: results of the query
		foreach ($results as $row) {
			echo "<tr>";
			echo "<td>".$row->subject."</td>";
			echo "<td>".$row->title."</td>";
			echo "<td>".$row->author."</td>";
			echo "<td>".$row->type."</td>";
			$fullName = $row->first_name." ".$row->middle_initial." ".$row->last_name;		//concat the first, middle, and last name into full name
			echo "<td>".$fullName."</td>";
			echo "<td>"."<input type = 'button' value = 'Approve'>"."</td>";				//button to be clicked if the reservation will be approved; functionality of this not included
			echo "</tr>";
		}
	echo "</table>"
	?>
	</div>
</body>
</html>