<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_posts extends CI_Migration
{
  public function __construct()
  {
    parent::__construct();
  }

  public function up()
  {
    $this->dbforge->add_field(array(
      'id'    => array('type' => 'INT','constraint' => 5, 'unsigned' => TRUE, 'AUTO_INCREMENT' => TRUE),
      'category_id' => array('type' => 'INT', 'constraint' => 5,'unsigned' => TRUE),
      'poster_id' => array('type' => 'INT', 'constraint' => 5,'unsigned' => TRUE),
      'title'  => array('type' => 'VARCHAR', 'constraint' => 100),
      'body'  => array('type' => 'VARCHAR', 'constraint' => 500),
      'created_at timestamp default current_timestamp',
      'updated_at'  => array('type' => 'VARCHAR', 'constraint' => 250, 'null' => TRUE, 'on update' => 'NOW()'),
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('posts');
  }
  public function down()
  {
    $this->dbforge->drop_table('posts');
  }
}
