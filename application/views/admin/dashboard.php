<?php
$user_type = $this->session->userdata('user_type');
if (($user_type == 3) || ($user_type == 4)) {
    $this->load->view('admin/includes/__left_sideber');
} else {
    $this->load->view('admin/includes/__writer_left_menu.php');
}
?>




<!--/.Content Header (Page header)-->
<div class="body-content">
    <div class="row">

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fs-17 font-weight-600 mb-0">Daftar Berita</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped table-hover bg-white m-0 card-table">
                            <thead>

                                <tr>
                                    <th>#sl </th>
                                    <th>
                                        <?php echo makeString(['image']) ?>
                                    </th>
                                    <th>
                                        <?php echo display('title'); ?>
                                    </th>
                                    <th>
                                        <?php echo display('category'); ?>
                                    </th>
                                    <th>
                                        <?php echo display('post_by'); ?>
                                    </th>
                                </tr>

                            </thead>


                            <tbody>

                                <?php
                                $sl = 1;
                                foreach ($pp as $row) {
                                    ?>

                                    <tr>

                                        <td>
                                            <?php echo $sl++; ?>
                                        </td>
                                        <td><img src="<?php echo base_url('uploads/thumb/') . $row['image'] ?>" width="60">
                                        </td>

                                        <td>
                                            <?php echo html_escape(@$row['title']); ?>
                                        </td>
                                        <td>
                                            <?php echo html_escape(ucwords($row['page'])); ?>
                                        </td>
                                        <td>
                                            <?php echo html_escape($row['name']); ?>
                                        </td>

                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                    <br>
                    <?php echo htmlspecialchars_decode($links); ?>
                </div>
            </div>
        </div>
    </div>
</div>