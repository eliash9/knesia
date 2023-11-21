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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('add_category');?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                           <?php echo form_open_multipart('admin/category/save_category');?>

                            <div class="col-md-4 ">
                                <div class="form-group">
                                       <label><?php echo display('category_name');?> <span class="text-danger">*</span></label>
                                       <input type="text" class="form-control " name="cat_name" required="">
                                 </div>
                            </div>

                            <div class="col-md-4 ">
                                <div class="form-group">
                                       <label><?php echo display('slug');?></label>
                                       <input type="text" class="form-control " name="slug">
                                 </div>
                            </div>

                            
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <div class="form-group">
                                    <label><?php echo display('category_image');?>(1350*350 & max size 1MB)  </label>
                                    <input type="file" name="cate_pic" id="file_select_machin" class="form-control input-sm" accept="image/*"/> 
                                </div>
                                </div>
                            </div>

                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-md btn-success" value="<?php echo display('save');?>">
                                </div> 
                            </div>
                                              
                        <?php echo form_close();?>

                     </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->