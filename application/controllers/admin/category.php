<?php
class Category extends Admin_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->model('category_m');
		$this->load->model('content_files_model');

		$this->data['images'] = $this->content_files_model->get_for_dropdown();
	}

	public function index ()
	{
		// Fetch all categories
		$this->data['categories'] = $this->category_m->get();
		
		// Load view
		$this->data['subview'] = 'admin/category/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	

	public function edit ($id = NULL)
	{
		// Fetch a category or set a new one
		if ($id) {
			$this->data['category'] = $this->category_m->get($id);
			count($this->data['category']) || $this->data['errors'][] = 'category could not be found';
		}
		else {
			$this->data['category'] = $this->category_m->get_new();
		}
		
		// Categorys for dropdown
		// $this->data['categories_no_parents'] = $this->category_m->get_no_parents();
		
		// Set up the form
		 $rules = $this->category_m->rules;
		 $this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->category_m->array_from_post(array(
				'name', 
				'image', 
				'info', 
				// 'parent_id'
				));
			$this->category_m->save($data, $id);
			redirect('admin/category');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/category/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function delete ($id)
	{
		$this->category_m->delete($id);
		redirect('admin/category');
	}

	public function _unique_slug ($str)
	{
		// Do NOT validate if slug already exists
		// UNLESS it's the slug for the current category
		

		$id = $this->uri->segment(4);
		$this->db->where('slug', $this->input->post('slug'));
		! $id || $this->db->where('id !=', $id);
		$category = $this->category_m->get();
		
		if (count($category)) {
			$this->form_validation->set_message('_unique_slug', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}

	public function order ()
	{
		$this->data['sortable'] = TRUE;
		$this->data['subview'] = 'admin/category/order';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function order_ajax ()
	{
		// Save order from ajax call
		if (isset($_POST['sortable'])) {
			$this->category_m->save_order($_POST['sortable']);
		}
		
		// Fetch all categories
		$this->data['categories'] = $this->category_m->get_nested();
		
		// Load view
		$this->load->view('admin/category/order_ajax', $this->data);
	}

}