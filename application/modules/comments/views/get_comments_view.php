<?php
if(empty($comments))
{
?>
<div class="add-comment mt-3 text-secondary">
  <small>There is no comment available for this post ..!!</small>
</div>
<?php
}else{
foreach($comments as $value):
?>
<div class="container bg-grey my-3">
  <div class="row">
      <div class="col-2">
        <img src="<?= base_url();?>assets/images/users/<?= $value['profile_pic']?>" alt="profile pic" class="img-fluid rounded-circle mt-3">
      </div>
      <div class="col-10">
        <p><?= $value['comment_body'];?></p>
        <small>
          <?= anchor('view_author_profile/'.$value['commenter_id'],$value['firstname'].'&nbsp'.$value['lastname']);?><br>
          <?= $value['created_at']?>
        </small>
      </div>
  </div>
</div>
<?php
endforeach;
}
