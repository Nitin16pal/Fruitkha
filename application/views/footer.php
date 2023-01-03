	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>34/8, East Ghaziabad, RDEC, Near Rajnagar Ext.</li>
							<li>support@fruitkha.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="<?= base_url() ?>">Home</a></li>
							<li><a href="<?= base_url('about') ?>">About</a></li>
							<li><a href="<?= base_url('shop') ?>">Shop</a></li>
							<li><a href="<?= base_url('news') ?>">News</a></li>
							<li><a href="<?= base_url('contact') ?>">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<div class="alert alert-danger print-error-msg text-danger" style="display:none"></div>
						<div class="alert alert-success print-success-msg" style="display:none"></div>
						<form method="POST" id="newsletter_form" enctype="multipart/form-data">
							<input type="email" placeholder="Email" name="nswemail" id="nswemail" value="">
							<button type="submit" name="submit" id="nitinid"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2022, All Rights Reserved.<br>
						Distributed By - <a href="#">FruitKha</a>
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->

	<!-- Logi Form -->

	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-title text-center">
						<h4>Login</h4>
					</div>
					<div class="d-flex flex-column text-center">
					<div class="alert alert-danger error-msg text-danger" style="display:none"></div>
						<div class="alert alert-success success-msg" style="display:none"></div>
						<form method="POST" id="loginform" autocomplete="off" enctype="multipart/form-data">
							<div class="form-group">
								<input type="email" class="form-control" name="useremail" id="useremail" placeholder="Your email address...">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="userpassword" id="userpassword" placeholder="Your password...">
							</div>
							<div class="col-sm-6 form-group mx-auto">
								<button type="submit" class="btn btn-info btn-block btn-round btn-lg mx-auto text-uppercase">Login</button>
							</div>
						</form>

						<div class="text-center text-muted delimiter">or use a social network</div>
						<div class="d-flex justify-content-center social-buttons">
							<button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
								<i class="fab fa-twitter"></i>
							</button>
							<button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
								<i class="fab fa-facebook"></i>
							</button>
							<button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
								<i class="fab fa-linkedin"></i>
							</button>
							</di>
						</div>
					</div>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<div class="signup-section">Not a member yet? <a href="<?= base_url('user-registration') ?>" class="text-info"> Sign Up</a>.</div>
				</div>
			</div>
		</div>
	</div>