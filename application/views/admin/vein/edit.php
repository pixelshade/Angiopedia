<h3><?php echo empty($vein->id) ? 'Add a new vein' : 'Edit vein ' . $vein->name; ?></h3>
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
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
