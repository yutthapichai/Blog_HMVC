<?php
  $this->load->view('elements/top_layout');
  $this->load->view('elements/navigation');
  $this->load->view($module.'/'.$view_file);
  echo "<br><br>";
  $this->load->view('elements/footer');
  $this->load->view('elements/buttom_layout');
?>
