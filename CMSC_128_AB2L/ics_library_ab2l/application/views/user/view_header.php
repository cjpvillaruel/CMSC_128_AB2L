<!DOCTYPE html>

<html>
	<head>
		<title>ICS Library</title>
		<!--The full build of all the generic classes of the framework(Framework itself)-->
		<link rel="stylesheet" type="text/css" href="<?php echo  base_url() ?>style/user/build-full.css" media="all"/>
		<link rel="stylesheet" type="text/css" href="<?php echo  base_url() ?>style/user/main-template.css" media="all"/>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
		<script src="<?php echo  base_url() ?>bootstrap/js/bootstrap.js"></script> 
  		<script src="<?php echo  base_url() ?>js/module/jquery/jquery-2.0.3.min.js"></script>
  		<script src="<?php echo  base_url() ?>js/jquery-ui.js"></script>
  		<script src="<?php echo  base_url() ?>js/main.js"></script>
  		<meta name="viewport" content="width=device-width"/>
  		<meta charset="utf-8"/>
	</head>
	<body class="background-black">
		<div id="main-container" class="site-center background-white">
			
				<div id="header" class="col site-header">
					<div id="logo" class="col width-1of7">
						<div id="logos" class="col background-red width-fit">
							<img src="<?php echo base_url() ?>images/icslogo.png"/>
						</div>
					</div>
					<div class="col width-fill">
						<div class="width-fill cell">
							<h1 id="icselib">ICS e-Lib</h1>
						</div>
					</div>
					<div id="logindiv" class="col">
					<?php	$attributes = array('name' =>'user_login', 'id' => 'user_login');
    					 echo form_open('index.php/user/controller_verify_login', $attributes); ?>							
    						<div id="emailuname" class="col width-1of2">
								<label>Username:</label>
								<input type="text" name="username"/>
							</div>
							<div id="pword" class="cell width-1of3">
								<label>Password:</label>
								<input type="password" name="password" />
							</div>
							<div id="loginbutton">
								<input type="submit"/>
							</div>
						</form>
					</div>
				</div>
		<div id="body" class="col site-body background-blue width-fill">
					<div id="main-content" class="col width-5of6 background-white">
						<div id="main-content-container" class="col width-fill">
							<div id="content" class="cell width-6of6">