
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title><?=$Apps;?></title>
	<meta name="description" content="Consulte is a free Bootstrap HTML Template for Investment Company"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="canonical" href="Replace_with_your_PAGE_URL" />

	<!-- Stylesheets -->
	<link href="<?=uri();?>/portal/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=uri();?>/portal/css/main.css" rel="stylesheet">
	<link href="<?=uri();?>/portal/css/responsive.css" rel="stylesheet">

	<!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Consulte - Investment Company Bootstrap HTML Template" />
	<meta property="og:url" content="PAGE_URL" />
	<meta property="og:site_name" content="SITE_NAME" />
	<!-- For the og:image content, replace the # with a link of an image -->
	<meta property="og:image" content="#" />
	<meta property="og:description" content="Consulte is a free Bootstrap HTML Template for Investment Company" />

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<link href="<?=uri('');?>/dist/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
	<script src="<?=uri();?>/portal/js/jquery.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="<?=uri('apps/');?>js/swall.js"></script>

	<style>
	.nav-pills .nav-link.active, .nav-pills .show > .nav-link
	{
		color : #0b0b0b;
		background-color: #f9fbff;
	}
	.tab-content
	{
		color : #0b0b0b;
		font-size: 15px;
	}

</style>
<!-- Add site Favicon -->
<!-- <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"> -->
<!-- <link rel="icon" href="images/favicon.png" type="image/x-icon"> -->
<!-- <meta name="msapplication-TileImage" content="images/favicon.png" /> -->
</head>

<body>
	<div class="page-wrapper">
		<!-- Main Header-->
		<header class="main-header style-three">

			<!-- Header Top -->
			<div class="header-top">
				<div class="auto-container">
					<div class="inner-container clearfix">
						<!-- Top Left -->
						<div class="top-left">
							<!-- Info List -->
							<ul class="info-list">
								<li style="padding-left: 2em;"><span class="icon icofont-clock-time"></span>Jam Buka Senin s/d Jum'at: 8.00 - 17.00, Sabtu s/d Minggu Close</li>
							</ul>
						</div>

						<!-- Top Right -->
						<div class="top-right pull-right">
							<!-- Social Box -->
							<ul class="social-box">
								<a href="login.php" target="_blanks">
									<li class="share">Login</li>
								</a>
							</ul>
						</div>

					</div>
				</div>
			</div>

			<!-- Header Upper -->
			<div class="header-upper">
				<div class="auto-container">
					<div class="inner-container clearfix">

						<div class="pull-left logo-box">
							<div class="logo"><a href="index.php"><img src="<?=uri();?>/portal/images/portal.png" alt="" title=""></a></div>
						</div>

						<div class="nav-outer pull-left clearfix">
							<!-- Main Menu -->
							<nav class="main-menu navbar-expand-md">
								<div class="navbar-header">
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>

								<div class="navbar-collapse show collapse clearfix" id="navbarSupportedContent">
									<ul class="navigation clearfix">
										<li>
											<a  href="index.php">Home</a>
										</li>
										<li>
											<a href="?page=tata_cara">Tata Cara Pendaftaran</a>
										</li>
										<li>
											<a href="?page=pelayanan">Pelayanan</a>
										</li>
										<li>
											<a href="?page=visi_misi">Visi dan Misi</a>
										</li>
										<li>
											<a href="?page=registrasi">Registrasi</a>
										</li>
									</ul>
								</div>

							</nav>

						</div>

						<!-- Outer Box -->
						<div class="outer-box">
							<!-- Search Btn -->
							<!-- Mobile Navigation Toggler -->
							<div class="mobile-nav-toggler"><span class="icon ti-menu"></span></div>
						</div>
					</div>
				</div>
			</div>
			<!--End Header Upper-->

			<!-- Mobile Menu  -->
			<div class="mobile-menu">
				<div class="menu-backdrop"></div>
				<div class="close-btn"><span class="icon lnr lnr-cross"></span></div>

				<nav class="menu-box">
					<div class="nav-logo"><a href="index.php"><img src="<?=uri();?>/portal/images/portal.png" alt="" title=""></a></div>
					<div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
				</nav>
			</div><!-- End Mobile Menu -->

		</header>
    	<!--End Main Header -->