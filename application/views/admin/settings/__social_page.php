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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['social','page'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">



                            <?php echo form_open('admin/seo/update_social_pages');?>
                                    <div class="form-group row">
                                        <div class="col-sm-3"><label><?php echo makeString(['facebook','page','url'])?></label></div>
                                        <div class="col-sm-7">
                                            <input type="text" name="fb" class="form-control" value="<?php echo html_escape(@$social_page->fb); ?>">
                                        </div>                                        
                                    </div>   

                                    <!--twitter-->
                                    <div class="form-group row">
                                        <div class="col-sm-3"><label><?php echo makeString(['twitter','page','url'])?></label></div>
                                        <div class="col-sm-7">
                                            <input type="text" name="tw" class="form-control" value="<?php echo html_escape(@$social_page->tw); ?>"/>
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




