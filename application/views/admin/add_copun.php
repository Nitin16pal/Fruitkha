<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2><?= $section ?> Coupon</h2>
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <a href="<?= base_url('accounts/coupon') ?>" class="btn btn-primary btn-xs float-right">Back</a>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form method="POST" enctype="multipart/form-data">
                            <?php if ($this->session->flashdata('cerror')) { ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <?= $this->session->flashdata('cerror'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>
                            <div class="form-row mb-3">

                                <div class="col-md-6 form-group">
                                    <label class="label_field">Product Name</label>
                                    <select name="product_name" id="product_name" class="form-control <?= (form_error('product_name') != "") ? 'is-invalid' : ''; ?>">
                                        <option value="">Select Product Name</option>
                                        <option value="all products">All products</option>
                                        <?php foreach ($product as $categ) { ?>
                                            <option <?= set_select('product_name', $categ->prod_id , false); ?> value="<?= $categ->prod_id ; ?>"><?= $categ->prod_name; ?></option>
                                        <?php }  ?>
                                    </select>
                                    <?= form_error('product_name'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Promo Name</label>
                                    <input type="text" name="promo_name" id="promo_name" value="<?= set_value('promo_name', $promo_name); ?>" class="form-control <?= (form_error('promo_name') != "") ? 'is-invalid' : ''; ?>" />
                                    <?= form_error('promo_name', "<span id='promo_name_error' class='field_error text-danger d-block'>", "</span>"); ?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="label_field">Promo Code Price</label>
                                    <input type="text" name="promo_price" id="promo_price" class="form-control <?= (form_error('promo_price') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('promo_price', $promo_price); ?>"> 
                                    <?= form_error('promo_price', "<span id='promo_price' class='field_error text-danger d-block'>", "</span>"); ?>
                                </div>
                            </div>

                            <div class="form-group margin_0">
                                <input type="hidden" name="promo_id" id="promo_id" value="<?= $id ?>">
                                <button class="main_bt" type="submit">Submit</button>
                            </div>
                            <span id="result" class="text-danger mt-4 d-block"></span>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end dashboard inner -->
    </div>