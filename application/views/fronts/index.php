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
				<div class="col-lg-6 col-md-12">
					<div id="featured-slider" class="owl-carousel ts-overlay-style ts-featured">
						<div class="item" style="background-image:url(<?php echo base_url()?>asset/frontend/images/news/travel/travel1.jpg)">
							<a class="post-cat ts-orange-bg" href="#">TRAVEL</a>
							<div class="overlay-post-content">
								<div class="post-content">
									<h2 class="post-title lg">
										<a href="#">Netcix cuts out the chill with an integrated personal trainer on running</a>
									</h2>
									<ul class="post-meta-info">
										<li class="author">
											<a href="#">
												<img src="<?php echo base_url()?>asset/frontend/images/avater/author1.jpg" alt=""> Donald Ramos
											</a>
										</li>
										<li>
											<i class="fa fa-clock-o"></i>
											March 21, 2019
										</li>
										<li class="active">
											<i class="icon-fire"></i>
											3,005
										</li>
									</ul>
								</div>
							</div>
							<!--/ Featured post end -->

						</div>
						<!-- Item 1 end -->
						<div class="item" style="background-image:url(<?php echo base_url()?>asset/frontend/images/news/travel/travel2.jpg)">
							<a class="post-cat ts-orange-bg" href="#">TRAVEL</a>
							<div class="overlay-post-content">
								<div class="post-content">
									<h2 class="post-title lg">
										<a href="#">The clock is ticking for e-cig companies to block underage users</a>
									</h2>
									<ul class="post-meta-info">
										<li class="author">
											<a href="#">
												<img src="<?php echo base_url()?>asset/frontend/images/avater/author1.jpg" alt=""> Donald Ramos
											</a>
										</li>
										<li>
											<i class="fa fa-clock-o"></i>
											March 21, 2019
										</li>
										<li class="active">
											<i class="icon-fire"></i>
											3,005
										</li>
									</ul>
								</div>
							</div>
							<!--/ Featured post end -->
						</div>
						<!-- Item 2 end -->

						<div class="item" style="background-image:url(<?php echo base_url()?>asset/frontend/images/news/travel/travel3.jpg)">
							<a class="post-cat ts-orange-bg" href="#">TRAVEL</a>
							<div class="overlay-post-content">
								<div class="post-content">
									<h2 class="post-title lg">
										<a href="#">Netcix cuts out the chill with an integrated personal trainer on running</a>
									</h2>
									<ul class="post-meta-info">
										<li class="author">
											<a href="#">
												<img src="<?php echo base_url()?>asset/frontend/images/avater/author1.jpg" alt=""> Donald Ramos
											</a>
										</li>
										<li>
											<i class="fa fa-clock-o"></i>
											March 21, 2019
										</li>
										<li class="active">
											<i class="icon-fire"></i>
											3,005
										</li>
									</ul>
								</div>
							</div>
							<!--/ Featured post end -->
						</div>
						<!-- Item 3 end -->
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
					<div class="post-list-item">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation">
								<a class="active" href="#home" aria-controls="home" role="tab" data-toggle="tab">
									<i class="fa fa-clock-o"></i>
									Recent
								</a>
							</li>
							<li role="presentation">
								<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
									<i class="fa fa-heart"></i>
									Favorites
								</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active ts-grid-box post-tab-list" id="home">
								<div class="post-content media">
									<img class="d-flex sidebar-img" src="<?php echo base_url()?>asset/frontend/images/news/sports/sports2.jpg" alt="">
									<div class="media-body">
										<span class="post-tag">
											<a href="#" class="green-color"> sports</a>
										</span>
										<h4 class="post-title">
											<a href="#">18 month old shoots himself by gun </a>
										</h4>
									</div>
								</div>
								<!--post-content end-->
								<div class="post-content media ">
									<img class="d-flex sidebar-img" src="<?php echo base_url()?>asset/frontend/images/news/tech/tech4.jpg" alt="">
									<div class="media-body">
										<span class="post-tag">
											<a href="#" class="light-blue-color"> Technology</a>
										</span>
										<h4 class="post-title">
											<a href="#">Hands on with Apple Watch Series 4</a>
										</h4>
									</div>
								</div>
								<!--post-content end-->
								<div class="post-content media">
									<img class="d-flex sidebar-img" src="<?php echo base_url()?>asset/frontend/images/news/sports/sports2.jpg" alt="">
									<div class="media-body">
										<span class="post-tag">
											<a href="#" class="purple-color"> Health</a>
										</span>
										<h4 class="post-title">
											<a href="#">Easy lemon rice (yellow rice) </a>
										</h4>
									</div>
								</div>
								<!--post-content end-->
								<div class="post-content media">
									<img class="d-flex sidebar-img" src="<?php echo base_url()?>asset/frontend/images/news/fashion/fashion4.jpg" alt="">
									<div class="media-body">
										<span class="post-tag">
											<a href="#" class="pink-color"> Fashion</a>
										</span>
										<h4 class="post-title">
											<a href="#">18 month old shoots himself by gun </a>
										</h4>
									</div>
								</div>
								<!--post-content end-->
								<div class="post-content  media">
									<img class="d-flex sidebar-img" src="<?php echo base_url()?>asset/frontend/images/news/travel/travel6.jpg" alt="">
									<div class="media-body">
										<span class="post-tag">
											<a href="#" class="orange-color"> Travel</a>
										</span>
										<h4 class="post-title">
											<a href="#">Apple introduces larger Apple Watch </a>
										</h4>
									</div>
								</div>
								<!--post-content end-->
								<div class="post-content media">
									<img class="d-flex sidebar-img" src="<?php echo base_url()?>asset/frontend/images/news/sports/sports1.jpg" alt="">
									<div class="media-body">
										<span class="post-tag">
											<a href="#" class="green-color"> sports</a>
										</span>
										<h4 class="post-title">
											<a href="#">easy teriyaki chicken broccoli </a>
										</h4>
									</div>
								</div>
								<!--post-content end-->
							</div>
							<!--ts-grid-box end -->

							<div role="tabpanel" class="tab-pane fade ts-grid-box post-tab-list" id="profile">
								<div class="post-content media">
									<img class="d-flex sidebar-img" src="<?php echo base_url()?>asset/frontend/images/news/tech/tech4.jpg" alt="">
									<div class="media-body">
										<span class="post-tag">
											<a href="#" class="green-color"> sports</a>
										</span>
										<h4 class="post-title">
											<a href="#">18 month old shoots himself by gun </a>
										</h4>
									</div>
								</div>
								<!--post-content end-->
								<div class="post-content media ">
									<img class="d-flex sidebar-img" src="<?php echo base_url()?>asset/frontend/images/news/sports/sports2.jpg" alt="">
									<div class="media-body">
										<span class="post-tag">
											<a href="#" class="light-blue-color"> Technology</a>
										</span>
										<h4 class="post-title">
											<a href="#">18 month old shoots himself by gun </a>
										</h4>
									</div>
								</div>
								<!--post-content end-->
								<div class="post-content media">
									<img class="d-flex sidebar-img" src="<?php echo base_url()?>asset/frontend/images/news/fashion/fashion4.jpg" alt="">
									<div class="media-body">
										<span class="post-tag">
											<a href="#" class="purple-color"> Health</a>
										</span>
										<h4 class="post-title">
											<a href="#">18 month old shoots himself by gun </a>
										</h4>
									</div>
								</div>
								<!--post-content end-->
								<div class="post-content media">
									<img class="d-flex sidebar-img" src="<?php echo base_url()?>asset/frontend/images/news/sports/sports4.jpg" alt="">
									<div class="media-body">
										<span class="post-tag">
											<a href="#" class="pink-color"> Fashion</a>
										</span>
										<h4 class="post-title">
											<a href="#">18 month old shoots himself by gun </a>
										</h4>
									</div>
								</div>
								<!--post-content end-->
								<div class="post-content  media">
									<img class="d-flex sidebar-img" src="<?php echo base_url()?>asset/frontend/images/news/travel/travel6.jpg" alt="">
									<div class="media-body">
										<span class="post-tag">
											<a href="#" class="yellow-color"> Travel</a>
										</span>
										<h4 class="post-title">
											<a href="#">18 month old shoots himself by gun </a>
										</h4>
									</div>
								</div>
								<!--post-content end-->
								<div class="post-content media">
									<img class="d-flex sidebar-img" src="<?php echo base_url()?>asset/frontend/images/news/sports/sports1.jpg" alt="">
									<div class="media-body">
										<span class="post-tag">
											<a href="#" class="green-color"> sports</a>
										</span>
										<h4 class="post-title">
											<a href="#">18 month old shoots himself by gun </a>
										</h4>
									</div>
								</div>
								<!--post-content end-->
							</div>
							<!--ts-grid-box end -->
						</div>
						<!-- tab content end-->
					</div>
					<!-- post-list-item end-->
				</div>
				<!-- col end-->
			</div>
			<!-- row end-->
		</div>
		<!-- container end-->
	</section>
	<!-- block area end-->


	<!-- post wraper start-->
	<section class="block-wrapper">
		<div class="container">
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
						<h2 class="ts-title">Most Popular</h2>

						<div class="most-populers owl-carousel">
							<div class="item">
								<a class="post-cat ts-orange-bg" href="#">Travel</a>
								<div class="ts-post-thumb">
									<a href="#">
										<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/travel/travel2.jpg" alt="">
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
							<!-- ts-grid-box end-->

							<div class="item">
								<a class="post-cat ts-blue-light-bg" href="#">Technology</a>
								<div class="ts-post-thumb">
									<a href="#">
										<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/tech/tech1.jpg" alt="">
									</a>
								</div>
								<div class="post-content">
									<h3 class="post-title">
										<a href="#">Tesla just lost its head of global just finance</a>
									</h3>
									<span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										March 21, 2019
									</span>
								</div>
							</div>
							<!-- ts-grid-box end-->
							<div class="item">
								<a class="post-cat ts-pink-bg" href="#">Fashion</a>
								<div class="ts-post-thumb">
									<a href="#">
										<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/fashion/fashion1.jpg" alt="">
									</a>
								</div>
								<div class="post-content">
									<h3 class="post-title">
										<a href="#">The clock is ticking for e-cig companies to block</a>
									</h3>
									<span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										March 21, 2019
									</span>
								</div>
							</div>
							<!-- ts-grid-box end-->
							<div class="item">
								<a class="post-cat ts-green-bg" href="#">sports</a>
								<div class="ts-post-thumb">
									<a href="#">
										<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/sports/sports1.jpg" alt="">
									</a>
								</div>
								<div class="post-content">
									<h3 class="post-title">
										<a href="#">Tesla just lost its head of global finance</a>
									</h3>
									<span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										March 21, 2019
									</span>
								</div>
							</div>
							<!-- ts-grid-box end-->
							<div class="item">
								<a class="post-cat ts-pink-bg" href="#">Music</a>
								<div class="ts-post-thumb">
									<a href="#">
										<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/music/music1.jpg" alt="">
									</a>
								</div>
								<div class="post-content">
									<h3 class="post-title">
										<a href="#">10 critical points from Zuckerberg’s epic manifesto</a>
									</h3>
									<span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										March 21, 2019
									</span>
								</div>
							</div>
							<!-- ts-grid-box end-->
						</div>
						<!-- most-populers end-->
					</div>
					<!-- ts-populer-post-box end-->
				</div>
				<!-- col end-->
			</div>
			<!-- row end-->
		</div>
		<!-- container end-->
	</section>
	<!-- post wraper end-->

	<!-- post wraper start-->
	<section class="block-wrapper mb-30 hot-topics-heighlight">
		<div class="container">

			<div class="ts-grid-box">
				<h2 class="ts-title">Hot Topics</h2>

				<div class="owl-carousel" id="hot-topics-slider">
					<div class="item ts-blue-light-heighlight heighlight">
						<div class="ts-post-thumb">
							<a href="#">
								<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/tech/tech1.jpg" alt="">
							</a>
							<a class="post-cat" href="#">Technology</a>
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
					<!-- ts-grid-box end-->

					<div class="item ts-green-heighlight heighlight">
						<div class="ts-post-thumb">
							<a href="#">
								<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/sports/sports1.jpg" alt="">
							</a>
							<a class="post-cat" href="#">sports</a>
						</div>
						<div class="post-content">
							<h3 class="post-title">
								<a href="#">10 critical points from Zuckerberg’s epic manifesto</a>
							</h3>
							<span class="post-date-info">
								<i class="fa fa-clock-o"></i>
								March 21, 2019
							</span>
						</div>
					</div>
					<!-- ts-grid-box end-->

					<div class="item ts-pink-heighlight heighlight">
						<div class="ts-post-thumb">
							<a href="#">
								<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/music/music2.jpg" alt="">
							</a>
							<a class="post-cat" href="#">Music</a>
						</div>
						<div class="post-content">
							<h3 class="post-title">
								<a href="#">The clock is ticking for e-cig companies to block users</a>
							</h3>
							<span class="post-date-info">
								<i class="fa fa-clock-o"></i>
								March 21, 2019
							</span>
						</div>
					</div>
					<!-- ts-grid-box end-->

					<div class="item ts-yellow-heighlight heighlight">
						<div class="ts-post-thumb">
							<a href="#">
								<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/travel/travel1.jpg" alt="">
							</a>
							<a class="post-cat" href="#">Travel</a>
						</div>
						<div class="post-content">
							<h3 class="post-title">
								<a href="#">Google vote-shifting threatens both right & left</a>
							</h3>
							<span class="post-date-info">
								<i class="fa fa-clock-o"></i>
								March 21, 2019
							</span>
						</div>
					</div>
					<!-- ts-grid-box end-->

					<div class="item ts-blue-heighlight heighlight">
						<div class="ts-post-thumb">
							<a href="#">
								<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/tech/tech2.jpg" alt="">
							</a>
							<a class="post-cat" href="#">Technology</a>
						</div>

						<div class="post-content">

							<h3 class="post-title">
								<a href="#">Youth vaping an 'epidemic' crackdown coming</a>
							</h3>
							<span class="post-date-info">
								<i class="fa fa-clock-o"></i>
								March 21, 2019
							</span>
						</div>
					</div>
					<!-- ts-grid-box end-->

					<div class="item ts-green-heighlight heighlight">
						<div class="ts-post-thumb">
							<a href="#">
								<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/sports/sports2.jpg" alt="">
							</a>
							<a class="post-cat" href="#">sports</a>
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
					<!-- ts-grid-box end-->
				</div>
				<!-- most-populers end-->
			</div>
			<!-- ts-populer-post-box end-->
		</div>
		<!-- container end-->
	</section>
	<!-- post wraper end-->

	<!-- ad banner 2 start-->
	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="banner-img text-center">
						<a href="index.html">
							<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/banner/banner2.jpg" alt="">
						</a>
					</div>
				</div>
				<!-- col end -->
			</div>
			<!-- row  end -->
		</div>
		<!-- container end -->
	</section>
	<!-- ad banner 2 end-->

	<!-- watch now start-->
	<section class="block-wrapper">
		<div class="container">

			<div class="row">
				<div class="col-lg-9">
					<div class="ts-grid-box watch-post mb-30">
						<h2 class="ts-title">Watch Now</h2>
						<div class="row">
							<div class="col-lg-7">
								<div class="tab-content featured-post" id="nav-tabContent">
									<div class="tab-pane ts-overlay-style fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
										<div class="item" style="background-image: url(<?php echo base_url()?>asset/frontend/images/news/travel/travel2.jpg)">

											<a class="post-cat ts-orange-bg" href="#">TRAVEL</a>
											<a href="https://www.youtube.com/watch?v=_0UO1NcheAE" class="ts-video-btn">
												<i class="fa fa-play-circle-o"></i>
											</a>
											<div class="overlay-post-content">
												<div class="post-content">
													<h3 class="post-title md">
														<a href="#">They’re back! Kennedy Darling, LeCras named to return</a>
													</h3>
													<ul class="post-meta-info">
														<li class="author">
															<a href="#">
																<img src="<?php echo base_url()?>asset/frontend/images/avater/author1.jpg" alt=""> Donald Ramos
															</a>
														</li>
														<li>
															<i class="fa fa-clock-o"></i>
															March 21, 2019
														</li>
														<li class="active">
															<i class="icon-fire"></i>
															3,005
														</li>
													</ul>
												</div>
											</div>
											<!-- overlay post content-->
										</div>
										<!-- item end-->
									</div>
									<!--tab-pane ts-overlay-style end-->
									<div class="tab-pane ts-overlay-style fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
										<div class="item" style="background-image: url(<?php echo base_url()?>asset/frontend/images/news/health/health2.jpg)">

											<a class="post-cat ts-purple-bg" href="#">Health</a>
											<a href="https://www.youtube.com/watch?v=_0UO1NcheAE" class="ts-video-btn">
												<i class="fa fa-play-circle-o"></i>
											</a>
											<div class="overlay-post-content">
												<div class="post-content">
													<h3 class="post-title md">
														<a href="#">retro prawn cocktail – straight from the 80’s!</a>
													</h3>
													<ul class="post-meta-info">
														<li class="author">
															<a href="#">
																<img src="<?php echo base_url()?>asset/frontend/images/avater/author1.jpg" alt=""> Donald Ramos
															</a>
														</li>
														<li>
															<i class="fa fa-clock-o"></i>
															March 21, 2019
														</li>
														<li class="active">
															<i class="icon-fire"></i>
															3,005
														</li>
													</ul>
												</div>
											</div>
											<!-- overlay post content-->
										</div>
										<!-- item end-->
									</div>
									<!--tab-pane ts-overlay-style end-->
									<div class="tab-pane ts-overlay-style fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
										<div class="item" style="background-image: url(<?php echo base_url()?>asset/frontend/images/news/fashion/fashion1.jpg)">
											<a class="post-cat ts-pink-bg" href="#">Fashion</a>
											<a href="https://www.youtube.com/watch?v=_0UO1NcheAE" class="ts-video-btn">
												<i class="fa fa-play-circle-o"></i>
											</a>
											<div class="overlay-post-content">
												<div class="post-content">
													<h3 class="post-title md">
														<a href="#">10 critical points from Zuckerberg’s epic security manifesto</a>
													</h3>
													<ul class="post-meta-info">
														<li class="author">
															<a href="#">
																<img src="<?php echo base_url()?>asset/frontend/images/avater/author1.jpg" alt=""> Donald Ramos
															</a>
														</li>
														<li>
															<i class="fa fa-clock-o"></i>
															March 21, 2019
														</li>
														<li class="active">
															<i class="icon-fire"></i>
															3,005
														</li>
													</ul>
												</div>
											</div>
											<!-- overlay post content-->
										</div>
										<!-- item end-->
									</div>
									<!--tab-pane ts-overlay-style end-->
								</div>

							</div>
							<!-- col end-->

							<div class="col-lg-5">
								<div class="nav post-list-box" id="nav-tab" role="tablist">
									<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
									 aria-selected="true">
										<div class="post-content media">
											<img class="d-flex" src="<?php echo base_url()?>asset/frontend/images/news/travel/travel2.jpg" alt="">
											<div class="media-body align-self-center">
												<h4 class="post-title">
													Tesla just lost its head of global finance
												</h4>
												<span class="post-date-info">
													<i class="fa fa-clock-o"></i>
													March 21, 2019
												</span>
											</div>
										</div>
									</a>
									<!-- nav item end-->
									<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile"
									 aria-selected="false">
										<div class="post-content media">
											<img class="d-flex" src="<?php echo base_url()?>asset/frontend/images/news/health/health2.jpg" alt="">
											<div class="media-body align-self-center">
												<h4 class="post-title">
													Beats did announce something, after all

												</h4>
												<span class="post-date-info">
													<i class="fa fa-clock-o"></i>
													March 21, 2019
												</span>
											</div>
										</div>
									</a>
									<!-- nav item end-->
									<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact"
									 aria-selected="false">
										<div class="post-content media">
											<img class="d-flex" src="<?php echo base_url()?>asset/frontend/images/news/fashion/fashion1.jpg" alt="">
											<div class="media-body align-self-center">
												<h4 class="post-title">
													Tourism in Dubai boom tourist favorite place
												</h4>
												<span class="post-date-info">
													<i class="fa fa-clock-o"></i>
													March 21, 2019
												</span>
											</div>
										</div>
									</a>
									<!-- nav item end-->
								</div>
								<!-- watch list post end-->
							</div>
							<!-- col end -->
						</div>
						<!-- row end-->
					</div>
					<!-- ts-populer-post-box end-->

					<!-- tranding post start -->
					<div class="row category-style">
						<div class="col-lg-4">
							<div class="ts-grid-box ts-col-box">
								<h2 class="ts-title">Fashion</h2>
								<div class="item">
									<div class="ts-post-thumb">
										<a class="post-cat ts-pink-bg" href="#">Fashion</a>
										<a href="#">
											<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/fashion/fashion3.jpg" alt="">
										</a>
									</div>
									<div class="post-content">
										<h3 class="post-title">
											<a href="#">Tourism in Dubai is booming by international tourist</a>
										</h3>
									</div>
								</div>
								<!-- ts-grid-box end-->

								<div class="item">
									<div class="ts-post-thumb">
										<a class="post-cat ts-pink-bg" href="#">Fashion</a>
										<a href="#">
											<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/fashion/fashion2.jpg" alt="">
										</a>
									</div>
									<div class="post-content">
										<h3 class="post-title">
											<a href="#">Beats did announce something today, after all</a>
										</h3>
									</div>
								</div>
								<!-- ts-grid-box end-->
							</div>
							<!-- ts-populer-post-box end-->
						</div>
						<!-- col end-->
						<div class="col-lg-8">
							<div class="ts-grid-box ts-tranding-post">
								<h2 class="ts-title">Trending</h2>
								<!-- arrow start -->
								<div class="ts-arrow">
									<a class="control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
										<span class="fa fa-angle-left" aria-hidden="true"></span>
									</a>
									<a class="control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
										<span class="fa fa-angle-right" aria-hidden="true"></span>
									</a>
								</div>
								<!-- arrow end -->

								<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item active">
											<div class="ts-overlay-style">
												<div class="item">
													<div class="ts-post-thumb">
														<a href="#">
															<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/sports/sports3.jpg" alt="">
														</a>
													</div>
													<div class="overlay-post-content">
														<div class="post-content">
															<h3 class="post-title md">
																<a href="#">New York Fashion Week continues with its penultimate day featuring looks from Marc Jacobs and more</a>
															</h3>
															<ul class="post-meta-info">
																<li class="author">
																	<a href="#">
																		<img src="<?php echo base_url()?>asset/frontend/images/avater/author1.jpg" alt=""> Donald Ramos
																	</a>
																</li>
																<li>
																	<i class="fa fa-clock-o"></i>
																	March 21, 2019
																</li>
																<li class="active">
																	<i class="icon-fire"></i>
																	3,005
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>

										</div>
										<!-- ts-overlay-style end-->

										<div class="carousel-item">
											<div class="ts-overlay-style">
												<div class="item">
													<div class="ts-post-thumb">
														<a href="#">
															<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/fashion/fashion4.jpg" alt="">
														</a>
													</div>
													<div class="overlay-post-content">
														<div class="post-content">
															<h3 class="post-title md">
																<a href="#">They’re back! Kennedy Darling, LeCras named Kennedy Darling, LeCras named to return</a>
															</h3>
															<ul class="post-meta-info">
																<li class="author">
																	<a href="#">
																		<img src="<?php echo base_url()?>asset/frontend/images/avater/author1.jpg" alt=""> Donald Ramos
																	</a>
																</li>
																<li>
																	<i class="fa fa-clock-o"></i>
																	March 21, 2019
																</li>
																<li class="active">
																	<i class="icon-fire"></i>
																	3,005
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- carousel-inner end -->



									<!-- slider dot start -->
									<ol class="slider-indicators carousel-indicators heighlight clearfix">
										<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
											<div class="post-content media">
												<div class="d-flex post-count">01</div>
												<div class="media-body align-self-center">
													<h4 class="post-title">
														<a href="#">The time get back all of the respect from
														</a>
													</h4>
													<span class="post-date-info">
														<i class="fa fa-clock-o"></i>
														March 21, 2019
													</span>
												</div>
											</div>
										</li>
										<li data-target="#carouselExampleIndicators" data-slide-to="1">
											<div class="post-content media">
												<div class="d-flex post-count">02</div>
												<div class="media-body align-self-center">
													<h4 class="post-title">
														<a href="#">Google vote-shifting threatens both right
														</a>
													</h4>
													<span class="post-date-info">
														<i class="fa fa-clock-o"></i>
														March 21, 2019
													</span>
												</div>
											</div>
										</li>
									</ol>
									<!-- slider dot end -->
								</div>
								<!-- watch now content end-->
							</div>
						</div>
					</div>
					<!-- tranding post end -->

				</div>
				<!-- col end-->
				<div class="col-lg-3">
					<div class="right-sidebar">
						<div class="ts-grid-box widgets">
							<h2 class="ts-title">Follow us</h2>
							<ul class="ts-social-list">
								<li class="ts-facebook">
									<a href="#">
										<i class="fa fa-facebook"></i>
									</a>
									<b>12.5 k </b>
									<span>Likes</span>
								</li>
								<li class="ts-google-plus">
									<a href="#">
										<i class="fa fa-google-plus"></i>
									</a>
									<b>12.5 k </b>
									<span>Follwers</span>
								</li>
								<li class="ts-twitter">
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
									<b>12.5 k </b>
									<span>Follwers</span>
								</li>
								<li class="ts-pinterest">
									<a href="#">
										<i class="fa fa-pinterest-p"></i>
									</a>
									<b>12.5 k </b>
									<span>Photos</span>
								</li>
								<li class="ts-linkedin">
									<a href="#">
										<i class="fa fa-linkedin"></i>
									</a>
									<b>12.5 k </b>
									<span>Follwers</span>
								</li>
								<li class="ts-youtube">
									<a href="#">
										<i class="fa fa-youtube"></i>
									</a>
									<b>12.5 k </b>
									<span>Follwers</span>
								</li>
							</ul>
						</div>
						<!-- widgets end-->

						<div class="widgets widget-banner">
							<a href="#">
								<img src="<?php echo base_url()?>asset/frontend/images/banner/sidebar-banner1.jpg" alt="">
							</a>
						</div>
						<!-- widgets end-->
						<div class="widgets ts-grid-box widgets-populer-post">
							<div class="topic-list">
								hot Topics
							</div>
							<div class="ts-overlay-style">
								<div class="item">
									<div class="ts-post-thumb">
										<a href="#">
											<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/tech/tech3.jpg" alt="">
										</a>
									</div>
									<div class="overlay-post-content">
										<div class="post-content">
											<h3 class="post-title">
												<a href="#">Tourism in Dubai is boom international tourist</a>
											</h3>
											<span class="post-date-info">
												<i class="fa fa-clock-o"></i>
												March 21, 2019
											</span>
										</div>
									</div>
								</div>
							</div>
							<!-- ts-overlay-style  end-->

							<div class="post-content media">
								<img class="d-flex sidebar-img" src="<?php echo base_url()?>asset/frontend/images/news/sports/sports2.jpg" alt="">
								<div class="media-body align-self-center">
									<h4 class="post-title">
										<a href="#">18 month shoots himself by gun </a>
									</h4>
								</div>
							</div>
							<!-- post content end-->
							<div class="post-content media">
								<img class="d-flex sidebar-img" src="<?php echo base_url()?>asset/frontend/images/news/tech/tech2.jpg" alt="">
								<div class="media-body align-self-center">
									<h4 class="post-title">
										<a href="#">easy lemon rice (yellow rice) </a>
									</h4>
								</div>
							</div>
							<!-- post content end-->
						</div>
						<!-- widgets end-->
					</div>
					<!-- right sidebar end-->
				</div>
				<!-- col end-->
			</div>

		</div>
		<!-- container end-->
	</section>
	<!-- watch now end-->

	<!-- post wraper start-->
	<section class="block-wrapper mb-45" id="more-news-section">
		<div class="container">
			<div class="ts-grid-box ts-grid-box-heighlight">
				<h2 class="ts-title">More News</h2>

				<div class="owl-carousel" id="more-news-slider">
					<div class="ts-overlay-style">
						<div class="item">
							<div class="ts-post-thumb">
								<a href="#">
									<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/sports/sports4.jpg" alt="">
								</a>
							</div>
							<a class="post-cat ts-green-bg" href="#">Sports</a>
							<div class="overlay-post-content">
								<div class="post-content">
									<h3 class="post-title">
										<a href="#">Man plans to ride out Hurricane Florence on a boat out Hurricane</a>
									</h3>
									<span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										March 21, 2019
									</span>
								</div>
							</div>
						</div>
						<!-- end item-->
					</div>
					<!-- ts-overlay-style end-->
					<div class="ts-overlay-style">
						<div class="item">
							<a class="post-cat ts-yellow-bg" href="#">Food</a>
							<div class="ts-post-thumb">
								<a href="#">
									<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/foods/food2.jpg" alt="">
								</a>
							</div>
							<div class="overlay-post-content">
								<div class="post-content">
									<h3 class="post-title">
										<a href="#">help us make mfs better with our better with our reader survey</a>
									</h3>
									<span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										March 21, 2019
									</span>
								</div>
							</div>
						</div>
						<!-- end item-->
					</div>
					<!-- ts-overlay-style end-->
					<div class="ts-overlay-style">
						<div class="item">
							<a class="post-cat ts-orange-bg" href="#">Travel</a>
							<div class="ts-post-thumb">
								<a href="#">
									<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/travel/travel4.jpg" alt="">
								</a>
							</div>
							<div class="overlay-post-content">
								<div class="post-content">
									<h3 class="post-title">
										<a href="#">Tourism in Dubai is booming international tourist most visited place</a>
									</h3>
									<span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										March 21, 2019
									</span>
								</div>
							</div>
						</div>
						<!-- end item-->
					</div>
					<!-- ts-overlay-style end-->
					<div class="ts-overlay-style">
						<div class="item">
							<a class="post-cat ts-pink-bg" href="#">Music</a>
							<div class="ts-post-thumb">
								<a href="#">
									<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/music/music2.jpg" alt="">
								</a>
							</div>
							<div class="overlay-post-content">
								<div class="post-content">
									<h3 class="post-title">
										<a href="#">Tourism in Dubai is booming international tourist most visited place</a>
									</h3>
									<span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										March 21, 2019
									</span>
								</div>
							</div>
						</div>
						<!-- end item-->
					</div>
					<!-- ts-overlay-style end-->
					<div class="ts-overlay-style">
						<div class="item">
							<a class="post-cat ts-green-bg" href="#">sports</a>
							<div class="ts-post-thumb">
								<a href="#">
									<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/sports/sports2.jpg" alt="">
								</a>
							</div>
							<div class="overlay-post-content">
								<div class="post-content">
									<h3 class="post-title">
										<a href="#">Tourism in Dubai is booming international tourist most visited place</a>
									</h3>
									<span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										March 21, 2019
									</span>
								</div>
							</div>
						</div>
						<!-- end item-->
					</div>
					<!-- ts-overlay-style end-->
					<div class="ts-overlay-style">
						<div class="item">
							<a class="post-cat ts-orange-bg" href="#">Travel</a>
							<div class="ts-post-thumb">
								<a href="#">
									<img class="img-fluid" src="<?php echo base_url()?>asset/frontend/images/news/travel/travel6.jpg" alt="">
								</a>
							</div>
							<div class="overlay-post-content">
								<div class="post-content">
									<h3 class="post-title">
										<a href="#">Tourism in Dubai is booming international tourist most visited place</a>
									</h3>
									<span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										March 21, 2019
									</span>
								</div>
							</div>
						</div>
						<!-- end item-->
					</div>
					<!-- ts-overlay-style end-->
				</div>
				<!-- most-populers end-->
			</div>
			<!-- ts-populer-post-box end-->
		</div>
		<!-- container end-->
	</section>
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
	<section class="ts-newslatter">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="ts-newslatter-content">
						<h2>
							Sign up for the Newsletter
						</h2>
						<p>
							Join our newsletter and get updates in your inbox. We won’t spam you and we respect your privacy.
						</p>
					</div>
				</div>
				<!-- col end-->

				<div class="col-lg-6 align-self-center">
					<div class="newsletter-form">
						<form action="#" method="post" class="media align-items-end">
							<div class="email-form-group media-body">
								<i class="fa fa-paper-plane" aria-hidden="true"></i>
								<input type="email" name="email" id="newsletter-form-email" class="form-control" placeholder="Enter Your Email" autocomplete="off"
								 required>
							</div>
							<div class="d-flex ts-submit-btn">
								<button class="btn btn-primary">Subscribe</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- newslater end -->

	<!-- footer start -->
	<footer class="ts-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="footer-menu text-center">
						<ul>
							<li>
								<a href="#">Support</a>
							</li>
							<li>
								<a href="#">Suggestion</a>
							</li>
							<li>
								<a href="#">Privacy</a>
							</li>
							<li>
								<a href="#">About</a>
							</li>
							<li>
								<a href="#">Our Ads </a>
							</li>
							<li>
								<a href="#">Terms</a>
							</li>
						</ul>
					</div>
					<div class="copyright-text text-center">
						<p>&copy; 2018, Vinazine. All rights reserved</p>
					</div>
				</div><!-- col end -->
			</div><!-- row end -->
			<div id="back-to-top" class="back-to-top">
				<button class="btn btn-primary" title="Back to Top">
					<i class="fa fa-angle-up"></i>
				</button>
			</div><!-- Back to top end -->
		</div><!-- Container end-->
	</footer>
	<!-- footer end -->




	<!-- javaScript Files
	=============================================================================-->

	<!-- initialize jQuery Library -->
	<script src="<?php echo base_url()?>asset/frontend/js/jquery.min.js"></script>
	<!-- navigation JS -->
	<script src="<?php echo base_url()?>asset/frontend/js/navigation.js"></script>
	<!-- Popper JS -->
	<script src="<?php echo base_url()?>asset/frontend/js/popper.min.js"></script>

	<!-- magnific popup JS -->
	<script src="<?php echo base_url()?>asset/frontend/js/jquery.magnific-popup.min.js"></script>



	<!-- Bootstrap jQuery -->
	<script src="<?php echo base_url()?>asset/frontend/js/bootstrap.min.js"></script>
	<!-- Owl Carousel -->
	<script src="<?php echo base_url()?>asset/frontend/js/owl-carousel.2.3.0.min.js"></script>
	<!-- slick -->
	<script src="<?php echo base_url()?>asset/frontend/js/slick.min.js"></script>

	<!-- smooth scroling -->
	<script src="<?php echo base_url()?>asset/frontend/js/smoothscroll.js"></script>

	<script src="<?php echo base_url()?>asset/frontend/js/main.js"></script>
</body>



</html>