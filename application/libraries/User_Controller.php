<?php
/**
* User Controller
*/
class User_Controller extends MY_Controller
{	
	function __construct()
	{
		parent::__construct();

		$this->load->model('vein_m');

		$this->data['vein_names'] = $this->vein_m->get_array_names();		
		$this->data['vein_slugs'] = $this->vein_m->get_array_slugs();
	}
}