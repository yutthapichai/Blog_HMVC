<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MX_Controller
{
  public function construct()
  {
    parent::__construct();
  }

  public function one_col($data)
  {
    $this->load->view('one_col', $data);
  }

  public function two_col($data)
  {
    $this->load->view('two_col', $data);
  }

  public function three_col($data)
  {
    $this->load->view('three_col', $data);
  }
}
