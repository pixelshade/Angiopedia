<?php
class Vein extends Admin_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->model('vein_m');
		$this->load->model('category_m');
		$this->load->model('content_files_model');

		// Veins for dropdown
		$this->data['categories'] = $this->category_m->get_for_dropdown();
		$this->data['images'] = $this->content_files_model->get_for_dropdown();
		$this->data['models'] = $this->content_files_model->get_for_dropdown();
	}

	public function index ()
	{
		// Fetch all veins
		$this->data['veins'] = $this->vein_m->get();
		
		// Load view
		$this->data['subview'] = 'admin/vein/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function order ()
	{
		$this->data['sortable'] = TRUE;
		$this->data['subview'] = 'admin/vein/order';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function order_ajax ()
	{
		// Save order from ajax call
		if (isset($_POST['sortable'])) {
			$this->vein_m->save_order($_POST['sortable']);
		}
		
		// Fetch all veins
		$this->data['veins'] = $this->vein_m->get_nested();
		
		// Load view
		$this->load->view('admin/vein/order_ajax', $this->data);
	}

	public function edit ($id = NULL)
	{
		// Fetch a vein or set a new one
		if ($id) {
			$this->data['vein'] = $this->vein_m->get($id);
			count($this->data['vein']) || $this->data['errors'][] = 'vein could not be found';
		}
		else {
			$this->data['vein'] = $this->vein_m->get_new();
		}
		

		
		// Set up the form
		$rules = $this->vein_m->rules;
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->vein_m->array_from_post(array(
				'category_id', 
				'name', 
				'slug', 
				'model', 
				'image',
				'info'
			));
			$this->vein_m->save($data, $id);
			redirect('admin/vein');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/vein/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function delete ($id)
	{
		$this->vein_m->delete($id);
		redirect('admin/vein');
	}

	public function _unique_slug ($str)
	{
		// Do NOT validate if slug already exists
		// UNLESS it's the slug for the current vein
		

		$id = $this->uri->segment(4);
		$this->db->where('slug', $this->input->post('slug'));
		! $id || $this->db->where('id !=', $id);
		$vein = $this->vein_m->get();
		
		if (count($vein)) {
			$this->form_validation->set_message('_unique_slug', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}
}