<div class="cell body">
									<p class="tiny">View Borrowed Books</p>
								</div>
								 <div class="col">
                                <div class="cell">
                                    <?php
                                        if($result != null){
                                    ?>
                                    <div class="panel datasheet">
                                        <div class="header text-center background-red">
                                            List of all books
                                        </div>
                                        <table class="body fixed">
                                            <thead>
                                                <tr>
                                                    <th style="width: 2%;">#</th>
                                                    <th style="width: 10%;" nowrap="nowrap">Course Code</th>
                                                    <th style="width: 25%;" nowrap="nowrap">Title</th>
                                                    <th style="width: 22%;" nowrap="nowrap">Author</th>
                                                    <th style="width: 10%;" nowrap="nowrap">Type</th>
                                                    <th style="width: 13%;" nowrap="nowrap">Date Borrowed</th>
                                                    <th style="width: 13%;" nowrap="nowrap">Date Due</th>
                                                    <th style="width: 10%;" nowrap="nowrap">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $count = 1;
                                                    foreach($result as $row){
                                                        echo "<tr>";
                                                        echo "<td>$count</td>";
                                                        echo "<td>".$row->subject."</td>";
                                                        echo "<td>".$row->title."</td>";
                                                        echo "<td>".$row->author."</td>";
                                                        echo "<td>".$row->type."</td>";
                                                        echo "<td>".$row->date_borrowed."</td>";
                                                        echo "<td>".$row->due_date."</td>";
                                                        echo "<td>".$row->status."</td>";
                                                        echo "</tr>";
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