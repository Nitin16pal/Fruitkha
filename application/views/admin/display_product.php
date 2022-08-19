<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel</title>
    <?php include "inc-css.php"; ?>
</head>
<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <div class="mobile-sticky-body-overlay"></div>
    <div class="wrapper">
        <?php include "sidebar.php"; ?>
        <div class="page-wrapper">
            <!-- Header -->
            <?php include "header.php"; ?>
            <!-- Header -->
            <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-table-border-none" id="recent-orders">
                                <div class="card-header justify-content-between">
                                    <h2>Recent Orders</h2>
                                    <div class="date-range-report ">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <table class="table table-hover table-responsive" >
                                        <thead>
                                            <tr>
                                                <th scope="col">S.No.</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Keywords</th>
                                                <th scope="col">Discription</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Subcategory</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Actual Price</th>
                                                <th scope="col">Discount Price</th>
                                                <th scope="col">Order</th>
                                                <th scope="col">Display Page</th>
                                                <th scope="col">Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($h->result() as $row){?>

                                            <tr>
                                                <td><?= $row->prod_id  ?></td>
                                                <td><a class="text-dark" href=""> <?= $row->prod_title  ?></a> </td>
                                                <td class="d-none d-md-table-cell"> <?= $row->prod_keywords  ?></td>
                                                <td class="d-none d-md-table-cell"> <?= $row->prod_discription  ?></td>
                                                <td class="d-none d-md-table-cell"> <?= $row->prod_category  ?></td>
                                                <td class="d-none d-md-table-cell"> <?= $row->prod_sub_category	  ?></td>
                                                <td class="d-none d-md-table-cell"> <?= $row->prod_name  ?></td>
                                                <td class="d-none d-md-table-cell"> <?= substr ($row->prod_image , 0 , 10 ); ?></td>
                                                <td class="d-none d-md-table-cell"> <?= $row->prod_act_price  ?></td>
                                                <td class="d-none d-md-table-cell"> <?= $row->prod_dist_price  ?></td>
                                                <td class="d-none d-md-table-cell"> <?= $row->prod_seq  ?></td>
                                                <td class="d-none d-md-table-cell"> <?= $row->display_page  ?></td>
                                                <td class="d-none d-md-table-cell"> <?= $row->prod_act_price  ?></td>
                                                <td>
                                                    <span class="badge badge-success">Completed</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="dropdown show d-inline-block widget-dropdown">
                                                        <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                                            <li class="dropdown-item">
                                                                <a href="#">View</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#">Remove</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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