<section class="block-wrapper hot-topics-item">
			<div class="container">



				<div class="row">
					<div class="col-lg-9">
						<!-- START SECTION pilihan -->
						<?php $this->load->view('fronts/home/pilihan2.php')?>
						<!-- END SECTION pilihan -->
						<div class="ts-heading clearfix">
							<h2 class="ts-title float-left">
								Berita Terbaru
							</h2>

						</div>

						<div class="post-list">
							<!-- ts title end-->
							 <?php
       foreach ($berita_terbaru as $post_new)
       {
         $jdl = character_limiter($post_new->judul,30);
          ?>
							<div class="row mb-10">
								<div style="max-height:150px" class="col-md-4">
									<div  class="ts-post-thumb">
										<a class="post-cat ts-orange-bg" href="<?php echo base_url("artikel/kategori/$post_new->kategori_seo ") ?>"><?php echo $post_new->nama_kategori ?></a>
										<a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>">
											<img style="width: 100%;" class="img-fluid" src="<?php echo base_url()?>asset/foto_berita/<?php echo $post_new->gambar ?>" alt="">
										</a>
									</div>
								</div>
								<!-- col lg end-->
								<div style="padding-bottom: 15px;padding-top: 25px;" class="col-md-8">
									<div class="post-content ">
										<h3 class="post-title md">
											<a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>"><?php echo $post_new->judul ?></a>
										</h3>
										<ul class="post-meta-info">
											
											<li>
												<a href="">Penulis : <?php echo $post_new->penulis ?></a>
											</li>
											<li>
												<i class="fa fa-clock-o"></i>
												 <?php echo tgl_indo($post_new->tanggal) ?>
											</li>
											
										</ul>
									
										</p>
									</div>
								</div>
							</div>
							 <?php } ?>
							<!-- row end-->
							
						</div>



						<!-- row end-->

						<!-- START SECTION pilihan -->
						<?php $this->load->view('fronts/home/kategori2.php')?>
						<!-- END SECTION pilihan -->
						<br>
						<div class="post-list">
							 <?php
       foreach ($berita_terbaru2 as $post_new)
       {
         $jdl = character_limiter($post_new->judul,30);
          ?>
							<div class="row mb-10">
								<div class="col-md-4">
									<div  class="ts-post-thumb">
										<a class="post-cat ts-orange-bg" href="<?php echo base_url("artikel/kategori/$post_new->kategori_seo ") ?>"><?php echo $post_new->nama_kategori ?></a>
										<a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>">
											<img style="width: 100%; "class="img-fluid" src="<?php echo base_url()?>asset/foto_berita/<?php echo $post_new->gambar ?>" alt="">
										</a>
									</div>
								</div>
								<!-- col lg end-->
								<div style="padding-bottom: 15px;padding-top: 25px;" class="col-md-8">
									<div class="post-content">
										<h3 class="post-title md">
											<a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>"><?php echo $post_new->judul ?></a>
										</h3>
										<ul class="post-meta-info">
										<li>
												<a href="">Penulis : <?php echo $post_new->penulis ?></a>
											</li>
											<li>
												<i class="fa fa-clock-o"></i>
												 <?php echo tgl_indo($post_new->tanggal) ?>
											</li>
											
										</ul>
									
										</p>
									</div>
								</div>
							</div>
							 <?php } ?>
						</div>
							<!-- START SECTION pilihan -->
						<?php $this->load->view('fronts/home/kategori3.php')?>
						<!-- END SECTION pilihan -->
						<br>
							<div class="post-list">
							 <?php
       foreach ($berita_terbaru3 as $post_new)
       {
         $jdl = character_limiter($post_new->judul,30);
          ?>
							<div class="row mb-10">
								<div class="col-md-4">
									<div class="ts-post-thumb">
										<a class="post-cat ts-orange-bg" href="<?php echo base_url("artikel/kategori/$post_new->kategori_seo ") ?>"><?php echo $post_new->nama_kategori ?></a>
										<a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>">
											<img style=" width: 100%;"class="img-fluid" src="<?php echo base_url()?>asset/foto_berita/<?php echo $post_new->gambar ?>" alt="">
										</a>
									</div>
								</div>
								<!-- col lg end-->
								<div style="padding-bottom: 15px;padding-top: 25px;" class="col-md-8">
									<div class="post-content">
										<h3 class="post-title md">
											<a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>"><?php echo $post_new->judul ?></a>
										</h3>
										<ul class="post-meta-info">
											<li>
												<a href="">Penulis : <?php echo $post_new->penulis ?></a>
											</li>
											<li>
												<i class="fa fa-clock-o"></i>
												 <?php echo tgl_indo($post_new->tanggal) ?>
											</li>
											
										</ul>
									
										</p>
									</div>
								</div>
							</div>
							 <?php } ?>
						</div>
						<div class="ts-pagination text-center mb-20">
							<ul class="pagination">
							
								<li class="active">
									<a href="<?php echo base_url("") ?>">1</a>
								</li>
								<li>
									<a href="<?php echo base_url("main/berita/12") ?>">2</a>
								</li>
							
							
								<li>
									<a href="<?php echo base_url("main/berita/12") ?>">
										<i class="fa fa-angle-double-right"></i>
									</a>
								</li>
							</ul>
						</div>

						<div class="banner-img text-center">
							<a href="index.html">
								<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/banner/banner2.jpg" alt="">
							</a>
						</div>
					</div>


					<!-- col end-->
					<!-- START SECTION slider kanan -->
					<?php $this->load->view('fronts/home/sliderkanan.php')?>
					<!-- END SECTION slider kanan -->
						<!-- widgets end-->
						<!-- <div class="widgets widgets-item widget-banner ">
							<a href="#">
								<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/banner/sidebar-banner2.jpg" alt="">
							</a>
						</div> -->
						<!-- widgets end-->


					</div>
					<!-- col end-->
				</div>
			</div>
		</section>
