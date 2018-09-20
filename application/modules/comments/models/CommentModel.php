<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CommentModel extends MY_Model
{
  //the database table
  public $table_name = 'comments';
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

}
