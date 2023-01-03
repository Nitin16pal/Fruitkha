<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Blogs</h2>
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
                        <a href="<?php echo base_url('accounts/add_blogs') ?>" class="btn btn-success btn-xs">Add Blog</a>
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
                                                <th>Image</th>
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
                                                        <td><?= $list->cat_id ?></td>
                                                        <td><?= $list->sub_cat_id ?></td>
                                                        <td>
                                                            <ul class="list-inline">
                                                                <li>
                                                                    <?php
                                                                    $path = './uploads/blogs/thumb_admin/' . $list->image;
                                                                    if ($list->image != "" && file_exists($path)) {
                                                                    ?>
                                                                        <img width="50" height="50" src="<?php echo base_url('uploads/blogs/thumb_admin/' . $list->image) ?>" class="rounded-circle" style="object-fit:cover" alt="BMR">
                                                                    <?php } else { ?>
                                                                        <img width="50" height="50" src="<?php echo base_url('uploads/blogs/thumb_admin/no-image.jpg') ?>" class="rounded-circle">
                                                                    <?php } ?>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td style="min-width:200px;"><?= $list->main_heading ?></td>
                                                        <td>
                                                            <a><?= $list->author ?></a>
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($list->hm_banner)) { ?>
                                                                <a href="<?= base_url('private/blogs_admin/hm_banner/0/blogs/') . $list->id ?>" class="btn btn-success btn-xs mb-2"><i class="fa fa-check"></i> Main Banner</a>
                                                            <?php } else { ?>
                                                                <a href="<?= base_url('private/blogs_admin/hm_banner/1/blogs/') . $list->id ?>" class="btn btn-danger btn-xs mb-2"><i class="fa fa-times"></i> Main Banner</a>
                                                            <?php } ?>
                                                            <?php if (!empty($list->hm_showcase)) { ?>
                                                                <a href="<?= base_url('private/blogs_admin/hm_showcase/0/blogs/') . $list->id ?>" class="btn btn-success btn-xs mb-2"><i class="fa fa-check"></i> Story Showcase</a>
                                                            <?php } else { ?>
                                                                <a href="<?= base_url('private/blogs_admin/hm_showcase/1/blogs/') . $list->id ?>" class="btn btn-danger btn-xs mb-2"><i class="fa fa-times"></i> Story Showcase</a>
                                                            <?php } ?>
                                                            <?php if (!empty($list->month_story)) { ?>
                                                                <a href="<?= base_url('private/blogs_admin/month_story/0/blogs/') . $list->id ?>" class="btn btn-success btn-xs mb-2"><i class="fa fa-check"></i> Story of the Month</a>
                                                            <?php } else { ?>
                                                                <a href="<?= base_url('private/blogs_admin/month_story/1/blogs/') . $list->id ?>" class="btn btn-danger btn-xs mb-2"><i class="fa fa-times"></i> Story of the Month</a>
                                                            <?php } ?>
                                                            <?php if (!empty($list->popular)) { ?>
                                                                <a href="<?= base_url('private/blogs_admin/popular/0/blogs/') . $list->id ?>" class="btn btn-success btn-xs mb-2"><i class="fa fa-check"></i> Popular Stories</a>
                                                            <?php } else { ?>
                                                                <a href="<?= base_url('private/blogs_admin/popular/1/blogs/') . $list->id ?>" class="btn btn-danger btn-xs mb-2"><i class="fa fa-times"></i> Popular Stories</a>
                                                            <?php } ?>
                                                            <?php if (!empty($list->trending)) { ?>
                                                                <a href="<?= base_url('private/blogs_admin/trending/0/blogs/') . $list->id ?>" class="btn btn-success btn-xs mb-2"><i class="fa fa-check"></i> Trending Stories</a>
                                                            <?php } else { ?>
                                                                <a href="<?= base_url('private/blogs_admin/trending/1/blogs/') . $list->id ?>" class="btn btn-danger btn-xs mb-2"><i class="fa fa-times"></i> Trending Stories</a>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?= date('Y-m-d', strtotime($list->added_on)) ?></td>
                                                        <td>
                                                            <ul class="list-inline d-flex justify-content-end">
                                                                <?php
                                                                if ($list->status == 1) {
                                                                ?>
                                                                    <li><a href="<?= base_url('private/blogs_admin/status/0/blogs/') . $list->id ?>" class="btn btn-success btn-xs">Active</a></li>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <li><a href="<?= base_url('private/blogs_admin/status/1/blogs/') . $list->id ?>" class="btn btn-warning btn-xs">Deactive</a></li>
                                                                <?php
                                                                }
                                                                ?>
                                                                <li><a href="<?= base_url('accounts/edit_blog/' . $list->id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></li>
                                                                <li><a href="<?= base_url('private/blogs_admin/delete/blogs/'. $list->id.'/id/blogs') ?>" onclick=" return confirm('Are you sure you want to delete this blog?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></li>
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
