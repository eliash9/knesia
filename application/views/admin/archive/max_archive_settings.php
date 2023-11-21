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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('maximum_archive_settings')?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php
                            echo form_open('admin/archive/save_max_archive_settings');
                        ?>

                        <div class="table-responsive">
                        
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>#</th>
                                    <th><?php echo display('category');?></th>
                                    <th ><?php echo display('maximum_news');?></th>
                                    <th ><?php echo display('available_for_archive');?></th>
                                    <th ><?php echo display('action');?></th>
                                </tr>
                                <?php
                                $i = 0;
                                if (isset($categories) && is_array($categories)) {
                                    foreach ($categories as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo ++$i; ?></td>
                                            <td><?php echo html_escape($value->category_name); ?></td>
                                            <td><input type="number" class="form-control" name="<?php echo html_escape($value->category_id); ?>" value="<?php echo ($value->max_archive == '') ? 0 : $value->max_archive; ?>"></td>
                                            <td><h4><div class="btn btn-<?php echo html_escape($value->available_for_archive) > 0 ? "success" : "warning"; ?>"><?php echo html_escape($value->available_for_archive) <= 0 ? 0 : $value->available_for_archive; ?></div></h4></td>
                                            <td>
                                                <button type="button" class="btn btn-primary archive_modal <?php echo html_escape($value->available_for_archive) <= 0 ? "disabled" : ""; ?>" id="<?php echo html_escape($value->category_id) . '~' . $value->available_for_archive; ?>"
                                                 data-toggle="modal" data-target="<?php echo html_escape($value->available_for_archive) <= 0 ? "disabled" : "#myModal"; ?>">
                                                    <?php echo display('archive');?>
                                                </button>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="4" class="text-right"><input type="submit" value="<?php echo display('update');?>" class="btn btn-success btn-lg" name="update"></td>
                                </tr>
                            </table>
                        </div>
                        <?php echo form_close();?>
                    </div>

                </div>
            </div>
        </div>
    </div><!--/.body content-->




  <!-- Modal -->
    <div class="modal fade" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title font-weight-600" id="myModalLabel"><?php echo display('archive_news')?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

              
                <div class="modal-body">
                    <span id="processing"></span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped archive_process" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">40% Complete (success)</span>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-lg a margin-top10" id="start_archive"><?php echo display('start_archive')?></button>
                    <br>

                    <div class="archive_status d-none">
                        <div class="alert alert-success">
                            <button class="close" data-dismiss="alert">&times;</button>
                            <i class="fa fa-check fa-2x text-left" ></i>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo display('close')?></button>
                </div>
            </div>
        </div>
    </div>



<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">

<script src="<?php echo base_url()?>assets/dist/js/menu_setup.js"></script>




    


