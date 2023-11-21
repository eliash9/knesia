<?php
    $user_type = $this->session->userdata('user_type');
    if(($user_type==3) || ($user_type==4)){
        $this->load->view('admin/includes/__left_sideber'); 
    }else{  
        $this->load->view('admin/includes/__writer_left_menu.php');
    }
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/css/news-menu.css')?>">



    <!--/.Content Header (Page header)--> 
    <div class="body-content">

            <div class="row">

                <div class="col-lg-12">
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


                        <div class="col-lg-12">
                            <!--Basic Tabs-->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['setup','menu'])?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">

                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#Category"><?php echo display('category')?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#Pages"><?php echo display('add_page')?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#Link"><?php echo display('link')?></a>
                                    </li>
                                </ul>

                                    
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="Category" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <a  href="<?php echo base_url('admin/category/add_category');?>"><i class="fa fa-plus"></i> <?php echo makeString(['add','new','category'])?></a>
                                            <?php 
                                                echo form_open_multipart('admin/menu/save_content_menu');
                                            ?>
                                            <h3><?php echo display('category')?></h3>

                                            <?php foreach($categories as $cata){?>
                                                  <label ><input type="checkbox" name="content_id[]"  value="<?php echo $cata->category_id?>"> <?php echo html_escape($cata->category_name)?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?php }?>
                                            
                                            <input type="hidden" value="<?php echo html_escape($menu_id)?>" name="menu_id">
                                            <input type="hidden" value="categories" name="content_type">
                                            <br>
                                            <button type="submit" class="btn btn-success"><?php echo display('save')?></button>
                                            
                                            <?php echo form_close();?>
                                        </div>


                                        <div class="tab-pane fade" id="Pages" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <a  href="<?php echo base_url('admin/page_controller/create_new_page')?>"><i class="fa fa-plus"></i> <?php echo display('add_page')?></a>
                                            <?php 
                                                echo form_open_multipart('admin/menu/save_page_content_menu');
                                            ?>
                                            <h3>Pages</h3>

                                            <?php foreach($page as $page_value){?>
                                                  <label ><input type="checkbox" name="content_id[]" value="<?php echo $page_value->page_id?>"> <?php echo html_escape($page_value->title)?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?php }?>
                                            
                                            <input type="hidden" value="<?php echo html_escape($menu_id)?>" name="menu_id">
                                            <input type="hidden" value="pages" name="content_type">
                                            <br>
                                            <button type="submit" class="btn btn-success"><?php echo display('save')?></button>
                                            
                                            <?php echo form_close();?>
                                        </div>

                                        <div class="tab-pane fade" id="Link" role="tabpanel" aria-labelledby="pills-contact-tab">
                                            <a href="javascript:void(0)" onclick="add_link(<?php echo html_escape($menu_id)?>)"><i class="fa fa-plus"></i> <?php echo display('addnewlink')?></a>
                                                <?php 
                                                    echo form_open_multipart('admin/menu/add_link_with_content');
                                                ?>

                                                <?php
                                                    foreach ($link_info as $link) {  
                                                        echo'<label ><input type="checkbox" name="content_id[]" value="'.$link->link_id.'"> '.html_escape($link->link_level).'</label>&nbsp;&nbsp;&nbsp;&nbsp'; 
                                                    }          
                                                ?>
                                                <input type="hidden" value="<?php echo html_escape($menu_id)?>" name="menu_id">
                                                <br>
                                                <button type="submit" class="btn btn-success"><?php echo display('save')?></button>
                                                
                                                <?php echo form_close();?>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Tabs with dropdown-->
                            

                            <!--Vertical Left Tabs-->
                            <div class="col-lg-12">
                                <div class="card mb-4 mb-lg-0">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('update_menu')?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" id="table">
                                        <?php 
                                            $attributes = array('id'=>'drugDropForm');
                                            echo form_open('',$attributes)
                                        ?>
                                            <div id="sortable">
                                                <?php
                                                    $sl = 1;
                                                    foreach ($menu_content as $value) {            
                                                ?>         
                                                  <div class="row msv">
                                                    <div class="col-sm-10">
                                                        <?php echo html_escape($value->menu_lavel)?>
                                                    </div>

                                                    <div class="col-sm-2 mbtn">
                                                      <a class="btn-primary btn" onclick="editMenu(<?php echo $value->menu_content_id?>)" href="javascript:void(0)" ><i class="fa fa-edit fa-x"></i></a>
                                                      <a class="btn btn-danger" onclick="deleteMenu(<?php echo $value->menu_content_id?>)" href="javascript:void(0)" ><i class="fa fa-trash fa-x"></i></a>
                                                    </div>
                                                    <input type="hidden" value="<?php echo html_escape($value->menu_content_id);?>" name="id[]">
                                                  </div>
                                                <?php
                                                    $sl++;
                                                    }
                                                ?>
                                            </div>
                                            <br>
                                            <button class="btn btn-md btn-success float-sm-right" onclick="ContentPositionUpdate()"><?php echo display('update')?></button>
                                         <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                           
                        </div>


       
    </div><!--/.body content-->




  <!-- Modal -->
    <div class="modal fade" id="modal_form"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-600" id="myModalLabel">model title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php 
                    $attributes = array('id'=>'drugForm');
                    echo form_open_multipart('', $attributes);
                ?>
                <div class="modal-body">

                
                    <input type="hidden" value="" name="id"/> 
                    <input type="hidden" name="content_type" value="link">
                    <input type="hidden" name="menu_id" value="">
                    <input type="hidden" id="actionurl" value="">

                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label"><?php echo display('menu_level')?><span class="text-danger">*</span></label>
                            <input name="lavel" placeholder="Menu Lavel" class="form-control" type="text" required="">
                        </div>

                        <div class="form-group">
                            <label class="control-label "><?php echo display('slug')?><span class="text-danger">*</span></label>
                            <input name="slug" disabled class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo display('menu_position')?></label>
                            <input name="position" placeholder="Menu Position" class="form-control" type="number">
                                
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo display('link')?></label>
                            <input name="link" placeholder="Menu Link" class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo display('parents')?></label>
                            
                            <select name="parent_id" class="form-control">
                                <option value="">--<?php echo display('select')?>--</option>
                            <?php foreach($menu_content as $cata){?>
                                <option value="<?php echo $cata->menu_content_id?>"><?php echo html_escape($cata->menu_lavel)?></option>
                            <?php }?>
                            </select>
                           
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><?php echo display('save')?></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo display('close')?></button>
                </div>
                <?php echo form_close();?>
                
            </div>
        </div>
    </div>



<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">

<script src="<?php echo base_url()?>assets/dist/js/menu_setup.js"></script>