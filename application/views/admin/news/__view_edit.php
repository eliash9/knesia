<?php
    $user_type = $this->session->userdata('user_type');
    if(($user_type==3) || ($user_type==4)){
        $this->load->view('admin/includes/__left_sideber'); 
    }else{  
        $this->load->view('admin/includes/__writer_left_menu.php');
    }
?>




<?php
    $news_id = $this->uri->segment(4);
    @$home_row = $this->db->select('position')->from('news_position')->where('news_id',$news_id)->where('page','home')->get()->row_array();
    @$other_row = $this->db->select('page,position')->from('news_position')->where('news_id',$news_id)->where('page !=','home')->get()->row_array();
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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['news','edit']) ?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">



                    <?php
                        include('common_file/array_file.php');

                        $home_page = (isset($home_row['position'])) ? $home_row['position'] : 0;
                        $other_position = (isset($other_row['position'])) ? $other_row['position'] : 0;
                        $reference = (isset($row['reference'])) ? $row['reference'] : '0';
                        $attributes = array('class' => 'myform', 'name' => 'f_name', 'id' => 'myform', 'onsubmit' => 'return FormValidation()');
                        echo form_open_multipart('admin/news_edit/update/' . $news_id, $attributes);

                    ?>

                    <input type="hidden" name="home_page_old" value="<?php echo @($home_row['position'] != '') ? $home_row['position'] : 0; ?>" />
                    <input type="hidden" name="other_page_old" value="<?php echo @($other_row['page'] != '') ? $other_row['page'] : 0; ?>" />
                    <input type="hidden" name="other_position_old" value="<?php echo @($other_row['position'] != '') ? $other_row['position'] : 0; ?>" />
                    <input type="hidden" name="image_old" value="<?php echo html_escape(@$row['image']); ?>" />
                    <input type="hidden" name="news_id" value="<?php echo html_escape(@$news_id); ?>" />
                    <input type="hidden" name="post_by" value="<?php echo html_escape(@$row['post_by']); ?>" />




                            <div class="row">

                                <div class="col-md-4 ">

                                    <div class="form-group">
                                        <label class="font-weight-600"><?php echo makeString(['home_position']) ?> </label>
                                       <?php echo form_dropdown('home_page', $home_position, $home_page, 'class="form-control"'); ?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-600"><?php echo display('photo');?></label>
                                        <input type="file" name="file_select_machin" accept="image/*" id="file_select_machin" class="form-control input-sm"/> 
                                        <span>[ jpg,png,jpeg,gif and max size is 1MB]</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-600"><?php echo display('reference');?></label>
                                        <input type="text" class="form-control"  name="reference" value="<?php echo html_escape($row['reference']); ?>">
                                    </div>

                                    <input type="hidden" class="form-control " name="ref_date" value="<?php echo html_escape($row['post_date']); ?>" >
                                </div>


                            </div>

                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group" >
                                    <label class="font-weight-600"><?php echo display('category');?> <span class="text-danger">*</span></label>
                                    <select name="other_page" class="other_page form-control" required >
                                        <option value="">--<?php echo display('select')?>--</option>
                                        <?php 
                                            foreach (@$categories as $key => $value) {
                                                echo '<option value="'.@$value->slug.'" '.($value->slug==$row['page']?'selected':'').'>'.@$value->category_name.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo anchor_popup('admin/news_post/my_window/', 'Library', $nw_img_search); ?></label>
                                    <input type="text" readonly="readonly" name="lib_file_selected" id="lib_file_selected" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                        <label class="font-weight-600"><?php echo display('publish_date');?></label>
                                        <input type="text" class="form-control " name="publish_date" value="<?php echo html_escape($row['publish_date'])?>" >
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
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                        <label class="font-weight-600"><?php echo display('video_id')?></label>
                                        <input type="text" class="form-control"  name="videos" value="<?php echo html_escape($row['videos']); ?>">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('reporter');?></label>
                                    <input type="text" class="form-control" name="reporter" value="<?php echo html_escape($row['name']); ?>">
                                </div>
                            </div>

                        </div>



                        <div class="row">       
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('short_head');?></label>
                                    <input type="text" class="form-control" name="short_head" value="<?php echo html_escape($row['stitle']); ?>" >
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('head_line');?></label>
                                    <input type="text" class="form-control" id="head_line" name="head_line" value="<?php echo html_escape($row['title']); ?>"  >
                                </div>
                            </div>
                        </div>

                        <div class="row">       
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-600">
                                        <?php echo display('details');?>
                                    </label>
                                     <textarea class="form-control" id="details" name="details_news" rows="10" cols="80"> <?php echo html_escape($row['news']); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">       
                            <div class="col-md-12">
                               
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo makeString(['meta','keyword']);?> </label>
                                    <input name="meta_keyword" value="<?php echo html_escape(@$seo_info['meta_keyword']); ?>" id="tags" class="form-control"  data-role="tagsinput" />
                                </div>
                            </div>
                        </div>

                        <div class="row">       
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo makeString(['meta','description']);?> </label>
                                    <textarea class="form-control" name="meta_description"><?php echo html_escape(@$seo_info['meta_description']); ?></textarea>
                                </div>
                            </div>
                        </div>

        
                        <button type="submit" class="btn btn-md btn-success float-right"><?php echo display('update')?> <?php echo display('news')?></button>
                        

                    <?php echo form_close();?> 


                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->


     
    <script src="<?php echo base_url()?>assets/dist/js/ck.js"></script>

