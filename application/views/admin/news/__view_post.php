<?php
    $user_type = $this->session->userdata('user_type');
    if(($user_type==3) || ($user_type==4)){
        $this->load->view('admin/includes/__left_sideber'); 
    }else{  
        $this->load->view('admin/includes/__writer_left_menu.php');
    }
?>


    <script src="<?php echo base_url()?>assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/Bootstrap-4-Tag-Input/tagsinput.css">
    <script src="<?php echo base_url()?>assets/plugins/Bootstrap-4-Tag-Input/tagsinput.js" type="text/javascript"></script> 



    <!--/.Content Header (Page header)--> 
    <div class="body-content">
        <div class="row">
            
            <div class="col-md-12">

                <?php if($this->session->flashdata('exception')){ ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="close" data-dismiss="alert">×</span>
                        <h4 class="alert-heading"><?php echo $this->session->flashdata('exception'); ?></h4>
                    </div> 
                <?php } ?>


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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['news','post'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">



                        <?php
                            include('common_file/array_file.php');
                            $home_page = (isset($home_page)) ? $home_page : 0;
                            $other_position = (isset($other_position)) ? $other_position : 1;
                            $attributes = array('class' => 'myform', 'name' => 'myform', 'id' => 'myform', 'onSubmit' => 'return FormValidation()');
                            echo form_open_multipart('admin/news_post/post', $attributes);
                        ?>


                        <div class="row">
                            
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo makeString(['home_position']) ?> </label>
                                    <?php echo form_dropdown('home_page', @$home_position, @$home_page, 'class="form-control"'); ?>
                                </div>
                            </div>

                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('photo');?></label>
                                    <input type="file" name="file_select_machin" id="file_select_machin" class="form-control input-sm"  accept="image/*" /> 
                                    <span>[ jpg,png,jpeg,gif and max size is 1MB]</span>
                                </div>
                            </div>

                            <div class="col-md-4 pl-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('reference');?></label>
                                    <input type="text" class="form-control"  name="reference">
                                </div>
                                <input type="hidden" class="form-control datepicker1" name="ref_date" value="<?php echo date("d-m-Y", time() + 6 * 60 * 60); ?>" >
                               
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('category');?> <span class="text-danger">*</span></label>
                                    <select name="other_page" class="other_page form-control" required >
                                        <option value="">--<?php echo display('select')?>--</option>
                                        <?php 
                                            foreach (@$cat as $key => $value) {
                                                echo '<option value="'.html_escape(@$value->slug).'">'.html_escape(@$value->category_name).'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 px-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo anchor_popup('admin/news_post/my_window/', 'Library', $nw_img_search); ?></label>
                                    <input type="text" readonly="" readonly="readonly" name="lib_file_selected" id="lib_file_selected" class="form-control" />
                                    

                                </div>
                            </div>

                            <div class="col-md-4 pl-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('publish_date');?></label>
                                    <input type="text" class="form-control datepicker1" name="publish_date" value="<?php echo date("Y-m-d")?>" >
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('category');?>  <?php echo display('position');?></label>
                                    <?php echo form_dropdown('other_position', @$other_positions, @$other_position, 'class="other_position form-control"'); ?>
                                </div>
                            </div>

                            <div class="col-md-4 px-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('video_url');?></label>
                                    <input type="text" class="form-control"  name="videos">
                                </div>
                            </div>

                            <div class="col-md-4 pl-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('reporter');?></label>
                                    <input type="text" class="form-control" name="reporter">
                                </div>
                            </div>
                        </div>                       



                        <div class="row">       
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label ><?php echo display('short_head');?></label>
                                    <input type="text" class="form-control" name="short_head" >
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="form-group">
                                    <label ><?php echo display('head_line');?><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="head_line" name="head_line" required="" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label> <?php echo display('details');?></label>
                            <textarea class="form-control" id="details" name="details_news" rows="10" cols="80"></textarea>
                        </div>
                               
                        <div class="form-group">
                            <label><?php echo makeString(['meta','keyword']);?> </label>
                            <input name="meta_keyword" data-role="tagsinput" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label><?php echo makeString(['meta','description']);?> </label>
                            <textarea class="form-control" name="meta_description"><?php echo html_escape(@$seo_info['meta_description']); ?></textarea>
                        </div>

                        <input type="hidden" value="0" name="confirm_dynamic_static" id="confirm_dynamic_static">


                        <div class="form-group">
                            
                            <div class="checkbox checkbox-success checkbox-inline">
                                <input type="checkbox" value="1" name="latest_confirmed" id="latest_confirmed" checked="">
                                <label for="latest_confirmed"><?php echo display('latest_news');?> </label>
                            </div>

                            <div class="checkbox checkbox-success checkbox-inline">
                                <input type="checkbox" value="1" name="breaking_confirmed" id="breaking_confirmed" >
                                <label for="breaking_confirmed">  <?php echo display('breaking_news');?> </label>
                            </div>

                            <div class="checkbox checkbox-success checkbox-inline">
                                <?php if($this->session->userdata('user_type')!=1){ ?>
                                    <input type="checkbox" value="1" name="status_confirmed" id="status_confirmed" checked="checked" />
                                <?php }?> 
                                <label for="status_confirmed"> <?php echo display('status')?> </label>
                            </div>

                        </div>     
                            
                        <button type="submit" class="btn btn-md btn-success float-right"><?php echo display('post')?> <?php echo display('news')?></button>
                        

                    <?php echo form_close();?> 



                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->




    <script src="<?php echo base_url()?>assets/dist/js/ck.js"></script>

