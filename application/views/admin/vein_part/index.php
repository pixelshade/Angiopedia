<section>
	<h2>Vein parts</h2>
	<?php 
	// echo anchor('admin/vein_part/edit', '<i class="icon-plus"></i> Add a vein_part'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>vein</th>
				<th>name</th>				
				<th>image</th>
				<th>color</th>
				<th>model</th>
				<th>info</th>
				<th>is it a tag?</th>
				<!-- <th>scale_x</th>
				<th>scale_y</th>
				<th>scale_z</th>
				<th>rotation_x</th>
				<th>rotation_y</th>
				<th>rotation_z</th>
				<th>position_x</th>
				<th>position_y</th>
				<th>position_z</th> -->
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($vein_parts)): foreach($vein_parts as $vein_part): ?>	
				<tr>
					<td><?php echo anchor('admin/vein_part/edit/' . $vein_part->id, $vein_part->name); ?></td>
					<td><?php echo $veins[$vein_part->vein_id]; ?></td>
					<td><?php echo $vein_part->image; ?></td>
					<td><?php echo $vein_part->color; ?></td>
					<td><?php echo $vein_part->model; ?></td>
					<td><?php echo $vein_part->info; ?></td>
					<td><?php echo $vein_part->is_tag; ?></td>
				<!-- 	<td><?php echo $vein_part->scale_x; ?></td>
					<td><?php echo $vein_part->scale_y; ?></td>
					<td><?php echo $vein_part->scale_z; ?></td>
					<td><?php echo $vein_part->rotation_x; ?></td>
					<td><?php echo $vein_part->rotation_y; ?></td>
					<td><?php echo $vein_part->rotation_z; ?></td>
					<td><?php echo $vein_part->position_x; ?></td>
					<td><?php echo $vein_part->position_y; ?></td>
					<td><?php echo $vein_part->position_z; ?></td> -->
					<td><?php echo btn_edit('admin/vein_part/edit/' . $vein_part->id); ?></td>
					<td><?php echo btn_delete('admin/vein_part/delete/' . $vein_part->id); ?></td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="3">We could not find any vein_parts.</td>
			</tr>
		<?php endif; ?>	
	</tbody>
</table>
</section>