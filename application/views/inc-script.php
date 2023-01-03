<script src="<?= base_url("assets/js/jquery-1.11.3.min.js") ?>"></script>
<script src="<?= base_url("assets/bootstrap/js/bootstrap.min.js") ?>"></script>
<script src="<?= base_url("assets/js/jquery.countdown.js") ?>"></script>
<script src="<?= base_url("assets/js/jquery.isotope-3.0.6.min.js") ?>"></script>
<script src="<?= base_url("assets/js/waypoints.js") ?>"></script>
<script src="<?= base_url("assets/js/owl.carousel.min.js") ?>"></script>
<script src="<?= base_url("assets/js/jquery.magnific-popup.min.js") ?>"></script>
<script src="<?= base_url("assets/js/jquery.meanmenu.min.js") ?>"></script>
<script src="<?= base_url("assets/js/sticker.js") ?>"></script>
<script src="<?= base_url("assets/js/main.js") ?>"></script>
<script src="<?= base_url("assets/js/jquery-3.5.1.min.js") ?>"></script>
<!-- <script src="<?= base_url("assets/js/ajaxjs.js") ?>"></script> -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        "use strict";
        $('#newsletter_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('home/newsltr') ?>",
                dataType: "json",
                data: $(this).serialize(),
                beforeSend: function() {
                    $(".print-error-msg").css('display', 'block');
                    $(".print-error-msg").html("Please wait...");
                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msg").css('display', 'none');
                        $(".print-success-msg").css('display', 'block');
                        $(".print-success-msg").html(data.success);
                        $("#newsletter_form")[0].reset();
                    } else {
                        $(".print-error-msg").css('display', 'block');
                        $(".print-error-msg").html(data.error);
                    }
                }
            });
        });

        // Login Details

        $('#loginform').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('home/userlogin') ?>",
                dataType: "json",
                data: $(this).serialize(),
                beforeSend: function() {
                    $(".error-msg").css('display', 'block');
                    $(".error-msg").html("Please wait...");
                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".error-msg").css('display', 'none');
                        $(".success-msg").html(data.success);
                        $("#loginform")[0].reset();
                        location.reload();
                    } else {
                        $(".error-msg").css('display', 'block');
                        $(".error-msg").html(data.error);
                    }
                }
            });
        });

        // 		
        $('.update-cart').on('change', function() {
            var crt_id = $(this).attr("id");
            var product_id = $(this).data("product_id");
            var price = $(this).data("price");
            var qty = $(this).val();
            $('#product-total' + crt_id).html(qty * price);
            // alert(qty);
            if (qty >= 1) {
                $.ajax({
                    url: "<?= base_url('product/updatecart'); ?>",
                    method: "POST",
                    data: {
                        crt_id: crt_id,
                        product_id: product_id,
                        quantity: qty,
                        price: price
                    },
                    success: function(data) {
                        $('#subtotal').html('$' + data);
                        if (data <= 500) {
                            $('#shipcharg').html('$45');
                            $('#prtotal').html('$' + (parseInt(data) + 45));
                        } else {
                            $('#prtotal').html('$' + data);
                            $('#shipcharg').html('0');
                        }
                        $('#crtqty').load("<?= base_url('product/cartqtty'); ?>");
                    }
                });
            } else {
                $(this).val(1);
                alert('Product quantity must in greater then 1');
            }
        });

        // Insert Product in Cart
        $('.cart-btn').click(function() {
            var product_id = $(this).data("prodid");
            var product_name = $(this).data("pname");
            var product_price = $(this).data("pprice");
            var quantity = $('#qtty' + product_id).val();
            $.ajax({
                url: "<?= base_url('product/add_to_cart'); ?>",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_price: product_price,
                    quantity: quantity
                },
                success: function(data) {
                    // $('#detail_cart').html(data);
                    $('#crtqty').load("<?= base_url('product/cartqtty'); ?>");
                }
            });
        });

        //  Cart data
        $(".workBtn").click(function() {
            var category_id = $(this).data("catid");
            $.ajax({
                type: "post",
                url: '<?= base_url("home/getperoduct") ?>',
                dataType: 'json',
                data: "category_id=" + category_id,
                success: function(data) {
                    $("#shoproduct").fadeIn(300);
                    $("#shoproduct" + ".row").html(data);
                },
            });
        });
        $(".product-filters ul li:first-child").addClass("active");

        // Cart related script

        $('#crtqty').load("<?= base_url('product/cartqtty'); ?>");

        // Delete  data in CART
        $('.romove_cart').click(function() {
            var row_id = $(this).attr("id");
            var cart = 'cart';
            var usrcol = 'usrcol';
            var usrid = "<?= $this->session->userdata('enduserid') ?>";
            var crt_id = 'crt_id';
            $.ajax({
                url: "<?= base_url('product/delete_cart/cart/crt_id/'); ?>" + row_id + "/user_id/" + usrid,
                method: "POST",
                success: function(data) {
                    $('#subtotal').html('$' + data);
                    $('#crtqty').load("<?= base_url('product/cartqtty'); ?>");
                    if (data <= 500) {
                        $('#shipcharg').html('$45');
                        $('#prtotal').html('$' + (parseInt(data) + 45));
                    } else {
                        $('#shipcharg').html('0');
                        $('#prtotal').html('$' + data);
                    }
                    location.reload();

                }
            });
        });

        // Apply Coupon on Cart

        $('#couponsubmit').click(function() {
            var couponvalue = $('#couponid').val();
            if (couponvalue != '') {
                $.ajax({
                    url: "<?= base_url('product/couponcode/'); ?>" + couponvalue,
                    method: "POST",
                    // data: {
                    //     couponid: couponid
                    // },
                    cache: false,
                    success: function(data) {
                        if (data == 'Invalid Coupon or may be expired') {
                            $('.couponerror').html(data);
                        } else {
                            $('.couponerror').removeClass('text-danger');
                            $('.couponerror').addClass('text-success');
                            $('.couponerror').html('Apply Coupon successfully');
                            $('#couponid').val('');
                            var ttprice = <?= $total ?>;
                            if (ttprice > parseInt(data)) {
                                ttprice = ttprice - parseInt(data);
                                $('#cart-price tbody').append('<tr class="total-data"><td><strong>Discount: </strong></td><td>$'+data+'</td></tr>');
                                $('#prtotal').text('$' + ttprice);
                            }
                        }
                        // $('#detail_cart').html(data);

                    }
                });
            } else {
                $('.couponerror').html('Please Enter Coupon Code');
            }

        });

        $('#shipping_address').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('product/shipping_address') ?>",
                dataType: "json",
                data: $(this).serialize(),
                beforeSend: function() {
                    // $(".error-msg").css('display', 'block');
                    $(".error-msg").addClass('alert-warning d-block');
                    $(".error-msg").html("Please wait...");
                },
                success: function(data) {
                    if ($.isEmptyObject(data.success)) {
                        $(".error-msg").removeClass('alert-success');
                        $(".error-msg").removeClass('alert-warning');
                        $(".error-msg").addClass('alert-danger');
                        $(".error-msg").html(data.error);
                        // location.reload();
                    } else {
                        $(".error-msg").removeClass('alert-danger');
                        $(".error-msg").removeClass('alert-warning');
                        $(".error-msg").addClass('alert-success');
                        $('#collapseTwo').addClass('show');
                        $('#collapseOne').removeClass('show');

                        $(".error-msg").html(data.success);
                        $("#shipping_address")[0].reset();
                    }
                }
            });
        });

    });
</script>