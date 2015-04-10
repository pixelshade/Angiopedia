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
				
				<li <?php echo $page=="/vein"? 'class="active"' : ''; ?>><a href="/vein">Arteries</a></li>			
				<li <?php echo $page=="quiz"? 'class="active"' : ''; ?>><a href="/quiz/">Quiz</a></li>					
				<li <?php echo $page=="about"? 'class="active"' : ''; ?>><a href="/about/">About</a></li>					
			</ul>
			<div class="col-sm-3 col-md-3 navbar-right">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="5YJFAGPTASWBL">
					<input id="donate_btn" type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>

			</div>

			<div class="col-sm-3 col-md-3 navbar-right">
				<form class="navbar-form" role="search">
					<div class="input-group">					
						<input id="search" type="text" class="form-control" placeholder="Search" autocomplete="off">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<?php $this->load->view($subview); ?>
	<script>
	<?php 
	echo "var vein_names = ". json_encode($vein_names).";"; 
	echo "var vein_slugs = ". json_encode($vein_slugs).";";
	?>

	</script>

</div> <!-- /.container -->
<?php $this->load->view('include/footer.php');
