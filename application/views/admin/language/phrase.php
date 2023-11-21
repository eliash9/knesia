
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
                                <h6 class="fs-17 font-weight-600 mb-0">News Post</h6>
                            </div>
                                <a href="<?php echo  base_url('admin/language') ?>" class="btn btn-success btn-md float-right text-white">Language Home</a>
                        </div>
                    </div>

                    <div class="card-body">


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td colspan="2">

                                        <?php echo  form_open('admin/language/addPhrase', ' class="form-inline" ') ?> 

                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="phrase[]" placeholder=" Phrase Name">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-success" type="submit"><?php echo display('add')?></button>
                                                </div>
                                            </div>
                                        </div>

                                          
                                        <?php echo  form_close(); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-th-list"></i></th>
                                    <th>Phrase</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($phrases)) {?>
                                    <?php $sl = 1 ?>
                                    <?php foreach ($phrases as $value) {?>
                                    <tr>
                                        <td><?php echo  $sl++ ?></td>
                                        <td><?php echo  html_escape($value->phrase) ?></td>
                                    </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>

                          </table>

                          <?php echo htmlspecialchars_decode(@$links)?>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->

