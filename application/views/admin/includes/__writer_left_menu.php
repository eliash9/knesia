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

                        <img src="<?php echo html_escape($img)?>" class="img-fluid rounded-circle" alt="">
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
                                    <li><a href="<?php echo $bu; ?>admin/news_post"><?php echo display('add_post')?></a></li>
                                    <li><a href="<?php echo $bu; ?>admin/news_list/newses"><?php echo display('news_list')?></a></li>
                                    <li><a href="<?php echo $bu; ?>admin/breacking/breaking_news"><?php echo display('breaking_news')?></a></li>
                                    <li><a href="<?php echo $bu; ?>admin/positioning"><?php echo display('positioning')?></a></li>
                                </ul>
                            </li>

                            <li class="photo">
                                
                                <a class="has-arrow material-ripple" href="#">
                                    <i class="typcn typcn-film mr-2"></i>
                                    <?php echo display('media_library')?>
                                </a>

                                 <ul class="nav-second-level photo-mm">
                                    <li><a href="<?php echo $bu; ?>admin/photo_upload"> <?php echo display('add_picture')?> </a></li>
                                    <li><a href="<?php echo $bu; ?>admin/photo_list"> <?php echo display('picture_list')?> </a></li>
                                </ul>
                                
                            </li>


                            <li class="comments">
                                <a href="<?php echo html_escape($bu); ?>admin/comments_manage/index">
                                    <i class="typcn typcn-messages mr-2"></i> <?php echo display('comments');?></span>
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