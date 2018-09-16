<?php

foreach($get_posts as $value):
  $body = word_limiter($value['body'], 25);
?>
  <div class="container">
    <div class="col-md-8 mt-5">
      <small><?php echo $value['created_at'];?></small>
      <h2><?php echo $value['title'];?></h2>
      <p><?php echo $body;?></p>
      <?php echo anchor('pages/view_posts/'.$value['id'], 'Read More');?>
    </div>
  </div>
<?php
endforeach;
