<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller
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
    $this->load->library('MY_Form_validation');
  }

  public function index()
  {
    $this->form_validation->set_rules('login_email', 'Email', 'trim|required|valid_email|callback_login_check');
    $this->form_validation->set_rules('login_password', 'Password', 'trim|required');
    if($this->form_validation->run($this) === FALSE)
    {
      $data['title'] = 'Login';
      $data['module'] = 'users';
      $data['view_file'] = 'LoginView';
      echo Modules::run('templates/default_layout',$data);
    }
    else
    {
      redirect('dashboard');
    }
  }
  // form_validation -> callback_login_check
  public function login_check()
  {
    $email = $this->input->post('login_email');
    $password = $this->input->post('login_password');
    if(empty($email))
    {
      $this->form_validation->set_message('login_check', 'Email is Required');
      return false;
    }
    //Using My Model fine_by method
    $data['userData'] = $this->UserModel->find_by('email', $email, null, null);
    if(empty($data['userData']))
    {
      $this->form_validation->set_message('login_check', 'Invalid email or password');
      return false;
    }
    else
    {
      $storedPassword = $data['userData']['password'];
      //checking the hashed password by using bcryt
      $this->load->library('bcrypt');
      if($this->bcrypt->check_password($password, $storedPassword))
      {
        //Password does match the stored password
        $newdata = array(
          'user_id' => $data['userData']['id'],
          'firstname' => $data['userData']['firstname'],
          'lastname' => $data['userData']['lastname'],
          'profile_pic' => $data['userData']['profile_pic'],
          'is_logged_in' => TRUE
        );

        $this->session->set_userdata($newdata);
        return true;
      }
      else
      {
        //Password does not match
        $this->form_validation->set_message('login_check', 'Invalid email or password');
        return false;
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login', 'refresh');
  }
}
