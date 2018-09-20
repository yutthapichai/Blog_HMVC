<div class="mt-3 col-lg-8 col-sm-12">
  <?php
  foreach ($categories as $value):
    ?>
    <div class="sidebar">
      <?=  anchor('view_category_post/'. $value['id'], $value['category_name'], array('class' => 'btn btn-light btn-block mt-2'));?>
    </div>
    <?php
  endforeach
   ?>
</div>
