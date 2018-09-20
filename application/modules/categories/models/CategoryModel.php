<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CategoryModel extends MY_Model
{
  //the database table
  public $table_name = 'categories';
  //pramary key field
  public $primary_key = 'id';
  //Filter for pramary
  public $primaryFilter = 'intval';
  //Order by field, Defiault order for this model
  public $order_by = '';
  public function __construct()
  {
    parent::__construct();
  }

  public function get_cat_post($cat_id)
  {
    $query = $this->db->select('posts.id as post_id, posts.poster_id, posts.title,
    posts.category_id, posts.created_at, posts.body, categories.category_name,
    users.firstname, users.lastname, users.profile_pic', false)->from('posts')
    ->join('categories', 'categories.id = posts.category_id')
    ->join('users', 'users.id = posts.poster_id')
    ->where(array('posts.category_id' => $cat_id))
    ->order_by('posts.id', 'DESC')
    ->get();

    return $query->result_array();
  }
}
