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
                $this->load->view('admin/language/__lang_search'); 
            ?>



                <div class="card mb-4 " id="filterbody">

                        <div class="card-body">
                            
                            <?php echo form_open('admin/language/editPhrase/english', ['class' => 'form-horizontal']); ?>

                    
                            <div class="form-group">
                                <label class="font-weight-600"><?php echo display('search')?></label>
                                <div class="input-group">
                                    <input type="text" placeholder="Search Phrase" name="phrase" class="form-control" autocomplete="off">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-success" type="submit"><?php echo display('search')?></button>
                                    </div>
                                </div>
                            </div>


                            <?php echo form_close();?>

                        </div>
                </div>




                <div class="card mb-4">

                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            
                            <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('edit')?> </h6>
                            
                            <a href="<?php echo  base_url('admin/language') ?>" class="btn btn-success btn-md float-right text-white">Language Home</a>

                        </div>
                    </div>

                    <div class="card-body">

                    
                        <?php echo  form_open('admin/language/addlebel') ?>

                            <table class="table table-striped">

                                <thead> 
                                  
                                    <tr>
                                        <th><i class="fa fa-th-list"></i></th>
                                        <th>Phrase</th>
                                        <th>Label</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php echo  form_hidden('language', $language) ?>
                                        <?php if (!empty($phrases)) {?>
                                            <?php $sl = 1 ?>
                                            <?php foreach ($phrases as $value) {?>
                                            <tr class="<?php echo  (empty($value->$language)?"bg-danger":null) ?>">
                                            
                                                <td><?php echo  $sl++ ?></td>
                                                <td><input type="text" name="phrase[]" value="<?php echo  html_escape($value->phrase) ?>" class="form-control" readonly></td>
                                                <td><input type="text" name="lang[]" value="<?php echo  html_escape($value->$language) ?>" class="form-control"></td> 
                                            </tr>
                                            <?php } ?>
                                        <?php } ?>

                                        
                                </tbody>
                                    <button type="submit" class="btn btn-success float-right">Save</button>
                            </table>
                            <?php echo  form_close() ?>

                            <?php echo htmlspecialchars_decode(@$links)?>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->

