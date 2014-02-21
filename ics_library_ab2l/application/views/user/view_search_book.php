<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script src="<?php echo  base_url() ?>js/module/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo  base_url() ?>js/module/jquery/global.js" type="text/javascript"></script>
<script src="<?php echo  base_url() ?>js/jquery-ui.js"></script>
	
<script type = "text/javascript">
	var base_url = "<?php echo base_url() ?>";
	$(function() {
	$( "#accordion" ).accordion({
   		heightStyle: "content"
   	});
   	$("#accordion").accordion({
        activate: function (event, ui) { 
	        active = $( "#accordion" ).accordion( "option", "active" );
	 		if(active == 1){
	 			$('#sinput').val("");
	 		}
	 		else{
	 			$('#title').val("");
	 			$('#author').val("");
	 			$('#subject').val("");
	 			$('#year_of_pub').val("");
	 			$('#tag_name').val("");
	 		}
 		}
    });
   		
 });
</script>
<div class="body width-fill background-white">
	<div class="cell">
		<div id="accordion">
			<h3>Basic Search<h3>
			<div class="col body">
				<form method="post" id="search_form" name="search_form" class="col width-3of4">
					<select id="category" name="category" class="form-elements">
						<option value="title">Title</option>
						<option value="author">Author</option>
						<option value="subject">Subject</option>
						<option value="year_of_pub">Publication</option>
						<option value="tag_name">Tag</option>
					</select>
					<input type="text" required="required" placeholder="Search..." class="form-elements background-white" id="sinput" name="sinput" onkeyup="autosuggest(this.value, category.value, 'user');" />
					<input type="button" value="Basic Search" class="form-elements" onclick="get_data1('user');"/><br/><br/><br/>
					<div class="autosuggest" id="autosuggest_list"></div>
				</form>
			</div>
			<h3>Advanced Search<h3>
			<div class="col body">
				<form method="post" id="search2_form" name="search2_form" class="col width-3of4">
					<div class="cell">
						<div class="col width-1of3">
							<div class="cell">
								<label for="title">
									<p>Title:</p>
								</label>
							</div>
						</div>
						<div class="col width-fill">
								<input type="text" id="title" name="title" placeholder="Title" class="background-white"/>
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
								<label for="year_of_pub">
									<p>Publication:</p>
								</label>
							</div>
						</div>
						<div class="col width-fill">
								<input type="text" id="year_of_pub" name="year_of_pub" placeholder="Publication"/>
						</div>
					</div>
					<div class="cell">
						<div class="col width-1of3">
							<div class="cell">
								<label for="tag_name">
									<p>Tag:</p>
								</label>
							</div>
						</div>
						<div class="col width-fill">
								<input type="text" id="tag_name" name="tag_name" placeholder="Tag"/>
						</div>
					</div>
					<div class="cell width-1of3">
						<input type="button" value="Advanced Search" class="form-elements" onclick="get_data2('user');" />
					</div>
				</form>
			</div>
		</div>
    </div>
	<div id="list_area"></div>
</div>