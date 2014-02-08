<div class="body width-fill background-white">
					<div class="cell">
						<div class="panel datasheet cell">
	                        <div class="header">
	                            List of borrowed books
	                        </div>
	                        <table class="body">
                                <thead>
                                    <tr>
                                        <th style="width: 2%;">#</th>
                                        <th style="width: 15%;">Borrower's Acct no</th>
                                        <th style="width: 15%;">Borrower's Name</th>
                                        <th style="width: 15%;">Book Call Number</th>
                                        <th style="width: 15%;">Date Borrowed</th>
                                        <th style="width: 15%;">Due Date</th>
                                        <th style="width: 15%;">Date Returned</th>
                                        <th style="width: 15%;">Status</th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                <?php
                                    $date = date("Y-m-d");
                                    $count = 1;
                                    foreach($query as $row){
                                        echo "<tr>
                                                <td>$count</td>
                                                <td>{$row->account_number}</td>
                                                <td>{$row->first_name} {$row->middle_initial} {$row->last_name}</td>
                                                <td>{$row->call_number}</td>
                                                <td>{$row->date_borrowed}</td>
                                                <td>{$row->due_date}</td>
                                                <td>{$row->date_returned}</td>
                                                <td>{$row->status}</td>";
                                        if(($row->status=="overdue") && ($row->date_notif != $date)){   //If overdue and not yet notified today
                                            echo "<td>
                                            <form action='' method='post'>
                                                <input type='hidden' name='email' value='{$row->email}' />
                                                <input type='hidden' name='account_number' value='{$row->account_number}' />
                                                <input type='submit' class='background-red' name='notify' value='Notify' enabled/>
                                            </form></td>";
                                        }elseif(($row->status=="overdue") && ($row->date_notif == $date)){  //If overdue and has already been notified today
                                            echo "<td>
                                            <form action='' method='post'>
                                                <input type='hidden' name='email' value='{$row->email}' />
                                                <input type='hidden' name='account_number' value='{$row->account_number}' />
                                                <input type='submit' name='notify' value='Notified' disabled/>
                                            </form></td>";
                                        }else{
                                            $status = ucfirst($row->status);
                                            echo "<td><form action='' method='post'>
                                                <input type='hidden' name='email' value='{$row->email}' />
                                                <input type='hidden' name='account_number' value='{$row->account_number}' />
                                            <!---  <input type='submit' name='notify' value='{$status}' disabled/> ---!>
                                            </form></td>";
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
                                <form action='' method='post' class="float-right">
                                   <input type='submit' name='notify_all' value='Notify All' enabled/>
                                </form>
	                    </div>
	                </div>
	            </div>