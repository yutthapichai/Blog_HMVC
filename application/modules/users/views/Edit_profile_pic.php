<?php

if($this->session->flashdata('UpdateProfilePicError'))
{
?>
  <div class="container mt-5">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Notification!</strong> <?php echo $this->session->flashdata('UpdateProfilePicError');?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
<?php
}
if($this->session->flashdata('ProfileImageUpdated')){
  ?>
  <div class="container mt-5">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Notification!</strong> <?php echo $this->session->flashdata('ProfileImageUpdated');?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
  <?php
}

$image = array(
  'name' => 'profilefile',
  'class' => 'form-control mt-3',
  'type' => 'file',
  'id' => 'profilefile',
);
$image_submit = array(
  'name' => 'profilefile',
  'class' => 'btn btn-primary mt-5',
  'value' => 'Upload'
);
?>
<div class="profile-holder">
  <div class="container">
    <div class="row bg-grey">
      <div class="col-sm-12 col-lg-4">
        <img src="<?= base_url();?>assets/images/users/<?= $user_profile['profile_pic'];?>" alt="profile" class="img-fluid" width="200px">
      </div>
      <div class="col-sm-12 col-lg-8">
        <?= form_open_multipart('update_profile_pic');?>
        <?= form_label('*Accepted format are .jpg|.jpeg|.png and size of image should not exceed 500KB', 'profilefile');?>
        <?= form_input($image);?>
        <?= form_submit($image_submit); ?>
        <?= form_close();?>
      </div>
    </div>
  </div>
</div>
