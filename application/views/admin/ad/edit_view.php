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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('update_ad')?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">


                <?php echo form_open_multipart('admin/ad/update/'); ?>
              
                    <div class="form-group">
                        <label><?php echo display('page')?></label>
                        <select name="page" class="form-control" id="ade" onchange="loadPagePositions(this.value,'<?php echo $ads->ad_position; ?>')" required="1">
                            <option value=""><?php echo display('select');?></option>
                            <option value="1" <?php echo ($ads->page==1?'selected':'')?>><?php echo makeString(['home_page'])?></option>
                            <option value="2" <?php echo ($ads->page==2?'selected':'')?>><?php echo makeString(['category','page'])?></option>
                            <option value="3" <?php echo ($ads->page==3?'selected':'')?>><?php echo makeString(['news','details','page'])?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><?php echo display('ad_position')?></label>
                        <select name="ad_position" class="form-control" id="position" required="1">
                            <option><?php echo display('select');?></option>
                        </select>
                    </div>
                    

                    <div class="form-group">
                        <label class="font-weight-600"><?php echo display('ad_type')?></label>
                        <select name="ad_type" class="form-control" id="ad_type" onchange="set_ad_type(this.value)">
                            <option value=""><?php echo display('select')?></option>
                            <option value="1"><?php echo makeString(['google','ad'])?></option>
                            <option value="2"><?php echo makeString(['image','ad'])?></option>
                        </select>
                    </div>

                    <div class="img_ad">
                        <div class="form-group">
                            <label class="font-weight-600"><?php echo display('image')?></label>
                            <input type="file" name="ad_image" class="form-control" accept="image/*">
                            <span class="">[ jpg,png,jpeg,gif and max size is 1MB]</span>
                        </div>  

                        <div class="form-group">
                            <label><?php echo display('url')?></label>
                            <input type="text" name="ad_url" class="form-control">
                        </div>  
                    </div>

                    <div class="embed_code_ad">
                        <div class="form-group">
                            <label class="font-weight-600">Google ad client</label>
                            <input type="text" name="embed_code" class="form-control">
                            <span>[ Like this ca-pub-2922170655495017 ]</span>
                        </div> 
                    </div>

                <input type="hidden" name="id" value="<?php echo html_escape($ads->id);?>">

                    
                    <div class="form-group">
                        <a href="<?php echo base_url(); ?>admin/ad/view_ads" class="btn btn-primary "><i class="fa fa-backward"></i> <?php echo display('back')?></a>                                            
                        <input type="submit" value="<?php echo display('update')?>" class="btn btn-success">
                    </div>
                    
                <?php echo form_close();?>


                        <div class="form-group">
                            <label><?php echo makeString(['ad','preview'])?></label>
                            <?php echo $ads->embed_code; ?>
                        </div>

                     </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->

