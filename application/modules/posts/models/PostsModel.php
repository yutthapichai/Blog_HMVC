<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PostsModel extends MY_Model
{
  //the database table
  public $table_name = 'posts';
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

  public function get_my_post($poster_id)
  {
    $query = $this->db->select('posts.id as post_id, posts.poster_id, posts.title,
    posts.category_id, posts.created_at, posts.body, categories.category_name,
    users.firstname, users.lastname, users.profile_pic', false)->from('posts')
    ->join('categories', 'categories.id = posts.category_id')
    ->join('users', 'users.id = posts.poster_id')
    ->where(array('posts.poster_id' => $poster_id))
    ->order_by('posts.id', 'DESC')
    ->get();

    return $query->result_array();
  }

  public function get_view_post($post_id)
  {
    $query = $this->db->select('posts.id as post_id, posts.poster_id, posts.title,
    posts.category_id, posts.created_at, posts.body, categories.category_name,
    users.firstname, users.lastname, users.profile_pic', false)->from('posts')
    ->join('categories', 'categories.id = posts.category_id')
    ->join('users', 'users.id = posts.poster_id')
    ->where(array('posts.id' => $post_id))
    ->order_by('posts.id', 'DESC')
    ->get();
    // 1 row
    return $query->row_array();
  }

  public function get_latest_post()
  {
    $query = $this->db->select('posts.id as post_id, posts.poster_id, posts.title,
    posts.body, categories.category_name, users.firstname, users.lastname,
    COUNT(comments.id) as total_comments', false)
    ->from('posts')
    ->join('categories', 'categories.id = posts.category_id')
    ->join('users', 'users.id = posts.poster_id')
    ->join('comments', 'comments.post_id = posts.id', 'left')
    ->group_by('posts.id')
    ->order_by('posts.id', 'DESC')
    ->get();

    return $query->result_array();
  }
}
