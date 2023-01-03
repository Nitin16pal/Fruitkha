<?php include "header.php" ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Check Out Product</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->
<?php
$addresscheck = '';
$newaddress = 'show';
if (isset($couponcode[0])) {
	$addresscheck = 'show';
	$newaddress = '';
}

$coupon = $this->session->userdata('couponcode');
?>
<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="checkout-accordion-wrap">
					<div class="accordion" id="accordionExample">
						<div class="card single-accordion">
							<div class="card-header" id="headingOne">
								<h5 class="mb-0">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Billing Address
									</button>
								</h5>
							</div>

							<div id="collapseOne" class="collapse <?= $newaddress ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									<div class="billing-address-form">
										<form method="POST" id="shipping_address" enctype="multipart/form-data">
											<div class="alert error-msg d-none"></div>
											<div class="form-row mb-3">
												<p class="col-sm-6"><input type="text" class="<?= (form_error('shp_name') != "") ? 'is-invalid' : ''; ?>" name="shp_name" id="shp_name" placeholder="Name"></p>
												<p class="col-sm-6"><input type="email" class="<?= (form_error('shp_email') != "") ? 'is-invalid' : ''; ?>" name="shp_email" id="shp_email" placeholder="Email"></p>
												<p class="col-sm-6"><input type="tel" class="<?= (form_error('shp_mobile') != "") ? 'is-invalid' : ''; ?>" name="shp_mobile" id="shp_mobile" placeholder="Phone"></p>
												<p class="col-sm-6"><input type="text" class="<?= (form_error('shp_city') != "") ? 'is-invalid' : ''; ?>" name="shp_city" id="shp_city" placeholder="City"></p>
												<p class="col-sm-12"><input type="text" class="<?= (form_error('shp_pin') != "") ? 'is-invalid' : ''; ?>" name="shp_pin" id="shp_pin" placeholder="PIn/ Zip"></p>
												<p class="col-sm-6"><input type="text" class="<?= (form_error('shp_state') != "") ? 'is-invalid' : ''; ?>" name="shp_state" id="shp_state" placeholder="State"></p>
												<p class="col-sm-6"><input type="text" class="<?= (form_error('shp_country') != "") ? 'is-invalid' : ''; ?>" name="shp_country" id="shp_country" placeholder="Country"></p>
												<p class="col-sm-12"><input type="text" class="<?= (form_error('shp_address') != "") ? 'is-invalid' : ''; ?>" name="shp_address" id="shp_address" placeholder="Address"></p>
												<!-- <p class="col-sm-12"><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p> -->
											</div>
											<input type="submit" value="Submit" class="contact-submit">
										</form>
									</div>
								</div>
							</div>
						</div>



						<div class="card single-accordion">
							<div class="card-header" id="headingTwo">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" type="button" data-target="#collapseTwo">
										Shipping Address
									</button>
								</h5>
							</div>
							<div id="collapseTwo" class="collapse <?= $addresscheck ?>" aria-labelledby="headingTwo" data-parent="#accordionExample">
								<div class="card-body">
									<div class="shipping-address-form">
										<p>Your shipping address form is here.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="card single-accordion">
							<div class="card-header" id="headingThree">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" type="button" data-target="#collapseThree">
										Card Details
									</button>
								</h5>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
								<div class="card-body">
									<div class="card-details">
										<p>Your card details goes here.</p>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

			<?php
			if (isset($cartdata[0])) {
				foreach ($cartdata as $items) {
					$total = ($items->pd_price * $items->pd_quantity);
					$subtotal = $subtotal + $total;
				}
			}
			// Shpping Charge

			if ($subtotal < 500) {
				$shipcharg = 45;
			}

			// Discount Chard

			$grandtotal = $subtotal + $shipcharg;

			?>

			<div class="col-lg-4">
				<div class="order-details-wrap">
					<table class="order-details">
						<thead>
							<tr>
								<th>Your order Details</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody class="order-details-body">
							<tr>
								<td>Product</td>
								<td>Total</td>
							</tr>
						</tbody>
						<tbody class="checkout-details">
							<tr>
								<td>Subtotal</td>
								<td>$<?= $subtotal ?></td>
							</tr>
							<tr>
								<td>Shipping</td>
								<td>$<?= $shipcharg; ?></td>
							</tr>

							<?php
							if (!empty($coupon)) {
								$grandtotal -= $coupon; ?>
								<tr>
									<td>Coupon</td>
									<td>$<?= $coupon ?></td>
								</tr>
							<?php } ?>
							<tr>
								<td>Total</td>

								<td id="grandtotal">$<?= $grandtotal  ?></td>
							</tr>
						</tbody>
					</table>
					<a href="#" class="boxed-btn" aria-disabled="disabled">Place Order</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end check out section -->

<?php include_once "inc-brandlogo.php" ?>

<?php include "footer.php" ?>


<?php include "inc-script.php" ?>

</body>

</html>