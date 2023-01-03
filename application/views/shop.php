<?php include "header.php" ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Shop</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-80 mb-80">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="product-filters">
					<ul>
						<li class="active text-capitalize" data-filter="*">All</li>
						<?php foreach ($cate as $list) { ?>
							<li class="workBtn-test" data-catid="<?= $list->cat_id; ?>" data-filter=".<?= $list->cat_name; ?>"><?= $list->cat_name; ?></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row product-lists" id="shoproduct">
				<?php foreach ($prod as $list) { ?>

					<div class="col-lg-3 col-md-6 text-center <?= $list->cat_name ?>">
						<div class="single-product-item text-center">
							<div class="product-image">
								<a href="<?php echo base_url('product') ?>"><img src="<?php echo base_url("uploads/products/thumb_front/$list->prod_image") ?>" alt=""></a>
							</div>
							<h3><?= $list->scat_name ?></h3>
							<p class="product-price"><span>$<?= $list->prod_dist_price ?> /Kg </span> </p>
							<a href="javascript:void(0)" data-prodid="<?= $list->prod_id ?>" data-pprice="<?= $list->prod_dist_price ?>" data-pname="<?= $list->prod_name ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
							<input type="hidden" name="quantity" id="qtty<?= $list->prod_id; ?>" value="1" class="quantity product-price form-control">
						</div>
					</div>
				<?php } ?>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="pagination-wrap">
					<ul>
						<li><a href="#">Prev</a></li>
						<li><a href="#">1</a></li>
						<li><a class="active" href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">Next</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end products -->

<?php include_once "inc-brandlogo.php" ?>
<?php include_once "footer.php" ?>
<?php include_once "inc-script.php" ?>

<script>

</script>

</body>

</html>