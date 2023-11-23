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
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats statistic-box mb-4">
                <div
                    class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                    <div class="card-icon d-flex align-items-center justify-content-center">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Total Posts</p>
                    <h3 class="card-title fs-18 font-weight-bold">
                        <?php echo $totalpost ?> <small>Posts</small>
                    </h3>
                </div>
                <div class="card-footer p-3">
                    <div class="stats">
                        <a href="news_list/newses"><i class="typcn typcn-calendar-outline mr-2"></i>Total Post</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats statistic-box mb-4">
                <div
                    class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                    <div class="card-icon d-flex align-items-center justify-content-center">
                        <i class="fas fa-comments"></i>
                    </div>
                    <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Comments</p>
                    <h3 class="card-title fs-18 font-weight-bold">
                        <?php echo $totalcomment; ?> <small>comments</small>
                    </h3>
                </div>
                <div class="card-footer p-3">
                    <div class="stats">
                        <a href=" "><i class="typcn typcn-calendar-outline mr-2"></i>Total Post</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats statistic-box mb-4">
                <div
                    class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                    <div class="card-icon d-flex align-items-center justify-content-center">
                        <i class="fas fa-users"></i>
                    </div>
                    <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Subscribers</p>
                    <h3 class="card-title fs-21 font-weight-bold"><?php echo $subscribers?></h3>
                </div>
                <div class="card-footer p-3">
                    <div class="stats">
                        <a href="subscriber_manage/index"><i
                                class="typcn typcn-calendar-outline mr-2"></i>Total Subscribers</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats statistic-box mb-4">
                <div
                    class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                    <div class="card-icon d-flex align-items-center justify-content-center">
                        <i class="fas fa-users"></i>
                    </div>
                    <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Total Users</p>
                    <h3 class="card-title fs-21 font-weight-bold"><?php echo $totalusers?></h3>
                </div>
                <div class="card-footer p-3">
                    <div class="stats">
                        <a
                            href="general_user/user_list"><i
                                class="typcn typcn-upload mr-2"></i>Total Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fs-17 font-weight-600 mb-0">Berita terbaru</h6>
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