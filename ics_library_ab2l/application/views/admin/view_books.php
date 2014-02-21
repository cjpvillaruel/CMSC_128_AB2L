<div class="body width-fill background-white">
                    <div class="cell">
                        <div class="page-header cell">
                                        <h1>Admin <small>View Books</small></h1>
                        </div>
                        <div class="panel datasheet cell">
                            <div class="header background-red">
                                List of all books
                            </div>
                            <table class="body">
                                <thead>
                                    <tr>
                                        <th style="width: 3%;">#</th>
                                        <th style="width: 10%;">Call Number</th>
                                        <th style="width: 25%;">Title</th>
                                        <th style="width: 15%;">Author</th>
                                        <th style="width: 10%;">Subject</th>
                                        <th style="width: 10%;">Year</th>
                                        <th style="width: 15%;">Type</th>
                                        <th style="width: 5%;">Qty</th>
                                        <th style="width: 8%;"></th>
                                        <th style="width: 8%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $count = 1;
                                        foreach($query as $row){
                                            echo "<tr>";
                                            echo "<td>$count</td>";
                                            $data['query1'] = $this->model_book->get_book_call_numbers($row->id);
                                            $call_number="";
                                            foreach($data['query1'] as $call_number_list){
                                                $call_number .= "{$call_number_list->call_number}<br/> ";
                                            }
                                            echo "<td>{$call_number}</td>
                                            <td>{$row->title}</td>";
                                            $data['query1'] = $this->model_book->get_book_authors($row->id);
                                            $authors ="";
                                            foreach($data['query1'] as $authors_list){
                                                $authors .= "{$authors_list->author}<br/> ";
                                            }
                                            echo "<td>{$authors}</td>";
                                            $data['query1'] = $this->model_book->get_book_subjects($row->id);
                                            $subjects ="";
                                            foreach($data['query1'] as $subjects_list){
                                                $subjects .= "{$subjects_list->subject}<br/> ";
                                            }
                                            echo "<td>{$subjects}</td>";
                                            echo "<td>{$row->year_of_pub}</td>
                                            <td>{$row->type}</td>
                                            <td>{$row->no_of_available}/{$row->quantity}</td>

                                            <td>
                                            <form action=\"../admin/controller_book/edit/\" method='post'>
                                                <input type=\"hidden\" name=\"id\" value=\"{$row->id}\" />
                                                <input type='submit' class='background-red' name='edit' value='Edit' enabled/>
                                            </form>
                                            </td>
                                            <td>
                                            <form action=\"controller_book/delete/\" method='post'>
                                                <input type=\"hidden\"  name=\"id\" value=\"{$row->id}\" />
                                                <input type='submit' name='delete' class='background-red' value='Delete' onclick=\"return confirm('Are you sure you want to delete this book entry?\\nThis cannot be undone!')\" enabled/>
                                            </form>
                                            </td>
                                            </tr>";

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
                                    <form action="<?php echo base_url(); ?>index.php/admin/controller_add_books" method='post'>
                                            <input type='submit' name='add' value='Add Book' enabled/>
                                    </form>
                        </div>
                    </div>
                </div>