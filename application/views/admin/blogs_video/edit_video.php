<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Edit BMR TV Video</h2>
                </div>
            </div>
        </div>
        <?php if ($this->session->flashdata('success') != "") { ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php } ?>
        <?php if ($this->session->flashdata('error') != "") { ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php } ?>
        <?php echo !empty($statusMsg) ? '<div class="alert alert-success">' . $statusMsg . '</div>' : ''; ?>
        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <a href="<?php echo base_url('accounts/blogs_video/') ?>" class="btn btn-primary btn-xs float-right">Back</a>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form action="<?php echo base_url('accounts/edit_blogs_video/' . $blog['id']) ?>" method="post" name="blogForm" id="blogForm" enctype="multipart/form-data">
                            <div class="form-row mb-3">
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control <?php echo (form_error('meta_title') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('meta_title', $blog['meta_title']); ?>" />
                                    <?php echo form_error('meta_title'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control <?php echo (form_error('meta_keyword') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('meta_keyword', $blog['meta_keyword']); ?>" />
                                    <?php echo form_error('meta_keyword'); ?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="label_field">Meta Description</label>
                                    <textarea name="meta_desc" id="meta_desc" class="form-control <?php echo (form_error('meta_desc') != "") ? 'is-invalid' : ''; ?>" rows="3"><?= set_value('meta_desc', $blog['meta_desc']); ?></textarea>
                                    <?php echo form_error('meta_desc'); ?>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Video Thumb</label>
                                    <input type="file" name="image" id="image" class="form-control <?php echo (!empty($imageError)) ? 'is-invalid' : ''; ?>" style="padding: 0.19rem .2rem;" />
                                    <br>
                                    <?php
                                    $path = './uploads/videos/thumb_admin/' . $blog['video_th'];
                                    if ($blog['video_th'] != '' && file_exists($path)) {
                                    ?>
                                        <img src="<?php echo base_url('uploads/videos/thumb_admin/' . $blog['video_th']); ?>">
                                    <?php
                                    }
                                    ?>
                                    <?php echo (!empty($imageError)) ? $imageError : '' ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Video</label>
                                    <input type="text" name="video" id="video" class="form-control <?php echo (form_error('video') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('video', $blog['video']); ?>" />
                                    <?php echo form_error('video'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Sub Category</label>
                                    <select name="sub_category" id="sub_category" class="form-control <?php echo (form_error('sub_category') != "") ? 'is-invalid' : ''; ?>">
                                        <option value="">Select sub category</option>
                                        <?php 
                                        foreach ($subCat as $subCateg) { 
                                            $selected = ($blog['sub_cat_id'] == $subCateg->id) ? true : false;
                                        ?>
                                            <option <?php echo set_select('sub_category', $subCateg->id, $selected); ?> value="<?= $subCateg->id; ?>"><?= $subCateg->sub_category; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('sub_category'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Author</label>
                                    <input type="text" name="author" id="author" class="form-control <?php echo (form_error('author') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('author', $blog['author']); ?>" />
                                    <?php echo form_error('author'); ?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="label_field">Main Heading</label>
                                    <input type="text" name="main_heading" id="main_heading" class="form-control <?php echo (form_error('main_heading') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('main_heading', $blog['main_heading']); ?>" />
                                    <?php echo form_error('main_heading'); ?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="label_field">Description</label>
                                    <textarea name="description" id="description" class="form-control <?php echo (form_error('description') != "") ? 'is-invalid' : ''; ?>" rows="6"><?= set_value('description', $blog['main_content']); ?></textarea>
                                    <?php echo form_error('description'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>SHOW ON</h5>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-sm-6 form-row align-items-end">
                                        <div class="col form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="hm_show" name="hm_show" value="<?= $blog['hm_show'] ?>" <?php if ($blog['hm_show'] == 1) {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                } ?> />
                                            <label class="form-check-label" for="hm_show">Home Page</label>
                                        </div>
                                        <div class="col form-group mb-0">
                                            <label for="hm_show_priority">Set Priorty</label>
                                            <input type="number" min="0" name="hm_show_priority" id="hm_show_priority" value="<?= $blog['hm_show_priority'] ?>" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5 mb-0"><button type="submit" class="main_bt">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end dashboard inner -->
    </div>
    <script>
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