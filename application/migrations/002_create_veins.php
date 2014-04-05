<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_veins extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
				),
			'category_id' => array(
				'type' => 'INT',
				'constraint' => 11,				
				),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				),
			'image' => array(
				'type' => 'VARCHAR',
				'constraint' => '256',
				),
			'slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
				),
			'model' => array(
				'type' => 'VARCHAR',
				'constraint' => '256',
				),
			'info' => array(
				'type' => 'TEXT',				
				),
			'scale_x' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				),	
			'scale_y' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				),	
			'scale_z' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				),	
			'rotation_x' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				),	
			'rotation_y' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				),	
			'rotation_z' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				),	
			'position_x' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				),	
			'position_y' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				),	
			'position_z' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				),	
			'published' => array(
				'type' => 'INT',
				'constraint' => '1',
				),	
			));
$this->dbforge->add_key('id', TRUE);
$this->dbforge->create_table('veins');
}

public function down()
{
	$this->dbforge->drop_table('veins');
}
}