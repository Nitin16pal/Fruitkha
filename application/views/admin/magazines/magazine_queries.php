<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Magazine Queries</h2>
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
                                                <th>IP</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Magazine</th>
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
                                                        <td><?= $list->ip ?></td>
                                                        <td><?= $list->name ?></td>
                                                        <td><?= $list->email ?></td>
                                                        <td><?= $list->mobile ?></td>
                                                        <td>
                                                            <?php
                                                            if ($list->magazine_url != "") {
                                                            ?>
                                                                <a href="#magazineModal" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-magazine="<?= strval($list->magazine_url)?>" class="btn btn-sm btn-warning">View</a>
                                                            <?php } else { echo ("N/A"); }?>
                                                        </td>
                                                        <td><?= date('Y-m-d', strtotime($list->added_on)) ?></td>
                                                        <td>
                                                            <ul class="list-inline d-flex justify-content-end">
                                                                <li><a href="javascript:void(0);" onclick="deleteMagazineQuery(<?= $list->id ?>)" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></li>
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
    <div class="modal fade" id="magazineModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-full modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title">BMR Magazine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="bmrMagazine">
                        <iframe seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Model -->
    
    <script>
        function deleteMagazineQuery(id) {
            if (confirm("Are you sure you want to delete this query?")) {
                window.location.href = "<?= base_url('private/magazine/delete_magazine_query/') ?>" + id;
            }
        }
    </script>