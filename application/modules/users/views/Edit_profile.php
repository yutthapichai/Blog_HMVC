<?php
$firstname = array(
  'name' => 'firstname',
  'class' => 'form-control mt-3',
  'type' => 'text',
  'id' => 'firstname',
  'placeholder' => 'Enter your First name',
  'value' => $user_profile['firstname']
);
$lastname = array(
  'name' => 'lastname',
  'class' => 'form-control mt-3',
  'type' => 'text',
  'id' => 'lastname',
  'placeholder' => 'Enter your Last name',
  'value' => $user_profile['lastname']
);
$email = array(
  'name' => 'email',
  'class' => 'form-control mt-3',
  'type' => 'email',
  'id' => 'email',
  'placeholder' => 'Enter your Email',
  'value' => $user_profile['email'],
  'readonly' => 'true'
);
$about = array(
  'name' => 'about',
  'class' => 'form-control mt-3',
  'row' => '3',
  'cols' => '10',
  'placeholder' => 'Enter your somethings about yourself',
  'value' => $user_profile['about']
);
$profile_submit = array(
  'name' => 'profile_submit',
  'class' => 'my-3 btn btn-info',
  'value' => 'Update profile'
);

 ?>

<div class="container my-5">
  <div class="row">
    <div class="col-sm-12 col-lg-8 bg-grey">
      <h2>Edit Profile</h2>
      <?php
      echo form_open('update_profile', array('class' => 'form-forizontal mt-4'));

      echo form_input($firstname);
      echo '<div class="error">'.form_error('firstname').'</div>';
      echo form_input($lastname);
      echo '<div class="error">'.form_error('lastname').'</div>';
      echo form_input($email);
      echo '<div class="error">'.form_error('email').'</div>';
      echo form_textarea($about);
      echo '<div class="error">'.form_error('about').'</div>';
      echo form_submit($profile_submit);

      echo form_close();
       ?>
    </div>
    <div class="col-sm-12 col-lg-4">

    </div>
  </div>
</div>
