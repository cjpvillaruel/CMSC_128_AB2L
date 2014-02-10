<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Uses explode to split the file, array_shift to remove the first element and returns its value,
and info to get row data.
*/

$counter = 0;
$txt_file = file_get_contents('./application/announcements.txt');
$rows = explode("*", $txt_file);
array_shift($rows);

foreach($rows as $row => $data)
{
	$counter = $counter + 1;
	$data1 = explode("^",$data);
	$info[$row]['date'] = $data1[0];
	$info[$row]['tc'] = $data1[1];

	if($counter>5) break;
	echo 'Date: ' . ($date=$info[$row]['date']) . '<br />';

	array_shift($data1);

	foreach($data1 as $row => $data2)
	{
		$row_data = explode('#', $data2);
		$info[$row]['title'] = $row_data[0];
		$info[$row]['content'] = $row_data[1];

		echo 'Title: ' . $info[$row]['title'] . '<br />';
		echo 'Content: ' . $info[$row]['content'] . '<br />';
		
		echo "<form action='../controller_announcement/find' method='post'>
				<input type='hidden' name='date' value='{$date}' />
				<input type='submit' name='edit' value='Edit' enabled/>
				<input type='submit' name='delete' value='Delete' onclick=\"return confirm('Are you sure you want to delete this announcement?')\" enabled/>
				</form>";
	}
	
}
	echo "<form action='../controller_announcement/viewForm' method='post'>
			<input type='submit' name='new' value='Add New Announcement' enabled/>
		</form>
		<form action='../controller_announcement/deleteAll' method='post'>
			<input type='submit' name='delete_all' value='Delete All Announcements' onclick=\"return confirm('Are you sure you want to delete all announcements?\\nThis cannot be undone!')\"enabled/>
		</form>";
?>