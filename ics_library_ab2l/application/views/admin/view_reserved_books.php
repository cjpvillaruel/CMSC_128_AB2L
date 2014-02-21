<div class="body width-fill background-white">
					<div class="cell">
                        <div class="page-header cell">
                                        <h1>Admin <small>View Borrowed Books</small></h1>
                        </div>
                        <?php
                            if($overdue != NULL){
                        ?>
						<div class="panel datasheet cell">
	                        <div class="header background-red">
	                            List of overdue books
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
                                        <th style="width: 15%;"></th>
                                        <th style="width: 15%;"></th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                <?php
                                    $date = date("Y-m-d");
                                    $count = 1;
                                    foreach($overdue as $row){
                                        echo "<tr>
                                                <td>$count</td>
                                                <td>{$row->account_number}</td>
                                                <td>{$row->first_name} {$row->middle_initial} {$row->last_name}</td>
                                                <td>{$row->call_number}</td>
                                                <td>{$row->date_borrowed}</td>
                                                <td>{$row->due_date}</td>";
                                        if(($row->status=="overdue") && ($row->date_notif != $date)){   //If overdue and not yet notified today
                                            echo "<td>
                                            <form action='controller_outgoing_books/send_email' method='post'>
                                                <input type='hidden' name='email' value='{$row->email}' />
                                                <input type='hidden' name='account_number' value='{$row->account_number}' />
                                                <input type='submit' class='background-red' name='notify' value='Notify' enabled/>
                                            </form></td>";
                                        }elseif(($row->status=="overdue") && ($row->date_notif == $date)){  //If overdue and has already been notified today
                                            echo "<td>
                                            <form action='controller_outgoing_books/send_email' method='post'>
                                                <input type='hidden' name='email' value='{$row->email}' />
                                                <input type='hidden' name='account_number' value='{$row->account_number}' />
                                                <input type='submit' name='notify' value='Notified' disabled/>
                                            </form></td>";
                                        }
                                        echo "<td><form action='controller_reservation/extend' method='post'>
                                                <input type='hidden' name='res_number' value='{$row->res_number}' />
                                                <input type='submit' class='background-red' name='extend' value='Extend' />
                                                </form></td>";
                                        echo "<td><form action='controller_outgoing_books/return_book/' method='post'>
                                                <input type='hidden' name='res_number' value='{$row->res_number}' />
                                                <input type='submit' class='background-red' name='return' value='Return' />
                                            </form></td>";
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
                                <form action='controller_outgoing_books/send_email' method='post' class="float-right">
                                   <input type='submit' name='notify_all' value='Notify All' enabled/>
                                </form>
	                    </div>
                        <?php
                            }
                            else{
                                echo "<hr>";
                                echo "<h2 class='color-grey'>There is no currently overdue books!</h2>";
                                echo "<hr>";
                            }
                            if($query != NULL){
                        ?>

                        <div class="panel datasheet cell">
                            <div class="header background-red">
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
                                        <th style="width: 15%;"></th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                <?php
                                    $date = date("Y-m-d");
                                    $count = 1;
                                    $base = base_url();
                                    foreach($query as $row){
                                        echo "<tr>
                                                <td>$count</td>
                                                <td>{$row->account_number}</td>
                                                <td>{$row->first_name} {$row->middle_initial} {$row->last_name}</td>
                                                <td>{$row->call_number}</td>
                                                <td>{$row->date_borrowed}</td>
                                                <td>{$row->due_date}</td>";
                                        echo "<td><form action='$base/index.php/admin/controller_reservation/extend' method='post'>
                                                <input type='hidden' name='res_number' value='{$row->res_number}' />
                                                <input type='submit' class='background-red' name='extend' value='Extend' />
                                                </form></td>";
                                        echo "<td><form action='$base/index.php/admin/controller_outgoing_books/return_book/' method='post'>
                                                <input type='hidden' name='res_number' value='{$row->res_number}' />
                                                <input type='submit' class='background-red' name='return' value='Return' />
                                            </form></td>";
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
                                <!--<form action='' method='post' class="float-right">
                                   <input type='submit' name='notify_all' value='Notify All' enabled/>
                                </form>-->
                        </div>
                        <?php
                            }
                            else{
                                echo "<hr>";
                                echo "<h2 class='color-grey'>There is no currently borrowed books!</h2>";
                                echo "<hr>";

                            }
                        ?>
	       </div>
</div>