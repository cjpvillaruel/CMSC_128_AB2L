<div class="cell body">
									<p class="tiny">SEARCH</p>
								</div>
								<div class="cell">
									<div class="cell">
										<div id="accordion" class="">
											<h3>Basic Search<h3>
											<div class="col body">
												<form method="post" id="search_form" name="search_form" class="width-3of4">
													<select class="form-elements">
														<option>Title</option>
														<option>Author</option>
														<option>Subject</option>
														<option>Publication</option>
														<option>Book Numer</option>
														<option>Any field</option>
													</select>
													<input type="text" placeholder="Search..." id="sinput" onkeyup="autosuggest(this.value);" class="autosuggest_input form-elements background-white" name="search_input" />
													<input type="button" value="Search" id="searchButton" class="form-elements" onclick="get_data();" />
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
																<input type="text" id="title" placeholder="Title" name="title" class="background-white"/>
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
																<input type="text" id="author" name="author" placeholder="Author"/>
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
																<input type="text" id="subject" name="subject" placeholder="Subject"/>
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
																<input type="text" id="publication" name="publication" placeholder="Publication"/>
														</div>
													</div>
													<div class="cell">
														<div class="col width-1of3">
															<div class="cell">
																<label for="booknumber">
																	<p>Book Number:</p>
																</label>
															</div>
														</div>
														<div class="col width-fill">
																<input type="text" id="booknumber" name="booknumber" placeholder="Book Number"/>
														</div>
													</div>
													<div class="cell width-1of3">
														<input type="button" value="Search" id="searchButton" class="form-elements" onclick="get_data();"/>
													</div>
												</form>
											</div>
											<div id="list_area"></div>
										</div>
									</div>
								</div>