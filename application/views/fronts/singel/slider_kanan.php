<div class="col-lg-3 ">
  <div class="post-list-item sticky">
  <!-- Nav tabs -->

  <div class="widgets ts-grid-item  widgets-populer-post">
              <h3 class="widget-title">Berita Terpopuler</h3>
              <?php
              $no = 1;
       foreach ($berita_pilihan as $post_new)
       {
         $jdl = character_limiter($post_new->judul,30);
          ?>
              <div class="post-content media">
<h4 style="color: #000;margin-right: 10px;font-size: 30px;">#<?php echo $no ?> </h4>
                               <div class="media-body align-self-center">

                  <h4 class="post-title">
                    <a href="#"><?php echo $post_new->judul ?> </a>
                  </h4>
                </div>
              </div>
                
   <?php $no++;} ?>


  
  <div class="widgets widgets-item widget-banner ">
    <a href="#">
      <img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/banner/sidebar-banner2.jpg" alt="">
    </a>
  </div>
  <!-- tab content end-->
</div>
