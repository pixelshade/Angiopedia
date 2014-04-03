<section>
	<h2>Categories</h2>
	<?php echo anchor('admin/category/edit', '<i class="icon-plus"></i> Add a category'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>image</th>
				<th>info</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($categories)): foreach($categories as $category): ?>	
		<tr>
			<td><?php echo anchor('admin/category/edit/' . $category->id, $category->name); ?></td>
			<td><?php echo $category->image; ?></td>
			<td><?php echo $category->info; ?></td>
			<td><?php echo btn_edit('admin/category/edit/' . $category->id); ?></td>
			<td><?php echo btn_delete('admin/category/delete/' . $category->id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any categories.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>