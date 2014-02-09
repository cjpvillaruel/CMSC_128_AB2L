<div class="body width-fill background-white">
					<div class="cell">
<<<<<<< HEAD
                        <div class="page-header cell">
                                        <h1>Admin <small>View Books</small></h1>
                        </div>
						<div class="panel datasheet cell">
	                        <div class="header background-red">
=======
						<div class="panel datasheet cell">
	                        <div class="header">
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
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
<<<<<<< HEAD
                                        <th style="width: 15%;">Type</th>
=======
                                        <th style="width: 15%;">Status</th>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
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
                                            echo "
                                                <td>{$count}</td>
                                                <td>{$row->call_number}</td>
                                                <td>{$row->title}</td>";
                                            $data['query1'] = $this->model_book->get_book_authors($row->call_number);
                                            $authors ="";
                                            foreach($data['query1'] as $authors_list){
                                                $authors = $authors."{$authors_list->author},";
                                            }
                                            echo "<td>{$authors}</td>";
                                            $data['query1'] = $this->model_book->get_book_subjects($row->call_number);
                                            $subjects ="";
                                            foreach($data['query1'] as $subjects_list){
                                                $subjects .= "{$subjects_list->subject}, ";
                                            }
                                            echo "<td>{$subjects}</td>";
                                            echo "<td>{$row->year_of_pub}</td>
                                            <td>{$row->type}</td>
                                            <td>{$row->no_of_available}/{$row->quantity}</td>
                                            <td>
<<<<<<< HEAD
                                            <form action=\"../admin/controller_book/edit/\" method=\"post\">
                                                <input type='hidden' name='call_number' value='{$row->call_number}' />
                                                <input type=\"submit\" class='background-red' name=\"edit\" value=\"Edit\"></a>
=======
                                            <form action=\"../index.php/controller_book/edit/\" method=\"post\">
                                                <input type='hidden' name='call_number' value='{$row->call_number}' />
                                                <input type=\"button\" class='background-red' name=\"edit\" value=\"Edit\"></a>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
                                            </form></td>
                                            <td>
                                            <form action=\"../index.php/controller_book/delete/\" method=\"post\">
                                                <input type='hidden' name='call_number' value='{$row->call_number}' />
                                                <input type=\"button\" class='background-red' name=\"delete\" value=\"Delete\" ></a></td>
                                            </form>";

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
<<<<<<< HEAD
                                    <form action="<?php echo base_url(); ?>index.php/admin/controller_add_books" method='post'>
=======
                                    <form action=\"../index.php/controller_book/add_book/\" method='post'>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
                                            <input type='submit' name='add' value='Add Book' enabled/>
                                    </form>
	                    </div>
	                </div>
	            </div>