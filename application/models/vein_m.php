<?php
class Vein_m extends MY_Model
{
	protected $_table_name = 'veins';
	protected $_order_by = 'id';
	public $rules = array(
		'category_id' => array(
			'field' => 'category_id', 
			'label' => 'Category', 
			'rules' => 'trim|intval'
		), 
		'name' => array(
			'field' => 'name', 
			'label' => 'Title', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
		), 
		'slug' => array(
			'field' => 'slug', 
			'label' => 'Slug', 
			'rules' => 'trim|required|max_length[100]|url_name|callback__unique_slug|xss_clean'
		), 
		'model' => array(
			'field' => 'model', 
			'label' => 'Model', 
			'rules' => 'trim|required'
		),
		'image' => array(
			'field' => 'model', 
			'label' => 'Model', 
			'rules' => 'trim|required'
		),
		'info' => array(
			'field' => 'info', 
			'label' => 'Info', 
			'rules' => 'trim|required'
		)
	);

	public function get_new ()
	{
		$vein = new stdClass();
		$vein->name = '';
		$vein->slug = '';
		$vein->info = '';
		$vein->image = '';
		$vein->model = '';
		$vein->category_id = -1;
		return $vein;
	}

	public function delete ($id)
	{
		// Delete a vein
		parent::delete($id);
		
		// Reset parent ID for its children
		$this->db->set(array(
			'category_id' => 0
		))->where('category_id', $id)->update($this->_table_name);
	}

	public function save_order ($veins)
	{
		if (count($veins)) {
			foreach ($veins as $order => $vein) {
				if ($vein['item_id'] != '') {
					$data = array('category_id' => (int) $vein['category_id'], 'order' => $order);
					$this->db->set($data)->where($this->_primary_key, $vein['item_id'])->update($this->_table_name);
				}
			}
		}
	}

	public function get_nested ()
	{
		$veins = $this->db->get('veins')->result_array();
		
		$array = array();
		foreach ($veins as $vein) {
			if (! $vein['category_id']) {
				$array[$vein['id']] = $vein;
			}
			else {
				$array[$vein['category_id']]['children'][] = $vein;
			}
		}
		return $array;
	}

	public function get_with_parent ($id = NULL, $single = FALSE)
	{
		$this->db->select('veins.*, p.slug as parent_slug, p.name as parent_name');
		$this->db->join('veins as p', 'veins.category_id=p.id', 'left');
		return parent::get($id, $single);
	}

	public function get_no_parents ()
	{
		// Fetch veins without parents
		$this->db->select('id, name');
		$this->db->where('category_id', 0);
		$veins = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => 'No parent'
		);
		if (count($veins)) {
			foreach ($veins as $vein) {
				$array[$vein->id] = $vein->name;
			}
		}
		
		return $array;
	}
}