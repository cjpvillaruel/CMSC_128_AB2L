<div class="body width-fill background-white">
					<div class="col">
                            <div class="cell">
                                    <div class="page-header cell">
                                        <h1>Admin <small>Edit Announcement</small></h1>
                                    </div>
                                <div class="col width-fill">
                                	<div class="cell  panel">
                                		<div class="cell">
                                			<p class="tiny">Note- all fields are required</p>
                                		</div>
                                		<div class="cell">		
										<div id="edit">
											<form name="myform" action="../saveChanges/" method="post">
												<label>Title:</label><br/>
												<input type="text" name="title" class="background-white" style="margin-left: 1em; width:25em" id="title" value="<?php echo $title;?>"/> <br />
												<label>Announcement Content:</label><br/>
												<textarea cols="40" rows="5" name="content" class="background-white" style="margin-left: 1em; width:30em" id="content" /><?php echo $content; ?></textarea><br />
												<span name="help_content"></span>
												<br/>
												<input type = "hidden" name = "date" id = "date" value = "<?php echo $id;?>" />
												<input type="submit" name="save" class='float-left' id="save" value="Save Changes" style="margin: 0px 5px 10px 18em;" />
											</form>
											<form action="../" method="post">
												<input type="submit" name="cancel" id="cancel" class='float-left' value="Cancel" onclick="return confirm('Are you sure you want to cancel editing this announcement?')"/>
											</form>
										</div>
									 </div>
								</div>
							</div>
                        </div>
				</div>
			</div>