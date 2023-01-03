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
                        <form method="post" name="productform" id="productform" enctype="multipart/form-data">
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
                                <div class="col-md-4 form-group">
                                    <label class="label_field">Category Type</label>
                                    <select name="category_type" id="category_type" class="form-control <?php echo (form_error('category_type') != "") ? 'is-invalid' : ''; ?>">
                                        <option value="">Select category Type</option>
                                        <option <?php echo set_select('category_type', 'Organic', false); ?> <?php echo ($cat_type == 'Organic') ? 'selected' : '' ?> value="Organic">Organic</option>
                                        <option <?php echo set_select('category_type', 'In-Organic', false);
                                                echo ($cat_type == 'In-Organic') ? 'selected' : '' ?> value="In-Organic">In-Organic</option>
                                    </select>
                                    <?php echo form_error('category_type'); ?>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="label_field">Category</label>
                                    <select name="category" id="category" class="form-control <?php echo (form_error('category') != "") ? 'is-invalid' : ''; ?>">
                                        <option value="">Select Category</option>
                                        <?php foreach ($gtcat as $list) { ?>
                                            <option <?php echo set_select('category', $list->cat_id, false);
                                                    echo ($list->cat_id == $cat_id) ? 'selected' : '' ?> value="<?= $list->cat_id; ?>"><?= $list->cat_name; ?></option>
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
                                    <label class="label_field">Weight</label>
                                    <input type="text" name="weight" id="weight" class="form-control <?php echo (form_error('weight') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('weight', $auther); ?>" />
                                    <?php echo form_error('weight'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Brand</label>
                                    <input type="text" name="brand" id="brand" class="form-control <?php echo (form_error('brand') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('brand', $auther); ?>" />
                                    <?php echo form_error('brand'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Speciality Vegan</label>
                                    <input type="text" name="specialty_vegan" id="specialty_vegan" class="form-control <?php echo (form_error('specialty_vegan') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('specialty_vegan', $auther); ?>" />
                                    <?php echo form_error('specialty_vegan'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Diet to Vegan</label>
                                    <input type="text" name="diet_tyoe_vegan" id="diet_tyoe_vegan" class="form-control <?php echo (form_error('diet_tyoe_vegan') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('diet_tyoe_vegan', $auther); ?>" />
                                    <?php echo form_error('diet_tyoe_vegan'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Pakaging Weight</label>
                                    <input type="text" name="Package_weight" id="Package_weight" class="form-control <?php echo (form_error('Package_weight') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('Package_weight', $auther); ?>" />
                                    <?php echo form_error('Package_weight'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">No Of Piecs</label>
                                    <input type="text" name="no_of_piece" id="no_of_piece" class="form-control <?php echo (form_error('no_of_piece') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('no_of_piece', $auther); ?>" />
                                    <?php echo form_error('no_of_piece'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Temprature</label>
                                    <input type="text" name="temprature" id="temprature" class="form-control <?php echo (form_error('temprature') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('temprature', $auther); ?>" />
                                    <?php echo form_error('temprature'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Whole Form</label>
                                    <input type="text" name="whole_form" id="whole_form" class="form-control <?php echo (form_error('whole_form') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('whole_form', $auther); ?>" />
                                    <?php echo form_error('whole_form'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">No of Itmes</label>
                                    <input type="text" name="no_items" id="no_items" class="form-control <?php echo (form_error('no_items') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('no_items', $auther); ?>" />
                                    <?php echo form_error('no_items'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <div class="col form-group ">
                                        <label for="initial_price">Price </label>
                                        <input type="number" min="1" name="initial_price" id="initial_price" class="form-control <?php echo (form_error('initial_price') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('initial_price', $initial_price) ?>" />
                                        <?php echo form_error('initial_price'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <div class="col form-group ">
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
                                <div class="form-group col-md-6">
                                    <div class="form-row">
                                        <div class="col-sm-12 form-row align-items-end">
                                            <div class="col form-group mb-0">
                                                <label for="prod_seq">Set Priorty</label>
                                                <input type="number" min="1" name="prod_seq" id="prod_seq" class="form-control <?php echo (form_error('prod_seq') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('prod_seq', $prod_seq); ?>" />
                                                <?php echo form_error('prod_seq'); ?>
                                            </div>
                                            <div class="col form-check form-check-inline">
                                                <input class="form-check-input <?php echo (form_error('hm_show') != "") ? 'is-invalid' : ''; ?>" type="checkbox" id="hm_show" name="hm_show" value="0" <?= (($hm_show == '1') ? 'checked' : '')  ?> />
                                                <label class="form-check-label" for="hm_show">Home Show</label>
                                                <?php echo form_error('dealofmonth'); ?>
                                            </div>
                                            <div class="col form-check form-check-inline">
                                                <input class="form-check-input <?php echo (form_error('dealofmonth') != "") ? 'is-invalid' : ''; ?>" type="checkbox" id="dealofmonth" name="dealofmonth" value="0" <?= (($dealofmonth == '1') ? 'checked' : '')  ?> />
                                                <label class="form-check-label" for="dealofmonth">Deal Of month</label>
                                                <?php echo form_error('dealofmonth'); ?>
                                            </div>
                                        </div>
                                    </div>
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
            var tablename = 'sub_category';
            var col_id = 'pcat_id ';
            var col_status = 'scat_status';
            if (cat_id != '') {
                $.ajax({
                    url: "<?= base_url('accounts/getsubcat') ?>",
                    method: 'POST',
                    data: {
                        cat_id: cat_id,
                        tablename: tablename,
                        col_id: col_id,
                        col_status: col_status

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
    </script>
    <script src="<?= base_url('assets/admin/ckeditor/ckeditor.js'); ?>"></script>
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