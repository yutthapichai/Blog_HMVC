<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_C extends Frontend_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('Pages/home_v', $this->data);
  }
}
 ?>
