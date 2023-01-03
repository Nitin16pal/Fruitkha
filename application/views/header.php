	<!--PreLoader-->
	<!-- <div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div> -->
	<!--PreLoader Ends-->


	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Organic Vegitable, Fruites and Drifruits">
		<title>Organic Vegitable, Fruites and Drifruits on FruitKha</title>
		<?php include "inc-css.php" ?>
	</head>

	<body>
		<?php
		$total = 0;
		$subtotal = 0;
		$shipcharg = 0;
		?>
		<!-- header -->
		<div class="top-header-area" id="sticker">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-sm-12 text-center">
						<div class="main-menu-wrap">
							<!-- logo -->
							<div class="site-logo">
								<a href="<?= base_url() ?>">
									<img src=<?= base_url("assets/img/logo.png") ?> alt="">
								</a>
							</div>
							<!-- logo -->

							<!-- menu start -->
							<nav class="main-menu">
								<ul>
									<li class="current-list-item"><a href="#">Home</a>
										<ul class="sub-menu">
											<li><a href="<?= base_url() ?>">Static Home</a></li>
											<li><a href="<?= base_url('index_2') ?>">Slider Home</a></li>
										</ul>
									</li>
									<li><a href="<?= base_url('about') ?>">About</a></li>
									<li><a href="#">Pages</a>
										<ul class="sub-menu">
											<li><a href="<?= base_url('404') ?>">404 page</a></li>
											<li><a href="<?= base_url('about') ?>">About</a></li>
											<li><a href="<?= base_url('cart') ?>">Cart</a></li>
											<li><a href="<?= base_url('checkout') ?>">Check Out</a></li>
											<li><a href="<?= base_url('contact') ?>">Contact</a></li>
											<li><a href="<?= base_url('news') ?>">News</a></li>
											<li><a href="<?= base_url('shop') ?>">Shop</a></li>
										</ul>
									</li>
									<li><a href="<?= base_url('news') ?>">News</a>
										<ul class="sub-menu">
											<li><a href="<?= base_url('news') ?>">News</a></li>
											<li><a href="<?= base_url('single_news') ?>">Single News</a></li>
										</ul>
									</li>
									<li><a href="<?= base_url('contact') ?>">Contact</a></li>
									<li><a href="<?= base_url('shop') ?>">Shop</a>
										<ul class="sub-menu">
											<li><a href="<?= base_url('shop') ?>">Shop</a></li>
											<li><a href="<?= base_url('checkout') ?>">Check Out</a></li>
											<li><a href="<?= base_url('product') ?>">Single Product</a></li>
											<li><a href="<?= base_url('cart') ?>">Cart</a></li>
										</ul>
									</li>
									<?php $usr = $this->session->userdata('enduser');
									if (!empty($usr)) { ?>
										<li><a href="javascript:void(0)"><?= $usr ?></a>
											<ul class="sub-menu">
												<li><a href="<?= base_url('home/usrlogout') ?>">Logout</a></li>
											</ul>
										</li>
									<?php } else { ?>
									<li><a  href="#loginModal" data-toggle="modal"><i class="fas fa-user mx-2"></i>Sign in</a></li>
									<?php } ?>
									<li>
										<div class="header-icons">
											<a class="shopping-cart" href="<?= base_url('cart') ?>"><i class="fas fa-shopping-cart" id="cartno"> <sup class="text-warning" id="crtqty"></sup></i></a>
											<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
										</div>
									</li>
								</ul>
							</nav>
							<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
							<div class="mobile-menu"></div>
							<!-- menu end -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end header -->

		<!-- search area -->
		<div class="search-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<span class="close-btn"><i class="fas fa-window-close"></i></span>
						<div class="search-bar">
							<div class="search-bar-tablecell">
								<h3>Search For:</h3>
								<input type="text" placeholder="Keywords">
								<button type="submit">Search <i class="fas fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end search arewa -->