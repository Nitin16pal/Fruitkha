<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>BMR TV</h2>
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
                        <a href="<?php echo base_url('accounts/add_blogs_video') ?>" class="btn btn-success btn-xs">Add Video</a>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive-sm">
                                    <table id="dataTable" class="table w-100 table-striped projects">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Sub Category</th>
                                                <th>Video Thumb</th>
                                                <th>Title</th>
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
                                                        <td><?= $list->sub_category ?></td>
                                                        <td>
                                                            <ul class="list-inline">
                                                                <li>
                                                                    <?php
                                                                    $path = './uploads/videos/thumb_admin/' . $list->video_th;
                                                                    if ($list->video_th != "" && file_exists($path)) {
                                                                    ?>
                                                                        <img width="50" height="50" src="<?php echo base_url('uploads/videos/thumb_admin/' . $list->video_th) ?>" class="rounded-circle" style="object-fit:cover" alt="BMR">
                                                                    <?php } else { ?>
                                                                        <img width="50" height="50" src="<?php echo base_url('uploads/videos/thumb_admin/no-image.jpg') ?>" class="rounded-circle">
                                                                    <?php } ?>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td style="min-width:200px;"><?= $list->main_heading ?></td>
                                                        <td>
                                                            <a><?= $list->author ?></a>
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($list->hm_show)) { ?>
                                                                <a href="<?= base_url('private/blogs_video/hm_show/0/blogs_video/') . $list->id ?>" class="btn btn-success btn-xs mb-2"><i class="fa fa-check"></i> Yes</a>
                                                            <?php } else { ?>
                                                                <a href="<?= base_url('private/blogs_video/hm_show/1/blogs_video/') . $list->id ?>" class="btn btn-danger btn-xs mb-2"><i class="fa fa-times"></i> No</a>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?= date('Y-m-d', strtotime($list->added_on)) ?></td>
                                                        <td>
                                                            <ul class="list-inline d-flex justify-content-end">
                                                                <?php
                                                                if ($list->status == 1) {
                                                                ?>
                                                                    <li><a href="<?= base_url('private/blogs_video/status/0/blogs_video/') . $list->id ?>" class="btn btn-success btn-xs">Active</a></li>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <li><a href="<?= base_url('private/blogs_video/status/1/blogs_video/') . $list->id ?>" class="btn btn-warning btn-xs">Deactive</a></li>
                                                                <?php
                                                                }
                                                                ?>
                                                                <li><a href="<?= base_url('accounts/edit_blogs_video/' . $list->id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></li>
                                                                <li><a href="javascript:void(0);" onclick="deleteVideo(<?= $list->id ?>)" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></li>
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
    <script>
        function deleteVideo(id) {
            if (confirm("Are you sure you want to delete this video?")) {
                window.location.href = "<?= base_url('accounts/delete_blog_video/') ?>" + id;
            }
        }
    </script>