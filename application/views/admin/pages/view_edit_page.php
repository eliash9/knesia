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
                                <h6 class="fs-17 font-weight-600 mb-0"> <?php echo makeString(['edit']); ?> <?php echo makeString(['page']); ?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                      <?php echo form_open_multipart('admin/page_controller/update_page');

                      ?>
                      <input type="hidden" value="<?php echo html_escape($page->page_id);?>" name="id">
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label><?php echo display('photo');?></label>
                                    <input type="file" name="image" id="file_select_machin" class="form-control input-sm" accept="image/*"/> 
                                    <input type="hidden" name="pic" value="<?php echo html_escape($page->image_id)?>">
                                    <span>[jpg,png,jpeg and max size is 1MB]</span>
                                </div> 
                            </div> 
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label><?php echo display('video_id');?></label>
                                     <input type="text" name="videos" id="file_select_machin" class="form-control input-sm" value="<?php echo html_escape($page->video_url);?>" /> 
                                </div> 
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo display('title');?><span class="text-danger">*</span></label>
                                     <input type="text" name="title" id="file_select_machin" class="form-control input-sm" value="<?php echo html_escape($page->title);?>" required /> 
                                </div> 
                            </div>
                         </div>
                           <div class="row">
                            <div class="col-md-12">
                             <div class="form-group">
                            <div class="pageslug float-right"><a href="#" class=""><?php echo makeString(['page','slug'])?></a></div>
                                <div id="slug">
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="<?php echo makeString(['page','slug'])?>" name="slug" class="form-control input-sm" value="<?php echo  html_escape($page->page_slug)?>" readonly="">
                                        </td>
                                    </tr>
                                </div>
                              </div>
                             </div>
                             </div>
                         <div class="row">
                            <div class="col-md-12">
                                 <div class="form-group">
                                    <label>
                                        <?php echo display('details');?>
                                    </label>
                                     
                                     <textarea class="form-control" id="details" name="details_news" rows="10" cols="80"><?php echo $page->description;?></textarea>

                                </div>
                            </div>
                         </div> 
                         <div class="row">
                            <div class="col-md-12">
                                  <div class="form-group">
                                    <label><?php echo makeString(['meta','keyword']);?> </label>
                                    <input name="meta_keyword"  data-role="tagsinput"  class="form-control" value="<?php echo html_escape($page->seo_keyword);?>"  data-role="tagsinput"/>
                                </div>

                            </div>
                         </div>   
                         <div class="row">
                            <div class="col-md-12">
                                  <div class="form-group">
                                   <label><?php echo makeString(['meta','description']);?> </label>
                                   <textarea class="form-control" name="meta_description"><?php echo html_escape($page->seo_description);?></textarea>
                                </div>

                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-12">
                                  <div class="form-group">
                                   <label></label>
                                   <input type="submit" name="" value="<?php echo display('update');?>" class="btn btn-md btn-success float-right">
                                </div>

                            </div>
                         </div>
                         <?php echo form_close();?>
                     </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->  

    
    <script src="<?php echo base_url()?>assets/dist/js/ck.js"></script>
