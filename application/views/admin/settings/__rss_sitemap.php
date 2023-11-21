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

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['rss','&','sitemap','link'])?> </h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                               
                        <div class="row form-group">
                            <div class="col-sm-2"><label>  <?php echo makeString(['rss','link'])?>  </label></div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo html_escape(base_url('rss/rss.xml'))?>">
                            </div>
                        </div> 

                        <div class="row form-group">
                            <div class="col-sm-2"><label><?php echo makeString(['sitemap','link'])?> </label></div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo html_escape(base_url('rss/sitemap.xml'))?>">
                            </div>
                        </div>
                                

                    </div>
                </div>
            </div>

        </div>
    </div><!--/.body content-->