<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2><?= $section ?> Sub Category</h2>
                </div>
            </div>
        </div>

        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <a href="<?php echo base_url('accounts/sub_category') ?>" class="btn btn-primary btn-xs float-right">Back</a>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                            <div class="col-md-6 form-group">
                                    <label class="label_field">Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" value="<?= set_value('meta_title',$scat_title); ?>" class="form-control <?php echo (form_error('meta_title') != "") ? 'is-invalid' : ''; ?>" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" value="<?= set_value('meta_keyword',$scat_keyword); ?>" class="form-control <?php echo (form_error('meta_keyword') != "") ? 'is-invalid' : ''; ?>" />
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="label_field">Meta Description</label>
                                    <textarea name="meta_desc" id="meta_desc" class="form-control <?php echo (form_error('meta_desc') != "") ? 'is-invalid' : ''; ?>" rows="3"> <?= set_value('meta_desc',$scat_desc); ?></textarea>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="label_field">Category Type</label>
                                    <select name="category_type" id="category_type" class="form-control <?php echo (form_error('category_type') != "") ? 'is-invalid' : ''; ?>">
                                        <option value="">Select category Type</option>
                                        <option <?php echo ($cat_type=='Organic')?'selected':'' ?> value="Organic">Organic</option>
                                        <option <?php echo ($cat_type=='In-Organic')?'selected':'' ?> value="In-Organic">In-Organic</option>
                                        <!-- <?php foreach ($data as $categ) : ?>
                                            <option <?php echo set_select('category_type', $categ->id, false); ?> value="<?= $categ->id; ?>"><?= $categ->category_name; ?></option>
                                        <?php endforeach; ?> -->
                                    </select>
                                    <?php echo form_error(' category_type'); ?>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="label_field">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        <?php foreach ($gtcat as $list) : ?>
                                            <option <?php echo ($list->cat_id==$cat_id)?'selected':'' ?> value="<?= $list->cat_id; ?>"><?= $list->cat_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('category_id', "<span id='category_id_error' class='field_error text-danger d-block'>", "</span>"); ?>

                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="label_field">Sub Category</label>
                                    <input type="text" name="sub_category" id="sub_category" value="<?= set_value('sub_category',$sub_category) ?>" class="form-control <?php echo (form_error('sub_category') != "") ? 'is-invalid' : ''; ?>" />
                                    <?php echo form_error('category', "<span id='sub_category_error' class='field_error text-danger d-block'>", "</span>"); ?>

                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="label_field">Sub Category Description</label>
                                    <textarea name="sb_desc" id="sb_desc" class="form-control <?php echo (form_error('sb_desc') != "") ? 'is-invalid' : ''; ?>" rows="3"> <?= set_value('sb_desc',$sbcat_desc); ?></textarea>
                                    <?php echo form_error('sb_desc', "<span id='sb_desc' class='field_error text-danger d-block'>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group margin_0">
                                <input type="hidden" name="subcat_id" id="subcat_id" value="<?= $id ?>">
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