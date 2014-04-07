<?php
/**
* Admin Controller
*/
class Admin_Controller extends MY_Controller
{	
	function __construct()
	{
		parent::__construct();
		
		// $this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_m');
		

		$controller = $this->uri->segment(1);
		// startsWith('api',uri_string());
			// login check
		$exception_uris = array('admin/user/login','admin/user/logout','admin/user/edit');  //
		if(in_array(uri_string(), $exception_uris) == FALSE){
			if($this->user_m->loggedin() == FALSE){				
				redirect('admin/user/login');
				
			}
		}

	}
}