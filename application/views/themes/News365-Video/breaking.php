<!-- top header -->
<div class="top_header hidden-xs">
    <div class="container">
        <div class="row">
             <div class="col-sm-4 col-md-3">
                <div class="top_header_menu_wrap">
                    <ul class="top-header-menu">
                        <?php if($this->session->userdata('user_type')==5){?>
                            <li><a href="<?php echo base_url();?>registration/sign_out"> <?php echo display('logout')?> </a></li>
                            <li><a href="<?php echo base_url();?>users/user_profile"> <?php echo display('my_profile')?> </a></li>
                        <?php } else{ ?>
                            <li><a href="<?php echo base_url();?>registration/index"><?php echo display('registration')?></a></li>
                            <li><a href="<?php echo base_url();?>registration/index"> <?php echo display('login')?> </a></li>
                        <?php } ?>
                        <li><a href="<?php echo base_url();?>contact/index"><?php echo display('contact')?></a></li>
                    </ul>
                </div>
            </div>
           

            <!--breaking news-->
            <div id="breaking" class="col-sm-8 col-md-7">
                <div class="newsticker-inner">
                    <ul class="newsticker">
                        <?php
                        for ($i = 1; $i <= count($bn); $i++) {
                            echo '<li>' . htmlspecialchars_decode($bn['title_' . $i]) . '</li>';
                        }
                        ?>
                    </ul>
                    <div class="next-prev-inner">
                        <a href="#" id="prev-button"><i class='pe-7s-angle-left'></i></a>
                        <a href="#" id="next-button"><i class='pe-7s-angle-right'></i></a>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-md-2">
                <div class="top_header_icon">
                    <span class="top_header_icon_wrap">
                        <a target="_blank" href="<?php if (isset($social_link->tw)) echo html_escape(@$social_link->tw); ?>" title="Twitter"><i class="fa fa-twitter"></i></a>
                    </span>
                    <span class="top_header_icon_wrap">
                        <a target="_blank" href="<?php if (isset($social_link->fb)) echo html_escape(@$social_link->fb); ?>" title="Facebook"><i class="fa fa-facebook"></i></a>
                    </span>
                    <span class="top_header_icon_wrap">
                        <a target="_blank" href="<?php if (isset($social_link->vimo)) echo html_escape(@$social_link->vimo); ?>" title="Vimeo"><i class="fa fa-vimeo"></i></a>
                    </span>
                    <span class="top_header_icon_wrap">
                        <a target="_blank" href="<?php if (isset($social_link->pin)) echo html_escape(@$social_link->pin); ?>" title="Pintereset"><i class="fa fa-pinterest-p"></i></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
