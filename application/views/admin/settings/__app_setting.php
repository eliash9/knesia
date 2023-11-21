
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


                <?php if($this->session->flashdata('exception')){ ?>

                    <div class="alert alert-danger" role="alert">
                        <span class="close" data-dismiss="alert">×</span>
                        <h4 class="alert-heading"><?php echo $this->session->flashdata('exception'); ?></h4>
                        
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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['app','settings'])?></h6>
                            </div>
                            
                        </div>
                    </div>

                    <div class="card-body">

                        <?php echo form_open_multipart('admin/view_setup/app_settings_save');?>

                            <div class="row form-group">
                                <div class="col-sm-3"><label><?php echo display('website_title')?></label></div>
                                <div class="col-sm-9">
                                    <input type="text" name="website_title" class="form-control" required="1" value="<?php echo html_escape(@$settings->website_title); ?>">
                                    
                                </div>
                            </div> 

                            <input type="hidden" name="id" value="<?php echo html_escape($settings->id)?>">

                            <div class="row form-group">
                                <div class="col-sm-3"><label><?php echo makeString(['logo','preview'])?></label></div>
                                <div class="col-sm-9">
                                    <?php
                                        echo '<img src="' . base_url() . html_escape(@$settings->logo) . '" width="200" >';
                                    ?>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-3"><label><?php echo makeString(['website','logo'])?></label></div>
                                <div class="col-sm-9">
                                    <input type="file" name="website_logo" class="form-control" accept="image/*" >
                                    <input type="hidden" name="website_logo_old" value="<?php echo html_escape(@$settings->logo)?>" >
                                    <span>[gif,jpg,png,jpeg,webp and max size is 1MB]</span>
                                </div> 
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-3"><label><?php echo display('footer_logo')?></label></div>
                                <div class="col-sm-9">
                                    <?php echo '<img src="' . base_url() . html_escape(@$settings->footer_logo) . '" width="200">';?>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-3"><label><?php echo display('footer_logo')?></label></div>
                                <div class="col-sm-9">
                                    <input type="file" name="footer_logo" class="form-control" accept="image/*">
                                    <input type="hidden" name="footer_logo_old" value="<?php echo html_escape(@$settings->footer_logo)?>" >
                                    <span>[gif,jpg,png,jpeg,webp and max size is 1MB]</span>
                                </div>              
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-sm-3"><label><?php echo display('favicon')?> <?php echo display('preview')?></label></div>
                                <div class="col-sm-2">
                                    <?php echo '<img src="' . base_url() . html_escape(@$settings->favicon) . '" width="32">'; ?>
                                </div>
                            </div>



                            <div class="row form-group">
                                <div class="col-sm-3"><label><?php echo display('favicon')?></label></div>
                                <div class="col-sm-9">
                                    <input type="file" name="favicon" class="form-control" accept="image/*">
                                    <input type="hidden" name="favicon_old" value="<?php echo html_escape(@$settings->favicon)?>" >
                                    <span>[gif,jpg,png,jpeg,webp and max size is 1MB]</span>
                                </div>
                            </div>

                            

                            <div class="row form-group">
                                <div class="col-sm-3"><label><?php echo makeString(['app','logo'])?></label></div>
                                <div class="col-sm-9">
                                    <?php echo '<img src="' . base_url() . html_escape(@$settings->app_logo) . '">'; ?>
                                </div>
                            </div>

                            

                            <div class="row form-group">
                                <div class="col-sm-3"><label><?php echo makeString(['app','logo'])?></label></div>
                                <div class="col-sm-9">
                                    <input type="file" name="app_logo" class="form-control" accept="image/*">
                                    <input type="hidden" name="app_logo_old" value="<?php echo html_escape(@$settings->app_logo)?>" >
                                    <span>[gif,jpg,png,jpeg,webp and max size is 1MB]</span>
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-sm-3"><label><?php echo makeString(['mobile','menu','image'])?></label></div>
                                <div class="col-sm-9">
                                    <?php echo '<img width="100" src="' . base_url() . html_escape(@$settings->mobile_menu_image) . '">'; ?>
                                </div>
                            </div>

                            

                            <div class="row form-group">
                                <div class="col-sm-3"><label><?php echo makeString(['mobile','menu','image'])?></label></div>
                                <div class="col-sm-9">
                                    <input type="file" name="mobile_menu_image" class="form-control" accept="image/*">
                                    <input type="hidden" name="mobile_menu_image_old" value="<?php echo html_escape(@$settings->mobile_menu_image)?>" >
                                    <span>[jpg,png,jpeg,webp and max size is 1MB]</span>
                                </div>
                            </div>




                            <div class="row form-group">
                                <div class="col-sm-3"><label><?php echo display('website_footer')?></label></div>
                                <div class="col-sm-9">
                                    <textarea name="footer_text" class="form-control"><?php echo  html_escape(@$settings->footer_text); ?></textarea>
                                </div>
                            </div> 


                            <div class="row form-group">
                                <div class="col-sm-3"><label><?php echo display('copy_right')?></label></div>
                                <div class="col-sm-9">
                                    <textarea name="copy_right" class="form-control"><?php echo  html_escape(@$settings->copy_right); ?></textarea>
                                </div>
                            </div> 



                            <div class="row form-group">
                                <div class="col-sm-3"><label><?php echo display('website_time_zone')?></label></div>
                                <div class="col-sm-9">
                                    <select name="time_zone" class="form-control" required="1" >
                                        <option value=""><?php echo display('select')?></option>
                                        <?php foreach (timezone_identifiers_list() as $value) { ?>
                                            <option value="<?php echo html_escape($value) ?>" <?php echo ((html_escape(@$settings->time_zone)==html_escape($value))?'selected':null) ?>><?php echo  html_escape($value) ?></option>";
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button class="btn btn-md btn-success"  type="submit" ><?php echo display('update')?></button>
                                </div>
                            </div> 
                                              
                        <?php echo form_close();?>
                            
                        
                    </div>
                </div>

            </div>

        </div>
    </div><!--/.body content-->







