<?php
class Vein extends User_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->model('vein_m');
	}

	public function index ()
	{
		// Fetch all veins
		$this->data['veins'] = $this->vein_m->get_with_parent();
		
		// Load view
		$this->data['subview'] = 'vein/index';
		$this->load->view('_layout_main', $this->data);
	}

	public function show ($slug = NULL) 
	{
		$vein = $this->vein_m->get_by('slug = "'.$slug.'"', TRUE);
		if(count($slug) && $slug != NULL){
			$this->data['vein'] = $vein;
			$this->data['subview'] = 'vein/show';
			$this->load->view('_layout_main', $this->data);
		} else {
			redirect("vein/");
		}
	}

}