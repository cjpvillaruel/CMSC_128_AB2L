<script type>
	$(function() {
   	$( "#accordion" ).accordion({ heightStyle: "content" });
 });
</script>
<div class="body width-fill background-white">
					<div class="cell">
						<div id="accordion">
											<h3>Basic Search<h3>
											<div class="col body">
												<form class="col width-3of4">
													<select class="form-elements">
														<option>Title</option>
														<option>Author</option>
														<option>Subject</option>
														<option>Publication</option>
														<option>Book Numer</option>
														<option>Any field</option>
													</select>
													<input type="text" required="required" placeholder="Search..." class="form-elements background-white"/>
													<input type="submit" value="Search" class="form-elements"/>
												</form>
											</div>
											<h3>Advanced Search<h3>
											<div class="col body">
												<form class="col width-3of4">
													<div class="cell">
														<div class="col width-1of3">
															<div class="cell">
																<label for="title">
																	<p>Title:</p>
																</label>
															</div>
														</div>
														<div class="col width-fill">
																<input type="text" id="title" placeholder="Title" class="background-white"/>
														</div>
													</div>
													<div class="cell">
														<div class="col width-1of3">
															<div class="cell">
																<label for="author">
																	<p>Author:</p>
																</label>
															</div>
														</div>
														<div class="col width-fill">
																<input type="text" id="author" placeholder="Author"/>
														</div>
													</div>
													<div class="cell">
														<div class="col width-1of3">
															<div class="cell">
																<label for="subject">
																	<p>Subject:</p>
																</label>
															</div>
														</div>
														<div class="col width-fill">
																<input type="text" id="subject" placeholder="Subject"/>
														</div>
													</div>
													<div class="cell">
														<div class="col width-1of3">
															<div class="cell">
																<label for="publication">
																	<p>Publication:</p>
																</label>
															</div>
														</div>
														<div class="col width-fill">
																<input type="text" id="publication" placeholder="Publication"/>
														</div>
													</div>
													<div class="cell">
														<div class="col width-1of3">
															<div class="cell">
																<label for="booknum">
																	<p>Book Number:</p>
																</label>
															</div>
														</div>
														<div class="col width-fill">
																<input type="text" id="booknum" placeholder="Book Number"/>
														</div>
													</div>
													<div class="cell width-1of3">
														<input type="submit" class="form-elements" value="Search"/>
													</div>
												</form>
											</div>
										</div>
	                </div>
	            </div>