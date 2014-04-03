<?php
/**
* User_m
*/
class User_M extends MY_Model
{
	protected $_table_name = 'users';
	protected $_order_by = 'name';
	// login
	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|xss_clean'
			),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required'
			)
		);	
	public $rules_admin = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|xss_clean'
			),	
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|matches[password_confirm]'
			),
		'password_confirm' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|matches[password]'
			),		
		);
	
	function __construct()
	{
		parent::__construct();
	}


	public $rights_levels = array(0 => 'admin', 1 => 'content_creator', 2 => 'normal_user');
	public $default_rights_level = 2;

	public function login(){
		$user = $this->get_by(array(
			'name' => $this->input->post('name'),
			'password' => $this->hash($this->input->post('password')),
			), TRUE);

		if(count($user)){
			// Log in user
			$data = array(
				'name' => $user->name,				
				'id' => $user->id,
				'loggedin' => TRUE,
				);
			$this->session->set_userdata($data);			
		}
		return $user;
	}
	public function logout(){
		$this->session->sess_destroy();
	}
	public function loggedin(){
		return (bool) $this->session->userdata('loggedin');
	}
	public function hash($string){
		return hash('sha512', $string . config_item('encryption_key'));
	}	

	public function get_new(){
		$user = new stdClass();
		$user->name = '';		
		$user->password = '';		
		return $user;
	}

	public function get_user_id(){
		return $this->session->userdata('id');;
	}

}
?>