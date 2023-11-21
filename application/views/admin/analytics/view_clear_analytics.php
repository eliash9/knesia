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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['clear','analytics','data'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="row">

                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <a  class="btn btn-warning btn-success m-b-5 cache_modal" href="<?php echo base_url();?>admin/user_analytics/delete">
                                  <i class="fa fa-trash"></i> <?php echo makeString(['clear','data'])?>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-12">

                                <?php $an = json_decode(@$status);?>                           
                                <?php if(@$an->user_analytics=='active'){ ?>

                                    <a href="<?php echo base_url();?>admin/user_analytics/analytics_status/<?php echo @$an->user_analytics?>" class="btn btn-labeled btn-success m-b-5" >
                                        <span class="btn-label"><i class="fa fa-check"></i></span><?php echo makeString(['desable','analytics'])?>  
                                    </a>

                                <?php } else { ?>

                                    <a href="<?php echo base_url();?>admin/user_analytics/analytics_status/<?php echo @$an->user_analytics?>" class="btn btn-labeled btn-danger m-b-5" >
                                        <span class="btn-label"><i class="fa fa-times"></i></span><?php echo makeString(['enable','analytics'])?>  
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
        


                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->

