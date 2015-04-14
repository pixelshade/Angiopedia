<h3><?php echo empty($vein->id) ? 'Add a new vein' : 'Edit vein ' . $vein->name; ?></h3>
	<script type="text/javascript">  
		<?php 
		$isEditing = empty($vein->id) ? "false" : "true";
		echo "var isEditingVein = ".$isEditing.";";
		echo  "var veinJson = ".json_encode($vein). ";";
        // echo  "var veinParts = ".json_encode($veinParts);
		?>
	</script>
<div id="viewBox">
</div>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>category</td>
		<td><?php echo form_dropdown('category_id', $categories, $this->input->post('category_id') ? $this->input->post('category_id') : $vein->category_id); ?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo form_input('name', set_value('name', $vein->name),'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo form_input('slug', set_value('slug', $vein->slug),'class="form-control"'); ?></td>
	</tr>

	<tr>	
		<td>Image</td>
		<td><?php echo form_dropdown('image', $images, $this->input->post('image') ? $this->input->post('image') : $vein->image); ?></td>
	</tr>
	<tr>
		<td>model</td>
		<td><?php echo form_dropdown('model', $models, $this->input->post('model') ? $this->input->post('model') : $vein->model); ?></td>
	</tr>
	<tr>	
		<td>Info</td>
		<td><?php echo form_textarea('info', set_value('info', $vein->info), 'class="tinymce"'); ?></td>
	</tr>
	<tr>
		<td>scale_x</td>
		<td><?php echo form_input('scale_x', set_value('scale_x', $vein->scale_x), 'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>scale_y</td>
		<td><?php echo form_input('scale_y', set_value('scale_y', $vein->scale_y), 'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>scale_z</td>
		<td><?php echo form_input('scale_z', set_value('scale_z', $vein->scale_z), 'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>rotation_x</td>
		<td><?php echo form_input('rotation_x', set_value('rotation_x', $vein->rotation_x), 'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>rotation_y</td>
		<td><?php echo form_input('rotation_y', set_value('rotation_y', $vein->rotation_y), 'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>rotation_z</td>
		<td><?php echo form_input('rotation_z', set_value('rotation_z', $vein->rotation_z), 'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>position_x</td>
		<td><?php echo form_input('position_x', set_value('position_x', $vein->position_x), 'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>position_y</td>
		<td><?php echo form_input('position_y', set_value('position_y', $vein->position_y), 'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>position_z</td>
		<td><?php echo form_input('position_z', set_value('position_z', $vein->position_z), 'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>published</td>
		<td><?php echo form_boolean_dropdown('published' ,$vein->published); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
