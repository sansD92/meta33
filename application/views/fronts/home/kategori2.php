<div class="row">
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-6">
        <div class="ts-title-item">
            <h2 class="ts-cat-title ">
              <a href="<?php echo base_url("artikel/kategori/olahraga ") ?>"><span>Olahraga</span></a>
            </h2>
          </div><!-- Title end -->
        <div class="post-list-box ts-list-post-box ts-grid-content">


 <?php
       foreach ($olaraga as $post_new)
       {
         $jdl = character_limiter($post_new->judul,30);
          ?>
          <div class="post-content media">
            <a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>">
              <img style="height: 80px;"class="d-flex" src="<?php echo base_url()?>asset/foto_berita/<?php echo $post_new->gambar ?>" alt="">
            </a>
            <div class="media-body align-self-center">
              <h3 class="post-title">
                <a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>"><?php echo $post_new->judul ?></a>
              </h3>
              <span class="post-date-info">
                <i class="fa fa-clock-o"></i>
                <?php echo tgl_indo($post_new->tanggal) ?>
              </span>
            </div>
          </div>
        
<?php } ?>

          <!-- end item-->
        </div>
      </div>
      <!-- col end-->
      <div class="col-lg-6">
        <div class="ts-title-item">
            <h2 class="ts-cat-title ">
              <a href="<?php echo base_url("artikel/kategori/viral ") ?>"><span>Viral</span></a>
            </h2>
          </div><!-- Title end -->
        <div class="post-list-box ts-list-post-box ts-grid-content">



         <?php
       foreach ($muda as $post_new)
       {
         $jdl = character_limiter($post_new->judul,30);
          ?>
          <div class="post-content media">
            <a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>">
              <img style="height: 80px;"class="d-flex" src="<?php echo base_url()?>asset/foto_berita/<?php echo $post_new->gambar ?>" alt="">
            </a>
            <div class="media-body align-self-center">
              <h3 class="post-title">
                <a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>"><?php echo $post_new->judul ?></a>
              </h3>
              <span class="post-date-info">
                <i class="fa fa-clock-o"></i>
                <?php echo tgl_indo($post_new->tanggal) ?>
              </span>
            </div>
          </div>
        
<?php } ?>


          <!-- end item-->
        </div>
      </div>
      <!-- col end-->

    </div>
    <!-- row end-->
  </div>
  <!-- col end-->

</div>
