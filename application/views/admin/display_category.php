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
                            <!-- Recent Order Table -->
                            <div class="card card-table-border-none" id="recent-orders">
                                <div class="card-header justify-content-between">
                                    <h2>Recent Orders</h2>
                                    <div class="date-range-report ">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <table class="table table-hover table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">S.No.</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">Category Discription</th>
                                                <th scope="col">Date </th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($c->result() as $row) { ?>
                                                <tr>
                                                    <td><a class="text-dark" href=""> <?= $row->cat_id   ?></a> </td>
                                                    <td class="d-none d-md-table-cell"> <?= $row->cat_name  ?></td>
                                                    <td class="d-none d-md-table-cell"> <?= $row->cat_discription      ?></td>
                                                    <td class="d-none d-md-table-cell"> <?= $row->cat_date  ?></td>
                                                    <td>
                                                        <?php if ($row->catstatus == '1') {  ?>
                                                            <span class="badge badge-success">Active</span>
                                                        <?php } else {  ?>
                                                            <span class="badge badge-danger">Inactive</span>
                                                        <?php } ?>
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