<div class="container mt-3">
  <div class="row">
    <div class="col-sm-8">
      <h2>Latest Postss</h2>
      <?php echo Modules::run('posts/blog/dash_posts'); ?>
    </div>
    <div class="col-sm-4">
      <?php echo Modules::run('categories/categories/get_cat_sidebar'); ?>
    </div>
  </div>
</div>
