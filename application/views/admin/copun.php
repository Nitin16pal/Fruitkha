<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Copun</h2>
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
                        <a href="<?php echo base_url('accounts/add_coupon') ?>" class="btn btn-success btn-xs">Add Coupon</a>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive-sm">
                                    <table id="dataTable" class="table table-striped projects">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th style="width: 2%">No</th>
                                                <th style="width: 60%">Access Product</th>
                                                <th style="width: 60%">Copun Name</th>
                                                <th style="width: 60%">Copun Code</th>
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
                                                        <td><?= $list->prod_id ?></td>
                                                        <td><?= $list->promo_name ?></td>
                                                        <td><?= $list->promo_price ?></td>
                                                        <td><?=  date('Y-m-d', strtotime($list->created)) ?></td>
                                                        <td>
                                                            <ul class="list-inline d-flex justify-content-end">
                                                                <?php
                                                                if ($list->promo_status == 1) {
                                                                ?>
                                                                    <li><a href="<?= base_url('private/admin/status/0/promocode/') . $list->id . '/id/promo_status/coupon' ?>" class="btn btn-success btn-xs">Active</a></li>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <li><a href="<?= base_url('private/admin/status/1/promocode/') . $list->id . '/id/promo_status/coupon'  ?>" class="btn btn-warning btn-xs">Deactive</a></li>
                                                                <?php
                                                                }
                                                                ?>
                                                                <li><a href="<?= base_url('accounts/edit_coupon/') . $list->id  ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></li>
                                                                <li><a href="<?= base_url('private/admin/delete/promocode/') . $list->id . '/id/coupon'  ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></li>
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