<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
  public $data = array();

  public function __construct()
  {
    parent::__construct();

    ENVIRONMENT != 'development' || $this->output->enable_profiler(TRUE);
  }
}
