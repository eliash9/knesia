

        <section class="block-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1><?php echo display('subscription')?></h1>
                        <div class="breadcrumbs">
                            <ul>
                                <li><i class="pe-7s-home"></i> <a href="<?php echo base_url();?>" title=""><?php echo display('home')?></a></li>
                                <li><a href="<?php echo base_url()?>Subscription/index" title=""><?php echo display('subscription')?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php if(!empty(validation_errors())){?>
                       <div class="alert alert-danger ">
                            <a href="" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong><?php  echo validation_errors(); ?></strong>
                       </div>
                    <?php } ?>  

                    
                    <?php 
                        if($this->session->flashdata('message')){
                            echo '<div class="alert alert-success ">
                           <a href="#" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong>'.$this->session->flashdata('message').'</strong>
                           </div>';
                        }
                        if($this->session->flashdata('exception')){
                            echo '<div class="alert alert-danger ">
                           <a href="#" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong>'.$this->session->flashdata('exception').'</strong>
                           </div>';
                        }

                    ?>
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <div class="subscription_inner">
                        <?php echo form_open('Subscription/save')?>
                            <div class="form-group">
                                <div class="form-label"><?php echo display('name')?> <sup class="text-danger">*</sup></div>
                                <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo display('name')?>">
                            </div>
                            <div class="form-group">
                                <div class="form-label"><?php echo display('email')?> <sup class="text-danger">*</sup></div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo display('email')?>">
                            </div>
                            <div class="form-group">
                                <div class="form-label"><?php echo display('phone')?> <sup class="text-danger">*</sup></div>
                                <input type="number" class="form-control" id="phone" name="phone" placeholder="<?php echo display('phone')?>">
                            </div>

                            <div class="form-group">
                             <?php
                                    foreach ($cata as $value) {
                                ?>  
                                <label class="checkbox-inline">
                                    <input type="checkbox"  name="category[]" value="<?php echo html_escape($value->slug);?>" value=""><?php echo html_escape($value->category_name);?>
                                </label>
                                <?php         
                                    }
                                ?>
                            </div>

                            <div class="form-group">
                                <div class="form-label">Frequency <sup class="text-danger">*</sup></div>
                                <select name="frequency" class="form-control">
                                  <option value="1">Daily</option>
                                  <option value="7">Weekly</option>
                                  <option value="30">Monthly</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="form-label">Number Of News <sup class="text-danger">*</sup></div>
                                <input type="number" class="form-control" name="news_number" placeholder="How many News" >
                            </div>
                            
                            <button type="submit" class="btn btn-style"><?php echo display('submit')?></button>

                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
        <div class="margin-top15"></div>


