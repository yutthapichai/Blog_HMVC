<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_categories extends CI_Migration
{
  public function __construct()
  {
    parent::__construct();
  }

  public function up()
  {
    $this->dbforge->add_field(array(
      'id'    => array('type' => 'INT','constraint' => 5, 'unsigned' => TRUE, 'AUTO_INCREMENT' => TRUE),
      'category_name' => array('type' => 'VARCHAR', 'constraint' => 100),
      'status'  => array('type' => 'VARCHAR', 'constraint' => 10, 'default' => 'Active'),
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('categories');
  }
  public function down()
  {
    $this->dbforge->drop_table('categories');
  }
}
