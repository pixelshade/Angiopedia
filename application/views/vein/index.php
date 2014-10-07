
<h2>Arteries</h2>	
<div  data-spy="scroll" data-target="#affixSpy">
	<div class="col-md-3 xs-hidden">
		<ul id="affixSpy" class="nav nav-tabs nav-stacked" data-spy="affix"   data-offset-top="80" data-offset-bottom="200">
			<?php
			$num_open_parents = 0;
			foreach ($categories as $cat) {
				if($cat->parent){				
					echo '<li><h4>'.$cat->name.'</h4></li>';
					$num_open_parents++;
				} else 
				echo '<li><a href="#'.urlencode($cat->name).'">'.$cat->name.'</a></li>';			
			}
			?>
		</ul>

	</div>





	<div class="col-md-9">
		<?
		// print_r($veins);
		$not_in_cat_veins = array();
		foreach ($categories as $cat) {			
			if(!$cat->parent && array_key_exists($cat->id, $veins)){
				echo '<section class="category" id="'.urlencode($cat->name).'"><h2>'.$cat->name.'</h2>';		
				$i = 0;
				foreach($veins[$cat->id] as $vein):
					if($i%3==0){
						echo '<div class="row">';
					}
					?>

					<div class="col-sm-6 col-md-3">
						<div class="thumbnail">
							<?php
							echo '<img src="/app_content/'.$vein->image.'" alt="'.$vein->name.'">';
							?>
							<div class="caption">
								<h3><?php echo anchor('/vein/show/' . $vein->slug, $vein->name); ?></h3>
								<p>	
									<?php //echo $vein->info; ?>							
								</p>
								<p><a href=<?php echo '"/vein/show/' . $vein->slug.'"'; ?> class="btn btn-primary btn-block" role="button">Detail</a></p>
							</div>
						</div>
					</div>
					<?php
					if($i%3==2){
						echo "</div>";
					}
					$i++;
					endforeach; 
					echo '</section>';
				} 

			}
			?>		
	</div>		
</div>
