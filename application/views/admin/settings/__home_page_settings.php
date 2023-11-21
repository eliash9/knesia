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

                <?php if($this->session->flashdata('exception')){ ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="close" data-dismiss="alert">×</span>
                        <h4 class="alert-heading"><?php echo $this->session->flashdata('exception'); ?></h4>
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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['home','page','view','settings'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php  echo form_open('admin/view_setup/save_home_page_settings');?>
                            <div class="row">

                                <div class="col-md-5 pr-md-1">
                                    <div class="form-group">
                                        <label class="font-weight-600"><?php echo display('position_id')?></label>
                                        <select name="position_no" class="form-control" required="1" tabindex="1">
                                            <option value="">Select Position</option>
                                            <?php for($i=1;$i<=15; $i++){?>
                                                <option value="<?php echo $i?>"><?php echo $i?></option>
                                            <?php }?>
                                        </select>
                                        
                                    </div>
                                </div>

                                <div class="col-md-3 px-md-1">
                                    <div class="form-group">
                                        <label class="font-weight-600"><?php echo display('category_name')?></label>
                                        <select name="category_name" class="form-control" required="1" tabindex="1">
                                            <option value="">Select Category</option>
                                            <?php
                                            if (isset($categories) && is_array(@$categories)) {
                                                foreach (@$categories as $key => $value) {
                                                    echo '<option value="' . html_escape($value->category_id) . '">' . html_escape($value->category_name) . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-md-1">
                                    <div class="form-group">
                                        <label class="font-weight-600"></label>
                                        <button  class="btn btn-primary margin-top30" type="submit"><?php echo display('add_position')?></button>
                                    </div>
                                </div>
                            </div>

                        <?php echo form_close();?>

                        

                        <?php  echo form_open('admin/view_setup/update_home_page_settings');?>

                            <button class="btn btn-success btn-sm float-right margin-buttom15" type="submit"><?php echo display('update')?></button>

                            <table class="table table-bordered table-hover">
                                
                                <tr>
                                    <th><?php echo display('position_id')?></th>
                                    <th><?php echo display('category_name')?></th>
                                    <th><?php echo display('status')?></th>
                                </tr>

                                <?php 
                                foreach (@$home_page_settings as $key1 => $value1) {?>
                                    <tr>
                                        <td><input type="hidden" value="<?php echo $key1; ?>" name="position_no[]"><?php echo html_escape($key1); ?></td>
                                        
                                        <td>
                                            <select name="category_id[<?php echo $key1; ?>]" class="form-control" required="1" >
                                                <option value=""><?php echo display('category_name')?></option>
                                                <?php
                                                if (isset($categories) && is_array(@$categories)) {
                                                    foreach (@$categories as $key => $value) {
                                                        if ($value->category_id === $value1->category_id) {
                                                            $selected = 'selected';
                                                        }
                                                        echo '<option ' . $selected . ' value="' . $value->category_id . '">' . html_escape($value->category_name) . '</option>';
                                                        unset($selected);
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>

                                        
                                        <td>
                                            <?php
                                            if ($value1->status == 1) {
                                                $checked = 'checked';
                                            } else {
                                                $checked = '';
                                            }
                                            echo '<input type="checkbox" name="status[' . $key1 . ']" ' . $checked . ' value="1">';
                                            ?>
                                        </td>

                                    </tr>
                                    <?php
                                }
                                ?>

                            </table>

                        <?php echo form_close();?>
                    

                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->




