<?php
if($this->session->userdata('is_logged_in') == FALSE)
{
?>
<div class="mt-3">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Notification!</strong>
    You need to login to <?php echo anchor('login','Add comment ', array('class' => 'btn btn-light ml-5')); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
<?php
}else{
 ?>
    <div class="add-post bg-grey mt-3">
      <h5>Add Comment</h5>
      <?php
      $hidden = array(
        'commment_id' => $this->session->userdata('user_id'),
        'post_id' => $this->uri->segment(2)
      );

      $comment_body = array(
        'name' => 'comment_body',
        'class' => 'form-control mt-3',
        'type' => 'text',
        'rows' => '5',
        'id' => 'comment_body',
        'placeholder' => 'Enter a comment for posts',
        'value' => set_value('comment_body')
      );

      $comment_submit = array(
        'name' => 'comment_submit',
        'class' => 'my-3 btn btn-success',
        'value' => 'Add post'
      );

      echo form_open('save_comment', array('class' => 'form-forizontal mt-4'), $hidden);

      echo form_textarea($comment_body);
      echo '<div class="error">'.form_error('body').'</div>';
      echo form_submit($comment_submit);

      echo form_close();
       ?>
    </div>
    <?php
}
