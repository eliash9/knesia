<?php
    $this->load->helper('text');
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
?>

<!-- header news Area
============================================ -->

        <section class="headding-news">
            <div class="container">
                <div class="row row-margin">
                    <div class="hidden-xs col-sm-3 col-padding">

                        <?php 
                            for($i=2;$i<=3;$i++){
                                if(!isset($hn['news_title_'.$i]))
                                    continue
                        ?>

                            <div class="post-wrapper post-grid-1 wow fadeIn" data-wow-duration="2s">
                                <div class="img-zoom-in">
                                    <?php
                                        if (@$hn['image_check_'.$i]!=NULL){
                                            echo'<a href="'.html_escape(@$hn['news_link_'.$i]).'">
                                                    <img class="entry-thumb" src="'. html_escape(@$hn['image_thumb_'.$i]).'" alt="">
                                                </a>';
                                        } else {
                                            echo '<a class="entry-thumb" href="'.html_escape(@$hn['news_link_'.$i]).'"><img  src="http://img.youtube.com/vi/' . html_escape(@$hn['video_' . $i]) . '/0.jpg" /></a>';
                                        }
                                    ?>  
                                   
                                </div>

                                <div class="post-info">
                                    <span class="color-3"><?php echo html_escape(@$hn['category_name_'.$i])?>  </span>
                                    <h3 class="post-title post-title-size"><a href="<?php echo html_escape(@$hn['news_link_'.$i]);?>" rel="bookmark"><?php echo html_escape(@$hn['news_title_'.$i]);?> </a></h3>
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> </i> <?php echo (date('l, d M, Y', html_escape(@$hn['ptime_' . $i]))); ?>
                                        </div>
                                        <!-- read more -->
                                        <?php if(@$hn['video_'.$i]!=NULL) {?>
                                        <a class="playvideo pull-right" href="<?php echo html_escape(@$hn['news_link_'.$i]);?>"><i class="fa fa-play-circle-o"></i></a>
                                        <?php } else{?>
                                        <a class="readmore pull-right" href="<?php echo html_escape(@$hn['news_link_'.$i]);?>"><i class="pe-7s-angle-right"></i></a>
                                         <?php } ?>

                                    </div>
                                </div>
                            </div>

                        <?php }?>
                        
                    </div>

                    <div class="col-sm-6 col-padding">
                        <div class="post-wrapper post-grid-3 effects">
                            <div class="img-zoom-in">

                                <a  href="<?php echo html_escape(@$hn['news_link_1']);?>">

                                    <?php if (@$hn['image_check_1']!=NULL) { ?>
                                        <img  src="<?php echo  html_escape(@$hn['image_large_1']) ?>" alt="">
                                    <?php  } else { ?>
                                        <img  src="http://img.youtube.com/vi/<?php echo html_escape($hn['video_1'])?>/0.jpg" />
                                    <?php  }?> 
                                </a>
                            </div>


                            <div class="post-info hidden-xs" id="post-info">
                                <span class="color-4"><a href="<?php echo html_escape(@$hn['category_link_1'])?>"><?php echo html_escape(@$hn['category_name_1']);?></a></span>
                                <h3 class="post-title"><a href="<?php echo html_escape(@$hn['news_link_1']);?>" rel="bookmark"><?php echo html_escape(@$hn['news_title_1']);?> </a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', html_escape(@$hn['ptime_1']))); ?>
                                    </div>

                                    <!-- read more -->
                                    <?php if(@$hn['video_'.$i]!=NULL) {?>
                                    <a class="playvideo pull-right" href="<?php echo html_escape(@$hn['news_link_1']);?>"><i class="fa fa-play-circle-o"></i></a>
                                    <?php } else{?>
                                     <a class="readmore pull-right" href="<?php echo html_escape(@$hn['news_link_1']);?>"><i class="pe-7s-angle-right"></i></a>
                                     <?php } ?>
                                </div>
                            </div>

                            
                        </div>
                    </div>


                    <div class="hidden-xs col-sm-3 col-padding">

                        <?php 
                            for($i=4;$i<=5;$i++){
                                if(!isset($hn['news_title_'.$i]))
                                    continue
                        ?>

                            <div class="post-wrapper post-grid-1 wow fadeIn" data-wow-duration="2s">
                                <div class="img-zoom-in">
                                    <?php
                                        if (@$hn['image_check_'.$i]!=NULL){
                                            echo'<a href="'.html_escape(@$hn['news_link_'.$i]).'">
                                                    <img class="entry-thumb" src="'. html_escape(@$hn['image_thumb_'.$i]).'" alt="">
                                                </a>';
                                        } else {
                                            echo '<a class="entry-thumb" href="'.html_escape(@$hn['news_link_'.$i]).'"><img  src="http://img.youtube.com/vi/' . html_escape(@$hn['video_' . $i]) . '/0.jpg" /></a>';
                                        }
                                    ?>  
                                   
                                </div>

                                <div class="post-info">
                                    <span class="color-3"><?php echo html_escape(@$hn['category_name_'.$i])?>  </span>
                                    <h3 class="post-title post-title-size"><a href="<?php echo html_escape(@$hn['news_link_'.$i]);?>" rel="bookmark"><?php echo html_escape(@$hn['news_title_'.$i]);?> </a></h3>
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> </i> <?php echo (date('l, d M, Y', html_escape(@$hn['ptime_' . $i]))); ?>
                                        </div>
                                        <!-- read more -->
                                        <?php if(@$hn['video_'.$i]!=NULL) {?>
                                        <a class="playvideo pull-right" href="<?php echo html_escape(@$hn['news_link_'.$i]);?>"><i class="fa fa-play-circle-o"></i></a>
                                        <?php } else{?>
                                        <a class="readmore pull-right" href="<?php echo html_escape(@$hn['news_link_'.$i]);?>"><i class="pe-7s-angle-right"></i></a>
                                         <?php } ?>

                                    </div>
                                </div>
                            </div>

                        <?php }?>

                    </div>
                </div>
            </div>
        </section>




    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">

                <!-- ad area two -->

                <div class="banner <?php echo (html_escape(@$lg_status_12)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_12)==0?'hidden-xs hidden-sm':'')?>">
                    <?php echo @$home_12; ?>
                </div> 

            <?php
                if (@$home_page_positions[1]['status'] == 1) {
            ?>
                <!-- left content inner -->
                <section class="recent_news_inner">
                    <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[1]['cat_name']); ?></h3>
                    <div class="headding-border"></div>
                    <div class="row">
                        <div id="content-slide" class="owl-carousel">
                            <!-- item-1 -->
                            <?php 
                                for($i=1; $i<=3; $i++){
                                if(!isset($pn['position_1']['news_title_'.$i]))
                                continue
                            ?>
                            <div class="item home2-post effects">
                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                    <!-- image -->
                                    <div class="post-thumb">
                                            <?php
                                                if (@$pn['position_1']['image_check_'.$i]!=NULL) {
                                                echo' <a href="'.html_escape(@$pn['position_1']['news_link_'.$i]).'">
                                                            <img class="img-responsive" src="'. html_escape(@$pn['position_1']['image_thumb_'.$i]).'" alt="">
                                                        </a>';
                                                } else {
                                                    echo '<a href="'.html_escape(@$pn['position_1']['news_link_'.$i]).'">
                                                    <img width="100%" src="http://img.youtube.com/vi/' . html_escape(@$pn['position_1']['video_' . $i]) . '/0.jpg" alt="photography" /></a>';
                                                }
                                            ?>
                                            <div class="overlay">
                                                <?php if(@$$pn['position_1']['video_1']!=NULL) {?>
                                                 <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>" class="expand"><i class="fa fa-play"></i></a>
                                                <?php } else{?>
                                                 <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                <?php } ?>
                                                <a class="close-overlay hidden">x</a>
                                            </div>
                                    </div>
                                </div>
                                <h3><a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_1']['news_title_'.$i]); ?></a></h3>
                            </div>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>

                    <div class="row rn_block">
                        <?php 
                            for($i=4; $i<=6; $i++){
                             if(!isset($pn['position_1']['news_title_'.$i]))
                                continue   
                        ?>
                        <div class="col-md-4 col-sm-4 padd">
                            <div class="home2-post">
                                <div class="post-wrapper wow fadeIn effects" data-wow-duration="1s">
                                    <!-- image -->
                                    <div class="post-thumb">
                                        
                                            <?php
                                                if (@$pn['position_1']['image_check_'.$i]!=NULL) {
                                                  echo' <a href="'.html_escape(@$pn['position_1']['news_link_'.$i]).'">
                                                            <img class="img-responsive" src="'. html_escape(@$pn['position_1']['image_thumb_'.$i]).'" alt="">
                                                        </a>';
                                                } else {
                                                    echo '<a href="'.html_escape(@$pn['position_1']['news_link_'.$i]).'">
                                                    <img width="100%" src="http://img.youtube.com/vi/' . html_escape(@$pn['position_1']['video_' . $i]) . '/0.jpg" alt="photography" /></a>';
                                                 
                                                }
                                            ?>
                                            <div class="overlay">
                                                <?php if(@$pn['position_1']['video_'.$i]!=NULL) {?>
                                                    <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>" class="expand"><i class="fa fa-play"></i></a>
                                                <?php } else{?>
                                                    <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                <?php } ?>
                                                <a class="close-overlay hidden">x</a>
                                            </div>
                                        
                                    </div>
                                </div>
                                <h4><a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_1']['news_title_'.$i]); ?></a></h4>
                            </div>
                        </div>
                        <?php 
                           }
                        ?>
                    </div>
                </section>
                <?php
                    }
                ?>

                <!-- Politics Area
                    ============================================ -->
            <?php
                if (@$home_page_positions[2]['status'] == 1) {
            ?>
                <section class="politics_wrapper">
                    <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[2]['cat_name']); ?></h3>
                    <div class="headding-border"></div>
                    <div class="row">
                        <div id="content-slide-2" class="owl-carousel">
                            <!-- item-1 -->
                            <div class="item">
                                <div class="row">
                                    <!-- main post -->
                                    <?php  if (@$pn['position_2']['news_title_1']!=NULL) {?>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="post-wrapper wow fadeIn effects" data-wow-duration="2s">
                                            <!-- post title -->
                                            <h3><a href="<?php echo html_escape(@$pn['position_2']['news_link_1']); ?>"><?php echo html_escape(@$pn['position_2']['news_title_1']); ?></a></h3>
                                            <!-- post image -->
                                            <div class="post-thumb">
                                                <a href="<?php echo html_escape(@$pn['position_2']['news_link_1']); ?>">

                                                    <?php
                                                        if (@$pn['position_2']['image_check_1']) {
                                                          echo'<img class="img-responsive" src="'.html_escape(@$pn['position_2']['image_thumb_1']).'" alt="">';
                                                        } else {
                                                            echo '<img  class="img-responsive"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_2']['video_1']) . '/0.jpg" alt="photography" />';
                                                        }
                                                    ?>


                                                    <div class="overlay">
                                                        <?php if(@$pn['position_2']['video_1']!=NULL) {?>
                                                                 <a href="<?php echo html_escape(@$pn['position_2']['news_link_1']); ?>" class="expand"><i class="fa fa-play"></i></a>
                                                                <?php } else{?>
                                                                 <a href="<?php echo html_escape(@$pn['position_2']['news_link_1']); ?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                                <?php } ?>
                                                         <a class="close-overlay hidden">x</a>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="post-title-author-details">
                                                <div class="post-editor-date">
                                                    <!-- post date -->
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i><?php echo html_escape(@$pn['position_1']['ptime_1']); ?>
                                                    </div>
                                                    <!-- post comment -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                    <!-- right side post -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="row rn_block">
                    <?php 
                        for($i=2;$i<=5;$i++){
                            if(!isset($pn['position_2']['news_title_'.$i]))
                                continue
                    ?>
                                            <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                <div class="home2-post effects">
                                                    <!-- post image -->
                                                    <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                        <?php
                                                            if (@$pn['position_2']['image_check_'.$i]!=NULL) {
                                                                echo'<img class="img-responsive" src="'. html_escape($pn['position_2']['image_thumb_'.$i]).'" alt="">';
                                                            } else {
                                                                echo '<img width="100%" src="http://img.youtube.com/vi/' . html_escape(@$pn['position_2']['video_' . $i]) . '/0.jpg" alt="photography" />';
                                                            }
                                                        ?>
                                                            <div class="overlay">
                                                                <?php if(@$pn['position_2']['video_'.$i]!=NULL) {?>
                                                                 <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>" class="expand"><i class="fa fa-play"></i></a>
                                                                <?php } else{?>
                                                                 <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                                <?php } ?>
                                                                <a class="close-overlay hidden">x</a>
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="post-title-author-details">
                                                        <!-- post image -->
                                                        <h5><a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_2']['news_title_'.$i]); ?></a></h5>
                                                    </div>
                                                </div>
                                            </div>
                    <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- item-2 -->
                            <div class="item">
                                <div class="row">
                                    <!-- main post -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="post-wrapper wow fadeIn effects" data-wow-duration="2s">
                                            <!-- post title -->
                                            <h3><a href="<?php echo html_escape(@$pn['position_2']['news_link_6']); ?>"><?php echo html_escape(@$pn['position_2']['news_title_6']); ?></a></h3>
                                            <!-- post image -->
                                            <div class="post-thumb">
                                                <a href="<?php echo html_escape(@$pn['position_2']['news_link_6']); ?>">
                                                   <?php if(@$pn['position_2']['image_check_6']){?>
                                                    <img src="<?php echo html_escape(@$pn['position_2']['image_large_6']); ?>" class="img-responsive" alt="">
                                                    <?php }else{?>
                                                     <img src="<?php echo html_escape(@$pn['position_2']['vodeo_6']); ?>" class="img-responsive" alt="">
                                                    <?php } ?>
                                                    <div class="overlay">
                                                        <?php if(@$pn['position_2']['video_6']!=NULL) {?>
                                                                 <a href="<?php echo html_escape(@$pn['position_2']['news_link_6']); ?>" class="expand"><i class="fa fa-play"></i></a>
                                                                <?php } else{?>
                                                                 <a href="<?php echo html_escape(@$pn['position_2']['news_link_6']); ?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                                <?php } ?>
                                                         <a class="close-overlay hidden">x</a>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="post-title-author-details">
                                                <div class="post-editor-date">
                                                    <!-- post date -->
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i><?php echo html_escape(@$pn['position_1']['ptime_6']); ?>
                                                    </div>
                                                    <!-- post comment -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- right side post -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="row rn_block">
                                    <?php 
                                        for($i=7;$i<=10;$i++){
                                            if(!isset($pn['position_2']['news_title_'.$i]))
                                            continue
                                    ?>
                                            <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                <div class="home2-post effects">
                                                    <!-- post image -->
                                                    <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                            <?php
                                                                if (@$pn['position_2']['image_check_'.$i]) {
                                                                  echo'<img class="img-responsive" src="'.html_escape(@$pn['position_2']['image_thumb_'.$i]).'" alt="">';
                                                                } else {
                                                                    echo '<img width="100%" src="http://img.youtube.com/vi/' . @$pn['position_2']['video_'.$i] . '/0.jpg" alt="photography" />';
                                                                }
                                                            ?>
                                                            <div class="overlay">
                                                                <?php if(@$pn['position_2']['video_'.$i]!=NULL) {?>
                                                                 <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>" class="expand"><i class="fa fa-play"></i></a>
                                                                <?php } else{?>
                                                                 <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                                <?php } ?>
                                                                <a class="close-overlay hidden">x</a>
                                                            </div>
                                                       
                                                    </div>
                                                    <div class="post-title-author-details">
                                                        <!-- post image -->
                                                        <h5><a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_2']['news_title_'.$i]); ?></a></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </section>
            <?php
                }
            ?>
                <!-- ad area three -->
                <div class="ads <?php echo (html_escape(@$lg_status_13)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_13)==0?'hidden-xs hidden-sm':'')?>">
                   <?php echo htmlspecialchars_decode(@$home_13);?>
                </div>


            </div>

            <!-- /.left content inner -->
            <div class="col-md-4 col-sm-4 left-padding">
                <!-- right content wrapper -->
                <?php $fa = array('method' =>'GET' ); echo form_open('search',$fa);?>
                    <div class="input-group search-area"> <!-- search area -->
                        <input type="text" class="form-control" placeholder="<?php echo display('search')?>" name="q">
                        <div class="input-group-btn">
                            <button class="btn btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div> <!-- /.search area -->
                <?php echo form_close();?>
               
                

                <!-- ad area four -->
                <div class="banner-add <?php echo (html_escape(@$lg_status_14)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_14)==0?'hidden-xs hidden-sm':'')?>">
                    <!-- add -->
                    <span class="add-title"> </span>
                    <?php echo htmlspecialchars_decode(@$home_14); ?>
                </div>


                <div class="tab-inner">
                        <ul class="tabs">
                            <li><a href="#"><?php echo display('latest_news');?></a></li>
                            <li><a href="#"><?php echo display('most_read'); ?></a></li>
                        </ul><hr> <!-- tabs -->
                        <div class="tab_content">
                            <div class="tab-item-inner">
                                <?php 
                                    for($i=1; $i<=5; $i++){ 
                                        if(!isset($ln['news_title_'.$i]))
                                        continue
                                ?>
                                <div class="box-item wow fadeIn" data-wow-duration="1s">
                                    <div class="img-thumb">
                                        <?php if(@$ln['image_check_'.$i]!=NULL){?>
                                          <a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>" rel="bookmark">
                                             <img class="entry-thumb" src="<?php echo html_escape(@$ln['image_thumb_' . $i]); ?>" alt="" height="80" width="90">
                                        </a>
                                       <?php } else{?>
                                       <a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>" rel="bookmark">
                                        <img  src="http://img.youtube.com/vi/<?php echo html_escape(@$ln['video_' . $i]); ?>/0.jpg" alt=""  height="80" width="90">
                                       </a>
                                        
                                        <?php }?>
                                    </div>

                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-1">
                                            <a href="<?php echo html_escape(@$ln['category_link_'.$i]);?>"><?php echo html_escape(@$ln['category_name_'.$i]);?></a>
                                        </h6>
                                        <h3 class="td-module-title"><a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>"><?php echo html_escape(@$ln['news_title_'.$i]);?></a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i><?php echo html_escape(@$ln['ptime_'.$i]);?>
                                            </div>
                                            <!-- post comment -->
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div> <!-- / tab item -->

                            <div class="tab-item-inner">
                             <?php for($i=1; $i<=5; $i++){ 
                                     if(!isset($mr['news_title_'.$i]))
                                    continue
                                ?>
                                <div class="box-item">
                                    <div class="img-thumb">
                                        <?php if(@$mr['image_check_' . $i]!=NULL){?>
                                         <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" rel="bookmark"><img class="entry-thumb" src="<?php echo html_escape(@$mr['image_thumb_' . $i]); ?>" alt="" height="80" width="90"></a>
                                        <?php } else{?>
                                        <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" rel="bookmark">
                                            <img  src="http://img.youtube.com/vi/<?php echo html_escape(@$mr['video_' . $i]); ?>/0.jpg" alt=""  height="80" width="90">
                                       </a>
                                        <?php }?>
                                    </div>
                                    
                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-5">
                                            <a href="<?php echo html_escape(@$mr['category_link_'.$i]);?>"><?php echo html_escape(@$mr['category_name_'.$i]);?></a>
                                        </h6>
                                        <h3 class="td-module-title">
                                        <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"><?php echo html_escape(@$mr['news_title_'.$i]);?></a>
                                        </h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i> <?php echo html_escape(@$mr['ptime_'.$i]);?>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div> <!-- / tab item -->
                        </div> <!-- / tab_content -->
                </div> <!-- / tab -->
                <!-- / tab -->


                <!-- archive calander -->
                <div class="archive" >
                    <span class=" category-headding"><?php echo display('archive')?></span>
                    <div class="headding-border"></div>
                    <?php
                    $fa = array('method' =>'GET' ); 
                    echo form_open('archive/',$fa);?>
                        <div class="form-group">
                            <input  class="form-control col-md-3" onchange="submit()" autocomplete="off" placeholder="<?php echo display('archive')?>" type="text" id="archive-date" name="date">
                        </div> 
                    <?php echo form_close();?> 
                </div>

            </div>
            <!-- side content end -->
        </div>
        <!-- row end -->
    </div>
    <!-- container end -->


        <?php if(@$home_page_positions[3]['status']==1){ ?>
        <section class="video-post-inner">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[3]['cat_name']);?></h3>
                        <div class="headding-border"></div>
                    </div>
                    <?php 
                    for($i=1; $i<=3; $i++){ 
                        if(!isset($pn['position_3']['news_title_'.$i]))
                            continue
                    ?>

                    <div class="col-sm-4">
                        <div class="post-style1">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                <!-- post image -->
                                <?php
                                    if(@$pn['position_3']['image_check_'.$i]!=NULL) {
                                      echo'<a href="'.html_escape(@$pn['position_3']['news_link_'.$i]).'" class="video-img-icon"><i class="fa fa-play"></i>
                                      <img class="img-responsive" src="'.html_escape(@$pn['position_3']['image_thumb_'.$i]).'">
                                      </a>';
                                    } else {

                                        echo '<a href="'.html_escape(@$pn['position_3']['news_link_'.$i]).'" class="video-img-icon">
                                                <i class="fa fa-play"></i>
                                                <img  src="http://img.youtube.com/vi/'. html_escape(@$pn['position_3']['video_' . $i]).'/0.jpg" alt="" class="img-responsive">
                                            </a>';
                                    }
                                ?>
                                
                            </div>
                            <!-- post title -->
                            <h3><a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_3']['news_title_'.$i])?></a></h3>
                            <div class="post-title-author-details">
                                <div class="date">
                                    <ul>
                                        <li><img src="<?php echo html_escape(@$pn['position_3']['post_by_image_'.$i])?>" class="img-responsive" alt=""></li>
                                        <li><?php echo display('by')?> <a title="" href="#"><span><?php echo html_escape(@$pn['position_3']['post_by_name_'.$i])?></span></a> --</li>
                                        <li><a title="" href="#"><?php echo html_escape(@$pn['position_3']['ptime_'.$i])?></a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
                </div>
            </div>
        </section>
        <?php } ?>

                


    <!-- Article Post
        ============================================ -->
    <section class="article-post-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">


                    <!-- ad area six -->
                    <div class="banner-add <?php echo (html_escape(@$lg_status_16)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_16)==0?'hidden-xs hidden-sm':'')?>">
                        <!-- add -->
                        <span class="add-title"> </span>
                        <?php echo htmlspecialchars_decode(@$home_16); ?>
                    </div>

                    <div class="row">
                    <?php if(@$home_page_positions[4]['status']==1){ ?>
                        <!-- business Area
                            ============================================ -->
                        <div class="col-sm-6 col-md-6">
                            <div class="buisness">
                                <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[4]['cat_name'])?></h3>
                                <div class="headding-border bg-color-5"></div>
                                <?php  if (@$pn['position_4']['news_title_1']!=NULL) { ?>
                                <div class="post-wrapper wow fadeIn effects" data-wow-duration="1s">
                                    <!-- post title -->
                                    <h3><a href="<?php echo html_escape(@$pn['position_4']['news_link_1'])?>"> <?php echo html_escape(@$pn['position_4']['news_title_1'])?></a></h3>
                                    <!-- post image -->
                                    <div class="post-thumb">
                                            <?php
                                                if (@$pn['position_4']['image_check_1']) {
                                                  echo'<img class="img-responsive" src="'.html_escape(@$pn['position_4']['image_thumb_1']).'" alt="">';
                                                } else {
                                                    echo '<img  class="img-responsive"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_4']['video_1']) . '/0.jpg" alt="photography" />';
                                                }
                                            ?>

                                            <div class="overlay">
                                            <?php if(@$pn['position_4']['video_1']!=NULL) {?>
                                             <a href="<?php echo html_escape(@$pn['position_4']['news_link_1'])?>" class="expand"><i class="fa fa-play"></i></a>
                                            <?php } else{?>
                                             <a href="<?php echo html_escape(@$pn['position_4']['news_link_1'])?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                            <?php } ?>
                                                <a class="close-overlay hidden">x</a>
                                            </div>
                                      
                                    </div>
                                </div>

                                <div class="post-title-author-details">
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_4']['ptime_1'])?>
                                        </div>
                                        <!-- post comment -->
                                    </div>
                                </div>
                                <?php }?>

                                 <?php 
                                 for($i=2;$i<=3;$i++){
                                    if(!isset($pn['position_4']['news_title_'.$i]))
                                    continue
                                ?>
                                    <div class="box-item wow fadeIn effects" data-wow-duration="1s" data-wow-delay="0.2s">
                                        <div class="img-thumb">
                                            
                                                <?php
                                                    if (@$pn['position_4']['image_check_'.$i]) {
                                                      echo'<img class="entry-thumb" src="'.html_escape(@$pn['position_4']['image_thumb_'.$i]).'" alt=""  height="70" width="100">';
                                                    } else {
                                                        echo '<img  class="entry-thumb"  height="70" width="100"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_4']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                    }
                                                ?>

                                                <div class="overlay">
                                                    <?php if(@$pn['position_4']['video_'.$i]!=NULL) {?>
                                                     <a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i])?>" class="expand"><i class="fa fa-play"></i></a>
                                                    <?php } else{?>
                                                     <a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i])?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                    <?php } ?>
                                                    <a class="close-overlay hidden">x</a>
                                                </div>
                                            
                                        </div>
                                        <div class="item-details">
                                            <h3 class="td-module-title"><a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_4']['news_title_'.$i])?></a></h3>
                                            <div class="post-editor-date">
                                                <!-- post date -->
                                                <div class="post-date">
                                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_4']['ptime_'.$i])?>
                                                </div>
                                                <!-- post comment -->
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                
                            </div>
                        </div>

                        <?php }?>



                        <?php if(@$home_page_positions[5]['status']==1){ ?>
                        <!-- international Area
                            ============================================ -->
                        <div class="col-sm-6 col-md-6">
                            <div class="international">
                                <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[5]['cat_name'])?></h3>
                                <div class="headding-border bg-color-2"></div>
                                <?php  if (@$pn['position_5']['news_title_1']!=NULL) {?>
                                <div class="post-wrapper wow fadeIn effects" data-wow-duration="1s">
                                    <!-- post title -->
                                    <h3><a href="<?php echo html_escape(@$pn['position_5']['news_link_1'])?>"><?php echo html_escape(@$pn['position_5']['news_title_1'])?></a></h3>
                                    <!-- post image -->
                                    <div class="post-thumb">

                                            <?php
                                                if (@$pn['position_5']['image_check_1']) {
                                                  echo'<img class="img-responsive" src="'.html_escape(@$pn['position_5']['image_thumb_1']).'" alt="">';
                                                } else {
                                                    echo '<img  class="img-responsive"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_5']['video_1']) . '/0.jpg" alt="photography" />';
                                                }
                                            ?>

                                            
                                            <div class="overlay">
                                            <?php if(@$pn['position_5']['video_1']!=NULL) {?>
                                             <a href="<?php echo html_escape(@$pn['position_5']['news_link_1'])?>" class="expand"><i class="fa fa-play"></i></a>
                                            <?php } else{?>
                                             <a href="<?php echo html_escape(@$pn['position_5']['news_link_1'])?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                            <?php } ?>

                                               <a class="close-overlay hidden">x</a>
                                            </div>
                                       
                                    </div>
                                </div>
                                <div class="post-title-author-details">
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_5']['ptime_1'])?>
                                        </div>
                                        <!-- post comment -->
                                    </div>
                                </div>
                                <?php }?>

                                <?php 
                                 for($i=2;$i<=3;$i++){
                                    if(!isset($pn['position_5']['news_title_'.$i]))
                                    continue
                                ?>
                                <div class="box-item wow fadeIn effects" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <div class="img-thumb">
                                        
                                            <?php
                                                if (@$pn['position_5']['image_check_'.$i]!=NULL) {
                                                  echo'<img class="entry-thumb" src="'.html_escape(@$pn['position_5']['image_thumb_'.$i]).'" alt=""  height="70" width="100">';
                                                } else {
                                                    echo'<img  class="entry-thumb"  height="70" width="100"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_5']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                }
                                            ?>
                                            <div class="overlay">
                                            <?php if(@$pn['position_5']['video_'.$i]!=NULL) {?>
                                             <a href="<?php echo html_escape(@$pn['position_5']['news_link_'.$i])?>" class="expand"><i class="fa fa-play"></i></a>
                                            <?php } else{?>
                                             <a href="<?php echo html_escape(@$pn['position_5']['news_link_'.$i])?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                            <?php } ?>
                                               <a class="close-overlay hidden">x</a>
                                            </div>
                                       
                                    </div>
                                    <div class="item-details">
                                        <h3 class="td-module-title"><a href="<?php echo html_escape(@$pn['position_5']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_5']['news_title_'.$i])?></a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_5']['ptime_'.$i])?>
                                            </div>
                                            <!-- post comment -->
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- /.international -->
                        </div>
                        <?php } ?>
                    </div>


                    <?php if(@$home_page_positions[6]['status']==1){ ?>
                    <!-- technology Area
                        ============================================ -->
                    <section class="politics_wrapper">
                        <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[6]['cat_name'])?></h3>
                        <div class="headding-border"></div>
                        <div class="row">
                            <div id="content-slide-3" class="owl-carousel">
                                <!-- item-1 -->
                                <div class="item">
                                    <div class="row">
                                        <!-- left side post -->
                                        <div class="col-sm-6 col-md-6">
                                        <?php  if (@$pn['position_6']['news_title_1']!=NULL) { ?>
                                            <div class="post-wrapper wow fadeIn effects" data-wow-duration="1s">
                                                <!-- post title -->
                                                <h3><a href="<?php echo html_escape(@$pn['position_6']['news_link_1'])?>"><?php echo html_escape(@$pn['position_6']['news_title_1'])?></a></h3>
                                                <!-- post image -->
                                                <div class="post-thumb">
                                                    <?php
                                                        if (@$pn['position_6']['image_check_1']!=NULL) {
                                                          echo'<img class="img-responsive" src="'.html_escape(@$pn['position_6']['image_large_1']).'" alt="">';
                                                        } else {
                                                          echo'<img  class="img-responsive"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_6']['video_1']) . '/0.jpg" alt="photography" />';
                                                        }
                                                    ?>
                                            
                                                    <div class="overlay">
                                                        <?php if(@$pn['position_6']['video_1']!=NULL) {?>
                                                         <a href="<?php echo html_escape(@$pn['position_6']['news_link_1'])?>" class="expand"><i class="fa fa-play"></i></a>
                                                        <?php } else{?>
                                                         <a href="<?php echo html_escape(@$pn['position_6']['news_link_1'])?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                        <?php } ?>
                                                        <a class="close-overlay hidden">x</a>
                                                    </div>
                                                   
                                                </div>
                                            </div>

                                            <div class="post-title-author-details">
                                                <div class="post-editor-date">
                                                    <!-- post date -->
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i><?php echo html_escape(@$pn['position_6']['ptime_1'])?>
                                                    </div>
                                                    <!-- post comment -->
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>

                                        <!-- right side post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="row rn_block">
                                            <?php 
                                            for($i=2;$i<=5;$i++){
                                                if(!isset($pn['position_6']['news_title_'.$i]))
                                                continue
                                            ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding effects">
                                                    <!-- post image -->
                                                    <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                
                                                        <?php
                                                            if (@$pn['position_6']['image_check_'.$i]!=NULL) {
                                                              echo'<img class="img-responsive" src="'.html_escape(@$pn['position_6']['image_thumb_'.$i]).'" alt="">';
                                                            } else {
                                                               echo'<img  class="img-responsive"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_6']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                            }
                                                        ?>
                                                        <div class="overlay">
                                                            <?php if(@$pn['position_6']['video_'.$i]!=NULL) {?>
                                                             <a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i])?>" class="expand"><i class="fa fa-play"></i></a>
                                                            <?php } else{?>
                                                             <a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i])?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                            <?php } ?>
                                                            <a class="close-overlay hidden">x</a>
                                                        </div>
                                                           
                                                    </div>

                                                    <div class="post-title-author-details">
                                                        <!-- post image -->
                                                        <h5><a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i])?>">
                                                            <?php echo character_limiter(@$pn['position_6']['news_title_'.$i], 20); ?>
                                                            </a></h5>
                                                    </div>
                                                </div>
                                                <?php }?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- item-2 -->
                                <div class="item">
                                    <div class="row">
                                        <!-- left side post -->
                                        <div class="col-sm-6 col-md-6">
                                        <?php  if (@$pn['position_6']['news_title_6']!=NULL) {?>
                                            <div class="post-wrapper wow fadeIn effects" data-wow-duration="1s">
                                                <!-- post title -->
                                                <h3><a href="<?php echo html_escape(@$pn['position_6']['news_link_6'])?>"><?php echo html_escape(@$pn['position_6']['news_title_6'])?></a></h3>
                                                <!-- post image -->
                                                <div class="post-thumb">
                                                    <?php
                                                        if (@$pn['position_6']['image_check_6']!=NULL) {
                                                          echo'<img class="img-responsive" src="'.html_escape(@$pn['position_6']['image_large_6']).'" alt="">';
                                                        } else {
                                                            echo'<img  class="img-responsive"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_6']['video_6']) . '/0.jpg" alt="photography" />';
                                                        }
                                                    ?>
                                                    <div class="overlay">
                                                        <?php if(@$pn['position_6']['video_6']!=NULL) {?>
                                                         <a href="<?php echo html_escape(@$pn['position_6']['news_link_6'])?>" class="expand"><i class="fa fa-play"></i></a>
                                                        <?php } else{?>
                                                         <a href="<?php echo html_escape(@$pn['position_6']['news_link_6'])?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                        <?php } ?>
                                                        <a class="close-overlay hidden">x</a>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <div class="post-editor-date">
                                                    <!-- post date -->
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i><?php echo html_escape(@$pn['position_6']['ptime_6'])?>
                                                    </div>
                                                    <!-- post comment -->
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <!-- right side post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="row rn_block">
                                                <?php 
                                                for($i=7;$i<=10;$i++){
                                                    if(!isset($pn['position_6']['news_title_'.$i]))
                                                    continue
                                                ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding effects">
                                                    <!-- post image -->
                                                    <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                    <?php
                                                        if (@$pn['position_6']['image_check_'.$i]!=NULL) {
                                                          echo'<img class="img-responsive" src="'.html_escape(@$pn['position_6']['image_thumb_'.$i]).'" alt="">';
                                                        } else {
                                                            echo'<img  class="img-responsive"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_6']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                        }
                                                    ?>
                                                    <div class="overlay">
                                                        <?php if(@$pn['position_6']['video_'.$i]!=NULL) {?>
                                                            <a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i])?>" class="expand"><i class="fa fa-play"></i></a>
                                                        <?php } else{?>
                                                            <a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i])?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                        <?php } ?>
                                                        <a class="close-overlay hidden">x</a>
                                                    </div>
                                                </div>
                                                    <div class="post-title-author-details">
                                                        <!-- post image -->
                                                        <h5>
                                                            <a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i])?>">
                                                                <?php echo character_limiter(@$pn['position_6']['news_title_'.$i], 15); ?>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </section>
                    <?php } ?>
                </div>
                <div class="col-sm-4 left-padding">

                    <!-- ad area seven -->
                    <div class="banner-add <?php echo (html_escape(@$lg_status_17)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_17)==0?'hidden-xs hidden-sm':'')?>">
                        <!-- add -->
                        <span class="add-title"> </span>
                        <?php echo htmlspecialchars_decode(@$home_17); ?>
                    </div>


                    <!-- slider widget -->
                    <div class="widget-slider-inner">
                        <h3 class="category-headding "><?php echo  html_escape(@$Editor['hn']['category_name_1']); ?></h3>
                        <div class="headding-border"></div>
                        <div id="widget-slider" class="owl-carousel owl-theme">
                            <!-- widget item -->
                           <?php 
                           for($i=1;$i<=3;$i++){
                            if(!isset($Editor['hn']['news_title_'.$i]))
                            continue

                            ?>
                                <div class="item">
                                    <a href="<?php echo @$Editor['hn']['news_link_'.$i]?>">
                                    <?php
                                        if (@$Editor['hn']['image_check_'.$i]!=NULL) {
                                              echo'<img  src="'. html_escape(@$Editor['hn']['image_thumb_'.$i]).'" alt="">';
                                            } else {
                                              echo'<img  class="img-responsive"  src="http://img.youtube.com/vi/'.html_escape(@$Editor['hn']['video_'.$i]).'/0.jpg" alt="photography" />';
                                            }
                                        ?>
                                    </a>
                                    <h4><a href="<?php echo @$Editor['hn']['news_link_'.$i]?>"><?php echo html_escape(@$Editor['hn']['news_title_'.$i])?></a></h4>
                                    <div class="date">
                                        <ul>
                                            <li><?php echo display('by')?><a title="" href="#"><span><?php echo html_escape(@$Editor['hn']['post_by_name_'.$i])?></span></a> --</li>
                                            <li><a title="" href="#"><?php echo date('l, d M, Y', html_escape(@$Editor['hn']['ptime_'.$i])) ;?></a></li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- video -->
                    <?php if(@$home_page_positions[7]['status']==1){ ?>
                        <!-- video -->
                        <div class="video-headding"><?php echo html_escape(@$home_page_positions[7]['cat_name']);?></div>
                        <div id="rypp-demo-4" class="RYPP r16-9" data-playlist="PLw8TejMbmHM6IegrJ4iECWNoFuG7RiCV_">
                            <div class="RYPP-playlist">
                                <div class="RYP-items">
                                    <ol>
                                    <?php 
                                    for($i=1;$i<=3;$i++){
                                        if(!isset($pn['position_7']['news_title_'.$i]))
                                        continue
                                    ?>
                                       <li class="selected" >
                                           <p class="title" >
                                           <a  href="http://www.youtube.com/embed/<?php echo html_escape(@$pn['position_7']['video_'.$i])?>?rel=0&amp;wmode=transparent"
                                                onclick="return hs.htmlExpand(this, {objectType: 'iframe', width: 480, height: 385, 
                                                        allowSizeReduction: false, wrapperClassName: 'draggable-header no-footer', 
                                                        preserveContent: false, objectLoadTime: 'after'})">
                                           <?php echo html_escape(@$pn['position_7']['news_title_'.$i])?>
                                           </a>
                                           <small class="author"><br><?php echo @$pn['position_7']['post_by_name_'.$i]?></small></p>
                                                <a href="http://www.youtube.com/embed/<?php echo html_escape(@$pn['position_7']['video_'.$i])?>?rel=0&amp;wmode=transparent"
                                                onclick="return hs.htmlExpand(this, {objectType: 'iframe', width: 480, height: 385, 
                                                        allowSizeReduction: false, wrapperClassName: 'draggable-header no-footer', 
                                                        preserveContent: false, objectLoadTime: 'after'})">    
                                            <?php
                                                if (@$pn['position_7']['image_check_'.$i]!=NULL) {
                                                  echo'<img class="img-responsive"  src="'.html_escape(@$pn['position_7']['image_thumb_'.$i]).'" width="70" alt="">';
                                                } else {
                                                    echo'<img  src="https://i.ytimg.com/vi/'. html_escape(@$pn['position_7']['video_'.$i]).'/default.jpg" width="70" class="thumb">';
                                                }
                                            ?>
                                                </a>
                                       </li>
                                    <?php } ?>
                                    </ol>   
                                </div>

                            </div>
                        </div>
                         <?php } ?>
                    <!-- /.video -->

                    

                </div>
            </div>
        </div>
    </section>
    
    <!-- pagination-->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-ofset-2">
            <div class="banner <?php echo (html_escape(@$lg_status_18)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_18)==0?'hidden-xs hidden-sm':'')?>">
                <?php echo htmlspecialchars_decode(@$home_18); ?>
            </div>
        </div>
    </div>
</div>

   