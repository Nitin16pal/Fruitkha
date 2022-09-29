<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Category</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <?php echo $this->session->flashdata('success'); ?>


                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div><?php } ?>
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <a href="<?php echo base_url('accounts/add_category') ?>" class="btn btn-success btn-xs">Add Category</a>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive-sm">
                                    <table id="dataTable" class="table table-striped projects">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th style="width: 2%">No</th>
                                                <th style="width: 60%">Category Type</th>
                                                <th style="width: 60%">Category Name</th>
                                                <th style="width: 60%">Category Discription</th>
                                                <th style="width: 22%">Added on</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($data['0'])) {
                                                $i = 1;
                                                foreach ($data as $list) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $list->cat_type ?></td>
                                                        <td><?= $list->cat_name ?></td>
                                                        <td><?= $list->cat_discription ?></td>
                                                        <td><?= $list->cat_date ?></td>
                                                        <td>
                                                            <ul class="list-inline d-flex justify-content-end">
                                                                <?php
                                                                if ($list->catstatus == 1) {
                                                                ?>
                                                                    <li><a href="<?= base_url('private/admin/status/0/product_category/') . $list->cat_id . '/cat_id/catstatus/category' ?>" class="btn btn-success btn-xs">Active</a></li>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <li><a href="<?= base_url('private/admin/status/1/product_category/') . $list->cat_id . '/cat_id/catstatus/category'  ?>" class="btn btn-warning btn-xs">Deactive</a></li>
                                                                <?php
                                                                }
                                                                ?>
                                                                <li><a href="<?= base_url('accounts/edit_category/') . $list->cat_id  ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></li>
                                                                <li><a href="<?= base_url('private/admin/delete/product_category/') . $list->cat_id . '/cat_id/category'  ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $i++;
                                                }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="5">Data not found</td>
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
            <!-- end row -->
        </div>
        <!-- end dashboard inner -->
    </div>