	<?php include "header.php"; ?>
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody id="detail_cart">
								<?php
								if (isset($cartdata[0])) {
									foreach ($cartdata as $items) { ?>
										<tr class="table-body-row">
											<td class="product-remove"><a href="#" class="romove_cart" id="<?= $items->crt_id ?>"><i class="far fa-window-close"></i></a></td>
											<td class="product-image"><img src="<?= base_url('assets/img/products/product-img-1.jpg') ?>" alt=""></td>
											<td class="product-name"><?= $items->pd_name ?></td>
											<td class="product-price"><?= $items->pd_price ?></td>
											<td class="product-quantity"><input type="number" placeholder="1" min="1" id="<?= $items->crt_id ?>" data-price="<?= $items->pd_price ?>" data-product_id="<?= $items->pd_id ?>" class='update-cart' value="<?= $items->pd_quantity ?>"></td>
											<td class="product-total" id="product-total<?= $items->crt_id ?>"><?= $total = ($items->pd_price * $items->pd_quantity) ?></td>
										</tr>
									<?php
										$subtotal = $subtotal + $total;
									}
								} else { ?>
									<tr class="table-body-row">
										<td class="product-total" colspan="6">Your cart is empty.</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table" id="cart-price">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td id="subtotal">$<?= $subtotal; ?></td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<?php if ($subtotal < 500) {
										$shipcharg = 45;
									} ?>
									<td id="shipcharg">$<?= $shipcharg; ?></td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td id="prtotal">$<?= $total = $subtotal + $shipcharg; ?></td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="<?= base_url('cart') ?>" class="boxed-btn " <?= (empty($subtotal)) ? 'style="pointer-events:none;"' : '' ?>>Update Cart</a>
							<a href="<?= base_url('checkout') ?>" class="boxed-btn black" <?= (empty($subtotal)) ? 'style="pointer-events:none;"' : '' ?>>Check Out</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<span class="couponerror text-danger"></span>
							<!-- <form id="couponform"> -->
								<p><input type="text" name="couponid" id="couponid" placeholder="Coupon"></p>
								<p><a class="boxed-btn mt-4" id="couponsubmit">Apply</a></p>
							<!-- </form> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

	<?php include "inc-brandlogo.php" ?>
	<?php include "footer.php" ?>
	<?php include "inc-script.php" ?>
	<script>

	</script>

	</body>

	</html>