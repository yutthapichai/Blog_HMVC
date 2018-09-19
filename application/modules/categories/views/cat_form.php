<?php
  $attr = array(
    'name' => 'category',
    'class' => 'form-control mt-3'
  );

  $drop = array('' => 'Select a Category');
  foreach ($categories as $cat) {
    $drop[$cat['id']] = $cat['category_name'];
  }
  echo form_dropdown($attr, $drop);
 ?>
