<html>
<head>
	<title>Administrator Login</title>
	<link href="<?php echo base_url(); ?>style/admin/admin-style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url(); ?>style/admin/build-full.css" rel="stylesheet" type="text/css" media="all"/>
</head>

<body>
	<div id="main">
	<div id="lock" class="width-1of2">
		<div id="white" class="cell background-white">
			<div class="cell">
				<div id="lock-pic" class="width-1of4 col">
				</div>
				<div class="col width-fill">
					<div id="log-panel">
					</div>
					<div class="col background-red">
						<div id="form_cont" class="cell background-white">
							<?php	$attributes = array('name' =>'admin_login', 'id' => 'admin_login');
     						echo form_open('index.php/admin/controller_admin_verify_login', $attributes); ?>
								<label class="color-black label_field">Username:</label>
								<br/>
								<input type = "text" class="field background-white" name= "username" required= "required"  >
								<br/>
								<label class="color-black">Password:</label>
								<br/>
								<Input type= "password" class="field background-white" name = "password" required= "required" >
								<br/>
								<br/>
								<input type="submit" value= "Login" id="submit" onclick = "return validate_admin_login()"name = "login_button">
								<br/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>
	
	</div>
</body>



</html>