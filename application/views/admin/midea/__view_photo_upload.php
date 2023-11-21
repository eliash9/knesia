<?php
    $user_type = $this->session->userdata('user_type');
    if(($user_type==3) || ($user_type==4)){
        $this->load->view('admin/includes/__left_sideber'); 
    }else{  
        $this->load->view('admin/includes/__writer_left_menu.php');
    }
?>

<link href="<?php echo base_url('assets/dist/css/media.css')?>" rel="stylesheet" type="text/css"/>




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
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['image','upload'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php echo form_open_multipart('admin/photo_upload/upload');?>

                            <table>
                                    <tr>
                                        <td>
                                            <fieldset id="thime">
                                                <label>
                                                    <span>Height(Y):</span>
                                                    <input type="number" name="thime_y" value="200" class="form-control" onkeyup="cng_val(this.value, 'x_rectangle', 'x_y')" />
                                                </label>
                                                <label>
                                                    <span>Width(X):</span>
                                                    <input type="number" name="thime_x" value="260" class="form-control" onkeyup="cng_val(this.value, 'x_rectangle', 'x_x')" />
                                                </label>
                                            </fieldset>
                                        </td>

                                        <td>
                                            <fieldset id="img">
                                                <label>
                                                    <span>Height(Y):</span>
                                                    <input type="number" name="img_y" value="400" class="form-control" onkeyup="cng_val(this.value, 'x_rectangle', 'x_y')" />
                                                </label>
                                                <label>
                                                    <span>Width(X):</span>
                                                    <input type="number" name="img_x" value="552" class="form-control" onkeyup="cng_val(this.value, 'x_rectangle', 'x_x')" />
                                                </label>
                                            </fieldset>
                                        </td>
                                    </tr>
                            </table>
                            <hr>

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label><?php echo display('name')?> <span class="text-danger">*</span></label>
                                        <input type="text" name="picture_name" required class="form-control"/>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label><?php echo display('title')?></label>
                                        <input type="text" name="title" required  class="form-control"/>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label><?php echo display('category')?> <span class="text-danger">*</span></label><br>
                                        <select name="category" class="form-control" required >
                                            <option value="" selected >Select Category</option>
                                            <option value="0">General</option>
                                            <option value="1">Political</option>
                                            <option value="2">Man</option>
                                            <option value="3">Women</option>
                                            <option value="4">Exceptional</option>
                                            <option value="5">Natural</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label><?php echo display('image')?><span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="form-control"  required accept="image/*"/>
                                        <span>[ jpg,png,jpeg,gif and max size is 1MB]</span>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="submit" value="Upload" class="btn btn-success" />
                                    </div>
                                </div>

                            </div>

                            <?php echo form_close();?>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->