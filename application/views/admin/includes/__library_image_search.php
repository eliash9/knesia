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
        <link rel="shortcut icon" href="<?php echo base_url().html_escape(@$settings->favicon);?>">
        <!--Global Styles(used by all pages)-->
        <link href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/plugins/toastr/toastr.css" rel="stylesheet">
        <!--Start Your Custom Style Now-->
        <link href="<?php echo base_url()?>assets/dist/css/style.css" rel="stylesheet">
        <script src="<?php echo base_url()?>assets/plugins/jQuery/jquery.min.js"></script>

    </head>

    <input type="hidden" id="base_url" value="<?php echo base_url()?>">


    <body class="fixed">

        <div class="wrapper">

            <!-- Page Content  -->
            <div class="content-wrapper">

                <div class="main-content">

                    <!--/.Content Header (Page header)--> 
                    <div class="body-content">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['insert','image'])?></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">

                                        <?php 
                                            $attributes = array('id'=>'imgfname','class'=>"needs-validation");
                                            echo form_open_multipart('admin/ajax_data/image_upload',$attributes);
                                        ?>

                                        <input type="hidden" id="base_url" value="<?php echo base_url()?>">
                                               
                                            <div class="form-row">

                                                <div class="col-lg-3 col-xs-3">
                                                    <div class="form-group">
                                                        <label>Height(Y)</label>
                                                        <input type="number" name="thime_y" value="200" class="form-control"/>
                                                    </div>
                                                </div>


                                                <div class="col-lg-3 col-xs-3">
                                                    <div class="form-group">
                                                       <label>Width(X):</label>
                                                        <input type="number" name="thime_x" value="260" class="form-control"/>     
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-xs-3">
                                                    <div class="form-group">
                                                        <label>Height(Y):</label>
                                                       <input type="number" name="img_y" value="400" class="form-control"/>
                                                    </div>
                                                </div>


                                                <div class="col-lg-3 col-xs-3">
                                                    <div class="form-group">
                                                       <label>Width(X):</label>
                                                         <input type="number" name="img_x" value="552" class="form-control" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-xs-4">
                                                    <div class="form-group">
                                                        <label><?php echo display('name')?></label>
                                                        <input type="text" name="picture_name" required class="form-control"/>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-xs-4">
                                                    <div class="form-group">
                                                        <label><?php echo display('title')?><span class="text-danger">*</span></label>
                                                        <input type="text" name="title" required  class="form-control"/>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-xs-4">
                                                    <div class="form-group">
                                                        <label><?php echo display('category')?><span class="text-danger">*</span></label><br>
                                                        <select name="category" class="form-control"  required >
                                                            <option value="" selected >Select Category</option>
                                                            <option value="0">General</option>
                                                            <option value="1">Political</option>
                                                            <option value="2">Man</option>
                                                            <option value="3">Women</option>
                                                            <option value="4">Exceptional</option>
                                                            <option value="5">Natural</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-xs-4">
                                                    <div class="form-group">
                                                        <label><?php echo display('image')?><span class="text-danger">*</span></label>
                                                        <input type="file" name="image" class="form-control"  required accept="image/*"/>
                                                    </div>
                                                </div>


                                            <div class="col-lg-2 col-xs-2">
                                                <div class="form-group ">
                                                    <label></label>
                                                    <button type="button" onClick="mimageUpload()" class="btn btn-success btn-s"> <?php echo makeString(['add','image'])?></button>
                                                </div>
                                    
                                            </div>
                                        </div>

                                        <?php echo form_close();?>

                                      
                                      
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['image','list'])?></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" id="readi">
                                        

                                        <?php echo form_open('admin/ajax_data/index',array('name' =>'fname', 'id'=>'SeForm' ));?>

                                        

                                            <div class="row form-group">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="image_name" id="image_name" placeholder="<?php echo display('search')?>">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-success" type="button" onClick="searchMform()"><?php echo display('search')?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php echo form_close();?>


                                            <div id="searchResult" >
                                                <?php
                                                    $query = $this->db->query("SELECT actual_image_name,picture_name FROM photo_library where picture_name like '%%' order by id desc limit 0,30");
                                                    foreach ($query->result_array() as $row) {
                                                ?>
                                                    <img class="img-responsive img-thumbnail" src="<?php echo site_url(); ?>uploads/thumb/<?php echo html_escape($row['actual_image_name']); ?>" height="100" width="100" onclick="sendValue('<?php echo html_escape($row['actual_image_name']); ?>')" title="<?php echo html_escape($row['picture_name']); ?>" />
                                                <?php } ?>
                                            </div>
                                    

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>


        <!--Global script(used by all pages)-->
        <script src="<?php echo base_url()?>assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/toastr/toastr.min.js"></script>
        <script src="<?php echo base_url()?>assets/dist/js/custom_funcion.js"></script>
        <!-- Third Party Scripts(used by this page)-->

    </body>
</html>