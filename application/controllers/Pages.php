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
    $data['title'] = 'page controller';
    $data['message'] = 'Hello world from comtrollers about';
    $data['content'] = 'Pages/about';
    $this->load->view('Layouts/master',$data);
  }

  public function forms()
  {
    $data['title'] = 'CI | Forms';
    $data['content'] = 'Pages/forms';
    $this->load->view('Layouts/master',$data);
  }

  public function form_summited()
  {
    echo "form is ok!!";
  }

  public function add_posts()
  {
    $data['title'] = 'CI | Add Post';
    $data['content'] = 'Pages/add_posts';
    $this->load->view('Layouts/master',$data);
  }

  public function form_posted()
  {
    // $this->load->library('fom_validation');
    // set_rules('body' refer name of input
    $this->form_validation->set_rules('title', 'Title', 'trim|required|callback_title_check');
    $this->form_validation->set_rules('body', 'Body', 'trim|required|callback_title_check');
    if($this->form_validation->run() === FALSE)
    {
      $data['title'] = 'CI | Add Post';
      $data['content'] = 'Pages/add_posts';
      $this->load->view('Layouts/master',$data);
    } else
    {
      $data['title'] = 'CI | Form Posted';
      $data['content'] = 'Pages/form_posted';
      $this->load->view('Layouts/master',$data);
    }
  }

  public function title_check($str)
  {
    if($str == 'test')
    {
      $this->form_validation->set_message('title_check', 'The title field should not have be test ');
      return false;
    }else
    {
      return true;
    }
  }
}
 ?>
