<!doctype html>
<html lang="en">

<!-- START SECTION HEAD -->
<?php $this->load->view('fronts/singel/head.php')?>
<!-- END SECTION HEAD -->

<body class="body-color">
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

	<!-- single post start -->
	<section class="single-post-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					
					<!-- breadcump end-->

					<!-- isi content-->
					<div class="ts-grid-box content-wrapper single-post">
						<div class="entry-header">
							<h2 class="post-title lg"><?php echo "$rows[judul]"; ?></h2>
							<ul class="post-meta-info">
								
								<li class="author">
									<a href="#">
										<img src="<?php echo base_url()?>asset/frontend/images/avater/author.png" alt=""> <?php echo "$rows[nama_lengkap]"; ?>
									</a>
								</li>
								<li>
									<i class="fa fa-clock-o"></i>
									<?php echo  tgl_indo($rows['tanggal']); ?>
								</li>
								<li>
									<a href="#" class="post-cat ts-yellow-bg"><?php echo "$rows[nama_kategori]"; ?></a>
								</li>
								 
								
							</ul>
						</div>
						<!-- single post header end-->
						<div class="post-content-area">
							<div class="post-media post-featured-image">
								<a href="<?php echo base_url()?>asset/frontend/images/news/travel/travel2.jpg" class="gallery-popup">
									<img src="<?php echo base_url()?>asset/foto_berita/<?php echo "$rows[gambar]"; ?>" class="img-fluid" alt="">
								</a>
							</div>
							<div class="entry-content">
								<p class="text-bg"><?php echo "$rows[keterangan_gambar]"; ?></p>
								
							
							
								
								<p>
									<?php echo "$rows[isi_berita]"; ?>
								</p>
							
							
							
							
								
							</div>
							<!-- entry content end-->
						</div>
						<!-- post content area-->
						
						<!-- author box end-->
					
						<!-- post navigation end-->
					</div>
					<!--single post end -->
					<div class="comments-form ts-grid-box">

						<h3 class="comments-counter">Comments</h3>
						
						
						</ul>
						<!-- Comments-list ul end-->


						<!-- Form end -->
					</div>
					<!-- comment form end-->
					<div class="ts-grid-box category-item">
						<h2 class="ts-title">Berita Terkait</h2>
						<div class="row">
							 <?php
                                          $pisah_kata  = explode(",",$rows['tag']);
                                          $jml_katakan = (integer)count($pisah_kata);
                                          $jml_kata = $jml_katakan-1;
                                          $ambil_id = substr($rows['id_berita'],0,4);
                                          $cari = "SELECT * FROM berita left join users on berita.id_users=users.id_users left join kategori on berita.id_kategori=kategori.id_kategori WHERE (id_berita<'$ambil_id') and (id_berita!='$ambil_id') and (" ;
                                          for ($i=0; $i<=$jml_kata; $i++){
                                          $cari .= "tag LIKE '%$pisah_kata[$i]%'";
                                          if ($i < $jml_kata ){
                                          $cari .= " OR ";}}
                                          $cari .= ") and status = 'Y' ORDER BY id_berita DESC LIMIT 4";
                                          $hasil  = $this->db->query($cari);
                                          foreach ($hasil->result_array() as $row) {
                                               $sql = "select * from berita where id_berita = " . $row['id_berita'];
                            $a = $this->db->query($sql)->result();
                            $b = $a[0];
                        $judul = substr($row['judul'],0,30);
                                              $total_komentar_terkait = $this->model_utama->view_where('komentar',array('id_berita' => $row['id_berita']))->num_rows();
                                              echo "
							<div class='col-lg-3'>
								<div class='item'>
									<div class='ts-post-thumb'>
										<a href='#'>
											<img style='height: 120px;'class='img-fluid' src='".base_url()."asset/foto_berita/$row[gambar]'   alt='$row[gambar]'>
										</a>
									</div>
									<div class='post-content'>
										<h3 class='post-title'>
											<a href='".base_url()."detail/$row[id_berita]/$row[judul_seo]'>$judul...</a>
										</h3>
										
									</div>
								</div>
							</div>
						";
                    }
                ?>
							<!-- ts-grid-box end-->

							
							<!-- ts-grid-box end-->
						</div>
						<!-- most-populers end-->
					</div>

				</div>
				<!-- col end -->
				<!-- START SECTION slider kanan -->
					<?php $this->load->view('fronts/singel/slider_kanan.php')?>
					<!-- END SECTION slider kanan -->
				<!-- right sidebar end-->
				<!-- col end-->
			</div>
			<!-- row end-->
		</div>
		<!-- container-->
	</section>
	<!-- single post end-->

	<!-- footer social list start-->
	
	<!-- footer social list end-->

	<!-- newslater start -->
	
	<!-- newslater end -->

	<!-- footer start -->
	<?php $this->load->view('fronts/footer.php')?>
	<!-- footer end -->
</body>


</html>