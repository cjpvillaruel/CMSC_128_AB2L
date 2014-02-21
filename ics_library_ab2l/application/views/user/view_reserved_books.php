<script>
    function doconfirm()
    {
        confirm=confirm("Are you sure to cancel your reservation?");

        if(confirm!=true)
            return false;
    }
</script>

<div class="cell body">
									<p class="tiny">View Reserved Books</p>
								</div>
								 <div class="col">
                                <div class="cell">
                                    <?php 
                                            if($result != null){
                                        ?>
                                    <div class="panel datasheet">

                                        <div class="header text-center background-red">
                                            List of reserved books
                                        </div>
                                        
                                        <table class="body fixed">
                                            <thead>
                                                <tr>
                                                    <th style="width: 2%;">#</th>
                                                    <th style="width: 20%;" nowrap="nowrap">Course Code</th>
                                                    <th style="width: 35%;" nowrap="nowrap">Title</th>
                                                    <th style="width: 22%;" nowrap="nowrap">Author</th>
                                                    <th style="width: 10%;" nowrap="nowrap">Type</th>
                                                    <th style="width: 5%;" nowrap="nowrap">Rank</th>
                                                    <th style="width: 10%;" nowrap="nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $count = 1;
                                                    foreach($result as $row){//subject,title,author,type,status,call_number
                                                        echo "<tr>";
                                                            echo "<td>$count</td>";

                                                            $data['multi_valued'] = $this->model_get_list->get_book_subjects($row->id);
                                                            $subjects = "";
                                                            foreach ($data['multi_valued'] as $subject_list){
                                                                $subjects = $subjects."{$subject_list->subject}<br/>";
                                                            }
                                                            echo "<td>".$subjects."</td>";
                                                            echo "<td>".$row->title."</td>";
                                                            
                                                            $data['multi_valued'] = $this->model_get_list->get_book_authors($row->id);
                                                            $authors="";
                                                            foreach($data['multi_valued'] as $authors_list){
                                                                $authors = $authors."{$authors_list->author},";
                                                            }
                                                            echo "<td>".$authors."</td>";
                                                            
                                                            echo "<td>".$row->type."</td>";
                                                            echo "<td>".$row->rank."</td>"; 
                                                            echo "<td> 
                                                                    <form  action=\"cancel/\" method=\"post\">
                                                                        <input type='hidden' name='res_number' value='{$row->res_number}'/>
                                                                        <input type='hidden' name='call_number' value='{$row->call_number}'/>
                                                                        <input type='hidden' name='rank' value='{$row->rank}'/>
                                                                        <input type=\"submit\" onClick=\"return doconfirm();\" class='background-red' name=\"cancel_reservation\" value=\"Cancel\" /></td>
                                                                    </form>
                                                                </td>";
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
                                    <?php
                                            }
                                        else{ 
                                            echo "<hr>";
                                            echo "<h2 class='color-grey'>There is no currently reserved books!</h2>";
                                            echo "<hr>";
                                        }

                                        ?>
                                </div>
                            </div>
