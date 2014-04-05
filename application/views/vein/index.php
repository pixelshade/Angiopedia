<section>
	<h2>Veins</h2>	
	
	<?php if(count($veins)): foreach($veins as $vein): ?>	
		<!-- <div class="row"> -->
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<?php
					echo '<img src="/app_content/'.$vein->image.'" alt="'.$vein->name.'">';
					?>
					<div class="caption">
						<h3><?php echo anchor('/vein/show/' . $vein->slug, $vein->name); ?></h3>
						<p>			
							<?php
							if(array_key_exists($vein->category_id, $categories)){
								echo $categories[$vein->category_id]; 
							}
							?>							
							<?php echo $vein->info; ?>							
						</p>
						<p><a href=<?php echo '"/vein/show/' . $vein->slug.'"'; ?> class="btn btn-primary" role="button">Detail</a></p>
					</div>
				</div>
			</div>
		<!-- </div>		 -->
	<?php endforeach; ?>
<?php else: ?>

	<div>We could not find any veins.</div>

<?php endif; ?>			
</section>