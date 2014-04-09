<?php
class Vein_part_m extends MY_Model
{
	protected $_table_name = 'vein_parts';
	protected $_order_by = 'vein_id';
	public $rules = array(
		'vein_id' => array(
			'field' => 'vein_id', 
			'label' => 'Vein', 
			'rules' => 'trim|intval|greater_than[-1]|required'
			), 
		'name' => array(
			'field' => 'name', 
			'label' => 'Title', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
			), 		 		
		'image' => array(
			'field' => 'image', 
			'label' => 'image', 
			'rules' => 'trim'
			),
		'model' => array(
			'field' => 'model', 
			'label' => 'model', 
			'rules' => 'trim'
			),
		'color' => array(
			'field' => 'color', 
			'label' => 'color', 
			'rules' => 'trim|required'
			),
		'is_tag' => array(
			'field' => 'is_tag', 
			'label' => 'is_tag', 
			'rules' => 'intval|trim'
			),
		'info' => array(
			'field' => 'info', 
			'label' => 'Info', 
			'rules' => 'trim'
			),
		'scale_x' => array(
			'field' => 'scale_x', 
			'label' => 'scale_x', 
			'rules' => 'trim|required'
			),
		'scale_y' => array(
			'field' => 'scale_y', 
			'label' => 'scale_y', 
			'rules' => 'trim|required'
			),
		'scale_z' => array(
			'field' => 'scale_z', 
			'label' => 'scale_z', 
			'rules' => 'trim|required'
			),
		'rotation_x' => array(
			'field' => 'rotation_x', 
			'label' => 'rotation_x', 
			'rules' => 'trim|required'
			),
		'rotation_y' => array(
			'field' => 'rotation_y', 
			'label' => 'rotation_y', 
			'rules' => 'trim|required'
			),
		'rotation_z' => array(
			'field' => 'rotation_z', 
			'label' => 'rotation_z', 
			'rules' => 'trim|required'
			),
		'position_x' => array(
			'field' => 'position_x', 
			'label' => 'position_x', 
			'rules' => 'trim|required'
			),
		'position_y' => array(
			'field' => 'position_y', 
			'label' => 'position_y', 
			'rules' => 'trim|required'
			),
		'position_z' => array(
			'field' => 'position_z', 
			'label' => 'position_z', 
			'rules' => 'trim|required'
			),
		);

public function get_new ($vein_id)
{
	$vein = new stdClass();
	$vein->vein_id = $vein_id;
	$vein->name = '';
	$vein->model = '';
	$vein->color = '';
	$vein->is_tag = 0;
	$vein->info = '';		
	$vein->image = '';
	$vein->scale_x = '1';
	$vein->scale_y = '1';
	$vein->scale_z = '1';
	$vein->rotation_x = '0';
	$vein->rotation_y = '0';
	$vein->rotation_z = '0';
	$vein->position_x = '0';
	$vein->position_y = '0';
	$vein->position_z = '0';

	return $vein;
}

}