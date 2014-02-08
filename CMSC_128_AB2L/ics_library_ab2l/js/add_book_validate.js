
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
							textfield.setAttribute("name", "author[]");
							

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
							

							// create buttons
							var button1 = document.createElement("input");
							button1.type = "button";
							button1.setAttribute("value", "Add Subject");
							button1.setAttribute("onclick", "addRow_subj(this, false)");
							button1.className = "row" + newFieldNumber;


							// add elements to page
							rowContainer.appendChild(document.createElement("BR")); // add line break
							rowContainer.removeChild(element);
							rowContainer.appendChild(textfield);
							rowContainer.appendChild(document.createTextNode(" ")); // add space
							rowContainer.appendChild(button1);
						}