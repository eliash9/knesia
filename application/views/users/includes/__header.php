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
        <title><?php echo html_escape($settings->website_title);?></title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url().@$settings->favicon;?>">
        <!--Global Styles(used by all pages)-->
        <link href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
        <!--Third party Styles(used by this page)--> 
        <link href="<?php echo base_url()?>assets/plugins/toastr/toastr.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
        <!-- datepiker -->
        <link href="<?php echo base_url()?>assets/plugins/ui-datetimepicker/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css"/>
        <!--Start Your Custom Style Now-->
        <link href="<?php echo base_url()?>assets/dist/css/style.css" rel="stylesheet">
        <script src="<?php echo base_url()?>assets/plugins/jQuery/jquery.min.js"></script>

    </head>
    
    <body class="fixed">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <div class="wrapper">

