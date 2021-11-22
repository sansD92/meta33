<head>
	<!-- Basic Page Needs =====================================-->
	<meta charset="utf-8">

	<!-- Mobile Specific Metas ================================-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Site Title- -->
	<title><?php echo "$title"; ?> Metasatu</title>
	<meta name="site_url" content="<?php echo base_url()?>detail/<?php echo "$rows[id_berita]"; ?>/<?php echo "$rows[judul_seo]"; ?>">
	<meta name="description" content="<?php echo "$description"; ?>">
	<meta name="keywords" content="<?php echo "$keywords"; ?>,<?php echo "$rows[nama_kategori]"; ?>">

	<!-- Facebook -->
        <meta property="og:title" content="<?php echo "$title"; ?>">
        <meta property="og:site_name" content="Metasatu.com">
        <meta property="og:description" content="<?php echo "$title"; ?> - Risalahmisteri.com">
        <meta property="og:url" content="<?php echo base_url()?>detail/<?php echo "$rows[id_berita]"; ?>/<?php echo "$rows[judul_seo]"; ?>">
        <meta property="og:image" content="<?php echo base_url()?>asset/foto_berita/<?php echo "$rows[gambar]"; ?>">
        <meta property="og:type" content="article">
	<!-- CSS
   ==================================================== -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url()?>asset/frontend/css/bootstrap.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url()?>asset/frontend/css/font-awesome.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url()?>asset/frontend/css/animate.css">

	<!-- IcoFonts -->
	<link rel="stylesheet" href="<?php echo base_url()?>asset/frontend/css/icofonts.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?php echo base_url()?>asset/frontend/css/owlcarousel.min.css">

	<!-- slick -->
	<link rel="stylesheet" href="<?php echo base_url()?>asset/frontend/css/slick.css">



	<!-- navigation -->
	<link rel="stylesheet" href="<?php echo base_url()?>asset/frontend/css/navigation.css">

	<!-- magnific popup -->
	<link rel="stylesheet" href="<?php echo base_url()?>asset/frontend/css/magnific-popup.css">

	<!-- Style -->
	<link rel="stylesheet" href="<?php echo base_url()?>asset/frontend/css/style.css">
	<!-- Style -->
	<link rel="stylesheet" href="<?php echo base_url()?>asset/frontend/css/colors/color-0.css">

	<!-- Responsive -->
	<link rel="stylesheet" href="<?php echo base_url()?>asset/frontend/css/responsive.css">


	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
	div.sticky {
	  position: -webkit-sticky;
	  position: sticky;
	  top: 0;
	 
	}

	</style>
</head>
