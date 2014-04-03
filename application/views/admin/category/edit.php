<h3><?php echo empty($category->id) ? 'Add a new category' : 'Edit category ' . $category->name; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">	
	<tr>
		<td>Name</td>
		<td><?php echo form_input('name', set_value('name', $category->name),'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>Image</td>
		<td><?php echo form_dropdown('image', $images , $this->input->post('image') ? $this->input->post('image') : $category->image,'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>Info</td>
		<td><?php echo form_textarea('info', set_value('info', $category->info), 'class="tinymce"'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
