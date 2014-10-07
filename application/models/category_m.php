<?php
class Category_m extends MY_Model
{
	protected $_table_name = 'categories';
	protected $_order_by = 'order';
	public $rules = array(		
		'name' => array(
			'field' => 'name', 
			'label' => 'Name', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
			), 
		'parent_id' => array(
			'field' => 'parent_id', 
			'label' => 'parent_id', 
			'rules' => 'trim|intval'
			),

		'image' => array(
			'field' => 'image', 
			'label' => 'Image', 
			'rules' => 'trim|max_length[100]|xss_clean'
			), 
		'info' => array(
			'field' => 'body', 
			'label' => 'Info', 
			'rules' => 'trim|xss_clean'
			)
		);

	public function get_new ()
	{
		$category = new stdClass();
		$category->name = '';
		$category->parent = 0;
		$category->order = 0;
		$category->image = '';
		$category->info = '';		
		return $category;
	}

	public function save_order ($categories)
	{
		if (count($categories)) {
			foreach ($categories as $order => $category) {
				if ($category['item_id'] != '') {
					$data = array('parent_id' => (int) $category['parent_id'], 'order' => $order);
					$this->db->set($data)->where($this->_primary_key, $category['item_id'])->update($this->_table_name);
				}
			}
		}
	}

	public function get_nested ()
	{
		$categories = $this->db->get('categories')->result_array();
		
		$array = array();
		foreach ($categories as $category) {
			if (! $category['parent_id']) {
				$array[$category['id']] = $category;
			}
			else {
				$array[$category['parent_id']]['children'][] = $category;
			}
		}
		return $array;
	}

	public function get_with_parent ($id = NULL, $single = FALSE)
	{
		$this->db->select('categories.*, p.slug as parent_slug, p.title as parent_title');
		$this->db->join('categories as p', 'categories.parent_id=p.id', 'left');
		return parent::get($id, $single);
	}

	public function get_no_parents ()
	{
		// Fetch categories without parents
		$this->db->select('id, title');
		$this->db->where('parent_id', 0);
		$categories = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => 'No parent'
			);
		if (count($categories)) {
			foreach ($categories as $category) {
				$array[$category->id] = $category->title;
			}
		}
		
		return $array;
	}

	public function get_for_dropdown(){
		$empty = array(-1 => 'No category');
		$result = $this->get_array();		
		$result = array_column($result, 'name', 'id');
		$result = $empty + $result;		
		return $result;
	}
}