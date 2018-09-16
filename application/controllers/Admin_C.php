<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_C extends Backend_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('Admin/home_v');
  }
}
 ?>
