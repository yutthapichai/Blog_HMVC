<div class="container">
  <div class="row">
    <div class="col-sm-12 col-lg-8">
      <div class="post-holder bg-grey mt-5">
        <h3><?= $view_posts['title'] ?></h3>
        <div class="post_details">
          <small><?= anchor('view_author_profile/'.$view_posts['poster_id'],
          $view_posts['firstname'].'&nbsp'.$view_posts['lastname']); ?></small>

          <small><?= ucfirst($view_posts['category_name']);?></small>
        </div>
        <!-- have to load herper('text') will show content-->
        <p><?= word_limiter($view_posts['body']); ?></p>
      </div>
    </div>
    <div class="col-sm-12 col-lg-4">

    </div>
  </div>
</div>
