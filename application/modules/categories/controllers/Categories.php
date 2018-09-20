<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();

    /* Additition code which you want to run automatically*/
    $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
    $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
    $this->output->set_header('Pragma: no-cache');

    $this->load->model('CategoryModel');
    $this->load->helper('text');
  }

  public function get_cat_for_form()
  {
    $data['categories'] = $this->CategoryModel->find();
    $this->load->view('cat_form',$data);
  }

  public function get_cat_sidebar()
  {
    $data['categories'] = $this->CategoryModel->find();
    $this->load->view('cate_sidebar_view',$data);
  }

  public function view_category_post()
  {
    $cat_id = $this->uri->segment(2);

    if(empty($cat_id))
    {
      show_404();
    }else {
      $data['posts'] = $this->CategoryModel->get_cat_post($cat_id);
      $data['title'] = 'Posts by category';
      $data['module'] = 'categories';
      $data['view_file'] = 'view_cat_view';
      echo Modules::run('templates/default_layout',$data);
    }

  }
}
