<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2><?= $section ?> Category</h2>
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <a href="<?php echo base_url('accounts/category') ?>" class="btn btn-primary btn-xs float-right">Back</a>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form method="POST" enctype="multipart/form-data">
                            <?php if($this->session->flashdata('cerror')){?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                               <?= $this->session->flashdata('cerror'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php }?>
                            <div class="form-row mb-3">
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" value="<?= set_value('meta_title',$cat_title); ?>" class="form-control <?php echo (form_error('meta_title') != "") ? 'is-invalid' : ''; ?>" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" value="<?= set_value('meta_keyword',$cat_keyword); ?>" class="form-control <?php echo (form_error('meta_keyword') != "") ? 'is-invalid' : ''; ?>" />
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="label_field">Meta Description</label>
                                    <textarea name="meta_desc" id="meta_desc" class="form-control <?php echo (form_error('meta_desc') != "") ? 'is-invalid' : ''; ?>" rows="3"> <?= set_value('meta_desc',$cat_desc); ?></textarea>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="label_field">Category Type</label>
                                    <select name="category_type" id="category_type" class="form-control <?php echo (form_error('category_type') != "") ? 'is-invalid' : ''; ?>">
                                        <option value="">Select category Type</option>
                                        <option value="Organic">Organic</option>
                                        <option value="In-Organic">In-Organic</option>
                                        <!-- <?php foreach ($data as $categ) : ?>
                                            <option <?php echo set_select('category_type', $categ->id, false); ?> value="<?= $categ->id; ?>"><?= $categ->category_name; ?></option>
                                        <?php endforeach; ?> -->
                                    </select>
                                    <?php echo form_error(' category_type'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Product Category</label>
                                    <input type="text" name="category" id="category" value="<?php echo set_value('category', $category_name); ?>" class="form-control <?php echo (form_error('category') != "") ? 'is-invalid' : ''; ?>" />
                                    <?php echo form_error('category', "<span id='category_error' class='field_error text-danger d-block'>", "</span>"); ?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="label_field">Product Description</label>
                                    <textarea name="product_desc" id="product_desc" class="form-control <?php echo (form_error('product_desc') != "") ? 'is-invalid' : ''; ?>" rows="3"> <?= set_value('product_desc',$product_desc); ?></textarea>
                                    <?php echo form_error('product_desc', "<span id='product_desc' class='field_error text-danger d-block'>", "</span>"); ?>
                                </div>
                            </div>

                            <div class="form-group margin_0">
                                <input type="hidden" name="cat_id" id="cat_id" value="<?= $id ?>">
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