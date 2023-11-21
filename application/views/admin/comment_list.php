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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('comments');?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                        <table class="table table-bordered table-hover">
                            
                            <tr>
                                <th>Sl</th>
                                <th><?php echo display('user_name');?></th>
                                <th><?php echo display('email');?></th>
                                <th><?php echo display('comments');?></th>
                                <th><?php echo display('news_id');?></th>
                                <th><?php echo display('status');?></th>
                                <th><?php echo display('action');?></th>
                            </tr>

                            <?php
                                $sl = 1;
                                foreach ($comments as $row) {
                            ?>
                                <tr>
                                    <th><?php echo $sl; ?></th>
                                    <td> <?php echo html_escape($row->name);?></td>
                                    <th><?php echo html_escape($row->email);?></th>
                                    <td><?php echo html_escape($row->comments);?></td>
                                    <td><?php echo html_escape($row->news_id);?></td>
                                    <td>
                                        <?php  if($row->com_status==1){;?>
                                            <span class="btn btn-info  mb-2 mr-1"><?php echo makeString(['verified'])?> </span>
                                        <?php  }else{?>
                                            <span class="btn btn-danger  mb-2 mr-1"><?php echo makeString(['not','verified'])?></span>
                                        <?php  }?>
                                    </td>

                                    <td>
                                        <?php  if($row->com_status==1){;?>
                                        <a href="<?php echo base_url()?>admin/comments_manage/un_varifid/<?php echo  html_escape($row->com_id);?>" class='btn btn-sm btn-success'>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </a>

                                    <?php  }else{?>

                                        <a href="<?php echo base_url()?>admin/comments_manage/varifid/<?php echo  html_escape($row->com_id);?>" class='btn btn-sm btn-danger'>
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    <?php  }?>
                                       
                                        <a href="<?php echo base_url()?>admin/comments_manage/delete_comments/<?php echo  html_escape($row->com_id);?>" onclick="return confirm('<?php echo display('do_you_want_to_delete_this')?>')" class='btn btn-sm btn-danger'><i class="fa fa-trash"></i></a>
                                    </td>
                                
                                </tr>
                            <?php
                                $sl++;
                                }
                            ?>
                        </table>
                    </div>
                        <?php echo htmlspecialchars_decode($links); ?>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->