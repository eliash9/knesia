<?php 
    $id = $this->session->userdata('id');
    $u_p_n = $this->db->select('photo,name,email')->from('user_info')->where('id',$id)->get()->row();
    
    if(!empty($u_p_n->photo)){
        $img = base_url() . $u_p_n->photo;
    }else{
        $img = base_url('uploads/user/demo-pic.png');
    }

    $settings = $this->db->get('app_settings')->row();
    $bu = base_url();
?>

            <input type="hidden" id="segment1" value="<?php echo $this->uri->segment(1); ?>">
            <input type="hidden" id="segment2" value="<?php echo $this->uri->segment(2); ?>">
            <input type="hidden" id="segment3" value="<?php echo $this->uri->segment(3); ?>">


            <!-- Sidebar  -->

            <nav class="sidebar sidebar-bunker">
                <div class="sidebar-header">
                    <a href="<?php echo base_url('admin/news_post')?>" class="logo">
                        <img src="<?php echo base_url()?><?php echo $settings->app_logo;?>" alt="">
                    </a>
                </div><!--/.sidebar header-->

                <div class="profile-element d-flex align-items-center flex-shrink-0">
                    <div class="avatar online">
                        <img src="<?php echo html_escape($img);?>" class="img-fluid rounded-circle" alt="">
                    </div>
                    <div class="profile-text">
                        <h6 class="m-0"><?php echo html_escape($u_p_n->name)?></h6>
                        <span><?php echo html_escape($u_p_n->email)?></span>
                    </div>
                </div><!--/.profile element-->

               
                <div class="sidebar-body">
                    <nav class="sidebar-nav">
                        <ul class="metismenu">
                            
                            <li class="post">
                                <a class="has-arrow material-ripple" href="#">
                                    <i class="typcn typcn-home-outline mr-2"></i>
                                    <?php echo display('news')?>
                                </a>
                                <ul class="nav-second-level post-mm">
                                    <li><a href="<?php echo html_escape($bu); ?>admin/news_post"><?php echo display('add_post')?></a></li>
                                    <li><a href="<?php echo html_escape($bu); ?>admin/news_list/newses"><?php echo display('news_list')?></a></li>
                                    <li><a href="<?php echo html_escape($bu); ?>admin/breacking/breaking_news"><?php echo display('breaking_news')?></a></li>
                                    <li><a href="<?php echo html_escape($bu); ?>admin/positioning"><?php echo display('positioning')?></a></li>
                                </ul>
                            </li>

                            <li class="photo">
                                
                                <a class="has-arrow material-ripple" href="#">
                                    <i class="typcn typcn-film mr-2"></i>
                                    <?php echo display('media_library')?>
                                </a>

                                 <ul class="nav-second-level photo-mm">
                                    <li><a href="<?php echo html_escape($bu); ?>admin/photo_upload"> <?php echo display('add_picture')?> </a></li>
                                    <li><a href="<?php echo html_escape($bu); ?>admin/photo_list"> <?php echo display('picture_list')?> </a></li>
                                </ul>
                                
                            </li>


                            <li class="comments">
                                <a href="<?php echo html_escape($bu); ?>admin/comments_manage/index">
                                    <i class="typcn typcn-messages mr-2"></i> <?php echo display('comments');?></span>
                                </a>
                            </li>



                            <li class="analytics">
                                <a class="has-arrow material-ripple" href="#">
                                    <i class="typcn typcn-chart-bar mr-2"></i>
                                    <?php echo display('analytics');?>
                                </a>
                                <ul class="nav-second-level analytics-mm">
                                    <li><a href="<?php echo html_escape($bu); ?>admin/user_analytics/index"> <?php echo display('live_now');?></a></li>
                                    <li><a href="<?php echo html_escape($bu); ?>admin/user_analytics/location_based"><?php echo display('location_based');?></a></li>
                                    <li><a href="<?php echo html_escape($bu); ?>admin/user_analytics/news_based"> <?php echo display('news_based');?></a></li>
                                    <li><a href="<?php echo html_escape($bu); ?>admin/user_analytics/clear_analytics"><?php echo makeString(['clear','analytics'])?></a></li>

                                </ul>
                            </li>


                            <li class="ad">
                                <a class="has-arrow material-ripple" href="#">
                                    <i class="typcn typcn-volume-up mr-2"></i>
                                    <?php echo display('advertise_settings');?>
                                </a>
                                <ul class="nav-second-level ad-mm">
                                    <li ><a href="<?php echo html_escape($bu); ?>admin/ad"> <?php echo display('new_advertise')?></a></li>
                                    <li><a href="<?php echo html_escape($bu); ?>admin/ad/view_ads"> <?php echo display('update_advertise')?></a></li>
                                </ul>
                            </li>

              
        
                            <li class="archive"><a href="<?php echo html_escape($bu); ?>admin/archive/maximum_archive_settings_view"> 
                            <i class="typcn typcn-waves mr-2"></i><?php echo display('archive_setting')?></a></li>
                                

              
                            <li class="category">
                                <a class="has-arrow material-ripple" href="#">
                                    <i class="typcn typcn-tags mr-2"></i>
                                   <?php echo display('category')?>
                                </a>
                                <ul class="nav-second-level category-mm">
                                    <li ><a href="<?php echo html_escape($bu); ?>admin/category/add_category"> <?php echo display('add_category')?></a></li>
                                    <li><a href="<?php echo html_escape($bu); ?>admin/category/list_of_categories"> <?php echo display('category_list')?></a></li>
                                </ul>
                            </li>


                            <li class="page">
                                <a class="has-arrow material-ripple" href="#">
                                    <i class="typcn typcn-th-list-outline mr-2"></i>
                                  <?php echo display('page')?>
                                </a>
                                <ul class="nav-second-level page-mm">
                                    <li><a href="<?php echo html_escape($bu); ?>admin/page_controller/create_new_page"><?php echo display('add_new_page')?></a></li>
                                    <li><a href="<?php echo html_escape($bu); ?>admin/page_controller/pages"> <?php echo display('page_list')?></a></li>
                                </ul>
                            </li>


                            <!-- Menu area -->
                            <li class="menu">
                                <a href="<?php echo html_escape($bu); ?>admin/menu">
                                    <i class="typcn typcn-gift mr-2"></i>
                                    <?php echo display('menu')?>
                                </a>
                            </li>


                            <li>
                                <a class="has-arrow material-ripple" href="#">
                                    <i class="typcn typcn-user mr-2"></i>
                                    <?php echo display('user')?>
                                </a>

                                <ul class="nav-second-level">
                                    <li><a href="<?php echo $bu; ?>admin/users/repoter_list"> <?php echo display('reporter')?></a></li>
                                    <li><a href="<?php echo $bu; ?>admin/general_user/user_list">  <?php echo display('user_list')?></a></li>
                                    <li><a href="<?php echo $bu; ?>admin/subscriber_manage/index"> <?php echo display('subscribers')?> </a></li>
                                    <li><a href="<?php echo $bu; ?>admin/users/last_20_access"> <?php echo display('last_20_access')?></a></li>
                                </ul>
                            </li>



                                <li class="settings">
                                    <a class="has-arrow material-ripple" href="#">
                                        <i class="typcn typcn-cog-outline mr-2"></i>
                                        <?php echo display('settings')?>
                                    </a>
                                    
                                    <ul class="nav-second-level settings-mm">
                                        <li><a href="<?php echo html_escape($bu); ?>admin/view_setup/app_setting"> <?php echo makeString(['app','settings'])?></a></li>
                                        <li ><a href="<?php echo html_escape($bu); ?>admin/view_setup/home_view_settings"> <?php echo display('home_page')?></a></li>
                                        <li ><a href="<?php echo html_escape($bu); ?>admin/view_setup/contact_page_setup"> <?php echo display('contact_page_setting')?></a></li>
                                        <li><a href="<?php echo html_escape($bu); ?>admin/view_setup/email_setting"> <?php echo makeString(['email','settings'])?></a></li>
                                        <li><a href="<?php echo html_escape($bu); ?>admin/view_setup/social_auth_setting"> <?php echo display('social_authentication');?></a></li>
                                    </ul>
                                </li>

                                <li class="seo">
                                    <a class="has-arrow material-ripple" href="#">
                                        <i class="typcn typcn-arrow-shuffle mr-2"></i>
                                        <?php echo display('seo')?>
                                    </a>

                                    <ul class="nav-second-level seo-mm">
                                        <li><a href="<?php echo html_escape($bu); ?>admin/seo/meta_setting"><?php echo makeString(['meta','tag'])?></a></li>
                                        <li><a href="<?php echo html_escape($bu); ?>admin/seo/social_sites"> <?php echo display('social_sites')?></a></li>
                                        <li><a href="<?php echo html_escape($bu); ?>admin/view_setup/rss_sitemap">
                                        <?php echo makeString(['rss','&','sitemap','link'])?> </a></li>
                                    </ul>
                                </li>


                                <li class="theme">
                                    <a href="<?php echo html_escape($bu); ?>admin/view_setup/theme"><i class="typcn typcn-device-laptop mr-2"></i> <?php echo display('theme_activation')?></a>
                                </li>
                            
                                
                                <li class="cache_controller">
                                    <a href="<?php echo html_escape($bu); ?>admin/cache_controller/cache" class="">
                                        <i class="typcn typcn-export mr-2"></i> <?php echo display('cache_system')?>
                                    </a>
                                </li>

                                
                                <li class="language">
                                    <a href="<?php echo html_escape($bu); ?>admin/language">
                                       <i class="typcn typcn-directions mr-2"></i> <?php echo display('language_settings');?>
                                    </a>
                                </li>
                        </ul>
                    </nav>
                </div><!-- sidebar-body -->
            </nav>
            <!-- Page Content  -->
            <div class="content-wrapper">


                <div class="main-content">

                    <nav class="navbar-custom-menu navbar navbar-expand-lg m-0">
                        <div class="sidebar-toggle-icon" id="sidebarCollapse">
                            sidebar toggle<span></span>
                        </div><!--/.sidebar toggle icon-->
                        <div class="d-flex flex-grow-1">

                            <ul class="navbar-nav flex-row align-items-center ml-auto">


                                <a href="<?php echo base_url()?>" target="__banck" class="btn btn-sm btn-success text-whait"><i class="fa fa-eye"></i>  <?php echo display('website')?></a> &nbsp;&nbsp;&nbsp;

                            

                                <li class="nav-item dropdown user-menu">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                        <i class="typcn typcn-user-add-outline"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" >
                                        <div class="dropdown-header d-sm-none">
                                            <a href="" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                                        </div>
                                        <div class="user-header">
                                            <div class="img-user">
                                                 <img src="<?php echo html_escape($img)?>" alt="">
                                            </div><!-- img-user -->
                                            <h6><?php echo html_escape($u_p_n->name)?></h6>
                                            <span><?php echo html_escape($u_p_n->email)?></span>

                                        </div><!-- user-header -->

                                        <a href="<?php echo base_url(); ?>admin/profile" class="dropdown-item"><i class="typcn typcn-user-outline"></i><?php echo display('my_profile')?></a>
                                        <a href="<?php echo base_url(); ?>admin/profile/change_password" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> <?php echo display('password_change')?></a>
                                        <a href="<?php echo base_url(); ?>admin/sign_out" class="dropdown-item"><i class="typcn typcn-key-outline"></i><?php echo display('sign_out')?></a>

                                    </div><!--/.dropdown-menu -->
                                </li>
                                
                            </ul><!--/.navbar nav-->

                            <div class="nav-clock">
                                <div class="time">
                                    <span class="time-hours"></span>
                                    <span class="time-min"></span>
                                    <span class="time-sec"></span>
                                </div>
                            </div><!-- nav-clock -->
                        </div>
                    </nav><!--/.navbar-->