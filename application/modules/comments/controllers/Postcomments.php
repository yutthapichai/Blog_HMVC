<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postcomments extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();

    /* Additition code which you want to run automatically*/
    $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
    $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
    $this->output->set_header('Pragma: no-cache');

    $this->load->model('CommentModel');
  }

  public function add_comments()
  {
    $this->load->view('add_comment_view');
  }

  public function save_comment($comment_data)
  {
    $data['comment'] = $this->CommentModel->save($comment_data);
    echo $data['comment'];
  }

  public function get_comments($post_id)
  {
    $data['comments'] = $this->CommentModel->get_comments($post_id);
    $this->load->view('get_comments_view', $data);
  }
}
