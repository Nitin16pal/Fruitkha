<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>media</h2>
                </div>
            </div>
        </div>
        <?php if ($this->session->flashdata('msuccess') != "") { ?>
            <div class="alert alert-success"><?= $this->session->flashdata('msuccess'); ?></div>
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
                        <a href="<?php echo base_url('accounts/add_media') ?>" class="btn btn-success btn-xs">Add Media</a>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive-sm">
                                    <table id="dataTable" class="table w-100 table-striped projects">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Thumb</th>
                                                <th>Title</th>
                                                <th>Media</th>
                                                <th>Uploaded By</th>
                                                <th>Show on Homepage</th>
                                                <th>Added On</th>
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
                                                        <td>
                                                            <ul class="list-inline">
                                                                <li>
                                                                    <?php
                                                                    $path = './uploads/media/thumb_front/' . $list->thumb;
                                                                    if ($list->thumb != "" && file_exists($path)) {
                                                                    ?>
                                                                        <img width="50" height="50" src="<?php echo base_url('uploads/media/thumb_front/' . $list->thumb) ?>" class="rounded-circle" style="object-fit:cover" alt="BMR">
                                                                    <?php } else { ?>
                                                                        <img width="50" height="50" src="<?php echo base_url('uploads/media/thumb_front/no-image.png') ?>" class="rounded-circle">
                                                                    <?php } ?>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td style="min-width:200px;"><?= $list->title ?></td>
                                                        <td>
                                                            <a><?= $list->author ?></a>
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($list->hm_show)) { ?>
                                                                        <!-- base_url(controller(folder+class)/method/status/DB_tableName) -->
                                                                <a href="<?= base_url('private/media/hm_show/0/media/') . $list->md_id ?>" class="btn btn-success btn-xs mb-2"><i class="fa fa-check"></i> Yes</a>
                                                            <?php } else { ?>
                                                                <a href="<?= base_url('private/media/hm_show/1/media/') . $list->md_id ?>" class="btn btn-danger btn-xs mb-2"><i class="fa fa-times"></i> No</a>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?= date('Y-m-d', strtotime($list->added_on)) ?></td>
                                                        <td>
                                                            <ul class="list-inline d-flex justify-content-end">
                                                                <?php
                                                                if ($list->status == 1) {
                                                                ?>
                                                                    <li><a href="<?= base_url('private/media/status/0/media/') . $list->md_id ?>" class="btn btn-success btn-xs">Active</a></li>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <li><a href="<?= base_url('private/media/status/1/media/') . $list->md_id ?>" class="btn btn-warning btn-xs">Deactive</a></li>
                                                                <?php
                                                                }
                                                                ?>
                                                                <li><a href="<?= base_url('accounts/edit_media/' . $list->md_id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></li>
                                                                <li><a href="javascript:void(0);" onclick="deleteMedia(<?= $list->md_id ?>)" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php $i++;
                                                }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="7">No record found</td>
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
    <!-- Model Form -->
    <div class="modal fade" id="mediaModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-full modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title">BMR Media</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="bmrMedia">
                        <iframe seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Model -->
    
    <script>
        function deleteMedia(id) {
            if (confirm("Are you sure you want to delete this media?")) {
                window.location.href = "<?= base_url('private/media/delete_media/') ?>" + id;
            }
        }
    </script>