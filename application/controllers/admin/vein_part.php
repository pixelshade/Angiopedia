<?php
class Vein_part extends Admin_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->model('vein_part_m');
		$this->load->model('vein_m');
		$this->load->model('content_files_model');

		// Vein_partss for dropdown
		$this->data['veins'] = $this->vein_m->get_for_dropdown();
		$this->data['images'] = $this->content_files_model->get_images_for_dropdown();
		$this->data['models'] = $this->content_files_model->get_models_for_dropdown();
	}

	public function index ()
	{
		// Fetch all vein_parts
		$this->data['vein_parts'] = $this->vein_part_m->get();
		
		// Load view
		$this->data['subview'] = 'admin/vein_part/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function fix()
	{
		$parts = $this->vein_part_m->get();
		
		foreach ($parts as $part) {
			$part->scale_x = $part->scale_x/100;
			$part->scale_y = $part->scale_y/100;
			$part->scale_z = $part->scale_z/100;
			$this->vein_part_m->save($part,$part->id);
			print_r($part);
		}
		echo "done";
		// Load view
		// $this->data['subview'] = 'admin/vein_part/index';
		// $this->load->view('admin/_layout_main', $this->data);
	}


	public function edit ($id_vein = NULL, $id_edited_part = NULL)
	{
		if($id_vein== NULL) redirect('admin/vein_part');

		$this->data['vein'] = $this->vein_m->get_by('`id` = "'.$id_vein.'"',TRUE);
		// Fetch a vein_part or set a new one
		if ($id_edited_part) {
			$this->data['vein_part'] = $this->vein_part_m->get($id_edited_part);
            $this->data['vein_part']->color = str_replace("0x","#", $this->data['vein_part']->color);
			count($this->data['vein_part']) || $this->data['errors'][] = 'vein_part could not be found';
		}
		else {
            $this->data['vein_part'] = $this->vein_part_m->get_new($id_vein);
		}


		
		// Set up the form
		$rules = $this->vein_part_m->rules;
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->vein_part_m->array_from_post(array(
				'vein_id', 
				'name', 
				'model',
				'color',
				'is_tag',
				'image',
				'info',
				'scale_x',
				'scale_y',
				'scale_z',
				'rotation_x',
				'rotation_y',
				'rotation_z',
				'position_x',
				'position_y',
				'position_z',
				));
			$data['color'] = str_replace("#", "0x", $data['color']);
			$this->vein_part_m->save($data, $id_edited_part);
			redirect('admin/vein_part');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/vein_part/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function delete ($id)
	{
		$this->vein_part_m->delete($id);
		redirect('admin/vein_part');
	}
	
}