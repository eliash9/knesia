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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['last_20_access'])?></h6>
                            </div>
                            <a href="<?php echo base_url(); ?>admin/users/clear_log" class="pull-right btn btn-primary" onclick="return confirm('After clear log, you will be logout.')"><?php echo display('clear_log')?></a>
                        </div>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-responsive">
                            <tr>
                                <th><?php echo display('ip_address')?></th>
                                <th><?php echo display('timezone')?></th>
                                <th><?php echo display('last_activity')?></th>
                            </tr>

                            <?php
                                if (@$last_access != FALSE) {
                                    foreach (@$last_access as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo html_escape($value->ip_address); ?></td>
                                            <td><?php echo date('l, d M, Y', html_escape($value->timestamp)); ?></td>
                                            <td><?php 
                                            $data = explode(';', $value->data);
                                            foreach ($data as $key => $val) {
                                               echo html_escape($val).'<br>';
                                            }
                                            ?></td>
                                        </tr>                   
                                    <?php
                                    }
                                }
                            ?>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->