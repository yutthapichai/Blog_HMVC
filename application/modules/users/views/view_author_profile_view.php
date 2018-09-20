<div class="profile-holder">
  <div class="container">
    <div class="bg-grey row mt-3">
      <div class="col-sm-12 col-md-4 col-lg-4 text-center">
        <img src="<?= base_url();?>assets/images/users/<?= $user_profile['profile_pic'];?>" alt="profile" class="img-fluid" width="200px">
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
      </div>
    </div>
  </div>
</div>
