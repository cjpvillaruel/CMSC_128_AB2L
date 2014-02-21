<div class="body width-fill background-white">
	<div class="cell">

<?php

/*
Uses explode to split the file, array_shift to remove the first element and returns its value,
and info to get row data.
*/

$counter = 0;
$txt_file = file_get_contents('./application/announcements.txt');
$rows = explode("*", $txt_file);
array_shift($rows);
if($rows != NULL){
foreach($rows as $row => $data)
{
	$counter = $counter + 1;
	$data1 = explode("^",$data);
	$info[$row]['date'] = $data1[0]; 
	$info[$row]['tc'] = $data1[1];

	if($counter>5) break;
	//echo 'Date: ' . ($date=$info[$row]['date']) . '<br />';

	array_shift($data1);

	foreach($data1 as $row1 => $data2)
	{
		$row_data = explode('#', $data2);
		$info[$row1]['title'] = $row_data[0];
		$info[$row1]['content'] = $row_data[1];

		echo "<div class='panel cell'>";
		echo "<div class='gradient header'>Title: {$info[$row1]['title']}
		<form action='controller_announcement/find/' class='float-right' method='post'>
				<input type='hidden' name='date' ' value='{$info[$row]['date']}' />
				<input type='submit' name='edit' style='height:1.5em; font-size: 10px; line-height: 0px;' value='Edit' enabled/>
				<input type='submit' name='delete' value='Delete' style='height:1.5em; font-size:10px; line-height: 0px;' onclick=\"return confirm('Are you sure you want to delete this announcement?')\" enabled/>
				</form><br/>
		Date: {$info[$row]['date']}
				</div>";
		echo "<div class='body'>";
		echo "<div class='cell'>";
		echo "<div>";
		echo "</div>";
		echo "{$info[$row1]['content']}<br/>";
		echo "</div>";
		echo "</div>";
		echo "</div><hr/>";
	}
	
}
}
else{
	echo "<div class='cell'><h2>There is no Announcements!</h2></div><hr/>";
}


	echo "<form action='controller_announcement/deleteAll/' class='float-right' style='margin-left: 5px;' method='post'>
			<input type='submit' name='delete_all' value='Delete All Announcements' onclick=\"return confirm('Are you sure you want to delete all announcements?\\nThis cannot be undone!')\"enabled/>
		</form>
		<form action='controller_announcement/viewForm/' class='float-right' method='post'>
			<input type='submit' name='new' value='Add New Announcement' enabled/>
		</form>

		";
?>