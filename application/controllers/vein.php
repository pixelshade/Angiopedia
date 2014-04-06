<?php
class Vein extends User_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->model('vein_part_m');
		$this->load->model('vein_m');
		$this->load->model('category_m');
		$this->data['categories'] = $this->category_m->get();
	}

	public function index ()
	{
		// Fetch all veins
		$this->data['veins'] = $this->vein_m->get_by('`published` = "1"');

		// Load view
		$this->data['subview'] = 'vein/index';
		$this->load->view('_layout_main', $this->data);
	}

	public function show ($slug = NULL) 
	{
		$vein = $this->vein_m->get_by('slug = "'.$slug.'"', TRUE);		
		if(count($vein) && $slug != NULL){
			$vein_id = $vein->id;
			$this->data['veinParts'] = $this->vein_part_m->get_array_by('`vein_id` = "'.$vein_id.'"');

			$this->data['vein'] = $vein;
			$this->data['subview'] = 'vein/show';
			$this->load->view('_layout_main', $this->data);
		} else {
			redirect("vein/");
		}
	}

}