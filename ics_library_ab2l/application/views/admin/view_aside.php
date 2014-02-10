<div class="main-content">
				<aside id="side-navigation" class="border-top width-1of4">
					<div class="col width-1of1">
						<div class="cell width-1of1">
							<form>
								<input id="search_bar" type="search" class="col width-7of8" placeholder="Search..."/>
								<input id="search_submit" type="submit" value="" class="width-fit"/>
							</form>
						</div>
						<hr>
					</div>
					<div class="col width-fill">
						<div class="cell">
							<div class="collap-links">
							<h4 class="nav-title width-fit">BOOKS</h4>
							<a class="nav-status float-right">HIDE</a>
							</div>
							<div>
								<ul class="nav-links">
									<li ><a href="<?php echo base_url() ?>index.php/admin/controller_add_books" class="nav-a">Add Books</a></li>
									<li ><a href="<?php echo base_url() ?>index.php/admin/controller_book" class="nav-a">View Books</a></li>
									<li><a href="<?php echo base_url() ?>index.php/admin/controller_outgoing_books" class="nav-a">View Outgoing Books</a></li>
									<li><a href="<?php echo base_url() ?>index.php/admin/controller_reservation" class="nav-a">View Borrowed Books</a></li>
									<li><a href="<?php echo base_url() ?>index.php/admin/controller_search" class="nav-a">Search</a></li>
								</ul>
							</div>
						</div>
						<div class="cell">
							<div class="collap-links">
								<h4 class="nav-title width-fit">USERS</h4>
								<a class="nav-status float-right">HIDE</a>
							</div>
							<div>
								<ul class="nav-links">
									<li><a href="<?php echo base_url() ?>index.php/admin/controller_add_user" class="nav-a">Add New User</a></li>
									<li><a href="<?php echo base_url() ?>index.php/admin/controller_add_admin" class="nav-a">Add New Admin</a></li>
									<li><a href="<?php echo base_url() ?>index.php/admin/controller_user" class="nav-a">View Users</a></li>
								</ul>
							</div>
						</div>
						<div class="cell">
							<div class="collap-links">
								<h4 class="nav-title width-fit">ADMIN</h4>
								<a class="nav-status float-right">HIDE</a>
							</div>
							<div>
								<ul class="nav-links">
									<li><a href="<?php echo base_url() ?>index.php/admin/controller_announcement/viewForm" class="nav-a">Add Announcements</a></li>
									<li><a href="<?php echo base_url() ?>index.php/admin/controller_announcement" class="nav-a">View Announcements</a></li>
									<li><a href="<?php echo base_url() ?>index.php/admin/controller_log" class="nav-a">View Logs</a></li>
									<li><a href="<?php echo base_url() ?>index.php/admin/controller_logout" class="nav-a">Logout</a></li>
								</ul>
							</div>
						</div>
					</div>
					<hr>
					<footer>
						<div class="cell">
						<p>Copyright &#169 2013 Institute of Computer Science</p>
						</div>
					</footer>
				</aside>