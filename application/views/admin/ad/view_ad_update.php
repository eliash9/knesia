
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
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('ad_list')?></h6>
                            </div>

                            <a href="<?php echo base_url(); ?>admin/ad" class='btn btn-success btn-rounded w-md m-b-5 float-right text-white' > <i class="fa fa-backward"></i> <?php echo makeString(['add','new','ad'])?></a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <?php if (isset($ads) && is_array($ads)) { ?>

                                <table class="table table-bordered">
                                    <tr>
                                        <th>#SL</th>
                                        <th><?php echo display('ad_position')?></th>
                                        <th><?php echo display('embed_code')?></th>
                                        <th><?php echo makeString(['desktop'])?>/<?php echo display('tablet')?></th>
                                        <th><?php echo makeString(['mobile'])?></th>
                                        <th><?php echo display('action')?></th>
                                    </tr>

                                    <?php
                                    $i = 0;
                                    foreach ($ads as $key => $value) {

                                        echo '<tr>';
                                        echo '<td>' . ++$i . '</td>';
                                        echo '<td>';
                                            if($value->page==1){echo "Home Page $value->ad_position";}
                                            elseif($value->page==2){echo "Cetagory Page $value->ad_position";}
                                            else{echo "View Page $value->ad_position";}
                                        echo '</td>';
                                        echo '<td width="150">' . $value->embed_code . '</td>';

                                        echo "<td><a class='btn btn-sm btn-".($value->large_status==0?'danger':'success')."' href=" . base_url() . "admin/Ad/update_lg_status/" . $value->id . "/".$value->large_status.">".($value->large_status==0?'OFF':'ON')."</a></td>";
                                        echo "<td><a class='btn btn-sm btn-".($value->mobile_status==0?'danger':'success')."' href=" . base_url() . "admin/Ad/update_sm_status/" . $value->id . "/".$value->mobile_status.">".($value->mobile_status==0?'OFF':'ON')."</a></td>";
                                        
                                        echo "<td>
                                                    <a href='" . base_url() . "admin/ad/edit_view/" . $value->id . "' class='btn btn-sm btn-success'><i class='fa fa-edit'></i></a>&nbsp;
                                                    <a href='" . base_url() . "admin/ad/delete/" . $value->id . "' onclick='return delete_confirm()' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></a>
                                              </td>";
                                        echo '</tr>';
                                    }
                                    ?>
                                </table>
                            <?php } ?>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->


