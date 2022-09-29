<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Add Media</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <a href="<?php echo base_url('accounts/media/') ?>" class="btn btn-primary btn-xs float-right">Back</a>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form action="<?php echo base_url('accounts/add_media') ?>" method="post" name="mediaForm" id="mediaForm" enctype="multipart/form-data">
                            <div class="form-row mb-3">
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control <?php echo (form_error('meta_title') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('meta_title'); ?>" />
                                    <?php echo form_error('meta_title'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control <?php echo (form_error('meta_keyword') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('meta_keyword'); ?>" />
                                    <?php echo form_error('meta_keyword'); ?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="label_field">Meta Description</label>
                                    <textarea name="meta_desc" id="meta_desc" class="form-control <?php echo (form_error('meta_desc') != "") ? 'is-invalid' : ''; ?>" rows="3"><?= set_value('meta_desc'); ?></textarea>
                                    <?php echo form_error('meta_desc'); ?>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Media's Thumb</label>
                                    <input type="file" name="image" id="image" class="form-control <?php echo (!empty($imageError)) ? 'is-invalid' : ''; ?>" style="padding: 0.19rem .2rem;" />
                                    <small>Only jpg|jpeg|png files are allowed</small>
                                    <?php echo (!empty($imageError)) ? $imageError : '' ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Media's URL</label>
                                    <input type="text" name="media_url" id="media_url" class="form-control <?php echo (form_error('media_url') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('media_url'); ?>" />
                                    <?php echo form_error('media_url'); ?>
                                </div>
                                <!-- <div class="col-md-6 form-group">
                                    <label class="label_field">media</label>
                                    <input type="file" name="media_file" id="media_file" class="form-control <?php echo (!empty($pdfError)) ? 'is-invalid' : ''; ?>" style="padding: 0.19rem .2rem;" />
                                    <small>Only pdf files are allowed</small>
                                    <?php echo (!empty($pdfError)) ? $pdfError : '' ?>
                                </div> -->
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Title</label>
                                    <input type="text" name="title" id="title" class="form-control <?php echo (form_error('title') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('title'); ?>" />
                                    <?php echo form_error('title'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Author</label>
                                    <input type="text" name="author" id="author" class="form-control <?php echo (form_error('author') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('author'); ?>" />
                                    <?php echo form_error('author'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>SHOW ON</h5>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-sm-6 form-row align-items-end">
                                        <div class="col form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="hm_show" name="hm_show" value="0" />
                                            <label class="form-check-label" for="hm_show">Home Page</label>
                                        </div>
                                        <div class="col form-group mb-0">
                                            <label for="hm_show_priority">Set Priorty</label>
                                            <input type="number" min="1" name="hm_show_priority" id="hm_show_priority" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5 mb-0">
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
        $(".form-check-input").click(function() {
            if ($(this).is(':checked')) {
                $(this).val('1');
            } else {
                $(this).val('0');
            }
        })
    </script>
   