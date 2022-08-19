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
                                    <h2>Add Category</h2>
                                </div>
                                <div class="card-body">
                                

                                    <!--error message -->
                                    
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            
                                        <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="cat_types">Type Category</label>
                                                    <select class="form-control" id="cat_types" name="cat_types">
                                                        <option value="">Please Select</option>
                                                        <option value="Organic">Organic</option>
                                                        <option value="Inorganic">Inorganic</option>
                                                    </select>
                                                    <?php echo form_error('cat_types', "<div style='color:red'>", "</div>"); ?>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="fname">Category Name</label>
                                                    <input type="text" class="form-control" name="cat_name" placeholder="Enter Category">
                                                <?php echo form_error('cat_name', "<div style='color:red'>", "</div>"); ?>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="fname">Discription</label>
                                                    <input type="text" class="form-control" name="cat_discription" placeholder="Enter Discription">
                                                <?php echo form_error('cat_discription', "<div style='color:red'>", "</div>"); ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-footer pt-5 border-top">
                                            <button type="submit" class="btn btn-primary btn-default">Submit form</button>
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