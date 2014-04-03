<?php $this->load->view('admin/include/header.php'); ?>

<?php  $page = $this->uri->segment(2); ?>
<div class="container">
	<div class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="./">Angiopedia</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li <?php echo $page=="user"? 'class="active"' : ''; ?>><a href="/admin/user">Users</a></li>	
				
					<li class="<?php echo $page=="page"? 'active ' : ''; ?>dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Game content <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/admin/content_file">Content files</a></li>						
								<li class="divider"></li>
							<li><a href="/admin/category">Categories</a></li>
							<li><a href="/admin/vein">Veins</a></li>							
						</ul> 
					</li>
					<li <?php echo $page=="migration"? 'class="active"' : ''; ?>><a href="/admin/migration">Migration</a></li>			
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/admin/user/logout">Logout</a></li>
					<!-- <li class="active"><a href="./">Default</a></li>
					<li><a href="../navbar-static-top/">Static top</a></li>
					<li><a href="../navbar-fixed-top/">Fixed top</a></li> -->
				</ul>
			</div><!--/.nav-collapse -->
		</div>
		
		<?php $this->load->view($subview); ?>


	</div> <!-- /.container -->
	<?php $this->load->view('admin/include/footer.php');
