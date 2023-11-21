<?php
    $user_type = $this->session->userdata('user_type');
    if(($user_type==3) || ($user_type==4)){
        $this->load->view('admin/includes/__left_sideber'); 
    }else{  
        $this->load->view('admin/includes/__writer_left_menu.php');
    }

    include('common_file/__lang_list.php');
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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['edit','reporter'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php echo form_open_multipart('admin/users/update_reporter_info');
                           ?>
                            <input type="hidden" name="id" value="<?php echo html_escape($user_info->id); ?>">

                                    <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-5 pr-md-1">
                                                    <div class="form-group">
                                                    <label class="font-weight-600"><?php echo display('full_name');?></label>
                                                        <span class="font-weight-600 text-danger">*</span>
                                                        <input type="text" name="name" class="form-control"  placeholder="<?php echo display('name');?>" value="<?php echo html_escape($user_info->name); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 px-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('nick_name');?></label>
                                                        <input type="text" class="form-control" placeholder="<?php echo display('nick_name');?>" name="nick_name" value="<?php echo html_escape(@$user_info->pen_name); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pl-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('email');?><span class="font-weight-600 text-danger">*</span></label>
                                                        <input type="email" class="form-control"  name="email" value="<?php echo html_escape($user_info->email); ?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-4 pl-md-1">
                                                    <div class="form-group">
                                                       <label class="font-weight-600"><?php echo display('mobile');?></label>
                                                        <input type="number" class="form-control" placeholder="<?php echo display('mobile');?>" name="mobile" value="<?php echo html_escape($user_info->mobile); ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 pr-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('access_category');?>
                                                        <span class="font-weight-600 text-danger">*</span>
                                                        </label>
                                                        <select name="user_type" class="form-control" required>
                                                            <option value="">-<?php echo display('access_category');?>-</option>
                                                            <option value="4" <?php echo (html_escape($user_info->user_type)=='4'?'selected':'')?>><?php echo display('admin');?></option>
                                                            <option value="2" <?php echo (html_escape($user_info->user_type)=='2'?'selected':'')?>><?php echo display('writer');?></option>
                                                            <option value="1" <?php echo (html_escape($user_info->user_type)=='1'?'selected':'')?>><?php echo display('moderator');?></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 pr-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('sex')?></label>
                                                        <select class="form-control" name="sex">
                                                            <option value=""><?php echo display('select')?></option>
                                                            <option value="male" <?php echo (html_escape($user_info->sex)=='male'?'selected':'')?>> <?php echo display('male')?></option>
                                                            <option value="female" <?php echo (html_escape($user_info->sex)=='female'?'selected':'')?>> <?php echo display('female')?></option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                                  

                                           <div class="row">

                                                <div class="col-md-6 pr-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('blood');?></label>
                                                        <input type="text" class="form-control"  name="blood" value="<?php echo html_escape($user_info->blood);?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 pl-md-1">
                                                    <div class="form-group">
                                                    <label><?php echo display('birth_date');?></label>

                                                    <input type="text" class="form-control datepicker1"  name="birth_date" value="<?php echo html_escape($user_info->birth_date);?>">
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('address_line_one');?></label>
                                                        <input type="text" class="form-control" name="address_one" value="<?php echo html_escape($user_info->address_one);?>">
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('address_line_two');?></label>
                                                        <input type="text" class="form-control"  name="address_two" value="<?php echo html_escape($user_info->address_two);?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 pr-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('city');?></label>
                                                        <input type="text" class="form-control"  name="city" value="<?php echo html_escape($user_info->birth_date);?>">
                                                    </div>
                                                </div>
                                                 <div class="col-md-4 pl-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('state');?></label>
                                                        <input type="text" class="form-control" name="state" value="<?php echo html_escape($user_info->state);?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 px-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('country');?></label>
                                                        
                                                        <select class="form-control" name="country">
                                                            <?php foreach ($country as $key => $value) {?>
                                                                <option value="<?php echo html_escape($key)?>" <?php echo ($user_info->country==$key?'selected':''); ?>><?php echo html_escape($key)?></option>
                                                            <?php }?>
                                                        </select>

                                                        
                                                    </div>
                                                </div>
                                               
                                            </div>

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="font-weight-600"><?php echo display('zip');?></label>
                                                    <input type="number" class="form-control"  name="zip" value="<?php echo html_escape($user_info->zip);?>">
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                     <label class="font-weight-600"><?php echo display('verification_document_id');?></label>
                                                      <input type="text" class="form-control"  name="verification_id_no" value="<?php echo html_escape($user_info->verification_id_no);?>">
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="font-weight-600"><?php echo display('verification_type');?></label>
                                                      <select name="verification_type" class="form-control">
                                                        <option value="">--select--</option>
                                                        <option value="Driver licence" <?php if($user_info->verification_type=='Driver licence'){ echo 'selected';}?> >Driver licence</option>
                                                        <option value="National id" <?php if($user_info->verification_type=='National id'){ echo 'selected';}?>>National Id </option>
                                                        <option value="Pasport id" <?php if($user_info->verification_type=='Pasport id'){ echo 'selected';}?>>Pasport id </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>   
           
                                    </div>

                                    <div class="card-footer">
                                          <div class=" row form-group">
                                            <div class="col-md-12 ">
                                                <input type="submit" class="btn btn-md btn-success float-right" name="" value="<?php echo display('update');?>">
                                            </div> 
                                         </div>
                                    </div>

                                    
                                <?php echo form_close();?>
                     </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->