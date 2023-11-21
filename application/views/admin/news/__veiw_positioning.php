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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('positioning')?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php 
                            echo form_open('admin/positioning/');
                        ?>
                           <div class="form-group">
                                <select name="category" class="form-control" required="1">
                                    <option value=""><?php echo makeString(['select','category'])?></option>   
                                    <option <?php echo $selected_category == 'home' ? 'selected' : ''; ?>><?php echo display('home')?></option>
                                    <?php
                                    if (isset($categories) && is_array($categories)) {
                                        foreach ($categories as $key => $value) {
                                            echo '<option value="' . $value->slug . '" ' . ($selected_category == $value->slug ? 'selected' : '') . '>' . html_escape($value->category_name) . '</option>';
                                        }
                                        unset($selected_category);
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="<?php echo display('search')?>" class="btn btn-success" name="search">
                            </div>
                       <?php echo form_close();?>



                        <?php  echo form_open('admin/positioning/update_positioning'); ?>
                         
                            <div class="float-right margin-buttom15">
                                <input type="hidden" value="<?php echo html_escape(@$s_c); ?>" name="category">
                                <input type="submit" value="<?php echo display('update')?>" class="btn btn-success btn-sm social_auth">
                            </div>
                           
                            <table class="table table-bordered table-hover ">
                                <thead>
                                    <tr>
                                        <th><?php echo display('title')?></th>
                                        <th width="3%"><?php echo display('position')?></th>
                                        <th width="2%"><?php echo display('action')?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php                                                                           
                                    if (isset($newses) && is_array($newses)) {
                                        foreach ($newses as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo html_escape($value->title); ?></td>
                                                <td><input type="numver"  name="position[<?php echo html_escape($value->id); ?>]" value="<?php echo html_escape($value->p_position); ?>" class="form-control"></td>
                                                <td><a href="<?php echo base_url(); ?>admin/positioning/delete_positionbyid/<?php echo html_escape($value->id); ?>" onclick="return confirm('Do you want to delete this ?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                            
                        <?php echo form_close();?>


                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->