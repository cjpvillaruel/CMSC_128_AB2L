<div class="body width-fill background-white">
					<div class="cell">
<<<<<<< HEAD
						<div class="page-header cell">
                                        <h1>Admin <small>View User Accounts</small></h1>
                         </div>
						<div class="panel datasheet cell">
	                        <div class="header background-red">
=======
						<div class="panel datasheet cell">
	                        <div class="header">
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
	                            List of Users
	                        </div>
	                        <table class="body">
	                            <thead>
	                                <tr>
	                                    <th style="width: 2%;">#</th>
	                                    <th style="width: 8%;">Student Number</th>
	                                    <th style="width: 20%;">Name</th>
	                                    <th style="width: 5%;">Course</th>
	                                    <th style="width: 20%;">Email</th>
	                                    <th style="width: 8%;">Classification</th>
	                                    <th style="width: 10%;">Status</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            	<?php
		                            	$count = 1;
<<<<<<< HEAD
		                                foreach ($acct as $row) {
=======
		                                foreach ($results as $row) {
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
											echo "<tr>";
											echo "<td>$count</td>";
											echo "<td>".$row->account_number."</td>";
											$fullName = $row->first_name." ".$row->middle_initial." ".$row->last_name;
											echo "<td>".$fullName."</td>";
											echo "<td>".$row->course."</td>";
											echo "<td>".$row->email."</td>";
											echo "<td>".$row->classification."</td>";
											$stat = $row->status;

											/*
												If status not yet 'approve', meaning the account was not yet validated,
												a button with a value 'Validate' will be seen in the status column.
												If status is already 'approve', meaning the account was already validated,
												'Registered' will be displayed on the said column. 
											*/

											if($stat === "approve"){
											echo "<td>"."Registered"."</td>";
											}
											else{
<<<<<<< HEAD
												echo "<form action='".base_url()."index.php/admin/controller_user/approve_user' method='POST'>";
												echo "<input type='hidden' name='account_number1' value='$row->account_number'/>";
												echo "<td>"."<input type ='submit' class='background-red' name='approve' value = 'Confirm'>"."</td>";	//'Validate' button. Functionality not included here.
										    	echo "</form>";
=======
												echo "<td>"."<input type = 'button' class='background-red' value = 'Confirm'>"."</td>";	//'Validate' button. Functionality not included here.
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
										    }
											
											echo "</tr>";
											$count++;
										}
									?>
	                            </tbody>
	                        </table>
	                        <div class="footer pagination">
	                            <ul class="nav">
	                                <li><a href="#">Prev</a></li>
	                                <li><a href="#">Next</a></li>
	                            </ul>
	                        </div>
	                    </div>
	                </div>				</div>