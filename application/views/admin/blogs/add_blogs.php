<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2><?= $section?> Blogs</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <a href="<?php echo base_url('accounts/blogs/') ?>" class="btn btn-primary btn-xs float-right">Back</a>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form method="post" autocomplete="off" name="blogForm" id="blogForm" enctype="multipart/form-data">
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
                                    <textarea name="meta_desc" id="meta_desc" class="form-control <?php echo (form_error('meta_desc', $meta_desc) != "") ? 'is-invalid' : ''; ?>" rows="3"><?= set_value('meta_desc', $meta_desc); ?></textarea>
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
                                    <input type="text" name="main_heading" id="main_heading" class="form-control <?php echo (form_error('main_heading') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('main_heading',$main_heading); ?>" />
                                    <?php echo form_error('main_heading'); ?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="label_field">Description</label>
                                    <textarea name="description" id="description" class="form-control <?php echo (form_error('description') != "") ? 'is-invalid' : ''; ?>" rows="6"><?= set_value('description', $description); ?></textarea>
                                    <?php echo form_error('description'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Main Image</label>
                                    <input type="file" name="image" id="image" class="form-control <?php echo (!empty($imageError)) ? 'is-invalid' : ''; ?>" style="padding: 0.19rem .2rem;" />
                                    <?php echo (!empty($imageError)) ? $imageError : '' ?>
                                    <br>
                                    <?php
                                    $path = './uploads/blogs/thumb_admin/' . $image;
                                    if ($image != '' && file_exists($path)) {
                                    ?>
                                        <img src="<?php echo base_url('uploads/blogs/thumb_admin/' . $image); ?>">
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Author</label>
                                    <input type="text" name="author" id="author" class="form-control <?php echo (form_error('author') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('author', $author); ?>" />
                                    <?php echo form_error('author'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>SHOW ON</h5>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-sm-6 form-row align-items-end">
                                        <div class="col form-group mb-0">
                                            <label for="hm_banner_priority">Set Priorty</label>
                                            <input type="number" min="1" name="hm_banner_priority" id="hm_banner_priority" class="form-control <?php echo (form_error('hm_banner_priority') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('hm_banner_priority', $hm_banner_priority); ?>" />
                                            <?php echo form_error('hm_banner_priority'); ?>
                                        </div>
                                        <div class="col form-check form-check-inline">
                                            <input class="form-check-input <?php echo (form_error('hm_banner') != "") ? 'is-invalid' : ''; ?>" type="checkbox" id="hm_banner" name="hm_banner" value="0" <?= (($hm_banner=='1')?'checked':'')  ?>/>
                                            <label class="form-check-label" for="hm_banner">Home Banner</label>
                                            <?php echo form_error('hm_banner'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-row align-items-end">
                                        <div class="col form-group mb-0">
                                            <label for="hm_showcase_priority">Set Priorty</label>
                                            <input type="number" min="1" name="hm_showcase_priority" id="hm_showcase_priority" class="form-control" value="<?= set_value('hm_showcase_priority', $hm_showcase_priority); ?>"/>
                                            <?php echo form_error('hm_showcase_priority'); ?>
                                        </div>
                                        <div class="col form-check form-check-inline">
                                            <input class="form-check-input <?php echo (form_error('hm_showcase') != "") ? 'is-invalid' : ''; ?>" type="checkbox" id="hm_showcase" name="hm_showcase" value="0" <?= (($hm_showcase=='1')?'checked':'')  ?>/>
                                            <label class="form-check-label" for="hm_showcase">Home Showcase</label>
                                            <?php echo form_error('hm_showcase'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-sm-6 form-row align-items-end">
                                        <div class="col form-group mb-0">
                                            <label for="month_priority">Set Priorty</label>
                                            <input type="number" min="1" name="month_priority" id="month_priority" class="form-control <?php echo (form_error('month_priority') != "") ? 'is-invalid' : ''; ?>"  value="<?= set_value('month_priority', $month_priority); ?>"/>
                                            <?php echo form_error('month_priority'); ?>
                                        </div>
                                        <div class="col form-check form-check-inline">
                                            <input class="form-check-input <?php echo (form_error('month_story') != "") ? 'is-invalid' : ''; ?>" type="checkbox" id="month_story" name="month_story" value="0" <?= (($month_story=='1')?'checked':'')  ?>/>
                                            <label class="form-check-label" for="month_story">Story of the Month</label>
                                            <?php echo form_error('month_story'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-row align-items-end">
                                        <div class="col form-group mb-0">
                                            <label for="popular_priority">Set Priorty</label>
                                            <input type="number" min="1" name="popular_priority" id="popular_priority" class="form-control <?php echo (form_error('popular_priority') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('popular_priority', $popular_priority); ?>"/>
                                            <?php echo form_error('popular_priority'); ?>
                                        </div>
                                        <div class="col form-check form-check-inline">
                                            <input class="form-check-input <?php echo (form_error('popular') != "") ? 'is-invalid' : ''; ?>" type="checkbox" id="popular" name="popular" value="0" <?= (($popular=='1')?'checked':'')  ?>/>
                                            <label class="form-check-label" for="popular">Popular</label>
                                            <?php echo form_error('popular'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-sm-6 form-row align-items-end">
                                        <div class="col form-group mb-0">
                                            <label for="trending_priority">Set Priorty</label>
                                            <input type="number" min="1" name="trending_priority" id="trending_priority" class="form-control <?php echo (form_error('trending_priority') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('trending_priority', $trending_priority); ?>" />
                                            <?php echo form_error('trending_priority'); ?>
                                        </div>
                                        <div class="col form-check form-check-inline">
                                            <input class="form-check-input <?php echo (form_error('trending') != "") ? 'is-invalid' : ''; ?>" type="checkbox" id="trending" name="trending" value="0" <?= (($trending=='1')?'checked':'')  ?>/>
                                            <label class="form-check-label" for="trending">Trending</label>
                                            <?php echo form_error('trending'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5 mb-0">
                                <input type="hidden" name="blogid" value="<?= $bgid ?>">
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