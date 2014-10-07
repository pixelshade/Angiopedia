<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_categories extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'parent' => array(
				'type' => 'INT',
				'constraint' => 11,				
				'default' = -1
			),
			'order' => array(
				'type' => 'INT',
				'constraint' => 11,				
				'default' = -1
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 256,								
			),
			'info' => array(
				'type' => 'TEXT',				
			),
			'image' => array(
				'type' => 'VARCHAR',
				'constraint' => '256',
			),			
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('categories');
	}

	public function down()
	{
		$this->dbforge->drop_table('categories');
	}
}