<script type="text/javascript">
			window.onload=function() {
				myform.content.onblur=validate_content;
				myform.onsubmit=process_add;
			}
					
			function validate_content() {
				msg="Invalid input: ";
				str=myform.content.value;
					
				if(str=="")
				msg+="The content field is empty! There's no sense posting this kind of announcement!<br/>";
				if(msg=="Invalid input: ")
				msg="";
				else {
					document.getElementsByName("help_content")[0].style.fontSize="10px";
					document.getElementsByName("help_content")[0].style.fontFamily="verdana";
					document.getElementsByName("help_content")[0].style.color="red";
				}
				document.getElementsByName("help_content")[0].innerHTML=msg;
				if(msg=="")
					return true;
			}

			
			function process_add() {
				if (validate_content()) {
					<?php
						if(isset($_POST['submit'])){
							
						}
					?>
				}
				else 
					return false;
			}
		</script>

<div class="body width-fill background-white">
					<div class="col">
                            <div class="cell">
                                    <div class="page-header cell">
                                        <h1>Admin <small>Add Announcement</small></h1>
                                    </div>
                                <div class="col width-fill">
                                	<div class="cell  panel">
                                		<div class="cell">
                                			<p class="tiny">Note- all fields are required</p>
                                		</div>
                                		<div class="cell">		
										<div id="add">
											<form action="" method="post">
												<label>Title:</label><br/>
												<input type="text" name="title" id="title" class="background-white" style="margin-left: 1em; width:25em" placeholder="Title" required="required" /><br/><br/>
												<label>Announcement Content:</label><br/>
												<textarea cols="40" rows="5" name="content" class="background-white" style="margin-left: 1em; width:30em" id="content" placeholder="Content" required="required"></textarea><br /><br/>
												<input type="submit" name="add" style="margin-left:18em" id="add" value="Add Anouncement"/>
												<br/><br/>
												<!--<input type="submit" name="cancel" id="cancel" value="Cancel"/>-->
											</form>
										</div>
									 </div>
								</div>
							</div>
                        </div>
				</div>
			</div>