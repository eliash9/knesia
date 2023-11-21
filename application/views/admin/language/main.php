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
                            <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('language')?></h6>
                            <a href="<?php echo  base_url('admin/language/phrase') ?>" class="btn btn-success btn-md float-right text-white">Add Phrase</a>
                        </div>

                    </div>

                    <div class="card-body">

                       <table class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <td colspan="4">
                                        <?php echo  form_open('admin/language/addlanguage', ' class="form-inline" ') ?> 

                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="language" placeholder="Add Language Name">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-success" type="submit"><?php echo display('save')?></button>
                                                </div>
                                            </div>
                                        </div>                                        
                                        <?php echo  form_close(); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-th-list"></i></th>
                                    <th><?php echo display('language')?></th>
                                    <th><i class="fa fa-cogs"></i></th>
                                    <th><?php echo makeString(['active','status'])?></th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php if ($languages!=NULL) {?>
                                    <?php $sl = 1 ?>
                                    <?php foreach ($languages as $key => $language) {?>
                                    <tr>
                                        <td><?php echo  $sl++ ?></td>
                                        <td><?php echo  html_escape($language) ?></td>
                                        <td><a href="<?php echo  base_url("admin/language/editPhrase/$key") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>  
                                        <td><a href="<?php echo  base_url("admin/language/switch_lang/$language") ?>" class="btn btn-xs btn-success"><i class="fa fa-<?php echo $active_lang->language==strtolower($language)?'check':'times-circle';?>"></i></a>  </td> 
                                    </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->

