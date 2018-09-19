<?php
if($this->session->flashdata('ProfileUpdate'))
{
?>
  <div class="container mt-5">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>Notification!</strong> <?php echo $this->session->flashdata('ProfileUpdate');?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
<?php
}
 ?>

<div class="profile-holder">
  <div class="container">
    <div class="bg-grey row mt-3">
      <div class="col-sm-12 col-md-4 col-lg-4 text-center">
        <img src="<?= base_url();?>assets/images/users/<?= $user_profile['profile_pic'];?>" alt="profile" class="img-fluid" width="200px">
        <br><?= anchor('edit_profile_pic', 'Edit Profile Pic');?>
      </div>
      <div class="col-sm-12 col-md-8 col-lg-4 mt-2">
        <p>
          <strong>Name</strong>
          <?= $user_profile['firstname']. '&nbsp' . $user_profile['lastname'];?>
        </p>
        <p>
          <strong>Email</strong>
          <?= $user_profile['email'];?>
        </p>
        <p>
          <strong>Gender</strong>
          <?= $user_profile['gender'];?>
        </p>
        <p>
          <strong>About</strong>
          <?= $user_profile['about'];?>
        </p>
        <?= anchor('edit_profile', 'Edit Profile', array('class' =>'btn btn-primary' ));?>
      </div>
    </div>
  </div>
</div>
