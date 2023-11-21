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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['contact','settings'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">



                        <?php echo form_open('admin/view_setup/save_contact_page')?>
                            
                       
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label><?php echo display('content')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea name="content" class="form-control" ><?php echo  html_escape(@$contact_setting->content)?></textarea>
                                    </div>
                                </div> 

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label><?php echo display('address')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea name="address" class="form-control" ><?php echo html_escape(@$contact_setting->address)?></textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label>Phone one</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="number" name="phone" class="form-control" id="" value="<?php echo html_escape(@$contact_setting->phone)?>">
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label><?php echo display('phone_two')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="number" name="phone_two" class="form-control" id="" value="<?php echo html_escape(@$contact_setting->phone_two)?>">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                         <label><?php echo display('email')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control"  value="<?php echo html_escape(@$contact_setting->email)?>">
                                    </div>
                                </div>

                                 <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label><?php echo display('website')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="website" class="form-control"  value="<?php echo html_escape(@$contact_setting->website)?>">
                                    </div>
                                </div>


                                 
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

