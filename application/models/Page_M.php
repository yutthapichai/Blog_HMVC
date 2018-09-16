<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_M extends MY_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table_name = 'posts';
    $this->primary_key = 'id';
    $this->order_by = 'created_at DESC';
  }
}
