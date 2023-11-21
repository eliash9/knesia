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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['location','based ','user','analytics'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">


            <?php 
                $form_attribute = array('method' =>'get','class'=>'form-horizontal');
                echo form_open('admin/User_analytics/location_based/',$form_attribute);
            ?>

                <div class="form-group">
                    <label class="font-weight-600">Select country :</label>
                   <select name="country" id="country" onchange="submit()" class="form-control">
                        <option value="">-Select Country-</option>
                        <?php foreach ($country as  $info){?>
                            <option value="<?php echo html_escape($info->country); ?>"<?php
                            if ($info->country == @$_GET['country']) {
                                echo'selected';
                            }
                            ?>><?php echo html_escape($info->country); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                    
            <?php echo form_close();?>

                            
                    <div class="table-responsive">
                            <table class="table table-bordered">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc"><?php echo display('country')?></th>
                                    <th class="sorting"><?php echo display('city')?></th>
                                    <th class="sorting"><?php echo display('ip')?></th>
                                    <th class="sorting"><?php echo display('news')?></th>
                                    <th class="sorting"><?php echo display('date')?> <?php echo display('time')?></th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach($analytics as $info){?>
                              <tr >
                                <td ><?php echo html_escape($info->country);?></td>
                                <td><?php echo html_escape($info->city);?></td>
                                <td><?php echo html_escape($info->ip);?></td>
                                <td><?php echo html_escape($info->link);?></td>
                                <td><?php echo html_escape($info->date_time);?></td>
                              </tr>
                              <?php }?>
                            </tbody>
                            <?php echo htmlspecialchars_decode(@$links);?>
                        </table>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->


