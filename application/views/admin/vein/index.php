<section>
	<h2>Veins</h2>
	<?php echo anchor('admin/vein/edit', '<i class="icon-plus"></i> Add a vein'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>name</th>
				<th>category</th>
				<th>model</th>
				<th>image</th>
				<th>info</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($veins)): foreach($veins as $vein): ?>	
		<tr>
			<td><?php echo anchor('admin/vein/edit/' . $vein->id, $vein->name); ?></td>
			<td><?php echo $vein->category_id; ?></td>
			<td><?php echo $vein->model; ?></td>
			<td><?php echo $vein->image; ?></td>
			<td><?php echo $vein->info; ?></td>
			<td><?php echo btn_edit('admin/vein/edit/' . $vein->id); ?></td>
			<td><?php echo btn_delete('admin/vein/delete/' . $vein->id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any veins.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>