<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_M extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function create($data)
  {
    $check = $this->db->insert('posts', $this->db->escape_str($data));
    return $check ? true : flase;
  }

  public function get_posts()
  {
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get('posts');
    return $query->result_array();
  }

  public function get_post_by_id($id)
  {
    $query = $this->db->get_where('posts', array('id' => $id));
    return $query->row_array();
  }

  public function update_post($data, $id)
  {
    $this->db->set($this->db->escape_str($data));
    $this->db->where('id', $id);
    $this->db->update('posts');
    return $this->db->affected_rows() > 0 ? true : flase;
  }

  public function delete_post($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('posts');
    return $this->db->affected_rows() > 0 ? true : flase;
  }
}
