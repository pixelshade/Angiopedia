<?php
class About extends User_Controller
{

	public function __construct ()
	{
		parent::__construct();	
		$this->load->model('vein_m');
		$this->data['vein_names'] = $this->vein_m->get_array_names();		
	}

	public function index ()
	{		
		// Load view
		$this->data['subview'] = 'about/index';
		$this->load->view('_layout_main', $this->data);
	}

	

}