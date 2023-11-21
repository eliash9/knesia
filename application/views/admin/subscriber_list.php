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

            </div>

            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="fs-17 font-weight-600 mb-0">Subscribers cron jobs url</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <p>Click to copy url and set cron jobs in your cPanel</p>

                        <input type="text" class="form-control" value="<?php echo base_url('Sender/index');?>" onClick="this.setSelectionRange(0, this.value.length)" />
                    </div>
                </div>
            </div>

            <div class="col-md-12">


                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('subscribers');?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table id="subscribers" class="table table-bordered table-hover">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc"><?php echo display('name')?></th>
                                        <th class="sorting"><?php echo display('email')?></th>
                                        <th class="sorting"><?php echo display('phone')?></th>
                                        <th class="sorting"><?php echo display('action')?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php foreach($subscription as $info){?>
                                  <tr role="row" class="odd">
                                    <td ><?php echo html_escape($info->name);?></td>
                                    <td><?php echo html_escape($info->email);?></td>
                                    <td><?php echo html_escape($info->phone);?></td>
                                    <td>  
                                        <a href="<?php echo base_url()?>admin/subscriber_manage/delete/<?php echo  html_escape($info->subs_id);?>" onclick="return confirm('<?php echo display('do_you_want_to_delete_this')?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                  </tr>
                                  <?php }?>
                                </tbody>

                            </table>
                            <?php echo htmlspecialchars_decode(@$links);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->