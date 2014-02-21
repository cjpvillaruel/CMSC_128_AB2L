<div class="cell body">
									<p class="tiny">View Books</p>
								</div>
								 <div class="col">
                                <div class="cell">
                                    <div class="panel datasheet">
                                        <div class="header text-center background-red">
                                            List of all books
                                        </div>
                                        <table class="body fixed">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%;">#</th>
                                                    <th style="width: 15%;" nowrap="nowrap">Course Code</th>
                                                    <th style="width: 35%;" nowrap="nowrap">Title</th>
                                                    <th style="width: 22%;" nowrap="nowrap">Author</th>
                                                    <th style="width: 8%;" nowrap="nowrap">Type</th>
                                                    <th style="width: 10%;" nowrap="nowrap">Availability</th>
                                                    <th style="width: 13%;" nowrap="nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $count = 1;
                                                    foreach($result as $row){
                                                        echo "<tr>";
                                                        echo "<td>$count</td>";
                                                        $this->load->model('model_get_list');
                                                        $data['multi_valued'] = $this->model_get_list->get_book_subjects($row->id);
                                                        $subject="";
                                                        foreach($data['multi_valued'] as $subject_list){
                                                            $subject = $subject."{$subject_list->subject}<br/>";
                                                        }
                                                        echo "<td>".$subject."</td>";
                                                        echo "<td>".$row->title."</td>";
                                                        $data['multi_valued'] = $this->model_get_list->get_book_authors($row->id);
                                                        $authors="";
                                                        foreach($data['multi_valued'] as $authors_list){
                                                            $authors = $authors."{$authors_list->author},";
                                                        }
                                                        echo "<td>".$authors."</td>";
                                                        echo "<td>".$row->type."</td>";
                                                        echo "<td>".$row->no_of_available. "/" . $row->quantity."</td>";
                                                        if($row->no_of_available != 0)
                                                            echo "<td><form method='POST' action='controller_reserve_book/verify_login/$row->id'>
                                                            <input type='submit' class='background-red table-button' value='Reserve Book'>
                                                        </form>
                                                        </td>";
                                                        else
                                                            echo "<td>No Available Book</td>";
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