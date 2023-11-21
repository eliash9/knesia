
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
            </div>


            <div class="col-md-6">

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['facebook','login','settings'])?> </h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php  echo form_open('admin/view_setup/social_auth_update');?> 

                        <input type="hidden" name="id" value="<?php echo html_escape($facebook->id)?>">
                        <div class="row form-group">
                            <label class="font-weight-600">  <?php echo makeString(['app','id'])?>  </label>
                            <input type="text" name="app_id" class="form-control" value="<?php echo html_escape($facebook->app_id); ?>">
                        </div> 

                        <div class="row form-group">
                            <label class="font-weight-600">  <?php echo makeString(['app','secret'])?></label>
                            <input type="text" name="app_secret" class="form-control" value="<?php echo html_escape($facebook->app_secret); ?>">
                        </div>

                        <div class="row form-group">
                            <label class="font-weight-600">  </label>
                            <button type="submit" class="btn btn-md btn-success"> <?php echo display('update')?></button>
                        </div>

                        <?php echo form_close()?>
                        <div class="social_auth_set">
                        <div class=""><a href="https://developers.facebook.com/apps/" target="__blank">Click To Create Facebook app </a> </div><br>
                        <p><?php echo makeString(['facebook','redirect','url'])?>  :  </p>
                        <input type="text" class="form-control" value="<?php echo base_url();?>Registration/facebook_login" onClick="this.setSelectionRange(0, this.value.length)" />
                        </div>         

                    </div>
                </div>
            </div>





            <div class="col-md-6">

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['google','login','settings'])?> </h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php  echo form_open('admin/view_setup/social_auth_update');?> 

                        <input type="hidden" name="id" value="<?php echo html_escape($google->id)?>">
                        <div class="row form-group">
                            <label class="font-weight-600">  <?php echo display('client_id')?> </label>
                            <input type="text" name="app_id" class="form-control" value="<?php echo html_escape($google->app_id)?>">
                        </div> 

                        <div class="row form-group">
                            <label class="font-weight-600">  <?php echo display('client_secret')?></label>
                            <input type="text" name="app_secret" class="form-control" value="<?php echo html_escape($google->app_secret)?>">
                        </div>

                        <div class="row form-group">
                            <label class="font-weight-600"><?php echo display('api_key')?></label>
                            <input type="text" name="api_key" class="form-control" value="<?php echo html_escape($google->api_key)?>">
                        </div>

                        <div class="row form-group">
                            <label class="font-weight-600">  </label>
                            <button type="submit" class="btn btn-md btn-success"> <?php echo display('update')?></button>
                        </div>

                       

                        <?php echo form_close()?>

                            <div class=""><a href="https://console.developers.google.com/apis" target="__blank">Click To Create Google app</a> </div><br>

                            <div class="social_auth_set">
                                <p><?php echo makeString(['google','redirect','url'])?>  :  </p>
                                <input type="text" class="form-control" value="<?php echo base_url();?>Registration/googl_login/" onClick="this.setSelectionRange(0, this.value.length)" />
                            </div>
                                
                    </div>
                </div>
            </div>



        </div>
    </div><!--/.body content-->


