<?php
    $this->load->view('users/includes/__left_sideber');  
    include('common_file/__lang_list.php');
?>




    <!--/.Content Header (Page header)--> 
    <div class="body-content">


                    <?php 
                        if(!empty($user_info->photo)){
                            $img = base_url() . $user_info->photo;
                        }else{
                            $img = base_url('uploads/user/demo-pic.png');
                        }
                    ?>

                        <div class="row">

                            <div class='col-md-12'>
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
                            </div>



                            <div class="col-lg-3">
                                <div class="card mb-4">
                                    <div class="card-body">


                                        <div class="row align-items-center">
                                            <div class="col ">
                                                <img src="<?php echo $img; ?>" class="img-responsive img-thumbnail" width="175">
                                            </div>

                                            <div class="col-auto margin-top10">
                                                <?php
                                                    echo form_open_multipart('users/user_profile/user_photo');
                                                ?>
                                                        <input type="file" name="user_photo" id="file-1" class="custom-input-file" accept="image/*" >
                                                        <label for="file-1">
                                                            <i class="fa fa-upload"></i>
                                                            <span>Choose a file…</span>
                                                        </label>
                                                        <span>[jpg,png,jpeg and max size is 1MB]</span>
                                                    

                                                    <input name="user_pic" type="hidden" value="<?php echo html_escape(@$user_info->photo); ?>" /><br/>
                                                    <input  type="submit" class=" btn btn-success " value="<?php echo display('upload')?>"/>
                                                <?php echo form_close();?>
                                            </div>
                                        </div>  
                                        <hr>

                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="mb-0 font-weight-600"><?php echo display('name')?></h6>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#!" class="fs-13 font-weight-600"><?php echo html_escape(@$user_info->name);?></a>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="mb-0 font-weight-600"><?php echo display('email')?></h6>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#!" class="fs-13 font-weight-600"><?php echo html_escape(@$user_info->email);?></a>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="mb-0 font-weight-600"><?php echo display('phone')?></h6>
                                            </div>
                                            <div class="col-auto">
                                                <time class="fs-13 font-weight-600 text-muted" datetime="2018-10-28"><?php echo html_escape(@$user_info->mobile);?></time>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="mb-0 font-weight-600"><?php echo display('birth_date')?></h6>
                                            </div>
                                            <div class="col-auto">
                                                <time class="fs-13 font-weight-600 text-muted" datetime="1988-10-24"><?php echo html_escape(@$user_info->birth_date);?></time>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="mb-0 font-weight-600"><?php echo display('address')?></h6>
                                            </div>
                                            <div class="col-auto">
                                                <span class="fs-13 font-weight-600 text-muted"><?php echo html_escape(@$user_info->city).', '. html_escape(@$user_info->state).', '. html_escape(@$user_info->country);?></span>
                                            </div>
                                        </div>
                                        <hr>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['edit','profile'])?></h6>
                                            </div>
                                        </div>
                                    </div>
                                <?php echo form_open_multipart('users/user_profile/update_user_info');?>
                                    <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-5 pr-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('full_name')?><span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control"  placeholder="Full name" name="name" required="" value="<?php echo html_escape(@$user_info->name); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 px-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('nick_name')?></label>
                                                        <input type="text" class="form-control" name="pen_name" value="<?php echo html_escape(@$user_info->pen_name) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pl-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><span class="text-danger">*</span><?php echo display('email')?></label>
                                                        <input type="email" class="form-control" name="email" required="" value="<?php echo html_escape(@$user_info->email)?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-4 pr-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('sex')?></label>
                                                        <select class="form-control" name="sex">
                                                            <option><?php echo makeString(['select','gender'])?></option>
                                                            <option value="male" <?php echo (html_escape($user_info->sex)=='male'?'selected':'')?>> <?php echo display('male')?></option>
                                                            <option value="female" <?php echo (html_escape($user_info->sex)=='female'?'selected':'')?>> <?php echo display('female')?></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 pr-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('phone')?></label>
                                                        <input type="text" class="form-control" name="mobile" value="<?php echo html_escape(@$user_info->mobile); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4 pl-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('birth_date')?></label>
                                                        <input type="text" class="form-control datepicker1" name="birth_date" id="birth_date" autocomplete="off" value="<?php echo html_escape(@$user_info->birth_date); ?>"  >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('address_line_one')?></label>
                                                        <input type="text" class="form-control" name="address_one" id="address_one" value="<?php echo html_escape(@$user_info->address_one); ?>">
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
              
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('address_line_two')?></label>
                                                        <input type="text" class="form-control" name="address_two" id="address_two" value="<?php echo html_escape(@$user_info->address_two); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 pr-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('city')?></label>
                                                        <input type="text" class="form-control" name="city" id="city" value="<?php echo html_escape(@$user_info->city); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 px-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('state')?></label>
                                                        <input type="text" class="form-control" name="state" value="<?php echo html_escape(@$user_info->state); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pl-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('country')?></label>

                                                        <select class="form-control" name="country">
                                                            <?php foreach ($country as $key => $value) {?>
                                                                <option value="<?php echo $key?>" <?php echo ($user_info->country==$key?'selected':''); ?>><?php echo html_escape($key)?></option>
                                                            <?php }?>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('login_time')?>: <?php echo  html_escape(@$user_info->login_time); ?></label>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"><?php echo display('logout_time')?>: <?php echo html_escape(@$user_info->logout_time); ?></label>
                                                        
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-600"> <?php echo display('ip_address')?>: <?php echo html_escape(@$user_info->ip); ?></label>
                                                        
                                                    </div>
                                                </div>
                                            </div>


                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-fill btn-success"><?php echo display('update')?></button>
                                    </div>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                        </div>


    </div><!--/.body content-->

