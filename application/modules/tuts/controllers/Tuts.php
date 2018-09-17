<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tuts extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    //echo 'Hello world from HMVC';
    $this->load->view('Home_V');
  }
}
