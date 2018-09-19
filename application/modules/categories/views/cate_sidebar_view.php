<div class="mt-5 sidebar-holder">
  <?php
  foreach ($categories as $value):
    ?>
    <ul class="sidebar">
      <?= '<li>' . anchor('view_category_post/'. $value['id'], $value['category_name']) . '</li>'?>
    </ul>
    <?php
  endforeach
   ?>
</div>
