<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->library('migration');

    echo $this->migration->current() === FALSE ? show_error($this->migration->error_string()) : 'Migration excecuted...!!' ;
  }
}
