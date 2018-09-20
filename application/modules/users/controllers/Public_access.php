<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_access extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();

    /* Additition code which you want to run automatically*/
    $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
    $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
    $this->output->set_header('Pragma: no-cache');

    $this->load->model('UserModel');
  }

  public function view_author_profile()
  {
    $id = $this->uri->segment(2);
    if(empty($id))
    {
      show_404();
    }else {
      $data['user_profile'] = $this->UserModel->find($id);
      $data['title'] = 'View Profile';
      $data['module'] = 'users';
      $data['view_file'] = 'view_author_profile_view';
      echo Modules::run('templates/default_layout',$data);
    }
  }
}
