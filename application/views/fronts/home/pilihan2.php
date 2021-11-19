<div class="row">
  <div class="col-lg-3 col-md-4">
    <div class="posts-ad">
      <a href="#">
        <img src="<?php echo base_url()?>asset/frontend/images/banner/sidebar-banner4.jpg" alt="">
      </a>
    </div>
  </div>
  <!-- col end -->
  <div class="col-lg-9 col-md-8">
    <div class="ts-grid-box most-populer-item">
      <h2 class="ts-title">Berita Pilihan</h2>

      <div class="most-populers owl-carousel">
        <?php
       foreach ($berita_pilihan as $post_new)
       {
         $jdl = character_limiter($post_new->judul,30);
          ?>
        <div class="item">
          <a class="post-cat ts-orange-bg" href="#"><?php echo $post_new->nama_kategori ?></a>
          <div class="ts-post-thumb">
            <a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>">
              <img style="height:100px"class="img-fluid" src="<?php echo base_url()?>asset/foto_berita/<?php echo $post_new->gambar ?>" alt="">
            </a>
          </div>
          <div class="post-content">
            <h3 class="post-title">
              <a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>"><?php echo $jdl ?></a>
            </h3>
            <span class="post-date-info">
              <i class="fa fa-clock-o"></i>
              <?php echo tgl_indo($post_new->tanggal) ?>
            </span>
          </div>
        </div>
        <?php } ?>
        <!-- ts-grid-box end-->


        <!-- ts-grid-box end-->
      </div>
      <!-- most-populers end-->
    </div>
    <!-- ts-populer-post-box end-->
  </div>
  <!-- col end-->
</div>
