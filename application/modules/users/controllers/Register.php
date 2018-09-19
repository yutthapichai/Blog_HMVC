<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MX_Controller
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

  public function index()
  {
    $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('email', 'Email address', 'trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
    $this->form_validation->set_rules('password2', 'Comfirm Password', 'trim|required|min_length[6]|matches[password]');
    $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
    $this->form_validation->set_message('is_unique', 'The Email you are trying to register is already is use..!!');
    if($this->form_validation->run() === FALSE)
    {
      $data['title'] = 'Registers';
      $data['module'] = 'users';
      $data['view_file'] = 'RegisterView';
      echo Modules::run('templates/default_layout',$data);
    }else {
      $email     = $this->input->post('email');
      $firstname = $this->input->post('firstname');
      $lastname  = $this->input->post('lastname');
      $password  = $this->input->post('password');
      $gender    = $this->input->post('gender');
      if($gender === 'male')
      {
        $profile_pic = 'male.png';
      }else {
        $profile_pic = 'female.png';
      }
      //hash password2
      $this->load->library('bcrypt');
      $hash = $this->bcrypt->hash_password($password);
      $userData = array(
        'email' => $email,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'password' => $hash,
        'profile_pic' => $profile_pic,
        'gender' => $gender
      );

      $data['insert'] = $this->UserModel->save($userData);
      // Model will return id
      if(!empty($data['insert']))
      {
        $this->session->set_flashdata('UserRegistered', 'You have registered successfully kidly Login!!');
        redirect('login');
      }

    }
  }
}
