<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Contact Enquiries</h2>
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
                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive-sm">
                                    <table id="dataTable" class="table w-100 table-striped projects">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Message</th>
                                                <th>Added On</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($cdata['0'])) {
                                                $i = 1;
                                                foreach ($cdata as $list) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $list->name ?></td>
                                                        <td><?= $list->email ?></td>
                                                        <td><?= $list->mobile ?></td>
                                                        <td><?= $list->message ?></td>
                                                        <td><?= date('Y-m-d', strtotime($list->created)) ?></td>
                                                        <td>
                                                            <ul class="list-inline d-flex justify-content-end">
                                                                <li><a href="<?= base_url('private/admin/delete/contactus/') . $list->id . '/id/contact-enquiries'  ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php
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