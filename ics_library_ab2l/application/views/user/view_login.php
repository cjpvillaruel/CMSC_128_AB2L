<div class="cell body">
	<p class="tiny">Login Page</p>
</div>
<div id="signbox" class="background-red width-2of5">
	<div class="col width-fill">
		<p style="text-align:center; font-size:1.2em">Login Box</p>
	</div>
	<div id="sign" class="col">
		<div class="col">
			<span>
			<div class="color-red logerror width-fill cell"><?php echo validation_errors(); ?></div>
		</span>
	 <?php	$attributes = array('name' =>'user_login', 'id' => 'user_login');
     echo form_open('index.php/user/controller_verify_login', $attributes); ?>
     
			<div class="cell width-1of1">
				<div class="cell width-1of1">
					<label for="emailuser">Username:</label>
				</div>
				<div class="cell width-1of1">
					<input type="text" id="emailuser" name="username" required="required" class="background-white"/>
				</div>
			</div>
			<div class="cell width-1of1">
				<div class="col width-1of1">
					<label for="logpword">Password:</label>
	</div>
	<div class="col width-1of1">
		<input type="password" id="logpword" name="password" required="required" class="background-white"/>
	</div>
</div>
<div class="cell">
	<input type="submit" value= "Login" onclick= "return validate_login()" name = "login_button" class="cell float-right"/>
	<a href="#" class="cell float-right">Sign up now!</a>
</div>
				
			</form>
		</div>
	</div>

</div>