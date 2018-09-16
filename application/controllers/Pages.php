<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Page_M');
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
      $title = $this->input->post('title');
      $body = $this->input->post('body');
      $data = array(
        'title' => $title,
        'body' => $body
      );
      if($this->Page_M->create($data))
      {
        $data['title'] = 'CI | Form Posted';
        $data['content'] = 'Pages/form_posted';
        $this->load->view('Layouts/master',$data);
      }else
      {
        echo 'you cannot make a post ..!!';
      }
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

  public function posts()
  {
    $data['title'] = 'CI | All posts';
    $data['content'] = 'Pages/posts';
    $data['get_posts'] = $this->Page_M->get_posts();
    $this->load->view('Layouts/master',$data);
  }

  public function view_posts()
  {
    $id = $this->uri->segment(3); /* after index.php/s1/s2/s3 */
    empty($id) ? show_404(): '';
    $data['title'] = 'CI | View Post';
    $data['content'] = 'Pages/view_post';
    $data['get_post'] = $this->Page_M->get_post_by_id($id);
    $this->load->view('Layouts/master',$data);
  }

  public function edit_posts()
  {
    $id = $this->uri->segment(3); /* after index.php/s1/s2/s3 */
    empty($id) ? show_404(): '';
    $data['title'] = 'CI | Edit Post';
    $data['content'] = 'Pages/edit_post';
    $data['get_post'] = $this->Page_M->get_post_by_id($id);
    $this->load->view('Layouts/master',$data);
  }

  public function update_post()
  {
    $id = $this->input->post('post_id');
    $title = $this->input->post('title');
    $body = $this->input->post('body');
    $data = array(
      'title' => $title,
      'body' => $body
    );
    echo ($this->Page_M->update_post($data, $id)) ? redirect('pages/posts') :'you cannot update a post ..!!';
  }

  public function delete_post()
  {
    $id = $this->uri->segment(3);
    echo $this->Page_M->delete_post($id) ? redirect('pages/posts') :'you cannot delete a post ..!!';
  }
}
 ?>
