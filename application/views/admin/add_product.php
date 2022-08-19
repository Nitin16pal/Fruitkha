<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Admin Dashboard</title>
    <?php include "inc-css.php"; ?>

</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">


    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <?php include "sidebar.php"; ?>
        <div class="page-wrapper">
            <!-- Header -->
            <?php include "header.php"; ?>
            <!-- Header -->
            <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-default">
                                <div class="card-header card-header-border-bottom">
                                    <h2>Add Product</h2>
                                </div>
                                <div class="card-body">
                                    <?php if ($this->session->flashdata('success')) { ?>
                                        <script>
                                            swal({
                                                title: "Product add Successfully!",
                                                text: "Suceess message sent!!",
                                                icon: "success",
                                                button: "Ok",
                                                // timer: 2000
                                            });
                                        </script>
                                    <?php } ?>
                                    <!--error message -->
                                    <?php if ($this->session->flashdata('error')) { ?>
                                        <script>
                                            swal("Product not added! Some error Occure!", {
                                                icon: "error",
                                            });
                                        </script>
                                    <?php } ?>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="fname">Meta Title</label>
                                                    <input type="text" class="form-control" value="<?php set_value('prod_title'); ?>" name="prod_title" placeholder="Enter Title">
                                                    <?php echo form_error('prod_title', "<div style='color:red'>", "</div>"); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="fname">Meta Keywords</label>
                                                    <input type="text" class="form-control" name="prod_keywords" value="<?php set_value('prod_keywords'); ?>" placeholder="Enter Keywords">
                                                    <?php echo form_error('prod_keywords', "<div style='color:red'>", "</div>"); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="fname">Meta Discription</label>
                                                    <input type="text" class="form-control" name="prod_discription" value="<?php set_value('prod_discription'); ?>" placeholder="Enter Discription">
                                                    <?php echo form_error('prod_discription', "<div style='color:red'>", "</div>"); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="product_cat">Product Category</label>
                                                    <select class="form-control" id="product_cat" name="product_cat">
                                                        <option value="">Please Select</option>
                                                        <option value="fruits">fruits</option>
                                                        <option value="vegitables">vegitables</option>
                                                        <option value="dry fruits">dry fruits</option>
                                                    </select>
                                                    <?php echo form_error('product_cat', "<div style='color:red'>", "</div>"); ?>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="product_sbcat">Product Sub-Category</label>
                                                    <select class="form-control" id="product_sbcat" name="product_sbcat">
                                                        <option value="">Please Select</option>
                                                        <option value="fruits">fruits</option>
                                                        <option value="vegitables">vegitables</option>
                                                        <option value="dry fruits">dry fruits</option>
                                                    </select>
                                                    <?php echo form_error('product_sbcat', "<div style='color:red'>", "</div>"); ?>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="fname">Product Name</label>
                                                    <input type="text" class="form-control" name="prod_name" value="<?php set_value('prod_name'); ?>" id="prod_name" placeholder="Product Name">
                                                    <?php echo form_error('prod_name', "<div style='color:red'>", "</div>"); ?>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="State">Actual Price</label>
                                                            <input type="text" class="form-control" value="<?php set_value('act_price'); ?>" placeholder="Actual Price" name="act_price">
                                                            <?php echo form_error('act_price', "<div style='color:red'>", "</div>"); ?>
                                                        </div>

                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="Zip">Discouted Price</label>
                                                            <input type="text" class="form-control" value="<?php set_value('best_price'); ?>" placeholder="Best Price" name="best_price">
                                                            <?php echo form_error('best_price', "<div style='color:red'>", "</div>"); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlFile1">Product Image</label>
                                                            <input type="file" class="form-control-file" name="prod_image" id="exampleFormControlFile1">
                                                            <?php echo form_error('prod_image', "<div style='color:red'>", "</div>"); ?>
                                                        </div>

                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="Zip">Discouted Price</label>
                                                            <input type="text" class="form-control" placeholder="Sequence" value="<?php set_value('prod_seq'); ?>" name="prod_seq">
                                                            <?php echo form_error('prod_seq', "<div style='color:red'>", "</div>"); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-footer pt-5 border-top">
                                            <button type="submit" class="btn btn-primary btn-default">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "inc-script.php" ?>
</body>

</html>