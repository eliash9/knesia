<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
//get site_align setting
$settings = $this->db->get('app_settings')->row();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
        <meta name="author" content="Bdtask">
        <title><?php echo  html_escape($settings->website_title)?></title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(). html_escape($settings->favicon)?>">
        <!--Global Styles(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
        <!--Third party Styles(used by this page)--> 

        <!--Start Your Custom Style Now-->
        <link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet">
    </head>

    <body class="bg-white">
        <div class="d-flex align-items-center justify-content-center text-center h-100vh">
            <div class="form-wrapper m-auto">

                <?php if ($this->session->flashdata('message') != null) {  ?>
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('message'); ?>
                </div> 
                <?php } ?>
                
                <?php if ($this->session->flashdata('exception') != null) {  ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('exception'); ?>
                </div>
                <?php } ?>
                
                <?php if (validation_errors()) {  ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo validation_errors(); ?>
                </div>
                <?php } ?> 


                <div class="form-container my-4">
                    <div class="register-logo text-center mb-4">
                        <img src="<?php echo base_url(). html_escape($settings->logo)?>" alt="" width='200'>
                    </div>

                    <div class="panel">

                        <div class="panel-header text-center mb-3">
                            <h3 class="fs-24"><?php echo display('admin_login_header')?></h3>
                            <p class="text-muted text-center mb-0"><?php echo display('admin_login_description')?></p>
                        </div>

                       <?php echo form_open('admin/login/check_authentic'); ?>
                        
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo display('email') ?>">
                            </div>
                            
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="<?php echo display('password') ?>" name="password" id="password">
                            </div>
                            
                            <button type="submit" class="btn btn-success btn-block"><?php echo display('login') ?></button>
                    
                        <?php echo form_close()?>
                    </div>

                    <div class="bottom-text text-center my-3">
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- /.End of form wrapper -->
        <!--Global script(used by all pages)-->
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <!-- Third Party Scripts(used by this page)-->

    </body>
</html>