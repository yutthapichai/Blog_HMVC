<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel');
  }

  public function index()
  {
    $data['title'] = 'Login';
    $data['module'] = 'users';
    $data['view_file'] = 'LoginView';
    echo Modules::run('templates/default_layout',$data);
  }
}
