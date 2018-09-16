<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_M extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function get_posts()
  {
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get('posts');
    return $query->result_array();
  }
}
