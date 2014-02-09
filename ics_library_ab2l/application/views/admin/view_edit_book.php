<<<<<<< HEAD
<script type="text/javascript">
                        window.onload=function() {
                            myform.call_number.onblur=validate_call_no;
                            myform.title1.onblur=validate_title;
                            myform.author.onblur=validate_author;
                            myform.subject.onblur=validate_subject;
                            myform.year_of_pub.onblur=validate_year_pub;
                            myform.quantity.onblur=validate_quantity;
                            myform.onsubmit=process_add;
                        }
                                
                        function validate_call_no() {
                            msg="Invalid input: ";
                            str=myform.call_number.value;
                                
                            if(str=="")
                            msg+="Call number is required!<br/>";
                            if(!str.match(/^[a-zA-Z0-9\ \.\-]+[a-zA-Z0-9\ \.\-]*$/))
                            msg+="Must be between 1-20 alpha numeric character!<br/>";
                            if(msg=="Invalid input: ")
                            msg="";
                            else {
                                document.getElementsByName("help_call_number")[0].style.fontSize="10px";
                                document.getElementsByName("help_call_number")[0].style.fontFamily="verdana";
                                document.getElementsByName("help_call_number")[0].style.color="red";
                            }
                            document.getElementsByName("help_call_number")[0].innerHTML=msg;
                            if(msg=="")
                                return true;
                        }

                        function validate_title() {
                            msg="Invalid input: ";
                            str=myform.title1.value;
                                
                            if(str=="")
                            msg+="Title is required!<br/>";
                            if(!str.match(/^[a-zA-Z0-9\ ]+[a-zA-Z0-9\ ]*$/))
                            msg+="Must be between 1-100 alpha numeric character!<br/>";
                            if(msg=="Invalid input: ")
                            msg="";
                            else {
                                document.getElementsByName("help_title")[0].style.fontSize="10px";
                                document.getElementsByName("help_title")[0].style.fontFamily="verdana";
                                document.getElementsByName("help_title")[0].style.color="red";
                            }
                            document.getElementsByName("help_title")[0].innerHTML=msg;
                            if(msg=="")
                                return true;
                        }


                        function validate_author() {
                            msg="Invalid input: ";
                            str=myform.author.value;
                                
                            if(str=="")
                            msg+="Author is required!<br/>";
                            if(!str.match(/^[a-zA-Z\ ]+[a-zA-Z\ ]*$/))
                            msg+="Must be between 1-100 alpha character!<br/>";
                            if(msg=="Invalid input: ")
                            msg="";
                            else {
                                document.getElementsByName("help_author")[0].style.fontSize="10px";
                                document.getElementsByName("help_author")[0].style.fontFamily="verdana";
                                document.getElementsByName("help_author")[0].style.color="red";
                            }
                            document.getElementsByName("help_author")[0].innerHTML=msg;
                            if(msg=="")
                                return true;
                        }

            
                        function validate_subject() {
                            msg="Invalid input: ";
                            str=myform.subject.value;
                                
                            if(str=="")
                            msg+="Subject is required!<br/>";
                            if(!str.match(/^[A-Z\ ]{0,5}[0-9]{1,3}$/))
                            msg+="Must be a course number!<br/>";
                            if(msg=="Invalid input: ")
                            msg="";
                            else {
                                document.getElementsByName("help_subject")[0].style.fontSize="10px";
                                document.getElementsByName("help_subject")[0].style.fontFamily="verdana";
                                document.getElementsByName("help_subject")[0].style.color="red";
                            }
                            document.getElementsByName("help_subject")[0].innerHTML=msg;
                            if(msg=="")
                                return true;
                        }


                        function validate_year_pub() {
                            msg="Invalid input: ";
                            str=myform.year_of_pub.value;
                                
                            if(str=="")
                            msg+="Year of Publication is required!<br/>";
                            if(msg=="Invalid input: ")
                            msg="";
                            else {
                                document.getElementsByName("help_year_of_pub")[0].style.fontSize="10px";
                                document.getElementsByName("help_year_of_pub")[0].style.fontFamily="verdana";
                                document.getElementsByName("help_year_of_pub")[0].style.color="red";
                            }
                            document.getElementsByName("help_year_of_pub")[0].innerHTML=msg;
                            if(msg=="")
                                return true;
                        }

                        function validate_quantity() {
                            msg="Invalid input: ";
                            str=myform.quantity.value;
                                
                            if(str=="")
                            msg+="Quantity is required!<br/>";
                            if(msg=="Invalid input: ")
                            msg="";
                            else {
                                document.getElementsByName("help_quantity")[0].style.fontSize="10px";
                                document.getElementsByName("help_quantity")[0].style.fontFamily="verdana";
                                document.getElementsByName("help_quantity")[0].style.color="red";
                            }
                            document.getElementsByName("help_quantity")[0].innerHTML=msg;
                            if(msg=="")
                                return true;
                        }
                        
                        
                        function process_add() {
                            if (validate_call_no() && validate_title() && validate_author() && validate_subject() && validate_year_pub() && validate_quantity()) {
                                <?php
                                    if(isset($_POST['submit'])){
                                        
                                    }
                                ?>
                            }
                            else 
                                return false;
                        }

                        function addRow_author(element, indentFlag){
                            var maxFieldWidth = "500";
                            var elementClassName = element.className; // this is the class name of the button that was clicked
                            var fieldNumber = elementClassName.substr(3, elementClassName.length);

                            var newFieldNumber = ++fieldNumber;
                            var rowContainer = element.parentNode; // get the surrounding div so we can add new elements

                            // create text field
                            var textfield = document.createElement("input");
                            textfield.type = "text";
                            textfield.setAttribute("name","authors[]");
                            textfield.setAttribute("placeholder","Author's Name");
                            textfield.setAttribute("required","required");
                            textfield.setAttribute("class","background-white");

                            // create buttons
                            var button1 = document.createElement("input");
                            button1.type = "button";
                            button1.setAttribute("value", "Add Author");
                            button1.setAttribute("onclick", "addRow_author(this, false)");
                            button1.className = "row" + newFieldNumber;


                            // add elements to page
                            //
                            rowContainer.appendChild(textfield);
                            rowContainer.removeChild(element);
                            rowContainer.appendChild(document.createTextNode(" ")); // add space
                            rowContainer.appendChild(button1);
                            rowContainer.appendChild(document.createElement("BR")); // add line break

                        }

                        function addRow_subj(element, indentFlag){
                            var maxFieldWidth = "500";
                            var elementClassName = element.className; // this is the class name of the button that was clicked
                            var fieldNumber = elementClassName.substr(3, elementClassName.length);

                            var newFieldNumber = ++fieldNumber;
                            var rowContainer = element.parentNode; // get the surrounding div so we can add new elements

                            // create text field
                            var textfield = document.createElement("input");
                            textfield.type = "text";
                            textfield.setAttribute("name", "subject[]");
                            textfield.setAttribute("placeholder","Book Subject");
                            textfield.setAttribute("required","required");
                            textfield.setAttribute("class","background-white");
                            

                            // create buttons
                            var button1 = document.createElement("input");
                            button1.type = "button";
                            button1.setAttribute("value", "Add Subject");
                            button1.setAttribute("onclick", "addRow_subj(this, false)");
                            button1.className = "row" + newFieldNumber;


                            // add elements to page
                            rowContainer.removeChild(element);
                            rowContainer.appendChild(textfield);
                            rowContainer.appendChild(document.createTextNode(" ")); // add space
                            rowContainer.appendChild(button1);
                            rowContainer.appendChild(document.createElement("BR")); // add line break
                        }
</script>
<div class="body width-fill background-white">
                    <div class="col">
                            <div class="cell">
                                    <div class="page-header cell">
                                        <h1>Admin <small>Edit Books</small></h1>
                                    </div>
                                <div class="col width-fill">
                                    <div class="col">
                                        <div class="cell panel">
                                            <p class="tiny cell">Note: *- required fields</p>
=======
<div class="body width-fill background-white">
					<div class="col">
                            <div class="cell">
                                <div class="col width-fill">
                                    <div class="col">
                                        <div class="cell panel">
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
                                            <div class="body">
                                                <div class="cell">
                                                    <div class="col">
                                                        <div class="cell">
<<<<<<< HEAD
                                                            <form name = "myform" action="<?php echo base_url() ?>index.php/admin/controller_book/edit_book" method="post">
=======
                                                            <form name = "myform">
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="title">Title<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
<<<<<<< HEAD
                                                                            <input type = "text" name = "title" value="<?php echo $book[0]->title ;?>" />&nbsp;<span name="help_title" class="color-red"></span><br/>
=======
                                                                            <input type="text" id="title" name="booktitle" placeholder="Title of the Book"  data-required="true">&nbsp;<span name="helptitle" class="color-red"></span><br/>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="author">Author<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
<<<<<<< HEAD
                                                                    <div class="col width-fit">
                                                                        <div class="cell">
                                                                            <?php 
                                                                                $authors = $this->model_book->get_book_authors($book[0]->call_number);
                                                                                foreach ($authors as $author) {
                                                                                    echo '<input type = "text" name = "author[]" value="'.$author->author.'"><br/>';
                                                                                }
                                                                            ?>&nbsp;<span name="help_author" class="color-red"></span>
                                                                            <input type="button" class="row1 cell" value="Add author" onclick="addRow_author(this, false)">
                                                                            
                                                                            <br/>
                                                                        </div>
                                                                    </div>
                    
=======
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="text" id="author" name="author" placeholder="Author's Name"  data-required="true">&nbsp;<span name="helpauthor" class="color-red"></span><br/>
                                                                        </div>
                                                                    </div>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="callno">Call Number<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
<<<<<<< HEAD
                                                                            <input type = "text" name = "call_number" value="<?php echo $book[0]->call_number ;?>" disabled />&nbsp;<span name="help_call_number" class="color-red"></span><br/>
=======
                                                                            <input type="text" id="callno" name="callno" placeholder="Call number of the book" data-required="true">&nbsp;<span name="helpcallno" class="color-red"></span><br/>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                 <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="subject">Subject<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
<<<<<<< HEAD
                                                                    <div class="col width-fit">
                                                                        <div class="cell">
                                                                            <?php 
                                                                            $subjects = $this->model_book->get_book_subjects($book[0]->call_number);
                                                                            foreach ($subjects as $subject) {
                                                                                echo '<input type = "text" name = "subject[]" value="'.$subject->subject.'" /><br/>';
                                                                            }
                                                                            ?>
                                                                            &nbsp;<span name="help_subject" class="color-red"></span>
                                                                            <input type="button" class="row2 cell" value="Add subject" onclick="addRow_subj(this, false)"/>
                                                                            <br/>
=======
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="text" id="subject" name="subject" placeholder="Book Subject" data-required="true">&nbsp;<span name="helpsubject" class="color-red"></span><br/>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                 <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="yearpub">Year of Publication<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
<<<<<<< HEAD
                                                                            <input type = "number" name = "year_of_pub" min=1900 max="<?php echo date("Y"); ?>" value="<?php echo $book[0]->year_of_pub ;?>" />&nbsp;<span name="help_year_pub" class="color-red"></span><br/>
                                                                            
=======
                                                                            <input type="number" id="yearpub" name="yearpub" data-required="true">&nbsp;<span name="helpyearpub" class="color-red"></span><br/>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="booktype">Type of the Book<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
<<<<<<< HEAD
                                                                            <select name="type">
                                                                                <?php
                                                                                $types = array("Book", "SP", "Thesis");
                                                                                foreach($types as $type){
                                                                                    if($type == $book[0]->type){
                                                                                        echo "<option value=\"$type\" selected=\"selected\">";
                                                                                    }else{
                                                                                        echo "<option value=\"$type\">";
                                                                                    }
                                                                                    $type = strtoupper($type);
                                                                                    echo "$type</option>";
                                                                                }
                                                                            ?>
                                                                            </select>
                                                                            
=======
                                                                            <input type="text" id="booktype" name="booktype" placeholder="Type of the Book" data-required="true">&nbsp;<span name="helpbooktype" class="color-red"></span><br/>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="available">Number of Available Copies of the Book<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="number" id="available" name="available" data-required="true">&nbsp;<span name="helpavailable" class="color-red"></span><br/>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
<<<<<<< HEAD
                                                                            <label for="total">Quantity<span class="color-red"> *</span></label>
=======
                                                                            <label for="total">Total Number of the Book<span class="color-red"> *</span></label>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
<<<<<<< HEAD
                                                                            <input type = "number" name = "quantity" min=1 max=50 value="<?php echo $book[0]->quantity ;?>" />&nbsp;<span name="helpquantity" class="color-red"></span><br/>
=======
                                                                            <input type="number" id="total" name="total" data-required="true">&nbsp;<span name="helptotal" class="color-red"></span><br/>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
<<<<<<< HEAD
                                                                            <label for="total">No of Available<span class="color-red"> *</span></label>
=======
                                                                            <label for="bookstatus">Book Status<span class="color-red"> *</span></label>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
<<<<<<< HEAD
                                                                            <input type = "text" name = "no_of_available" value="<?php echo $book[0]->no_of_available ;?>"/>&nbsp;<span name="helpquantity" class="color-red"></span><br/>
=======
                                                                            <input type="number" id="bookstatus" name="bookstatus" data-required="true">&nbsp;<span name="helpbookstatus" class="color-red"></span><br/>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
<<<<<<< HEAD
                                                                            </br><input type = "submit" name = "submit" value = "Submit" onclick="process_add()">
                                                                            <input type = "hidden" name = "call_number1" value="<?php echo $book[0]->call_number ;?>" />
=======
                                                                            </br><button class="button" type="submit">Submit</button>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<<<<<<< HEAD
                </div>
=======
				</div>
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
