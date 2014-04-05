<h3><?php echo empty($vein_part->id) ? 'Add a new vein_part' : 'Edit vein_part ' . $vein_part->name; ?></h3>
 <div id="viewBox">
    <script type="text/javascript">  
     <?php 
     echo  "var vein = ".json_encode($vein_part). ";";
     // echo  "var veinParts = ".json_encode($veinParts);
     ?>
   </script>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
	
</div>
<table class="table">
	<tr class="hidden">
		<td>vein</td>
		<td><?php echo form_dropdown('vein_id', $veins, $this->input->post('vein_id') ? $this->input->post('vein_id') : $vein_part->vein_id); ?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo form_input('name', set_value('name', $vein_part->name),'class="form-control"'); ?></td>
	</tr>
	<tr>	
		<td>Image</td>
		<td><?php echo form_dropdown('image', $images, $this->input->post('image') ? $this->input->post('image') : $vein_part->image); ?></td>
	</tr>
	<tr>	
		<td>Info</td>
		<td><?php echo form_textarea('info', set_value('info', $vein_part->info), 'class="tinymce"'); ?></td>
	</tr>
	<tr class="hidden">	
		<td>scale_x</td>
		<td><?php echo form_input('scale_x', set_value('scale_x', $vein_part->scale_x), 'class="form-control"'); ?></td>
	</tr>
<tr class="hidden">	
		<td>scale_y</td>
		<td><?php echo form_input('scale_y', set_value('scale_y', $vein_part->scale_y), 'class="form-control"'); ?></td>
	</tr>
<tr class="hidden">	
		<td>scale_z</td>
		<td><?php echo form_input('scale_z', set_value('scale_z', $vein_part->scale_z), 'class="form-control"'); ?></td>
	</tr>
<tr class="hidden">	
		<td>rotation_x</td>
		<td><?php echo form_input('rotation_x', set_value('rotation_x', $vein_part->rotation_x), 'class="form-control"'); ?></td>
	</tr>
<tr class="hidden">	
		<td>rotation_y</td>
		<td><?php echo form_input('rotation_y', set_value('rotation_y', $vein_part->rotation_y), 'class="form-control"'); ?></td>
	</tr>
<tr class="hidden">	
		<td>rotation_z</td>
		<td><?php echo form_input('rotation_z', set_value('rotation_z', $vein_part->rotation_z), 'class="form-control"'); ?></td>
	</tr>
<tr class="hidden">	
		<td>position_x</td>
		<td><?php echo form_input('position_x', set_value('position_x', $vein_part->position_x), 'class="form-control"'); ?></td>
	</tr>
<tr class="hidden">	
		<td>position_y</td>
		<td><?php echo form_input('position_y', set_value('position_y', $vein_part->position_y), 'class="form-control"'); ?></td>
	</tr>
<tr class="hidden">	
		<td>position_z</td>
		<td><?php echo form_input('position_z', set_value('position_z', $vein_part->position_z), 'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
