<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel');

    if($this->session->userdata('is_logged_in') == FALSE)
    {
      redirect('login');
    }
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['module'] = 'users';
    $data['view_file'] = 'DashboardView';
    echo Modules::run('templates/default_layout',$data);
  }

}
