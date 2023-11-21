<?php
    $this->load->view('users/includes/__left_sideber');  
?>


    <!--/.Content Header (Page header)--> 
    <div class="body-content">
        <div class="row">
            
            <div class="col-md-12">

                <?php if($this->session->flashdata('message')){ ?>
                    <div class="alert alert-success" role="alert">
                        <span class="close" data-dismiss="alert">×</span>
                        <h4 class="alert-heading"><?php echo $this->session->flashdata('message'); ?></h4>
                    </div> 
                <?php } ?>
                <?php if($this->session->flashdata('exception')){ ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="close" data-dismiss="alert">×</span>
                        <h4 class="alert-heading"><?php echo $this->session->flashdata('exception'); ?></h4>
                    </div>
                <?php } ?>


                <div class="card mb-4">

                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Change Password</h6>
                            </div>
                        </div>
                    </div>

                        <?php echo form_open_multipart('users/user_profile/save_change');?>
                    <div class="card-body">

                            <div class="row">


                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group">
                                        <label class="font-weight-600"><?php echo display('new_password')?></label>
                                        <input type="password" name="new_password" class="form-control" required="1">
                                    </div>
                                </div>

                                <div class="col-md-6 px-md-1">
                                    <div class="form-group">
                                        <label class="font-weight-600"> <?php echo display('confirm_password')?></label>
                                        <input type="password" class="form-control" name="confirm_password" required="1">
                                    </div>
                                </div>
                                                
                            </div>

                            <button type="submit" class="btn  btn-primary"><?php echo makeString(['save','change'])?></button>
                            
                    </div>
                        <?php echo form_close()?>
                </div>
            </div>
        </div>
    </div><!--/.body content-->