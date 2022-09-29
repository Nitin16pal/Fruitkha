<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2><?= $section ?> Products</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <a href="<?php echo base_url('accounts/products/') ?>" class="btn btn-primary btn-xs float-right">Back</a>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form method="post" name="productform" id="blogForm" enctype="multipart/form-data">
                            <div class="form-row mb-3">
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control <?php echo (form_error('meta_title') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('meta_title', $meta_title); ?>" />
                                    <?php echo form_error('meta_title'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control <?php echo (form_error('meta_keyword') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('meta_keyword', $meta_keyword); ?>" />
                                    <?php echo form_error('meta_keyword'); ?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="label_field">Meta Description</label>
                                    <textarea name="meta_desc" id="meta_desc" class="form-control <?php echo (form_error('meta_desc') != "") ? 'is-invalid' : ''; ?>" rows="3"><?= set_value('meta_desc', $meta_desc); ?></textarea>
                                    <?php echo form_error('meta_desc'); ?>
                                </div>
                                <div class="form-row mb-3">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="label_field">Category Type</label>
                                    <select name="category_type" id="category_type" class="form-control <?php echo (form_error('category_type') != "") ? 'is-invalid' : ''; ?>">
                                        <option value="">Select category Type</option>
                                        <option <?php echo ($cat_type == 'Organic') ? 'selected' : '' ?> value="Organic">Organic</option>
                                        <option <?php echo ($cat_type == 'In-Organic') ? 'selected' : '' ?> value="In-Organic">In-Organic</option>
                                    </select>
                                    <?php echo form_error(' category_type'); ?>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="label_field">Category</label>
                                    <select name="category" id="category" class="form-control <?php echo (form_error('category') != "") ? 'is-invalid' : ''; ?>">
                                        <option value="">Select Category</option>
                                        <?php foreach ($gtcat as $list) { ?>
                                            <option <?php echo ($list->cat_id == $cat_id) ? 'selected' : '' ?> value="<?= $list->cat_id; ?>"><?= $list->cat_name; ?></option>
                                        <?php }; ?>
                                    </select>
                                    <?php echo form_error('category'); ?>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="label_field">Sub Category</label>
                                    <select name="sub_category" id="sub_category" class="form-control <?php echo (form_error('sub_category') != "") ? 'is-invalid' : ''; ?>">
                                        <option value="">Select sub category</option>
                                    </select>
                                    <?php echo form_error('sub_category'); ?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="label_field">Main Heading</label>
                                    <input type="text" name="main_heading" id="main_heading" class="form-control <?php echo (form_error('main_heading') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('main_heading', $mainheading); ?>" />
                                    <?php echo form_error('main_heading'); ?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="label_field">Description</label>
                                    <textarea name="description" id="description" class="form-control <?php echo (form_error('description') != "") ? 'is-invalid' : ''; ?>" rows="6"><?= set_value('description', $discription); ?></textarea>
                                    <?php echo form_error('description'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <div class="col form-group mb-0">
                                        <label for="initial_price">Price </label>
                                        <input type="number" min="1" name="initial_price" id="initial_price" class="form-control <?php echo (form_error('initial_price') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('initial_price', $initial_price) ?>" />
                                        <?php echo form_error('initial_price'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <div class="col form-group mb-0">
                                        <label for="discount_price">Discount Prince</label>
                                        <input type="number" min="1" name="discount_price" id="discount_price" class="form-control <?php echo (form_error('discount_price') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('discount_price', $discount_price) ?>" />
                                        <?php echo form_error('discount_price'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Main Image</label>
                                    <input type="file" name="image" id="image" class="form-control <?php echo (!empty($imageError)) ? 'is-invalid' : ''; ?>" style="padding: 0.19rem .2rem;" />
                                    <?php echo (!empty($imageError)) ? $imageError : '' ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">By Team</label>
                                    <input type="text" name="byteam" id="byteam" class="form-control <?php echo (form_error('byteam') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('byteam', $auther); ?>" />
                                    <?php echo form_error('byteam'); ?>
                                </div>
                            </div>
                            <div class="form-group mt-5 mb-0">
                                <input type="hidden" name="prodid" id="prodid" value="<?= $productid ?>">
                                <button type="submit" class="main_bt">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end dashboard inner -->
    </div>
    <script>
        //Blog categories dependent dropdown and get sub category script
        $('#category').change(function() {
            var cat_id = $("#category").val();
            if (cat_id != '') {
                $.ajax({
                    url: "<?= base_url('accounts/getcategory') ?>",
                    method: 'POST',
                    data: {
                        cat_id: cat_id
                    },
                    success: function(data) {
                        $("#sub_category").html(data);
                    },
                    error: function() {
                        alert("Error");
                    }
                });
            }
        });
        $(".form-check-input").click(function() {
            if ($(this).is(':checked')) {
                $(this).val('1');
            } else {
                $(this).val('0');
            }
        })
    </script>
    <script src="<?= base_url('assets/admin/ckeditor/ckeditor.js'); ?>"></script>
    <!-- <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script> -->
    <script src="<?= base_url('assets/admin/ckfinder/ckfinder.js'); ?>"></script>
    <script>
        var editor = CKEDITOR.replace('description');
        CKFinder.setupCKEditor(editor);
        CKEDITOR.editorConfig = function(config) {
            config.language = 'es';
            config.uiColor = '#F7B42C';
            config.height = 600;
            config.toolbarCanCollapse = true;
        };
    </script>