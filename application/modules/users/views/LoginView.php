<?php
if($this->session->flashdata('UserRegistered'))
{
?>
  <div class="container mt-5">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Notification!</strong> <?php echo $this->session->flashdata('UserRegistered');?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
<?php
}
?>
