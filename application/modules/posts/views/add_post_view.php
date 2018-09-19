<?php
if($this->session->flashdata('Addpost'))
{
?>
  <div class="container mt-5">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Notification!</strong> <?php echo $this->session->flashdata('Addpost');?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
<?php
}
?>
<div class="container">
  <div class="col-sm-12 col-lg-8">
    <div class="bg-grey add-post my-3">
      <h2>Add a post here...</h2>
      <?php
      $hidden = array(
        'poster_id' => $this->session->userdata('user_id')
      );

      $title = array(
        'name' => 'title',
        'class' => 'form-control mt-3',
        'type' => 'text',
        'id' => 'title',
        'placeholder' => 'Enter a title for posts',
        'value' => set_value('title')
      );
      $body = array(
        'name' => 'body',
        'class' => 'form-control mt-3',
        'cols' => '10',
        'id' => 'about',
        'placeholder' => 'Enter your post body',
        'value' => set_value('body')
      );

      $post_submit = array(
        'name' => 'Post_submit',
        'class' => 'my-3 btn btn-success',
        'value' => 'Add post'
      );

      echo form_open('add_post', array('class' => 'form-forizontal mt-4'), $hidden);

      echo form_input($title);
      echo '<div class="error">'.form_error('title').'</div>';
      echo form_textarea($body);
      echo '<div class="error">'.form_error('body').'</div>';
      echo Modules::run('categories/categories/get_cat_for_form');
      echo '<div class="error">'.form_error('category').'</div>';
      echo form_submit($post_submit);

      echo form_close();
       ?>
    </div>
  </div>
  <div class="col-sm-12 col-lg-4">

  </div>
</div>
