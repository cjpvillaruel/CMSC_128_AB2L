<div class="body width-fill background-white">
					<div class="cell">
						<div class="page-header cell">
                                        <h1>Admin <small>Outgoing Books</small></h1>
                                    </div>
						<div class="panel datasheet cell">
	                        <div class="header background-red">
	                            List of outgoing books
	                        </div>
	                        <table class="body">
	                            <thead>
	                                <tr>
	                                    <th style="width: 2%;">#</th>
	                                    <th style="width: 10%;">Call Number</th>
	                                    <th style="width: 10%;">Course Number</th>
	                                    <th style="width: 20%;">Title</th>
	                                    <th style="width: 15%;">Author</th>
	                                    <th style="width: 10%;">Type</th>
	                                    <th style="width: 10%;">Borrower's Account Number</th>
	                                    <th style="width: 20%;">Borrower</th>
	                                    <th style="width: 10%;"></th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            	<?php
	                            	$count = 1;
	                                foreach($results as $row) {
										echo "<tr>";
										echo "<td>{$count}</td>";
										echo "<td>{$row->call_number}</td>";
										echo "<td>{$row->subject}</td>";
										echo "<td>{$row->title}</td>";
										echo "<td>{$row->author}</td>";
										echo "<td>{$row->type}</td>";
										echo "<td>{$row->account_number}</td>";
										$fullName = $row->first_name." ".$row->middle_initial." ".$row->last_name;		//concat the first, middle, and last name into full name
										echo "<td>{$fullName}</td>";
										echo "<td>"."<input type = 'submit' class='background-red' value = 'Confirm'>"."</td>";				//button to be clicked if the reservation will be approved; functionality of this not included
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
	                </div>				
	            </div>