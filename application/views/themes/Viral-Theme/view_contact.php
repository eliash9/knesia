<?php
    $contact_page = json_decode('[' . $contact_page_setup . ']');
?>

        <section class="block-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1><?php echo display('contact')?></h1>
                        <div class="breadcrumbs">
                            <ul>
                                <li><i class="pe-7s-home"></i> <a href="<?php echo base_url();?>" title=""><?php echo display('home')?></a></li>
                                <li><a href="<?php echo base_url()?>contact" title=""><?php echo display('contact')?></a></li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-12">
                    <?php if(!empty(validation_errors())){?>
                       <div class="alert alert-danger ">
                       <a href="#" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong><?php  echo validation_errors(); ?></strong>
                       </div>

                        <?php 
                    }
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
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="contact-title-2">
                        <h2><?php echo display('get_in_touch')?></h2>
                        <p><?php if (isset($contact_page[0]->content)) echo htmlspecialchars_decode(@$contact_page[0]->content); ?> </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-4"> 
                    <div class="contact-address-2"> <!-- Address -->
                        <div class="contact-icon-inner"><i class="pe-7s-map-2 top-icon"></i></div>
                        <h3><?php echo display('address')?></h3>
                        <?php if (isset($contact_page[0]->address)) echo htmlspecialchars_decode(@$contact_page[0]->address); ?>
                    </div>
                </div>

                <div class="col-sm-4"> 
                    <div class="contact-address-2"> <!-- Phone -->
                        <div class="contact-icon-inner"><i class="pe-7s-headphones top-icon"></i></div>
                        <h3><?php echo display('phone')?></h3>
                        <ul>
                            <li><i class="fa fa-mobile"></i> <?php if (isset($contact_page[0]->phone)) echo html_escape(@$contact_page[0]->phone); ?></li>
                            <li><i class="fa fa-mobile"></i> <?php if (isset($contact_page[0]->phone_two)) echo html_escape(@$contact_page[0]->phone_two); ?></li>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-address-2"> <!-- Email -->
                        <div class="contact-icon-inner"><i class="pe-7s-global top-icon"></i> </div>
                        <h3><?php echo display('email')?></h3>
                        <ul>
                            <li><i class="fa fa-envelope-o"></i> <?php if (isset($contact_page[0]->email)) echo html_escape(@$contact_page[0]->email); ?></li>
                            <li><i class="fa fa-globe"></i>  <?php if (isset($contact_page[0]->website)) echo html_escape(@$contact_page[0]->website); ?></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                

                <div class="col-sm-12">
                    <div class="contact-form-area-2">
                        <div class="contact-title-2">
                            <h2><?php echo display('send_us')?></h2>
                        </div>
                        <?php  echo form_open('contacts'); ?>
         
                            <div class="row">
                                <div class="col-sm-6">
                                    <span class="input">
                                        <input class="input_field" type="text" id="input-1" name="first_name" required="1" autocomplete="off">
                                        <label class="input_label" for="input-1">
                                            <span class="input_label_content" id="f_name" data-content="<?php echo display('first_name')?>" ><?php echo display('first_name')?></span>
                                        </label>
                                    </span>
                                    
                                    <span class="input">
                                        <input class="input_field" type="text" id="input-2" name="last_name" required="1" autocomplete="off">
                                        <label class="input_label" for="input-2">
                                            <span class="input_label_content" id="l_name" data-content="<?php echo display('last_name')?>"><?php echo display('last_name')?></span>
                                        </label>
                                    </span>

                                    <span class="input">
                                        <input class="input_field" type="email" id="input-3" required="1" name="email" autocomplete="off">
                                        <label class="input_label" for="input-3">
                                            <span class="input_label_content" id="emai" data-content="<?php echo display('email')?>" ><?php echo display('email')?></span>
                                        </label>
                                    </span>
                                    <span class="input">
                                        <input class="input_field" type="text" id="input-4" required="1" name="subject" autocomplete="off">
                                        <label class="input_label" for="input-4">
                                            <span class="input_label_content" id="subject" data-content="<?php echo display('subject')?>" ><?php echo display('subject')?></span>
                                        </label>
                                    </span>
                                </div>
                                <div class="col-sm-6">
                                    <span class="input">
                                        <textarea class="input_field" id="message" required="1" name="message" autocomplete="off"></textarea>
                                        <label class="input_label" for="message">
                                            <span class="input_label_content" data-content="<?php echo display('message')?>"><?php echo display('message')?></span>
                                        </label>
                                    </span>
                                    <button type="submit" class="btn btn-style btn-block"><?php echo display('send')?></button>
                                </div>
                            </div>
                      <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

