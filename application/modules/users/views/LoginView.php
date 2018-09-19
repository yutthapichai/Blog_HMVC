<?php
if($this->session->flashdata('UserRegistered'))
{
?>
  <div class="container mt-5">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Notification!</strong> <?php echo $this->session->flashdata('UserRegistered');?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
<?php
}
?>

<div class="container">
    <div class="col-sm-12 col-md-12 col-lg-8 center-block mt-5 login-page bg-grey">
      <h2>Login here...!</h2>
      <?php
      $email = array(
        'name' => 'login_email',
        'class' => 'form-control mt-3',
        'type' => 'email',
        'id' => 'email',
        'placeholder' => 'Enter your Email',
      );
      $password = array(
        'name' => 'login_password',
        'class' => 'form-control mt-3',
        'type' => 'password',
        'id' => 'password',
        'placeholder' => 'Enter your Password'
      );
      $login_submit = array(
        'name' => 'login_submit',
        'class' => 'my-3 btn btn-primary',
        'value' => 'Login'
      );
      echo form_open('login', array('class' => 'form-forizontal mt-4'));

      echo form_input($email);
      echo '<div class="error">'.form_error('login_email').'</div>';
      echo form_input($password);
      echo '<div class="error">'.form_error('login_password').'</div>';
      echo form_submit($login_submit);

      echo form_close();
       ?>
    </div>
</div>
