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


            <?php
                $this->load->view('admin/news/__filter'); 
            ?>


                 <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('news_list')?></h6>
                            </div>

                            <form method="post" action="#" class="float-right">
                                <button  type="button" class="btn btn-success btn-md"  id="filter"  name="filter" data-toggle="toggle" data-style="ios" data-onstyle="success"><i class="fa fa-filter"></i> <?php echo makeString(['filter'])?></button>
                            </form>

                        </div>
                    </div>

                    
                        <div class="card-body">
                                
                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered table-striped table-hover bg-white m-0 card-table">
                                        <thead>

                                            <tr>
                                                <th>#sl </th>
                                                <th><?php echo makeString(['image'])?> </th>
                                                <th><?php echo display('title');?></th>
                                                <th><?php echo display('category');?></th>
                                                <th><?php echo display('hit');?></th>
                                                <th><?php echo display('post_by');?></th>
                                                <th><?php echo display('publish_date');?></th>
                                                <th> <?php echo makeString(['post','date']) ?></th>
                                                <th><?php echo display('status');?></th>
                                                <th width="100"><?php echo display('action');?></th>
                                            </tr>

                                        </thead>


                                        <tbody>

                                            <?php
                                            $sl = 1;
                                                foreach ($pp as $row) {
                                            ?>

                                            <tr>

                                                <td><?php echo $sl++; ?></td>
                                                <td><img src="<?php echo base_url('uploads/thumb/').$row['image']?>" width="60"></td>

                                                <td><?php echo html_escape(@$row['title']); ?></td>
                                                <td><?php echo html_escape(ucwords($row['page'])); ?></td>
                                                <td><?php echo html_escape($row['reader_hit']); ?></td>
                                                <td><?php echo html_escape($row['name']); ?></td>
                                                
                                                <td class="smallfont"><?php echo html_escape(@$row['publish_date']); ?></td>
                                                <td class="smallfont"><?php echo html_escape(@$row['post_date']); ?></td>
                                                
                                                <td class="smallfont">
                                                    <?php if ($row['status'] == 0) { ?>
                                                        <a class="btn btn-labeled btn-success mb-2 mr-1" title="Publish" href="<?php echo base_url(); ?>admin/news_edit/unpublishd/<?php echo html_escape($row['news_id']); ?>"><?php echo display('publish');?></a>
                                                    <?php } else { ?>
                                                        <a class="btn btn-labeled btn-warning mb-2 mr-1" title="Publishd" href="<?php echo base_url(); ?>admin/news_edit/publishd/<?php echo html_escape($row['news_id']); ?>"><?php echo display('unpublish');?></a>
                                                    <?php } ?>
                                                </td>

                                                <td>
                                                    <a href="<?php echo base_url(); ?>admin/news_edit/index/<?php echo html_escape($row['news_id']); ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                                    <?php if($this->session->userdata('user_type')!=2){?>
                                                    <a onclick="delete_cnf('<?php echo base_url(); ?>admin/delete/singal/<?php echo html_escape($row['news_id']); ?>')" href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                            <?php }?>
                                        </tbody>
                                    </table>

                                </div>
                                <br>
                                    <?php echo htmlspecialchars_decode($links); ?>
                            </div>


                </div>
            </div>
        </div>
    </div><!--/.body content-->

