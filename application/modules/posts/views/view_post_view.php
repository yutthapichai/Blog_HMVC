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

      <?php
      if($this->session->flashdata('CommentValidation'))
      {
      ?>
      <div class="mt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Notification!</strong>
          <?php echo $this->session->flashdata('CommentValidation'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      <?php
    }else if($this->session->flashdata('CommentAdded')){
      ?>
      <div class="mt-3">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Notification!</strong>
            <?php echo $this->session->flashdata('CommentAdded'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
    <?php
    }
      echo Modules::run('comments/postcomments/add_comments'); 
      echo Modules::run('comments/postcomments/get_comments', $view_posts['post_id']);
      ?>
    </div>
    <div class="col-sm-12 col-lg-4">
    </div>
  </div>
</div>
