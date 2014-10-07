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
		$this->data['vein_names'] = $this->vein_m->get_array_names();		
	}

	public function index ()
	{

		// Fetch all veins
		$this->data['veins'] = $this->vein_m->get_array_by_categories();
		// Load view
		$this->data['subview'] = 'vein/index';
		$this->load->view('_layout_main', $this->data);
	}

	public function show ($slug = NULL) 
	{
		$vein = $this->vein_m->get_by('slug = "'.$slug.'"', TRUE);		
		if(count($vein) && $slug != NULL){
			$vein_id = $vein->id;
			$vein_parts = $this->vein_part_m->get_array_by('`vein_id` = "'.$vein_id.'"');
			$this->data['veinParts'] = $vein_parts;
			$this->data['vein_part_names'] = $this->vein_part_m->distinct_tag_names_for_vein_id($vein_id);

			$this->data['vein'] = $vein;
			$this->data['subview'] = 'vein/show';
			$this->load->view('_layout_main', $this->data);
		} else {
			redirect("vein/");
		}
	}

}