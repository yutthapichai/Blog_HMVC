<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends MX_Controller
{
  public function construct()
  {
    parent::__construct();
  }

  public function hello()
  {
    echo 'hello from Posts';
  }
}
