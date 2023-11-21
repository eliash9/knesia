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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('cache_setting')?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                            <div class="col-md-12">
                                <button type="button" class="btn btn-default btn-labeled mb-2 mr-1">
                                    <i class="fa fa-retweet"></i> <strong><?php echo display('cache_path')?></strong> : <?php echo html_escape($d->cache_path);?>
                                </button>
                            </div>

                            <div class="col-md-12" >
                                <a href="<?php echo base_url('admin/cache_controller/delete_cache')?>" class="btn btn-labeled btn-info m-b-5 " >
                                    <span class="btn-label"><i class="fa fa-retweet"></i></span><?php echo display('delete_cache_file')?>
                                </a>

                                <?php if($d->status==0){ ?>

                                    <a href="<?php echo base_url('admin/cache_controller/ceche_on')?>" class="btn btn-labeled btn-success m-b-5" >
                                        <span class="btn-label"><i class="fa fa-check"></i></span><?php echo display('cache_on')?>
                                    </a>

                                <?php } else { ?>

                                    <a href="<?php echo base_url('admin/cache_controller/ceche_off')?>" class="btn btn-labeled btn-danger m-b-5">
                                        <span class="btn-label"><i class="fa fa-times"></i></span><?php echo display('cache_off')?>
                                    </a>
                                <?php } ?>
                            </div>
       
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->


<input type="hidden" id="base_url" value="<?php echo base_url();?>">






