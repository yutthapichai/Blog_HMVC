<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_C extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Page_M');
  }

  public function index()
  {
    // $this->load->view('Pages/home_v', $this->data);
    $data = array();
    //$data = $this->Page_M->find(2);
    //$data = $this->Page_M->find(array(2,3));
    //$data = $this->Page_M->find_by('title', 'Good TV มีแต่เรื่องดีๆ', Null, TRUE);
    $data = $this->Page_M->find_by(array(
      'title' => 'Good TV มีแต่เรื่องดีๆ',
      'created_at' => '2018-09-16'
    ), NULL, TRUE);

    // $data = $this->Page_M->get_assoc(array(2));
    $data = $this->Page_M->to_assoc($data);
    echo '<pre>';
    print_r($data);
  }
}
 ?>
