<!doctype html>
<html lang="en">



<!-- START SECTION HEAD -->
<?php $this->load->view('fronts/head.php')?>
<!-- END SECTION HEAD -->

<body class="body-color">

	<!-- <div id="preloader">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
		<div class="preloader-cancel-btn-wraper">
			<a href="#" class="btn btn-primary preloader-cancel-btn">Cancel Preloader</a>
		</div>
	</div> -->


	<!-- top bar start -->
	<?php $this->load->view('fronts/topbar.php')?>
	<!-- end top bar-->

	<!-- ad banner start -->
	<section class="header-middle">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="banner-img">
						<a href="index.html">
							<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/banner/banner1.jpg" alt="">
						</a>
					</div>
				</div>
				<!-- col end -->
			</div>
			<!-- row  end -->
		</div>
		<!-- container end -->
	</section>
	<!-- ad banner end -->

	<!-- header nav start-->
	<header class="header-default">
		<div class="container">
			<div class="row">
				<!-- logo start-->
				<?php $this->load->view('fronts/logo.php')?>
				
				<!-- logo end-->
				

						

							<!-- nav menu start-->
							<?php $this->load->view('fronts/menu.php')?>
							<!--nav menu end-->
						</div>
					</nav>
					<!-- nav end-->
				</div>
			</div>
		</div>
	</header>
	<!-- header nav end-->

	<!-- block post area start-->
	<section class="block-wrapper mt-15">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-12">
					<div id="featured-slider" class="owl-carousel ts-overlay-style ts-featured">
						<?php
					 foreach ($berita_headline as $post_new)
					 {

					 ?>
						<div class="item" style="background-image:url(<?php echo base_url()?>asset/foto_berita/<?php echo $post_new->gambar ?>)">
							<a class="post-cat ts-orange-bg" href="#"><?php echo $post_new->nama_kategori ?></a>
							<div class="overlay-post-content">
								<div class="post-content">
									<h2 class="post-title lg">
										<a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>"><?php echo $post_new->judul ?></a>
									</h2>
									<ul class="post-meta-info">
										<li class="author">
											<a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>">
												<img src="<?php echo base_url()?>asset/foto_user/<?php echo $post_new->foto ?>"> <?php echo $post_new->nama_lengkap ?>
											</a>
										</li>
										<li>
											<i class="fa fa-clock-o"></i>
											<?php echo tgl_indo($post_new->tanggal) ?>
										</li>

									</ul>
								</div>
							</div>
							<!--/ Featured post end -->

						</div>
						<!-- Item 1 end -->
<?php } ?>
					</div>
					<!-- Featured owl carousel end-->
				</div>
				<!-- col end-->

				<div class="col-lg-3">
					<?php
					 foreach ($berita_indepth as $post_new)
					 {

					 ?>
					<div class="ts-grid-box ts-grid-content">
						<a class="post-cat ts-orange-bg" href="#">Fokus</a>
						<div class="ts-post-thumb">
							<a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>">
								<img class="img-fluid" src="<?php echo base_url()?>asset/foto_berita/<?php echo $post_new->gambar ?>" alt="">
							</a>
						</div>
						<div class="post-content">
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
					<!-- ts single post item end-->

					<?php
					 foreach ($berita_wawancara as $post_new)
					 {

					 ?>
					<div class="ts-grid-box ts-grid-content">
						<a class="post-cat ts-pink-bg" href="#">Sorot</a>
						<div class="ts-post-thumb">
							<a href="<?php echo base_url("detail/$post_new->id_berita/$post_new->judul_seo ") ?>">
								<img class="img-fluid" src="<?php echo base_url()?>asset/foto_berita/<?php echo $post_new->gambar ?>" alt="">
							</a>
						</div>
						<div class="post-content">
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
					<!-- ts single post item end-->
				</div>
				<!-- col end-->

				<div class="col-lg-3">

					<!-- post-list-item end-->
				</div>
				<!-- col end-->
			</div>
			<!-- row end-->
		</div>
		<!-- container end-->
	</section>
	<!-- block area end-->




	<!-- Berita Terbaru start-->
	<?php $this->load->view('fronts/home/terbaru.php')?>
	<!-- Berita Terbaru End -->


	<!-- ad banner 2 start-->

	<!-- ad banner 2 end-->

	<!-- watch now start-->

	<!-- watch now end-->

	<!-- post wraper start-->

	<!-- post wraper end-->

	<!-- footer social list start-->
	
	<!-- footer social list end-->

	<!-- newslater start -->

	<!-- newslater end -->

	<!-- footer start -->
	<?php $this->load->view('fronts/footer.php')?>
	<!-- footer end -->




	
</body>



</html>
