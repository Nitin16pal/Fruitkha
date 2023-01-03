<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Product List</h2>
                </div>
            </div>
        </div>
        <?php if ($this->session->flashdata('success') != "") { ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php } ?>
        <?php if ($this->session->flashdata('error') != "") { ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php } ?>
        <!-- <?php echo !empty($statusMsg)?'<div class="alert alert-success">'.$statusMsg.'</div>':''; ?> -->
        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <a href="<?php echo base_url('accounts/add_product') ?>" class="btn btn-success btn-xs">Add Products</a>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive-sm">
                                    <table id="dataTable" class="table w-100 table-striped projects">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th>Product Name</th>
                                                <th>Actual Price</th>
                                                <th>Discounts Price</th>
                                                <th>Image</th>
                                                <th>Add Gallery</th>
                                                <th>Uploaded By</th>
                                                <th>Added On</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($products['0'])) {
                                                $i = 1;
                                                foreach ($products as $list) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $list->cat_name ?></td>
                                                        <td><?= $list->scat_name ?></td>
                                                        <td><?= $list->prod_name ?></td>
                                                        <td><?= $list->prod_act_price ?></td>
                                                        <td><?= $list->prod_dist_price ?></td>
                                                        <td>
                                                            <ul class="list-inline">
                                                                <li>
                                                                    <?php
                                                                    $path = './uploads/products/thumb_admin/' . $list->prod_image;
                                                                    if ($list->prod_image != "" && file_exists($path)) {
                                                                    ?>
                                                                        <img width="50" height="50" src="<?php echo base_url('uploads/products/thumb_admin/' . $list->prod_image) ?>" class="rounded-circle" style="object-fit:cover" alt="<?= $list->prod_name ?>">
                                                                    <?php } else { ?>
                                                                        <img width="50" height="50" src="<?php echo base_url('uploads/products/thumb_admin/no-image.jpg') ?>" class="rounded-circle">
                                                                    <?php } ?>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td><a href="#bmrModal" data-toggle="modal" data-id="<?= $list->prod_id ?>" class="btn btn-info col">Add Images</a></td>
                                                        <td>
                                                            <a><?= $list->byteam ?></a>
                                                        </td>
                                                        <td><?= date('Y-m-d', strtotime($list->created)) ?></td>
                                                        <td>
                                                            <ul class="list-inline d-flex justify-content-end">
                                                            <?php
                                                                if ($list->status == 1) {
                                                                ?>
                                                                    <li><a href="<?= base_url('private/admin/status/0/products/') . $list->prod_id . '/prod_id/status/products' ?>" class="btn btn-success btn-xs">Active</a></li>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <li><a href="<?= base_url('private/admin/status/1/products/') . $list->prod_id . '/prod_id/status/products'  ?>" class="btn btn-warning btn-xs">Deactive</a></li>
                                                                <?php
                                                                }
                                                                ?>
                                                                <li><a href="<?= base_url('accounts/edit_product/' . $list->prod_id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></li>
                                                                <li><a href="<?= base_url('private/product/delete/products/'. $list->prod_id.'/prod_id/products') ?>" onclick=" return confirm('Are you sure you want to delete this blog?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php $i++;
                                                }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="8">No record found</td>
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
                            <input type="hidden" name="blog_id" value="">
                        </div>
                        <div class="form-group mb-0"><input type="submit" name="gallerySubmit" class="btn-sm main_bt" value="Submit"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#bmrModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var blog_id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body input[name=blog_id]').val(blog_id);
        })
    </script>