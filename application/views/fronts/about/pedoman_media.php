<!doctype html>
<html lang="en">



<!-- START SECTION HEAD -->
<?php $this->load->view('fronts/head.php')?>
<!-- END SECTION HEAD -->

<body class="body-color">
	<!-- top bar start -->
	<!-- top bar start -->
	<?php $this->load->view('fronts/topbar.php')?>
	<!-- end top bar-->

	<!-- ad banner start -->
	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="banner-img text-center">
						<a href="index.html">
							<img src="<?php echo base_url()?>asset/frontend/images/banner/banner1.jpg" alt="">
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
	<!-- header nav start-->
	

	<!-- single post start -->
	<section class="single-post-wrapper">
		<div class="container">
			<div class="row">

				<div class="col-lg-9 mx-auto">
					<div class="ts-grid-box content-wrapper single-post"> <?php
              foreach ($identitas_web as $post_new)
              {
              
              ?>
						<div class="entry-header">
							<center><h2 class="post-title lg">Pedoman Media Siber

 </h2></center>
							
						</div>
						<!-- single post header end-->
						<div class="post-content-area">
						
							<div class="entry-content">
								
								<p>
									<?php echo $post_new->pedoman_db ?>
								</p>
							</div>
							 <?php } ?>
							<!-- entry content end-->
						</div>
						<!-- post content area-->
						
					
						<!-- post navigation end-->
					</div>
				
				</div>
				<!-- col end -->
				<!-- col end-->
			</div>
			<!-- row end-->
		</div>
		<!-- container-->
	</section>
	<!-- single post end-->

	<!-- footer start -->
	<?php $this->load->view('fronts/footer.php')?>
	<!-- footer end -->
</body>


</html>