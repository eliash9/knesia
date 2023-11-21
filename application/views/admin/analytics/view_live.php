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
                                <h6 class="fs-17 font-weight-600 mb-0">Live Now! User Analytics</h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">



                        <div class="row">
                            <div class="col-md-3 border p-2 bg-light">
                                <h3>Right Now Users</h3>
                                <?php echo html_escape($total_user);?>

                            </div>
                            <div class="col-md-3 border p-2 bg-light">
                                <h3>URL</h3>

                                <table class="table table-condensed">
                                    <tbody>
                                        <tr>
                                          <th>Url Link</th>
                                          <th>User</th>
                                        </tr>
                                        <?php foreach($url as $info){?>
                                        <tr>
                                          <td><?php echo html_escape($info->link); ?></td>
                                          <td><?php echo html_escape($info->total_link_user); ?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-3 border p-2 bg-light">
                                <h3 >User Location</h3>
                                <table class="table table-condensed">
                                    <tbody>
                                    <tr>
                                      <th><?php echo display('location');?></th>
                                      <th>Max user</th>
                                    </tr>
                                    <?php foreach($user_country as $info){?>
                                    <tr>
                                      <td><?php echo html_escape($info->country); ?></td>
                                      <td><?php echo html_escape($info->total_country_user); ?></td>
                                    </tr>
                                    <?php }?>
                                  </tbody>
                                </table>
                            </div>

                            <div class="col-md-3 border p-2 bg-light">
                                <h3 >User Agent</h3>
                                <table class="table table-condensed">
                                    <tbody>
                                    <tr>
                                      <th>Browser</th>
                                      <th><?php echo display('user')?></th>
                                    </tr>
                                    <?php foreach($browser as $info){?>
                                    <tr>
                                      <td><?php echo html_escape($info->browser); ?></td>
                                      <td><?php echo html_escape($info->total_browser_user); ?></td>
                                    </tr>
                                    <?php }?>
                                  </tbody>
                                  </table>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->









