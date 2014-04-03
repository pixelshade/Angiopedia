<section>
	<h2>Veins</h2>	
	
	<?php if(count($veins)): foreach($veins as $vein): ?>	
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img data-src="holder.js/300x200" alt="...">
					<div class="caption">
						<h3><?php echo anchor('/vein/show/' . $vein->slug, $vein->name); ?></h3>
						<p>							
							<?php echo $vein->category_id; ?>
							<?php echo $vein->model; ?>
							<?php echo $vein->info; ?>
							<?php echo $vein->image; ?>
						</p>
						<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>
				</div>
			</div>
		</div>		
	<?php endforeach; ?>
<?php else: ?>

	<div>We could not find any veins.</div>

<?php endif; ?>			
</section>