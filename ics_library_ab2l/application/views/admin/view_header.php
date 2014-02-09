<!DOCTYPE html>

<html>
	<head>
		<title>Admin Page</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>style/admin/build-full.css" media="all"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>style/admin/admin-style.css" media="all"/>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
		<script src="<?php echo base_url() ?>js/module/jquery/jquery-2.0.3.min.js"></script>
		<script src="<?php echo  base_url() ?>js/jquery-ui.js"></script>
	</head>
	<body>
		<div class="body main-content">
			<header id="main-header" class="site-header background-">
				<div id="first-header" class="col width-1of4 shadow-right">
					<img id="logo" src="<?php echo base_url() ?>images/icslogo.png"/>
					<div class="cell">
						
						<h1 class="title">ICS e-Lib</h1>
					</div>
				</div>
				<div class="col width-fill centered-content">
						<div class="col width-3of4">
						<h1 id="current-page" class="title col">Admin Portal</h1>
						</div>
						<div class="col width-fill">
							<a id="visit" href="#">
								<div id="visit-div" class=" width-2of4">Visit Page</div>
							</a>
						</div>
				</div>
			</header>
			<header id="secondary-head" class="grad">
				<div  class="col width-1of4 shadow-right secondary-header border-bottom">
					<div class="col">
						<img id="icon-user" src="<?php echo base_url() ?>images/icn_user.png"/>
						<p id="user-name"> ADMIN (<a href="<?php echo base_url() ?>index.php/admin/controller_logout">Logout</a>)</p>
					</div>
				</div>
				<div class="col width-fill border-bottom secondary-header shadow-bottom">
					<div id="breadcrumbs" class="width-fit">
						<div class="crumbs">
							Admin Portal
						</div>
						<div class="divide">
							
						</div>
						<div class="crumbs">
							<?php echo $parent ?>
						</div>
						<div class="crumbs divide">
						</div>
						<div class="crumbs">
							<?php echo $current ?>
						</div>
					</div>
				</div>
			</header>