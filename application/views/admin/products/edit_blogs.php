<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Edit Blogs</h2>
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
                        <a href="<?php echo base_url('blogs_admin/') ?>" class="btn btn-primary btn-xs float-right">Back</a>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form action="<?php echo base_url('accounts/edit_blog/' . $blog['id']) ?>" method="post" name="blogForm" id="blogForm" enctype="multipart/form-data">
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
                                    <label class="label_field">Category</label>
                                    <select name="category" id="category" class="form-control <?php echo (form_error('category') != "") ? 'is-invalid' : ''; ?>">
                                        <option value="">Select category</option>
                                        <?php foreach ($data as $categ) :
                                            $selected = ($blog['cat_id'] == $categ->id) ? true : false;
                                        ?>
                                            <option <?php echo set_select('category', $categ->id, $selected); ?> value="<?= $categ->id; ?>"><?= $categ->category_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('category'); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Sub Category</label>
                                    <select name="sub_category" id="sub_category" class="form-control <?php echo (form_error('sub_category') != "") ? 'is-invalid' : ''; ?>">
                                        <option value="">Select sub category</option>
                                    </select>
                                    <?php echo form_error('sub_category'); ?>
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
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Main Image</label>
                                    <input type="file" name="image" id="image" class="form-control <?php echo (!empty($imageError)) ? 'is-invalid' : ''; ?>" style="padding: 0.19rem .2rem;" />
                                    <br>
                                    <?php
                                    $path = './uploads/blogs/thumb_admin/' . $blog['image'];
                                    if ($blog['image'] != '' && file_exists($path)) {
                                    ?>
                                        <img src="<?php echo base_url('uploads/blogs/thumb_admin/' . $blog['image']); ?>">
                                    <?php
                                    }
                                    ?>
                                    <?php echo (!empty($imageError)) ? $imageError : '' ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label_field">Author</label>
                                    <input type="text" name="author" id="author" class="form-control <?php echo (form_error('author') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('author', $blog['author']); ?>" />
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
                                            <input type="number" min="0" name="hm_banner_priority" id="hm_banner_priority" value="<?= $blog['hm_banner_priority'] ?>" class="form-control" />
                                        </div>
                                        <div class="col form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="hm_banner" name="hm_banner" value="<?= $blog['hm_banner'] ?>" <?php if ($blog['hm_banner'] == 1) {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                } ?> />
                                            <label class="form-check-label" for="hm_banner">Home Banner</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-row align-items-end">
                                        <div class="col form-group mb-0">
                                            <label for="hm_showcase_priority">Set Priorty</label>
                                            <input type="number" min="0" name="hm_showcase_priority" id="hm_showcase_priority" value="<?= $blog['hm_showcase_priority'] ?>" class="form-control" />
                                        </div>
                                        <div class="col form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="hm_showcase" name="hm_showcase" value="<?= $blog['hm_showcase'] ?>" <?php if ($blog['hm_showcase'] == 1) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    } ?> />
                                            <label class="form-check-label" for="hm_showcase">Home Showcase</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-sm-6 form-row align-items-end">
                                        <div class="col form-group mb-0">
                                            <label for="month_priority">Set Priorty</label>
                                            <input type="number" min="0" name="month_priority" id="month_priority" value="<?= $blog['month_priority'] ?>" class="form-control" />
                                        </div>
                                        <div class="col form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="month_story" name="month_story" value="<?= $blog['month_story'] ?>" <?php if ($blog['month_story'] == 1) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    } ?> />
                                            <label class="form-check-label" for="month_story">Story of the Month</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-row align-items-end">
                                        <div class="col form-group mb-0">
                                            <label for="popular_priority">Set Priorty</label>
                                            <input type="number" min="0" name="popular_priority" id="popular_priority" value="<?= $blog['popular_priority'] ?>" class="form-control" />
                                        </div>
                                        <div class="col form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="popular" name="popular" value="<?= $blog['popular'] ?>" <?php if ($blog['popular'] == 1) {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } ?> />
                                            <label class="form-check-label" for="popular">Popular</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-sm-6 form-row align-items-end">
                                        <div class="col form-group mb-0">
                                            <label for="trending_priority">Set Priorty</label>
                                            <input type="number" min="0" name="trending_priority" id="trending_priority" value="<?= $blog['trending_priority'] ?>" class="form-control" />
                                        </div>
                                        <div class="col form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="trending" name="trending" value="<?= $blog['trending'] ?>" <?php if ($blog['trending'] == 1) {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?> />
                                            <label class="form-check-label" for="trending">Trending</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5 mb-0"><button type="submit" class="main_bt">Submit</button></div>
                        </form>
                        <div class="form-group py-2 mt-4 border-top border-bottom">
                            <div class="form-row justify-content-center align-items-center">
                                <h5 class="mb-0 col">Add Gallery, if any</h5>
                                <a href="#bmrModal" data-toggle="modal" class="btn btn-info col">Add Images</a>
                            </div>
                        </div>
                        <div class="form-row">
                            <?php if (!empty($blogsGallery)) {
                                if (is_array($blogsGallery) || is_object($blogsGallery)) {
                                    foreach ($blogsGallery as $blogGal) {
                            ?>
                                    <div class="col-sm-3 galBox" style="margin: 5px 0;">
                                        <button class="btn btn-danger btn-sm dltBtn" onclick="delete_gallery(<?= $blogGal['id'] ?>, <?= $blog['id'] ?>)"><i class="fa fa-trash"></i></button>
                                        <img 
                                            src="<?php echo base_url('uploads/blogs/gallery/' . $blogGal['file_name']); ?>" 
                                            alt="<?= $blogGal['alt_name']?>" 
                                            data-toggle="tooltip" data-placement="top" 
                                            title="<?php echo ($blogGal['alt_name'])?'Alt name = '.$blogGal['alt_name']:''; ?>" 
                                            class="img-fluid w-100" 
                                            style="height:120px;object-fit:cover"
                                        >
                                        <div class="add-alt">
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#altModal" data-galid="<?= $blogGal['id'] ?>" data-blogid="<?= $blog['id'] ?>">Alt Name +</button>
                                        </div>
                                    </div>
                            <?php   }
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end dashboard inner -->
    </div>
    <div class="modal fade" id="bmrModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Gallery Images</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('accounts/add_blog_gallery') ?>" method="post" name="blogForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" multiple name="galleryImages[]" id="galleryImages" class="form-control <?php echo (!empty($galleryError)) ? 'is-invalid' : ''; ?>" style="padding: 0.19rem .2rem;" />
                            <?php echo (!empty($galleryError)) ? $galleryError : '' ?>
                            <input type="hidden" name="blog_id" value="<?= $blog['id'] ?>">
                        </div>
                        <div class="form-group mb-0"><input type="submit" name="gallerySubmit" class="btn-sm main_bt" value="Submit"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Gallery Images Alt Name -->
    <div class="modal fade" id="altModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Image Alt Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('accounts/add_alt_gallery') ?>" method="post" name="altForm">
                        <div class="form-group">
                            <label>Alt name</label>
                            <input type="text" name="gallery_alt_name" id="gallery_alt_name" class="form-control <?php echo (form_error('gallery_alt_name') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('gallery_alt_name', $blogGal['alt_name']); ?>" />
                            <?php echo form_error('author'); ?>                                    
                            <input type="hidden" name="gal_id" id="gal_id">
                            <input type="hidden" name="blog_id" id="blog_id">
                        </div>
                        <div class="form-group mb-0"><input type="submit" name="altSubmit" class="btn-sm main_bt" value="Add"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function delete_gallery(id, blogId) {
            if (confirm("Are you sure you want to delete this image?")) {
                window.location.href = "<?= base_url('accounts/delete_blog_gallery/') ?>" + id + "/" + blogId;
            }
        }
    </script>
    <script>
        //Blog categories dependent dropdown and get sub category script
        $('#category').change(function() {
            var cat_id = $("#category").val();
            $('#sub_category').html('<option>No record found</option>');
            if (cat_id != '') {
                $.ajax({
                    url: "<?php echo base_url('blogs_admin/getSubCategory') ?>",
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