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
			'label' => 'name', 
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
			'field' => 'image', 
			'label' => 'image', 
			'rules' => 'trim|required'
			),
		'info' => array(
			'field' => 'info', 
			'label' => 'Info', 
			'rules' => 'trim'
			),
		'published' => array(
			'field' => 'published',
			'label' => 'published', 
			'rules' => 'intval|required'
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
		$vein->scale_x = '1';
		$vein->scale_y = '1';
		$vein->scale_z = '1';
		$vein->rotation_x = '0';
		$vein->rotation_y = '0';
		$vein->rotation_z = '0';
		$vein->position_x = '0';
		$vein->position_y = '0';
		$vein->position_z = '0';
		$vein->published = '1';
		return $vein;
	}

	public function delete ($id)
	{
		// Delete a vein
		parent::delete($id);
		
		// Delte children
		$this->db->delete('vein_parts', array('vein_id' => $id)); 
		
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

	public function get_for_dropdown(){
		$empty = array(-1 => 'No vein');
		$result = $this->get_array();		
		$result = array_column($result, 'name', 'id');
		$result = $empty + $result;		
		return $result;
	}


	public function get_array_names(){
		$this->db->select('name');		
		$veins =  $this->db->get_where($this->_table_name, '`published` = "1"')->result_array();
		$veins = array_column($veins,'name');
		// dump($veins);
		return $veins;
		
	}


	public function get_array_by_categories(){
		$result = array();
		$veins = $this->get_by('`published` = "1"');
		foreach ($veins as $vein) {
			$result[$vein->category_id][] = $vein;
		}
		return $result;
	}

	// public function get($id= NULL, $single = FALSE){
	// 	$tmp = parent::get($id, $single);
	
	// 	if(!empty($tmp) && !empty($tmp->info)){

	// 		$tmp->info = $this->nahradCustomInfoZnaky($tmp->info);	
	// 	} 
	// 	return $tmp;
	// }

	private function nahradCustomInfoZnaky($string){
		$popisovaCast =  strstr($string,"@",true);
		$tabulkovaCast = strstr($string,"@");

		$customChars = array("\n");
		$replaceChars = array("<br />");
		$popisovaCast = str_replace($customChars, $replaceChars, $popisovaCast);

		$customChars = array("@","#","$","\n","iCAT","Romer","Comet");
		$replaceChars = array("<div class='well'><table class='table table-striped'><tr><td><b>",
			"</td></tr></table></div>",
			"</b></td><td>",
			"</td></tr><tr><td><b>", 
			'<a href="http://www.virtuoss.sk/">iCAT</a>','<a href="http://www.nms.sk/">Romer</a>', '<a href="http://www.nms.sk/">Comet</a>');
		$tabulkovaCast = str_replace($customChars, $replaceChars, $tabulkovaCast);
		return $popisovaCast.$tabulkovaCast;
	}

}