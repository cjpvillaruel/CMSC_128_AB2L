<div class="body width-fill background-white">
					<div class="cell">
                        <div class="page-header cell">
                                        <h1>Admin <small>View Log</small></h1>
                        </div>
						<div class="panel datasheet cell">
	                        <div class="header background-red">
	                            List of all Logs
	                        </div>
	                        <table class="body">
                                <thead>
                                    <tr>
                                        <th style="width: 3%;">#</th>
                                        <th style="width: 10%;">Date</th>
                                        <th style="width: 25%;">Message</th>
                                        <th style="width: 15%;">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $count = 1;
											$date = "";
											foreach ($log as $iLog){
												echo "<tr><td>$count</td>";
												echo "<td>".$iLog['date']."</td>";
												echo "<td>".$iLog['message']."</td>";
												echo "<td>".$iLog['time']."</td></tr>";
												$date = $iLog['date'];
												$count++;
											} 
                                        
                                    ?>
                                </tbody>
                            </table>
	                    </div>
	                </div>
	            </div>
