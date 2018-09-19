<div class="container mb-5">
  <div class="col-lg-8 col-md-12 col-sm-12 center-block mt-5 register-page bg-grey">
    <h2>Register</h2>
    <?php
    $firstname = array(
      'name' => 'firstname',
      'class' => 'form-control mt-3',
      'type' => 'text',
      'id' => 'firstname',
      'placeholder' => 'Enter your First name',
      'value' => set_value('firstname')
    );
    $lastname = array(
      'name' => 'lastname',
      'class' => 'form-control mt-3',
      'type' => 'text',
      'id' => 'lastname',
      'placeholder' => 'Enter your Last name',
      'value' => set_value('lastname')
    );
    $email = array(
      'name' => 'email',
      'class' => 'form-control mt-3',
      'type' => 'email',
      'id' => 'email',
      'placeholder' => 'Enter your Email',
      'value' => set_value('email')
    );
    $password = array(
      'name' => 'password',
      'class' => 'form-control mt-3',
      'type' => 'password',
      'id' => 'password',
      'placeholder' => 'Enter your Password'
    );
    $password2 = array(
      'name' => 'password2',
      'class' => 'form-control mt-3',
      'type' => 'password',
      'id' => 'password2',
      'placeholder' => 'Enter your confirm Password'
    );
    $gender = array(
      'name' => 'gender',
      'class' => 'form-control mt-3',
      'id' => 'gender',
      'value' => set_value('gender')
    );
    $gender_option = array(
      '' => 'Select your gender',
      'male' => 'Male',
      'female' => 'Female',
      'orthers' => 'Orthers'
    );
    $register_submit = array(
      'name' => 'register_submit',
      'class' => 'my-3 btn btn-primary',
      'value' => 'Register'
    );

    echo form_open('register', array('class' => 'form-forizontal mt-4'));
    
    echo form_input($firstname);
    echo '<div class="error">'.form_error('firstname').'</div>';
    echo form_input($lastname);
    echo '<div class="error">'.form_error('lastname').'</div>';
    echo form_input($email);
    echo '<div class="error">'.form_error('email').'</div>';
    echo form_input($password);
    echo '<div class="error">'.form_error('password').'</div>';
    echo form_input($password2);
    echo '<div class="error">'.form_error('password2').'</div>';
    echo form_dropdown($gender, $gender_option);
    echo '<div class="error">'.form_error('gender').'</div>';
    echo form_submit($register_submit);

    echo form_close();
     ?>
  </div>
</div>
