<?php
    $user_type = $this->session->userdata('user_type');
    if(($user_type==3) || ($user_type==4)){
        $this->load->view('admin/includes/__left_sideber'); 
    }else{  
        $this->load->view('admin/includes/__writer_left_menu.php');
    }
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
                <?php if($this->session->flashdata('error')){ ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="close" data-dismiss="alert">×</span>
                        <h4 class="alert-heading"><?php echo $this->session->flashdata('error'); ?></h4>
                    </div>
                <?php } ?>

                 <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['email','settings'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php echo form_open('admin/view_setup/email_config');?>
                            

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="Protocol"><?php echo display('smtp_protocol')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="protocol" id="Protocol" value="<?php echo  html_escape(@$email_config->smtp_protocol)?>" placeholder="Smtp Protocol">
                                    </div>
                                </div>

                              

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="host"><?php echo display('smtp_host')?></label>
                                    </div>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="host" id="host" value="<?php echo html_escape(@$email_config->smtp_host)?>" placeholder="Smtp Host">
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="port"><?php echo display('smtp_port')?></label>
                                    </div>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="port" id="port" value="<?php echo html_escape(@$email_config->smtp_port);?>" placeholder="Smtp Port">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="username"><?php echo display('smtp_username')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="username" id="username" value="<?php echo html_escape(@$email_config->smtp_username);?>" placeholder="Smtp Username">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="password"><?php echo display('smtp_password')?></label>
                                    </div>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" value="<?php echo html_escape(@$email_config->smtp_password);?>" id="password" placeholder="Smtp Password">
                                    </div>

                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="mailtype"><?php echo display('smtp_mailtype')?></label>
                                    </div>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="mailtype" id="mailtype" value="<?php echo html_escape(@$email_config->smtp_mailtype)?>" placeholder="Smtp Mailtype">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="charset"><?php echo display('smtp_charset')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                  
                                        <input type="text" class="form-control" name="charset" id="charset" value="<?php echo html_escape(@$email_config->smtp_charset)?>" placeholder="Smtp charset">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <label for="charset"><?php echo display('status')?></label>
                                        <input name="status" type="checkbox" <?php echo (@$email_config->status=1?'checked':'');?> > 
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="<?php echo html_escape(@$email_config->id);?>">
                                


                                <div class="row form-group">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button type="submit"  class="btn btn-sm btn-success"> <?php echo display('update')?></button>
                                    </div>
                                </div> 
          
                        <?php echo form_close();?>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->





