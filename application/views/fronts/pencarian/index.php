<!doctype html>
<html lang="en">


<!-- START SECTION HEAD -->
<?php $this->load->view('fronts/pencarian/head.php')?>
<!-- END SECTION HEAD -->

<body>
	<div class="body-inner-content category-layout-6">
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
								<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/banner/banner3.jpg" alt="">
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
				<div class="row mb-30">
					<div class="col-lg-12">
						<div class="">
							
							<div class="clearfix entry-cat-header">
								<h2 class="ts-title float-left"><?php echo "$title"; ?> </h2>
							
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-9">
						
						<div class="post-list">
							<!-- ts title end-->
							    <?php
    foreach ($results as $row) {
   

?>
							<div class='row mb-10'>
								<div class='col-md-4'>
									<div class='ts-post-thumb'>
										<a  class='post-cat ts-purple-bg'><?php echo $row->nama_kategori ?></a>
										<a href='<?php echo base_url("detail/$row->id_berita/$row->judul_seo ") ?>'>
											<img style='width: 100%;height: 150px;'class='img-fluid' src='<?php echo base_url()?>asset/foto_berita/<?php echo $row->gambar ?>'>
										</a>
									</div>
								</div>
								<!-- col lg end-->
								<div class='col-md-8'>
									<div class='post-content'>
										<h3 class='post-title md'>
											<a href='<?php echo base_url("detail/$row->id_berita/$row->judul_seo ") ?>'><?php echo $row->judul ?></a>
										</h3>
										<ul class='post-meta-info'>
											<li>
												<a > <?php echo $row->nama_lengkap ?></a>
											</li>
											<li>
												<i class='fa fa-clock-o'></i>
												 <?php echo tgl_indo($row->tanggal) ?>
											</li>
										</ul>
										
									</div>
								</div>
							</div>
							<!-- row end-->
						<?php } ?>
							<!-- row end-->
							<div class="ts-pagination text-center mt-15 md-mb-30">
								<ul class="pagination">
									
									
									<li>
										<?php
  echo $this->pagination->create_links();
  ?>
									</li>
									
									
								</ul>
							</div>
						</div>
					</div>
					<!-- START SECTION slider kanan -->
					<?php $this->load->view('fronts/singel/slider_kanan.php')?>
					<!-- END SECTION slider kanan -->
				<!-- right sidebar end-->
				</div>
				<!-- row end-->
			</div>
			<!-- container end-->
		</section>
		<!-- block area end-->

	

		<!-- footer start -->
	<?php $this->load->view('fronts/footer.php')?>
	<!-- footer end -->


	</div>


	
   <!-- javaScript Files
	=============================================================================-->

	<!-- initialize jQuery Library -->
	<script src="js/jquery.min.js"></script>
	<!-- navigation JS -->
	<script src="js/navigation.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>

	<!-- magnific popup JS -->
	<script src="js/jquery.magnific-popup.min.js"></script>



	<!-- Bootstrap jQuery -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Owl Carousel -->
	<script src="js/owl-carousel.2.3.0.min.js"></script>
	<!-- slick -->
	<script src="js/slick.min.js"></script>

	<!-- smooth scroling -->
	<script src="js/smoothscroll.js"></script>

	<script src="js/main.js"></script>
</body>


</html>