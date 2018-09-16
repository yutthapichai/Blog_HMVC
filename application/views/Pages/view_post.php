<div class="container">
  <div class="col-md-8 mt-5">
    <small><?php echo $get_post['created_at'];?></small>
    <h2><?php echo $get_post['title'];?></h2>
    <p><?php echo $get_post['body'];?></p>
    <?php echo anchor('pages/edit_posts/'.$get_post['id'], 'Edit Post ');?>|
    <?php echo anchor('pages/delete_post/'.$get_post['id'], 'Delete Post');?>
  </div>
</div>
