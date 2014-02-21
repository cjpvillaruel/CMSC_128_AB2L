<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<title><?php echo $page_title;?></title>
</head>
<body>
	<form method="post" id="reserve_form" name="reserve_form">
		<div id="info_area">
			<li><b>Borrower: </b><?=$borrower;?></li>
			<li><b>Title: </b><?=$title;?></li>
			<li><b>Author/s: </b>
			<?php
				foreach ($author as $value) {
					echo $value."<br/>";
				}
			?></li>
			<li><b>Year of Publication: </b><?=$year_of_pub?>
			<li><b>Type: </b><?=$type?></li>
			<li><b>Current Date (DD/MM/YYYY): </b><?=$date_reserved['mday']."/".$date_reserved['mon']."/".$date_reserved['year'];?></li>
			<li><b>Expected Expiration Date of Reservation (if book is reserved now): </b><?=$date_expire['mday']."/".$date_expire['mon']."/".$date_expire['year']?></li>
			<a href="/ics_library_ab2l/index.php/admin/controller_reserve_book/confirm_reservation"><input type="button" value="Confirm Reservation" id="confirmButton"></a>
			
		</div>
	</form>
</body>
</html>