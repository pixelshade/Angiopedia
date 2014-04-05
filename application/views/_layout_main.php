 <?php $this->load->view('include/header.php'); ?>

 <?php  $page = $this->uri->segment(1); ?>
 <div class="navbar navbar-default navbar-fixed-top" role="navigation">
 	<div class="container">
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
					<!-- 
					<li class="<?php echo $page=="page"? 'active ' : ''; ?>dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/admin/page">List</a></li>
							<li><a href="/admin/page/edit">Add</a></li>
							<li><a href="/admin/page/order">Reorder pages</a></li>						
						
						</ul>
					</li>
				-->
				
				<li <?php echo $page=="/vein"? 'class="active"' : ''; ?>><a href="/vein">Veins</a></li>			
				<li <?php echo $page=="about"? 'class="active"' : ''; ?>><a href="/about/">About</a></li>			
			</ul>
			<div class="col-sm-3 col-md-3 navbar-right">
				<form class="navbar-form" role="search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search" name="q">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="container">

	<?php $this->load->view($subview); ?>


</div> <!-- /.container -->
<?php $this->load->view('include/footer.php');
