<?php
// archive selected date
if ($this->uri->segment(1) == 'archive' && $this->uri->segment(2) != '') {
    $current_archive_date = $this->uri->segment(2);
} else {
    $current_archive_date = date("Y-m-d");
}
?>

<?php 
#------------------------------------------
#  user analytics, save the database
#------------------------------------------
$status = $this->db->select('*')->from('settings')->where('id', 8)->get()->row();
$an = json_decode(@$status->details);

if($an->user_analytics=='active'){


    $ip = $_SERVER['REMOTE_ADDR'];

    function get_content($URL){
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_URL, $URL);
          $data = curl_exec($ch);
          curl_close($ch);
          return $data;
    }
    
    @$info = (object)json_decode(get_content("https://ipinfo.io/{$ip}/json"));  
    

    @$news_id = $this->uri->segment(3);
    @$link = base_url(uri_string());
    $user_analiytics = array(
        'ip' => @$ip,
        'country' => @$info->country,
        'city' => @$info->city,
        'link' => @$link,
        'news_id' => @$news_id,
        'date_time' => date("Y-m-d h:i:s"),
        'browser' =>  $this->input->user_agent(),
        'session' => session_id()
    );

    if (preg_match('/bot|crawl|curl|dataprovider|search|get|spider|find|java|majesticsEO|google|yahoo|teoma|contaxe|yandex|libwww-perl|facebookexternalhit/i', $_SERVER['HTTP_USER_AGENT'])) {


    } else {   
        $this->db->insert('user_analiytics',$user_analiytics);
    }

}

?>

<footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="footer-box footer-logo-address">
                                    <!-- address  -->
                                    <img src="<?php echo base_url() . @$setting->footer_logo; ?>" class="img-responsive" alt="">
                                    <address>
                                        <?php echo html_escape(strip_tags(@$setting->footer_text)); ?>
                                    </address>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="subscribe-class">
                                    <a  href="<?php echo base_url();?>subscription/index" class="btn"><?php echo display('subscribe')?></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.address  -->
                    </div>


                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php if (isset($cat_menus) && is_array($cat_menus)) {?>
                                <div class="footer-box">
                                    <h3 class="category-headding"><?php echo html_escape(strip_tags(@$cat_menus[0]->menu_name));?></h3>
                                    <div class="headding-border bg-color-4"></div>
                                    <ul>
                                        <?php
                                            $bu = base_url();
                                                $menu = '';
                                                foreach ($cat_menus as $key => $value) {
                                                    if($value->slug!=NULL){
                                                        $slug1 = $bu.html_escape(strip_tags($value->slug));
                                                    }elseif ($value->link_url!=NULL) {
                                                        $slug1 = $value->link_url;
                                                    }else{
                                                        $slug1 = $bu."#";
                                                    }

                                                   echo  '<li><i class="fa fa-dot-circle-o"></i><a href="' . html_escape($slug1) . '">' . html_escape(strip_tags($value->menu_lavel)) . ' </a></li>';
                                                }
                                            
                                        ?>
                                    </ul>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <?php if (isset($footer_menu) && is_array($footer_menu)) {?>
                                    <div class="footer-box">
                                        <h3 class="category-headding"><?php echo html_escape(strip_tags(@$footer_menu[0]->menu_name));?></h3>
                                        <div class="headding-border bg-color-5"></div>
                                        <ul>
                                            <?php
                                                $bu = base_url();
                                                if (isset($footer_menu) && is_array($footer_menu)) {
                                                    $menu = '';
                                                    foreach ($footer_menu as $key => $value) {
                                                        if($value->slug!=NULL){
                                                            $slug1 = $bu.html_escape(strip_tags($value->slug));
                                                        }elseif ($value->link_url!=NULL) {
                                                            $slug1 = $value->link_url;
                                                        }else{
                                                            $slug1 = $bu."#";
                                                        }

                                                       echo  '<li><i class="fa fa-dot-circle-o"></i><a href="' . html_escape($slug1) . '">' . html_escape(strip_tags($value->menu_lavel)) . ' </a></li>';
                                                    }
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>



                    <div class="col-sm-4">
                        <div class="footer-box">
                            <h3 class="category-headding"><?php echo display('populer_news');?></h3>
                            <div class="headding-border bg-color-2"></div>

                            <?php for($i=1; $i<=2; $i++){ 
                                if(!isset($mr['news_title_'.$i]))
                                continue
                            ?>
                                <div class="box-item">
                                    <div class="img-thumb">
                                        <?php if(@$mr['image_check_'.$i]!=NULL){?>
                                             <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" rel="bookmark"><img class="entry-thumb" src="<?php echo html_escape(@$mr['image_thumb_' . $i]); ?>" alt="" height="80" width="90"></a>
                                        <?php } else{?>
                                        <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" rel="bookmark">
                                            <img  src="http://img.youtube.com/vi/<?php echo html_escape(@$mr['video_' . $i]); ?>/0.jpg" alt=""  height="80" width="90">
                                       </a>
                                        <?php }?>
                                    </div>
                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-1">
                                            <a href="<?php echo html_escape(@$mr['category_link_'.$i]);?>"><?php echo html_escape(@$mr['category_name_'.$i]);?></a>
                                        </h6>
                                        <h3 class="td-module-title">
                                            <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"><?php echo html_escape(@$mr['news_title_'.$i]);?></a>
                                        </h3>
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> <?php echo html_escape(@$mr['ptime_'.$i]);?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
        <div class="sub-footer">
            <!-- sub footer -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <p><?php echo html_escape(@$setting->copy_right);?></p>
                        <div class="social">
                            <ul>
                                <li><a href="<?php if (isset($social_link->fb)) echo html_escape(@$social_link->fb); ?>" class="facebook"><i class="fa  fa-facebook"></i> </a></li>
                                <li><a href="<?php if (isset($social_link->tw)) echo html_escape(@$social_link->tw); ?>" class="twitter"><i class="fa  fa-twitter"></i></a></li>
                                <li><a href="<?php if (isset($social_link->flickr)) echo html_escape(@$social_link->flickr); ?>" class="flickr"><i class="fa fa-flickr"></i></a></li>
                                <li><a href="<?php if (isset($social_link->youtube)) echo html_escape(@$social_link->youtube); ?>" class="youtube"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="<?php if (isset($social_link->vimo)) echo html_escape(@$social_link->vimo); ?>" class="vimeo"><i class="fa fa-vimeo"></i></a></li>
                                <li><a href="<?php if (isset($social_link->vk)) echo html_escape(@$social_link->vk); ?>" class="vk"><i class="fa fa-vk"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <script type="text/javascript" src="<?php echo base_url(); ?>movi/highslide-with-html.js"></script>
        
        <!-- /.sub footer -->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/metismenu/metisMenu.min.js"></script>
        <!-- Scrollbar js -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <!--theia sticky sidebar-->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/theia-sticky-sidebar/ResizeSensor.min.js"></script>
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.min.js"></script>
        <!-- animate js -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/WOW/wow.min.js"></script>
        
        <!-- Newstricker js -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/js/jquery.newsTicker.js"></script>
        <!--  classify JavaScript -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/js/classie.js"></script>
        <!-- owl carousel js -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/OwlCarousel2/owl.carousel.min.js"></script>
        <!-- youtube js -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/js/RYPP.js"></script>
        <!--bootstrap datepicker-->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- toastr -->
        <script src="<?php echo base_url()?>assets/plugins/toastr/toastr.min.js"></script>
        <!-- form -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/js/form-classie.js"></script>
        <!-- custom js -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/js/custom.js"></script>

    </body>
</html>
