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
	<section class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 align-self-center md-center-item">
					<div class="ts-temperature">
						<i class="icon-weather"></i>
						<span>25.8
							<b>c</b>
						</span>
						<span>Dubai</span>

					</div>

					<ul class="ts-top-nav">
						<li>
							<a href="#">Blog</a>
						</li>
						<li>
							<a href="#">Forums</a>
						</li>
						<li>
							<a href="#">Contact</a>
						</li>
						<li>
							<a href="#">Advertisement</a>
						</li>
					</ul>

				</div>
				<!-- end col-->

				<div class="col-lg-6 text-right align-self-center">
					<ul class="top-social">
						<li>
							<a href="#">
								<i class="fa fa-twitter"></i>
							</a>
							<a href="#">
								<i class="fa fa-facebook"></i>
							</a>
							<a href="#">
								<i class="fa fa-google-plus"></i>
							</a>
							<a href="#">
								<i class="fa fa-pinterest"></i>
							</a>
							<a href="#">
								<i class="fa fa-vimeo-square"></i>
							</a>
						</li>
						<li class="ts-date">
							<i class="fa fa-clock-o"></i>
							Sunday, August 24
						</li>
					</ul>
				</div>
				<!--end col -->


			</div>
			<!-- end row -->
		</div>
	</section>
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
				<div class="col-lg-2 pr-0">
					<div class="logo">
						<a href="index.html">
							<img src="<?php echo base_url()?>asset/frontend/images/logo/banner_logo.png" alt="">
						</a>
					</div>

				</div>
				<!-- logo end-->
				<div class="col-lg-10 header-nav-item">
					<div class="ts-breaking-news clearfix">
						<h2 class="breaking-title float-left">
							<i class="fa fa-bolt"></i> Breaking News :</h2>
						<div class="breaking-news-content owl-carousel float-left" id="breaking_slider">
							<div class="breaking-post-content">
								<p>
									<a href="#">Netcix cuts out the chill with an integrated personal trainer on running.</a>
								</p>
							</div>
							<div class="breaking-post-content">
								<p>
									<a href="#">Parquet Courts on Resisting Nihilism & Why Tourism in Dubai is booming the world.</a>
								</p>
							</div>
							<div class="breaking-post-content">
								<p>
									<a href="#">Parquet Courts on Resisting Nihilism & Why Tourism in Dubai is booming the world.</a>
								</p>
							</div>
						</div>
					</div>
					<!--nav top end-->
					<nav class="navigation ts-main-menu ts-menu-sticky navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand mobile-logo visible-xs" href="index.html">
								<img src="<?php echo base_url()?>asset/frontend/images/logo/footer_logo.png" alt="">
							</a>
							<div class="nav-toggle"></div>
						</div>
						<!--nav brand end-->

						<div class="nav-menus-wrapper clearfix">
							<!--nav right menu start-->
							<ul class="right-menu align-to-right">
								<li>
									<a href="#">
										<i class="fa fa-user-circle-o"></i>
									</a>
								</li>
								<li class="header-search">
									<div class="nav-search">
										<div class="nav-search-button">
											<i class="icon icon-search"></i>
										</div>
										<form>
											<span class="nav-search-close-button" tabindex="0">✕</span>
											<div class="nav-search-inner">
												<input type="search" name="search" placeholder="Type and hit ENTER">
											</div>
										</form>
									</div>
								</li>
							</ul>
							<!--nav right menu end-->

							<!-- nav menu start-->
							<ul class="nav-menu">
								<li class="active">
									<a href="#">Home</a>
									<div class="megamenu-panel ts-mega-menu">
										<div class="megamenu-lists">
											<ul class="megamenu-list list-col-2">
												<li class="active">
													<a href="index.html">Home One</a>
												</li>
												<li>
													<a href="index-2.html">Home Two</a>
												</li>
												<li>
													<a href="index-3.html">Home Three</a>
												</li>
												<li>
													<a href="index-4.html">Home Four</a>
												</li>
												<li>
													<a href="index-5.html">Home Five</a>
												</li>
												<li>
													<a href="index-6.html">Home Six</a>
												</li>
												<li>
													<a href="index-7.html">Home Seven</a>
												</li>
												<li>
													<a href="index-8.html">Home Eight</a>
												</li>
											</ul>
											<ul class="megamenu-list list-col-2">
												<li>
													<a href="business.html">Home Business</a>
												</li>
												<li>
													<a href="technology.html">Home Technology</a>
												</li>
												<li>
													<a href="food.html">Home Food</a>
												</li>
												<li>
													<a href="crypto.html">Home Crypto</a>
												</li>
												<li>
													<a href="health.html">Home Health</a>
												</li>
												<li>
													<a href="travel.html">Home Travel</a>
												</li>
												<li>
													<a href="sports.html">Home Sports</a>
												</li>
												<li>
													<a href="personal-blog.html">Personal Blog</a>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a href="#">Lifestyle</a>
									<div class="megamenu-panel">
										<div class="megamenu-tabs">
											<ul class="megamenu-tabs-nav">
												<li class="active">
													<a href="#">Health</a>
												</li>
												<li>
													<a href="#">Food</a>
												</li>
												<li>
													<a href="#">Fashion</a>
												</li>
												<li>
													<a href="#">Travel</a>
												</li>
											</ul>
											<div class="megamenu-tabs-pane active">
												<div class="row">
													<div class="col-12 col-lg-4">
														<div class="item">

															<div class="ts-post-thumb">
																<a class="post-cat ts-purple-bg" href="#">Health</a>
																<a href="#">
																	<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/health/health1.jpg" alt="">
																</a>
															</div>
															<div class="post-content">
																<h3 class="post-title">
																	<a href="#">Can't shed those Gym? The problem might be in</a>
																</h3>
															</div>
														</div>
													</div>
													<div class="col-12 col-lg-4">
														<div class="item">

															<div class="ts-post-thumb">
																<a class="post-cat ts-purple-bg" href="#">Health</a>
																<a href="#">
																	<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/health/health2.jpg" alt="">
																</a>
															</div>
															<div class="post-content">
																<h3 class="post-title">
																	<a href="#">Smart packs parking sensor tech and beeps</a>
																</h3>
															</div>
														</div>
													</div>
													<div class="col-12 col-lg-4">
														<div class="item">

															<div class="ts-post-thumb">
																<a class="post-cat ts-purple-bg" href="#">Health</a>
																<a href="#">
																	<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/health/health3.jpg" alt="">
																</a>
															</div>
															<div class="post-content">
																<h3 class="post-title">
																	<a href="#">Deleting fears from the brain means you might never</a>
																</h3>
															</div>
														</div>
													</div>

												</div>

											</div>
											<!-- mega menu end-->
											<div class="megamenu-tabs-pane">
												<div class="row">
													<div class="col-12 col-lg-4">
														<div class="item">

															<div class="ts-post-thumb">
																<a class="post-cat ts-yellow-bg" href="#">Food</a>
																<a href="#">
																	<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/foods/food1.jpg" alt="">
																</a>
															</div>
															<div class="post-content">
																<h3 class="post-title">
																	<a href="#">Tourism in Dubai is booming by international tourist</a>
																</h3>
															</div>
														</div>
													</div>
													<div class="col-12 col-lg-4">
														<div class="item">

															<div class="ts-post-thumb">
																<a class="post-cat ts-yellow-bg" href="#">Food</a>
																<a href="#">
																	<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/foods/food2.jpg" alt="">
																</a>
															</div>
															<div class="post-content">
																<h3 class="post-title">
																	<a href="#">Tourism in Dubai is booming by international tourist</a>
																</h3>
															</div>
														</div>
													</div>
													<div class="col-12 col-lg-4">
														<div class="item">

															<div class="ts-post-thumb">
																<a class="post-cat ts-yellow-bg" href="#">Food</a>
																<a href="#">
																	<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/foods/food3.jpg" alt="">
																</a>
															</div>
															<div class="post-content">
																<h3 class="post-title">
																	<a href="#">Tourism in Dubai is booming by international tourist</a>
																</h3>
															</div>
														</div>
													</div>

												</div>

											</div>
											<!-- mega menu end-->
											<div class="megamenu-tabs-pane">
												<div class="row">
													<div class="col-12 col-lg-4">
														<div class="item">

															<div class="ts-post-thumb">
																<a class="post-cat ts-pink-bg" href="#">Fashion</a>
																<a href="#">
																	<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/tech/tech1.jpg" alt="">
																</a>
															</div>
															<div class="post-content">
																<h3 class="post-title">
																	<a href="#">Tourism in Dubai is booming by international tourist</a>
																</h3>
															</div>
														</div>
													</div>
													<div class="col-12 col-lg-4">
														<div class="item">

															<div class="ts-post-thumb">
																<a class="post-cat ts-pink-bg" href="#">Fashion</a>
																<a href="#">
																	<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/tech/tech2.jpg" alt="">
																</a>
															</div>
															<div class="post-content">
																<h3 class="post-title">
																	<a href="#">Tourism in Dubai is booming by international tourist</a>
																</h3>
															</div>
														</div>
													</div>
													<div class="col-12 col-lg-4">
														<div class="item">

															<div class="ts-post-thumb">
																<a class="post-cat ts-pink-bg" href="#">Fashion</a>
																<a href="#">
																	<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/tech/tech3.jpg" alt="">
																</a>
															</div>
															<div class="post-content">
																<h3 class="post-title">
																	<a href="#">Tourism in Dubai is booming by international tourist</a>
																</h3>
															</div>
														</div>
													</div>

												</div>

											</div>
											<!-- mega menu end-->
											<div class="megamenu-tabs-pane">
												<div class="row">
													<div class="col-12 col-lg-4">
														<div class="item">

															<div class="ts-post-thumb">
																<a class="post-cat ts-orange-bg" href="#">Travel</a>
																<a href="#">
																	<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/travel/travel2.jpg" alt="">
																</a>
															</div>
															<div class="post-content">
																<h3 class="post-title">
																	<a href="#">Tourism in Dubai is booming by international tourist</a>
																</h3>
															</div>
														</div>
													</div>
													<div class="col-12 col-lg-4">
														<div class="item">

															<div class="ts-post-thumb">
																<a class="post-cat ts-orange-bg" href="#">Travel</a>
																<a href="#">
																	<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/travel/travel3.jpg" alt="">
																</a>
															</div>
															<div class="post-content">
																<h3 class="post-title">
																	<a href="#">Tourism in Dubai is booming by international tourist</a>
																</h3>
															</div>
														</div>
													</div>
													<div class="col-12 col-lg-4">
														<div class="item">

															<div class="ts-post-thumb">
																<a class="post-cat ts-orange-bg" href="#">Travel</a>
																<a href="#">
																	<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/travel/travel4.jpg" alt="">
																</a>
															</div>
															<div class="post-content">
																<h3 class="post-title">
																	<a href="#">Tourism in Dubai is booming by international tourist</a>
																</h3>
															</div>
														</div>
													</div>

												</div>

											</div>
											<!-- mega menu end-->

										</div>
									</div>
								</li>
								<li>
									<a href="category-1.html">Technology</a>
								</li>
								<li>
									<a href="#">Video</a>
									<div class="megamenu-panel">
										<div class="row">
											<div class="col-12 col-lg-3">
												<div class="item">
													<div class="ts-post-thumb">
														<a href="#">
															<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/tech/tech1.jpg" alt="">
														</a>
														<a href="https://www.youtube.com/watch?v=uZmz6fGRVW4" class="fa fa-play-circle-o ts-video-icon"></a>
													</div>
													<div class="post-content">
														<h3 class="post-title">
															<a href="#">Tourism in Dubai tourist favorite place</a>
														</h3>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-3">
												<div class="item">
													<div class="ts-post-thumb">
														<a href="#">
															<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/tech/tech2.jpg" alt="">

														</a>
														<a href="https://www.youtube.com/watch?v=uZmz6fGRVW4" class="fa fa-play-circle-o ts-video-icon"></a>

													</div>
													<div class="post-content">
														<h3 class="post-title">
															<a href="#">Tourism in Dubai tourist favorite place</a>
														</h3>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-3">
												<div class="item">
													<div class="ts-post-thumb">
														<a href="#">
															<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/tech/tech3.jpg" alt="">

														</a>
														<a href="https://www.youtube.com/watch?v=uZmz6fGRVW4" class="fa fa-play-circle-o ts-video-icon"></a>

													</div>
													<div class="post-content">
														<h3 class="post-title">
															<a href="#">Tourism in Dubai tourist favorite place</a>
														</h3>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-3">
												<div class="item">
													<div class="ts-post-thumb">
														<a href="#">
															<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/tech/tech4.jpg" alt="">
														</a>
														<a href="https://www.youtube.com/watch?v=uZmz6fGRVW4" class="fa fa-play-circle-o ts-video-icon"></a>
													</div>
													<div class="post-content">
														<h3 class="post-title">
															<a href="#">Tourism in Dubai tourist favorite place</a>
														</h3>
													</div>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li>
									<a href="category-2.html">Travel</a>
								</li>
								<li>
									<a href="#">Features</a>
									<ul class="nav-dropdown">
										<li>
											<a href="#">Category layout</a>
											<ul class="nav-dropdown">
												<li>
													<a href="category-1.html">Category layout 1</a>
												</li>
												<li>
													<a href="category-2.html">Category layout 2 </a>
												</li>
												<li>
													<a href="category-3.html">Category layout 3</a>
												</li>
												<li>
													<a href="category-4.html">Category layout 4</a>
												</li>
												<li>
													<a href="category-5.html">Category layout 5</a>
												</li>
												<li>
													<a href="category-6.html">Category layout 6</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="#">Posts Formate</a>
											<ul class="nav-dropdown">
												<li>
													<a href="single-post-1.html">Single Post 1</a>
												</li>
												<li>
													<a href="single-post-2.html">Single Post 2 </a>
												</li>
												<li>
													<a href="single-post-3.html">Single Post 3 </a>
												</li>
												<li>
													<a href="single-post-4.html">Single Post 4 </a>
												</li>
												<li>
													<a href="single-post-5.html">Single Post 5</a>
												</li>
												<li>
													<a href="single-post-6.html">Single Post 6</a>
												</li>
												<li>
													<a href="single-post-7.html">Single Post 7</a>
												</li>
												<li>
													<a href="single-post-8.html">Single Post 8</a>
												</li>
												<li>
													<a href="single-post-9.html">Single Post 9</a>
												</li>
												<li>
													<a href="single-post-10.html">Single Post 10</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="#">Pages</a>
											<ul class="nav-dropdown">
												<li>
													<a href="author.html">Author</a>
												</li>
												<li>
													<a href="contact.html">Contact Us</a>
												</li>
												<li>
														<a href="login.html">Log In</a>
												</li>
												<li>
														<a href="registration.html">registration</a>
												</li>
												<li>
													<a href="404.html">404 </a>
												</li>
											</ul>
										</li><!--Pages end-->
									</ul>
								</li>

							</ul>
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
										<a href="#"><?php echo $post_new->judul ?></a>
									</h2>
									<ul class="post-meta-info">
										<li class="author">
											<a href="#">
												<img src="<?php echo base_url()?>asset/frontend/images/avater/author1.jpg" alt=""> <?php echo $post_new->nama_lengkap ?>
											</a>
										</li>
										<li>
											<i class="fa fa-clock-o"></i>
											March 21, 2019
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
					<div class="ts-grid-box ts-grid-content">
						<a class="post-cat ts-orange-bg" href="#">Travel</a>
						<div class="ts-post-thumb">
							<a href="#">
								<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/travel/travel10.jpg" alt="">
							</a>
						</div>
						<div class="post-content">
							<h3 class="post-title">
								<a href="#">The clock is ticking for e-cig companies underage users</a>
							</h3>
							<span class="post-date-info">
								<i class="fa fa-clock-o"></i>
								March 21, 2019
							</span>
						</div>
					</div>
					<!-- ts single post item end-->
					<div class="ts-grid-box ts-grid-content">
						<a class="post-cat ts-pink-bg" href="#">Music</a>
						<div class="ts-post-thumb">
							<a href="#">
								<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/music/music1.jpg" alt="">
							</a>
						</div>
						<div class="post-content">
							<h3 class="post-title">
								<a href="#">Tourism in Dubai is booming by international tourist</a>
							</h3>
							<span class="post-date-info">
								<i class="fa fa-clock-o"></i>
								March 21, 2019
							</span>
						</div>
					</div>
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
	<section class="ts-footer-social-list">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="footer-logo">
						<a href="#">
							<img src="<?php echo base_url()?>asset/frontend/images/logo/footer_logo.png" alt="">
						</a>
					</div>
					<!-- footer logo end-->
				</div>
				<!-- col end-->

				<div class="col-lg-8 align-self-center">
					<ul class="footer-social">
						<li class="ts-facebook">
							<a href="#">
								<i class="fa fa-facebook"></i>
								<span>Facebook</span>
							</a>
						</li>
						<li class="ts-google-plus">
							<a href="#">
								<i class="fa fa-google-plus"></i>
								<span>Google Plus</span>
							</a>
						</li>
						<li class="ts-twitter">
							<a href="#">
								<i class="fa fa-twitter"></i>
								<span>Twitter</span>
							</a>
						</li>
						<li class="ts-pinterest">
							<a href="#">
								<i class="fa fa-pinterest-p"></i>
								<span>pinterest</span>
							</a>
						</li>
						<li class="ts-linkedin">
							<a href="#">
								<i class="fa fa-linkedin"></i>
								<span>Linkedin</span>
							</a>

						</li>
					</ul>
				</div>
				<!-- col end-->

			</div>
		</div>
	</section>
	<!-- footer social list end-->

	<!-- newslater start -->

	<!-- newslater end -->

	<!-- footer start -->
	<?php $this->load->view('fronts/footer.php')?>
	<!-- footer end -->




	
</body>



</html>
