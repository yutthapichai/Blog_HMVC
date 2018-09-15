<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    //echo "hello world";
    $data['title'] = 'page controller';
    $data['message'] = 'Hello world from comtrollers';
    $data['content'] = 'Pages/home';
    //$this->load->view('Pages/Elements/page_header',$data);
    //$this->load->view('Pages/Elements/navigation');
    //$this->load->view('Pages/home');
    //$this->load->view('Pages/Elements/footer');
    $this->load->view('Layouts/master',$data);
  }

  public function about()
  {
    //echo "hello world";
    $data['title'] = 'page controller';
    $data['message'] = 'Hello world from comtrollers about';
    $data['content'] = 'Pages/about';
    $this->load->view('Layouts/master',$data);
  }
}
 ?>