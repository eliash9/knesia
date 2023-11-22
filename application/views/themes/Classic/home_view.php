<?php
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
?>
    <!-- newsfeed Area
        ============================================ -->
    <section class="news-feed">
        <div class="container-fluid">
            <div class="row row-margin">
                <div class="col-sm-3 hidden-xs col-padding">
                <?php if(@$hn['news_title_1']!=NULL){?>
                    <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                        <div class="img-zoom-in">

                            <?php if(@$hn['image_check_1']!=NULL){?>
                            <a href="<?php echo html_escape(@$hn['news_link_4']);?>">
                                <img class="entry-thumb" src="<?php echo html_escape(@$hn['image_large_4'])?>" alt="">
                            </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$hn['news_link_4']);?>" rel="bookmark">
                                    <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo html_escape(@$hn['video_4']);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                        </div>

                        <div class="post-info">
                            <span class="color-4"><a href="<?php echo html_escape(@$hn['category_link_4'])?>"><?php echo html_escape(@$hn['category_name_4'])?></a> </span>
                            <h3 class="post-title post-title-size"><a href="<?php echo html_escape(@$hn['news_link_4']);?>" rel="bookmark"><?php echo html_escape(@$hn['news_title_4']);?></a></h3>
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', html_escape(@$hn['ptime_4']))); ?>
                                </div>
                                <!-- read more -->
                               <?php if(@$hn['video_4']!=NULL) {?>
                                <a class="playvideo pull-right" href="<?php echo html_escape(@$hn['news_link_4']);?>"><i class="fa fa-play-circle-o"></i></a>
                                <?php } else{?>
                                <a class="readmore pull-right" href="<?php echo html_escape(@$hn['news_link_4'])?>"><i class="pe-7s-angle-right"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="col-xs-12 col-md-6 col-sm-6 col-padding">
                    <div id="news-feed-carousel" class="owl-carousel owl-theme">
                        <?php for($i=1;$i<=3;$i++){
                            if (!isset($hn['news_title_'.$i]))
                            continue;
                        ?>
                        <div class="item">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                                <div class=" img-zoom-in">
                                <?php if(@$hn['image_check_'.$i]!=NULL){?>
                                    <a href="<?php echo html_escape(@$hn['news_link_'.$i])?>">
                                        <img class="entry-thumb" src="<?php echo html_escape(@$hn['image_large_'.$i])?>" alt="">
                                    </a>
                                <?php } else{ ?>
                                    <a href="<?php echo html_escape(@$hn['news_link_'.$i]);?>" rel="bookmark">
                                        <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo html_escape(@$hn['video_'.$i]);?>/0.jpg" alt="" >
                                    </a>
                                <?php }?>
                                    
                                </div>
                                <div class="post-info">
                                    <span class="color-2"><a href="<?php echo html_escape(@$hn['category_link_'.$i])?>"><?php echo html_escape(@$hn['category_name_'.$i])?></a></span>
                                    <h3 class="post-title"><a href="#" rel="bookmark"><?php echo html_escape(@$hn['news_title_'.$i])?> </a></h3>
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', html_escape(@$hn['ptime_'.$i]))); ?>
                                        </div>
                                        <!-- read more -->
                                        <?php if(@$hn['video_'.$i]!=NULL) {?>
                                        <a class="playvideo pull-right" href="<?php echo html_escape(@$hn['news_link_'.$i]);?>"><i class="fa fa-play-circle-o"></i></a>
                                        <?php } else{?>
                                        <a class="readmore pull-right" href="<?php echo html_escape(@$hn['news_link_'.$i])?>"><i class="pe-7s-angle-right"></i></a>
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-sm-3 hidden-xs col-padding">
                <?php if(@$hn['news_title_5']!=NULL){?>
                    <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                        <div class=" img-zoom-in">
                           
                            <?php if(@$hn['image_check_5']!=NULL){?>
                            <a href="<?php echo html_escape(@$hn['news_link_5'])?>">
                                <img class="entry-thumb" src="<?php echo html_escape(@$hn['image_large_5'])?>" alt="">
                            </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$hn['news_link_5']);?>" rel="bookmark">
                                    <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo html_escape(@$hn['video_5']);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                        </div>
                        <div class="post-info">
                            <span class="color-5"><a href="<?php echo html_escape(@$hn['category_link_5'])?>"><?php echo html_escape(@$hn['category_name_5'])?></a> </span>
                            <h3 class="post-title post-title-size"><a href="<?php echo html_escape(@$hn['news_link_5'])?>" rel="bookmark"><?php echo html_escape(@$hn['news_title_5'])?></a></h3>
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', html_escape(@$hn['ptime_5']))); ?>
                                </div>
                               <!-- read more -->
                               <?php if(@$hn['video_5']!=NULL) {?>
                                <a class="playvideo pull-right" href="<?php echo html_escape(@$hn['news_link_5']);?>"><i class="fa fa-play-circle-o"></i></a>
                                <?php } else{?>
                                <a class="readmore pull-right" href="<?php echo html_escape(@$hn['news_link_5'])?>"><i class="pe-7s-angle-right"></i></a>
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
                <div class="<?php echo (html_escape(@$lg_status_11)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_11)==0?'hidden-xs hidden-sm':'')?>"> <!-- add -->
                     <?php echo htmlspecialchars_decode(@$home_11); ?>
                </div><br>

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
                                    if (!isset($pn['position_1']['news_title_'.$i]))
                                    continue;
                            ?>
                                <div class="item home2-post">
                                    <div class="post-wrapper wow fadeIn" data-wow-duration="1s"><!-- image -->
                                        <div class="post-thumb">
                                            <?php if(@$pn['position_1']['image_check_'.$i]!=NULL){?>
                                             <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>">
                                                <img class="img-responsive" src="<?php echo html_escape(@$pn['position_1']['image_large_'.$i]); ?>" alt="">
                                            </a>
                                            <?php } else{ ?>
                                                <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]);?>" rel="bookmark">
                                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_1']['video_'.$i]);?>/0.jpg" alt="" >
                                                </a>
                                            <?php }?>
                                           
                                        </div>
                                        <div class="post-info meta-info-rn">
                                            <div class="slide">
                                                <a target="_blank" href="<?php echo html_escape(@$pn['position_1']['category_link_'.$i]); ?>" class="post-badge btn_six"><?php echo html_escape(@$pn['position_1']['category_name_'.$i]); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_1']['news_title_'.$i]); ?></a></h3>
                                    <div class="post-title-author-details">
                                        <div class="date">
                                            <ul>
                                                <li><?php echo display('by')?> <a title="" href="#"><span><?php echo html_escape(@$pn['position_1']['post_by_name_'.$i]); ?></span></a> --</li>
                                                <li><a title="" href="#"><?php echo html_escape(@$pn['position_1']['ptime_'.$i]); ?></a> </li>
                                 
                                            </ul>
                                        </div>
                                        <?php
                                        echo  htmlspecialchars_decode(@$pn['position_1']['short_news_'.$i]); 
                                        ?> <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>"><?php echo display('read_more');?></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row rn_block">
                    <?php 
                        for($i=4;$i<=6;$i++){
                            if (!isset($pn['position_1']['news_title_'.$i]))
                            continue;
                    ?>
                            <div class="col-md-4 col-sm-4 padd">
                                <div class="home2-post">
                                    <div class="post-wrapper wow fadeIn" data-wow-duration="1s"><!-- image -->
                                        <div class="post-thumb">
                                        <?php if(@$pn['position_1']['image_check_'.$i]){?>
                                            <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>">
                                                <img class="img-responsive" src="<?php echo html_escape(@$pn['position_1']['image_thumb_'.$i]); ?>" alt="">
                                            </a>
                                            <?php } else{ ?>
                                                <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]);?>" rel="bookmark">
                                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_1']['video_'.$i]);?>/0.jpg" alt="" >
                                                </a>
                                            <?php }?>
                                            
                                        </div>
                                        <div class="post-info meta-info-rn">
                                            <div class="slide">
                                                <a target="_blank" href="<?php echo html_escape(@$pn['position_1']['category_link_'.$i]); ?>" class="post-badge btn_eight"><?php echo html_escape(@$pn['position_1']['category_name_'.$i]); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-title-author-details">
                                        <h4><a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_1']['news_title_'.$i]); ?></a></h4>
                                        <div class="date">
                                            <ul>
                                                <li><?php echo display('by')?> <a title="" href="#"><span><?php echo html_escape(@$pn['position_1']['post_by_name_'.$i]); ?></span></a> --</li>
                                                <li><a title="" href="#"><?php echo html_escape(@$pn['position_1']['ptime_'.$i]); ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>
                    </div>
                </section>

                <?php
                    }
                ?>

                <!-- Politics Area
                    ============================================ -->
                <?php
                    if ($home_page_positions[2]['status'] == 1) {
                ?>
                <section class="politics_wrapper">
                    <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[2]['cat_name']);?></h3>
                    <div class="headding-border"></div>
                    <div class="row">
                        <div id="content-slide-2" class="owl-carousel">
                            <!-- item-1 -->
                            <div class="item">
                                <div class="row">
                                    <!-- main post -->
                                    <div class="col-sm-6 col-md-6">
                                    <?php if(@$pn['position_2']['news_title_1']!=NULL){?>
                                        <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                                            <!-- post title -->
                                            <h3><a href="<?php echo html_escape(@$pn['position_2']['news_link_1']); ?>"><?php echo html_escape(@$pn['position_2']['news_title_1']); ?></a></h3>
                                            <!-- post image -->
                                            <div class="post-thumb">
                                            <?php if(@$pn['position_2']['image_check_1']!=NULL){?>
                                                <a href="<?php echo html_escape(@$pn['position_2']['news_link_1']); ?>">
                                                    <img src="<?php echo html_escape(@$pn['position_2']['image_large_1']); ?>" class="img-responsive" alt="">
                                                </a>
                                                <?php } else{ ?>
                                                    <a href="<?php echo html_escape(@$pn['position_2']['news_link_1']);?>" rel="bookmark">
                                                        <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_2']['video_1']);?>/0.jpg" alt="" >
                                                    </a>
                                            <?php }?>
                                                
                                            </div>
                                        </div>
                                        <div class="post-title-author-details">
                                            <div class="post-editor-date">
                                                <!-- post date -->
                                                <div class="post-date">
                                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_2']['ptime_1']); ?>
                                                </div>
                                                <!-- post comment -->
                                            </div>
                                            <p>

                                        <?php
                                            echo htmlspecialchars_decode(@$pn['position_2']['short_news_1']); 
                                        ?> <a href="<?php echo html_escape(@$pn['position_2']['news_link_1']); ?>"><?php echo display('read_more');?></a>
                                            </p>
                                        </div>
                                        <?php }?>
                                    </div>


                                    <!-- right side post -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="row rn_block">
                                           <?php 
                                           for($i=2; $i<=5; $i++){
                                            if (!isset($pn['position_2']['news_title_'.$i]))
                                            continue;
                                            ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                    <div class="home2-post">
                                                        <!-- post image -->
                                                        <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                            
                                                            <?php if(@$pn['position_2']['image_check_'.$i]){?>
                                                            <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>">
                                                                <img src="<?php echo html_escape(@$pn['position_2']['image_thumb_'.$i]); ?>" class="img-responsive" alt="">
                                                            </a>
                                                            <?php } else{ ?>
                                                                <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]);?>" rel="bookmark">
                                                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_2']['video_'.$i]);?>/0.jpg" alt="" >
                                                                </a>
                                                            <?php }?>
                                                        </div>
                                                        <div class="post-title-author-details">
                                                            <!-- post image -->
                                                            <h5><a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_2']['news_title_'.$i]); ?></a></h5>
                                                            <div class="date">
                                                                <ul>
                                                                    <li><a title="" href="#"><?php echo html_escape(@$pn['position_2']['ptime_'.$i]); ?></a></li>
                                                                </ul>
                                                            </div>
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
                                    <?php if(@$pn['position_2']['news_title_1']!=NULL){?>
                                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                            <!-- post title -->
                                            <h3><a href="<?php echo html_escape(@$pn['position_2']['news_link_6']); ?>"><?php echo html_escape(@$pn['position_2']['news_title_6']); ?></a></h3>
                                            <!-- post image -->
                                            <div class="post-thumb">
                                            <?php if(@$pn['position_2']['image_check_6']!=NULL){?>
                                                    <a href="<?php echo html_escape(@$pn['position_2']['news_link_6']); ?>">
                                                    <img src="<?php echo html_escape(@$pn['position_2']['image_large_6']); ?>" class="img-responsive" alt="">
                                                </a>
                                                <?php } else{ ?>
                                                    <a href="<?php echo html_escape(@$pn['position_2']['news_link_6']);?>" rel="bookmark">
                                                        <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_2']['video_6']);?>/0.jpg" alt="" >
                                                    </a>
                                                <?php }?>
                                            </div>
                                        </div>
                                        <div class="post-title-author-details">
                                            <div class="post-editor-date">
                                                <!-- post date -->
                                                <div class="post-date">
                                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_2']['ptime_6']); ?>
                                                </div>
                                                <!-- post comment -->
                                            </div>
                                            <p>
                                        <?php
                                        echo htmlspecialchars_decode(@$pn['position_2']['short_news_6'])
                                        ?> <a href="<?php echo html_escape(@$pn['position_2']['news_link_6']); ?>"><?php echo display('read_more');?></a>
                                            </p>
                                        </div>

                                        <?php }?>
                                    </div>
                                    <!-- right side post -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="row rn_block">
                                            <?php 
                                            for($i=7; $i<=10; $i++){
                                                if (!isset($pn['position_2']['news_title_'.$i]))
                                                continue;
                                            ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                    <div class="home2-post">
                                                        <!-- post image -->
                                                        <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                            <?php if(@$pn['position_2']['image_check_'.$i]!=NULL){?>
                                                            <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>">
                                                                <img src="<?php echo html_escape(@$pn['position_2']['image_thumb_'.$i]); ?>" class="img-responsive" alt="">
                                                            </a>
                                                            <?php } else{ ?>
                                                                <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]);?>" rel="bookmark">
                                                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_2']['video_'.$i]);?>/0.jpg" alt="" >
                                                                </a>
                                                            <?php }?>

                                                        </div>
                                                        <div class="post-title-author-details">
                                                            <!-- post image -->
                                                            <h5><a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_2']['news_title_'.$i]); ?></a></h5>
                                                            <div class="date">
                                                                <ul>
                                                                    <li><a title="" href="#"><?php echo html_escape(@$pn['position_2']['ptime_'.$i]); ?></a></li>
                                                                </ul>
                                                            </div>
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

                <?php } ?>
                <!-- /.Politics -->

               
            </div>

            <!-- /.left content inner -->
            <div class="col-md-4 col-sm-4 left-padding">
                

                <div class="banner-add <?php echo (html_escape(@$lg_status_13)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_13)==0?'hidden-xs hidden-sm':'')?>">
                
                    <?php echo htmlspecialchars_decode(@$home_13); ?>
                </div>

                <div class="tab-inner">
                        <ul class="tabs">
                            <li><a href="#"><?php echo display('latest_news');?></a></li>
                            <li><a href="#"><?php echo display('most_read'); ?></a></li>
                        </ul><hr> <!-- tabs -->
                        <div class="tab_content">
                            <div class="tab-item-inner">
                            <?php 
                            for($i=1; $i<=4; $i++){ 
                                if (!isset($ln['news_title_'.$i]))
                                    continue;
                            ?>
                                <div class="box-item wow fadeIn" data-wow-duration="1s">
                                    <div class="img-thumb">
                                        <?php if(@$ln['image_check_' . $i]!=NULL){?>
                                             <a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>" rel="bookmark"><img class="entry-thumb" src="<?php echo html_escape(@$ln['image_thumb_' . $i]); ?>" alt="" height="80" width="90"></a>
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
                             <?php for($i=1; $i<=4; $i++){ 
                                if (!isset($mr['news_title_'.$i]))
                                    continue;
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


                <div class="banner-add <?php echo (html_escape(@$lg_status_14)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_14)==0?'hidden-xs hidden-sm':'')?>">
                    <?php echo htmlspecialchars_decode(@$home_14); ?>
                </div>

              
                <!-- / tab -->
            </div>
            <!-- side content end -->
        </div>
        <!-- row end -->
    </div>
    <!-- container end -->


<?php if(@$home_page_positions[3]['status']==1){ ?>
    <section class="weekly-news-inner">
        <div class="container-fluid">
            <div class="row row-margin">
                <h3 class="category-headding-two "><?php echo html_escape(@$home_page_positions[3]['cat_name']);?></h3>
                <div class="headding-border bg-color-two"></div>
                <div id="content-slide-4" class="owl-carousel">
                    <?php for($i=1; $i<=6; $i++){ 
                        if (!isset($pn['position_3']['news_title_'.$i]))
                        continue;
                    ?>
                    <div class="item">
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <div class=" img-zoom-in">
                            <?php if(@$pn['position_3']['image_check_'.$i]){?>
                                <a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i])?>">
                                    <img class="entry-thumb" src="<?php echo html_escape(@$pn['position_3']['image_large_'.$i])?>" alt="">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i])?>" rel="bookmark">
                                    <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_2']['video_'.$i]);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                                
                            </div>
                            <div class="post-info">
                                <span class="color-4"><a href="<?php echo html_escape(@$pn['position_3']['category_link_'.$i])?>"><?php echo html_escape(@$pn['position_3']['category_name_'.$i])?></a> </span>
                                <h3 class="post-title"><a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i])?>" rel="bookmark"><?php echo html_escape(@$pn['position_3']['news_title_'.$i])?> </a></h3>
                                <div class="post-editor-date">
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_3']['ptime_'.$i])?>
                                    </div>
                                <?php if(@$hn['video_'.$i]!=NULL) {?>
                                <a class="playvideo pull-right" href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i])?>"><i class="fa fa-play-circle-o"></i></a>
                                <?php } else{?>
                                 <a class="readmore pull-right" href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i])?>"><i class="pe-7s-angle-right"></i></a>
                                <?php } ?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>



    <?php  } ?>
    <!-- second content -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">

                    <!-- ad area six -->
                    <div class="add <?php echo (html_escape(@$lg_status_15)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_15)==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo htmlspecialchars_decode(@$home_15); ?>
                    </div><br>


                    <div class="row">
                        <!-- business Area
                            ============================================ -->
                        
                        <?php if(@$home_page_positions[4]['status']==1){ ?>
                            <div class="col-sm-6 col-md-6">
                                <div class="buisness">
                                    <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[4]['cat_name']);?></h3>
                                    <div class="headding-border bg-color-5"></div>
                                    <?php  if(@$pn['position_4']['news_title_1']!=NULL){?>
                                    
                                    <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                        <!-- post title -->
                                        <h3><a href="<?php echo html_escape(@$pn['position_4']['news_link_1'])?>"><?php echo html_escape(@$pn['position_4']['news_title_1'])?></a></h3>
                                        <!-- post image -->
                                        <div class="post-thumb">
                                            <?php if(@$pn['position_4']['image_check_1']){?>
                                                <a href="<?php echo html_escape(@$pn['position_4']['news_link_1'])?>">
                                                    <img src="<?php echo html_escape(@$pn['position_4']['image_large_1'])?>" class="img-responsive" alt="">
                                                </a>
                                            <?php } else{ ?>
                                                <a href="<?php echo html_escape(@$pn['position_4']['news_link_1'])?>" rel="bookmark">
                                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_4']['video_1']);?>/0.jpg" alt="" >
                                                </a>
                                            <?php }?>
                                           
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
                                        <p>
                                            <?php echo htmlspecialchars_decode(@$pn['position_4']['short_news_1']); ?>
                                            <a href="<?php echo html_escape(@$pn['position_4']['news_link_1'])?>"><?php echo display('read_more');?></a>
                                        </p>
                                    </div>
                                    <?php }?>

                                <?php for($i=2; $i<=3; $i++){
                                    if (!isset($pn['position_4']['news_title_'.$i]))
                                        continue;
                                ?>
                                    <div class="box-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                        <div class="img-thumb">
                                            <?php if(@$pn['position_4']['image_check_'.$i]){?>
                                                <a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i])?>" rel="bookmark">
                                                        <img class="entry-thumb" src="<?php echo html_escape(@$pn['position_4']['image_thumb_'.$i])?>" alt="" height="70" width="100"></a>
                                            <?php } else{ ?>
                                                <a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i])?>" rel="bookmark">
                                                    <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_4']['video_'.$i]);?>/0.jpg" alt="" height="70" width="100" >
                                                </a>
                                            <?php }?>
                                        </div>
                                        
                                        <div class="item-details">
                                            <h3 class="td-module-title"><a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_4']['news_title_'.$i])?></a></h3>
                                            <div class="post-editor-date">
                                                <!-- post date -->
                                                <div class="post-date">
                                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_4']['ptime_'.$i])?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>

                            </div>
                        <?php }?>


                        <!-- international Area
                            ============================================ -->
                        <?php if(@$home_page_positions[5]['status']==1){ ?>
                        <div class="col-sm-6 col-md-6">
                            <div class="international">
                                <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[5]['cat_name']);?></h3>
                                <div class="headding-border bg-color-2"></div>
                                 <?php if(@$pn['position_5']['news_title_1']!=NULL){?>
                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                    <!-- post title -->
                                    <h3><a href="<?php echo html_escape(@$pn['position_5']['news_link_1'])?>"><?php echo html_escape(@$pn['position_5']['news_title_1'])?></a></h3>
                                    <!-- post image -->
                                    <div class="post-thumb">
                                        <?php if(@$pn['position_5']['image_check_1']){?>
                                            <a href="<?php echo html_escape(@$pn['position_5']['news_link_1'])?>">
                                                        <img src="<?php echo html_escape(@$pn['position_5']['image_large_1'])?>" class="img-responsive" alt="">
                                                    </a>
                                        <?php } else{ ?>
                                            <a href="<?php echo html_escape(@$pn['position_5']['news_link_1'])?>" rel="bookmark">
                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_5']['video_1']);?>/0.jpg" alt="" >
                                            </a>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="post-title-author-details">
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_5']['ptime_1'])?>
                                        </div>
                                    </div>
                                    <p>
                                        <?php
                                            echo htmlspecialchars_decode(@$pn['position_5']['short_news_1']); 
                                        ?>
                                        <a href="<?php echo html_escape(@$pn['position_5']['news_link_1'])?>"><?php echo display('read_more');?></a>
                                    </p>
                                </div>
                                <?php } ?>

                                <?php for($i=2; $i<=3; $i++){
                                    if (!isset($pn['position_5']['news_title_'.$i]))
                                    continue;
                                ?>
                                <div class="box-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <div class="img-thumb">
                                        <?php if(@$pn['position_5']['image_check_'.$i]){?>
                                           <a href="<?php echo html_escape(@$pn['position_5']['news_link_'.$i])?>" rel="bookmark"><img class="entry-thumb" src="<?php echo html_escape(@$pn['position_5']['image_thumb_'.$i])?>" alt="" height="70" width="100"></a>
                                        <?php } else{ ?>
                                            <a href="<?php echo html_escape(@$pn['position_5']['news_link_'.$i])?>" rel="bookmark">
                                                <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_5']['video_'.$i]);?>/0.jpg" alt="" height="70" width="100">
                                            </a>
                                        <?php }?>
                                    </div>
                                    <div class="item-details">
                                        <h3 class="td-module-title"><a href="<?php echo html_escape(@$pn['position_5']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_5']['news_title_'.$i])?></a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i><?php echo html_escape(@$pn['position_5']['ptime_'.$i])?>
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
                    <!-- technology Area
                        ============================================ -->
                    <?php if(@$home_page_positions[6]['status']==1){ ?>
                    <section class="politics_wrapper">
                        <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[6]['cat_name']);?></h3>
                        <div class="headding-border"></div>
                        <div class="row">
                            <div id="content-slide-3" class="owl-carousel">
                                <!-- item-1 -->
                                <div class="item">
                                    <div class="row">
                                        <!-- left side post -->
                                        <div class="col-sm-6 col-md-6">
                                         <?php if(@$pn['position_6']['news_title_1']!=NULL){?>
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                <!-- post title -->
                                                <h3><a href="<?php echo html_escape(@$pn['position_6']['news_link_1'])?>"><?php echo html_escape(@$pn['position_6']['news_title_1'])?></a></h3>
                                                <!-- post image -->
                                                <div class="post-thumb">

                                                <?php if(@$pn['position_6']['image_check_1']){?>
                                                    <a href="<?php echo html_escape(@$pn['position_6']['news_link_1'])?>">
                                                        <img src="<?php echo html_escape(@$pn['position_6']['image_large_1'])?>" class="img-responsive" alt="">
                                                    </a>
                                                <?php } else{ ?>
                                                    <a href="<?php echo html_escape(@$pn['position_6']['image_large_1'])?>" rel="bookmark">
                                                        <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_6']['video_1']);?>/0.jpg" alt="" >
                                                    </a>
                                                <?php }?>
                                                </div>
                                            </div>

                                            <div class="post-title-author-details">
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_6']['ptime_1'])?>
                                                    </div>
                                                </div>

                                                    <?php echo htmlspecialchars_decode(@$pn['position_6']['short_news_1']); ?>
                                                    <a href="<?php echo html_escape(@$pn['position_6']['news_link_1'])?>"><?php echo display('read_more');?></a>
                                                
                                            </div>
                                            <?php }?>
                                        </div>

                                        <!-- right side post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="row rn_block">
                                            <?php for($i=2; $i<=5; $i++){
                                                if (!isset($pn['position_6']['news_title_'.$i]))
                                                continue;
                                            ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                    <!-- post image -->
                                                    <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                        <?php if(@$pn['position_6']['image_check_'.$i]){?>
                                                            <a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i])?>">
                                                                <img src="<?php echo html_escape(@$pn['position_6']['image_thumb_'.$i])?>" class="img-responsive" alt="">
                                                            </a>
                                                        <?php } else{ ?>
                                                            <a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i]);?>" >
                                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_6']['video_'.$i]);?>/0.jpg" alt="" >
                                                            </a>
                                                        <?php }?>
                                                    </div>

                                                    <div class="post-title-author-details">
                                                        <!-- post image -->
                                                        <h5><a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_6']['news_title_'.$i])?></a></h5>
                                                        <div class="post-editor-date">
                                                            <!-- post date -->
                                                            <div class="post-date">
                                                                <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_6']['ptime_'.$i])?>
                                                            </div>
                                                            <!-- post comment -->
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
                                        <!-- left side post -->
                                        <div class="col-sm-6 col-md-6">
                                         <?php if(@$pn['position_6']['news_title_6']!=NULL){?>
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                <!-- post title -->
                                                <h3><a href="<?php echo html_escape(@$pn['position_6']['news_link_6'])?>"><?php echo html_escape(@$pn['position_6']['news_title_6'])?></a></h3>
                                                <!-- post image -->
                                                <div class="post-thumb">
                                                    <?php if(@$pn['position_6']['image_check_6']){?>
                                                        <a href="<?php echo html_escape(@$pn['position_6']['news_link_6'])?>">
                                                            <img src="<?php echo html_escape(@$pn['position_6']['image_large_6'])?>" class="img-responsive" alt="">
                                                        </a>
                                                    <?php } else{ ?>
                                                        <a href="<?php echo html_escape(@$pn['position_6']['news_link_6'])?>" rel="bookmark">
                                                            <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_6']['video_6']);?>/0.jpg" alt="" >
                                                        </a>
                                                    <?php }?>
                                                    
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <div class="post-editor-date">
                                                    <!-- post date -->
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_6']['ptime_6'])?>
                                                    </div>
                                                    <!-- post comment -->
                                                 </div>
                                                
                                                <?php
                                                    echo  htmlspecialchars_decode(@$pn['position_6']['short_news_6']); 
                                                ?>
                                                <a href="<?php echo html_escape(@$pn['position_6']['news_link_6'])?>"><?php echo display('read_more');?></a>
                                                
                                            </div>
                                            <?php }?>
                                        </div>
                                        <!-- right side post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="row rn_block">
                                            <?php for($i=7;$i<=10; $i++){
                                                if (!isset($pn['position_6']['news_title_'.$i]))
                                                continue;
                                            ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                    <!-- post image -->
                                                    <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                        
                                                        <?php if(@$pn['position_6']['image_check_'.$i]){?>
                                                        <a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i])?>">
                                                            <img src="<?php echo html_escape(@$pn['position_6']['image_thumb_'.$i])?>" class="img-responsive" alt="">
                                                        </a>
                                                        <?php } else{ ?>
                                                            <a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i]);?>" rel="bookmark">
                                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_6']['video_'.$i]);?>/0.jpg" alt="" >
                                                            </a>
                                                        <?php }?>
                                                    </div>
                                                    
                                                    <div class="post-title-author-details">
                                                        <!-- post image -->
                                                        <h5><a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_6']['news_title_'.$i])?></a></h5>
                                                        <div class="post-editor-date">
                                                            <!-- post date -->
                                                            <div class="post-date">
                                                                <i class="pe-7s-clock"></i><?php echo html_escape(@$pn['position_6']['ptime_'.$i])?>
                                                            </div>
                                                            <!-- post comment -->
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
                    <?php } ?>
                </div>


                <!-- second content aside -->
                <div class="col-md-4 col-sm-4 left-padding">
                    <aside>

                        <!-- ad area seven -->
                            <div class="<?php echo (html_escape(@$lg_status_16)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_16)==0?'hidden-xs hidden-sm':'')?>">
                                <div class="ads">
                                    <?php echo htmlspecialchars_decode(@$home_16);?>
                                </div>
                            </div>
                       
                        <?php if(@$home_page_positions[7]['status']==1){ ?>
                        <!-- video -->
                        <div class="video-headding"><?php echo html_escape(@$home_page_positions[7]['cat_name']);?></div>
                        <div id="rypp-demo-4" class="RYPP r16-9" data-playlist="PLw8TejMbmHM6IegrJ4iECWNoFuG7RiCV_">
                            <div class="RYPP-playlist">
                                
                                
                                <div class="RYP-items">
                                    <ol>
                                    <?php for($i=1;$i<=5;$i++){
                                        if (!isset($pn['position_7']['news_title_'.$i]))
                                        continue;
                                    ?>
                                       <li class="selected">
                                           <p class="title">
                                            <a  href="http://www.youtube.com/embed/<?php echo html_escape(@$pn['position_7']['video_'.$i])?>?rel=0&amp;wmode=transparent"
                                                onclick="return hs.htmlExpand(this, {objectType: 'iframe', width: 480, height: 385, 
                                                        allowSizeReduction: false, wrapperClassName: 'draggable-header no-footer', 
                                                        preserveContent: false, objectLoadTime: 'after'})">
                                                        <?php echo html_escape(@$pn['position_7']['news_title_'.$i])?>
                                            </a>
                                           <small class="author"><br><?php echo html_escape(@$pn['position_7']['post_by_name_'.$i])?></small></p>
                                                <a href="http://www.youtube.com/embed/<?php echo html_escape(@$pn['position_7']['video_'.$i])?>?rel=0&amp;wmode=transparent"
                                                onclick="return hs.htmlExpand(this, {objectType: 'iframe', width: 480, height: 385, 
                                                        allowSizeReduction: false, wrapperClassName: 'draggable-header no-footer', 
                                                        preserveContent: false, objectLoadTime: 'after'})">    
                                                  
                                                    <?php
                                                        if (@$pn['position_7']['image_check_'.$i]!=NULL) {
                                                          echo'<img class="img-responsive" width="50" src="'.html_escape(@$pn['position_7']['image_thumb_'.$i]).'" alt="" class="thumb">';
                                                        } else {
                                                            echo'<img  src="https://i.ytimg.com/vi/'. html_escape(@$pn['position_7']['video_'.$i]).'/default.jpg" class="thumb">';
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

                        <!-- ad area seven -->
                        <div class="<?php echo (html_escape(@$lg_status_17)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_17)==0?'hidden-xs hidden-sm':'')?>">
                            <div class="ads">
                                <?php echo htmlspecialchars_decode(@$home_17);?>
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section>


    <!-- ad area six -->
    <!-- second content end -->
    <div class="container">
        <!-- /.adds -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="<?php echo (html_escape(@$lg_status_18)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_18)==0?'hidden-xs hidden-sm':'')?>">
                    <div class="ads">
                        <?php echo htmlspecialchars_decode(@$home_18);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.adds-->
    <!-- all category  news Area
        ============================================ -->
    <section class="all-category-inner">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-4">
                 <?php if(@$home_page_positions[8]['status']==1){ ?>
                    <!-- sports -->
                    <div class="sports-inner">
                        <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[8]['cat_name']);?></h3>
                        <div class="headding-border bg-color-1"></div>
                         <?php if(@$pn['position_8']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo html_escape(@$pn['position_8']['news_link_1'])?>"><?php echo html_escape(@$pn['position_8']['news_title_1'])?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">
                            <?php if(@$pn['position_8']['image_check_1']){?>
                              <a href="<?php echo html_escape(@$pn['position_8']['news_link_1'])?>">
                                    <img src="<?php echo html_escape(@$pn['position_8']['image_large_1'])?>" class="img-responsive" alt="">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$pn['position_8']['news_link_1'])?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_8']['video_1']);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>

                                
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_8']['ptime_1'])?>
                                </div>
                                <!-- post comment -->
                            </div>
                                <?php
                                    echo htmlspecialchars_decode(@$pn['position_8']['short_news_1']); 
                                ?>
                                <a href="<?php echo html_escape(@$pn['position_8']['news_link_1'])?>"><?php echo display('read_more');?></a>
                        
                        </div>
                        <?php }?>
                    </div>
                     <?php } ?>
                </div>
                <!-- /.sports -->
                <div class="col-md-4 col-sm-4">
                <?php if(@$home_page_positions[9]['status']==1){?>
                    <!-- fashion -->
                    <div class="fashion-inner">
                        <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[9]['cat_name'])?></h3>
                        <div class="headding-border bg-color-4"></div>
                         <?php if(@$pn['position_9']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo html_escape(@$pn['position_9']['news_link_1'])?>">
                            <?php echo html_escape(@$pn['position_9']['news_title_1'])?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                            <?php if(@$pn['position_9']['image_check_1']){?>
                              <a href="<?php echo html_escape(@$pn['position_9']['news_link_1'])?>">
                                    <img src="<?php echo html_escape(@$pn['position_9']['image_large_1'])?>" class="img-responsive" alt="">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$pn['position_9']['news_link_1'])?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_9']['video_1']);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                                
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_9']['ptime_1'])?>
                                </div>
                                <!-- post comment -->
                            </div>
                                <?php
                                    echo  htmlspecialchars_decode(@$pn['position_9']['short_news_1']); 
                                ?>
                                <a href="<?php echo html_escape(@$pn['position_9']['news_link_1'])?>"><?php echo display('read_more');?></a>
                            
                        </div>
                        <?php }?>
                    </div>
                    <?php }?>
                </div>
                <!-- /.fashion -->
                <div class="col-md-4 col-sm-4">
                <?php if(@$home_page_positions[10]['status']==1){?>
                    <!-- travel -->
                    <div class="travel-inner">
                        <h3 class="category-headding "><?php echo html_escape($home_page_positions[10]['cat_name'])?></h3>
                        <div class="headding-border bg-color-3"></div>
                         <?php if(@$pn['position_10']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo html_escape(@$pn['position_10']['news_link_1'])?>"><?php echo html_escape(@$pn['position_10']['news_title_1'])?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                            <?php if(@$pn['position_10']['image_check_1']){?>
                               <a href="<?php echo html_escape(@$pn['position_10']['news_link_1'])?>">
                                    <img src="<?php echo html_escape(@$pn['position_10']['image_large_1'])?>" class="img-responsive" alt="">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$pn['position_10']['news_link_1'])?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_10']['video_1']);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>

                               
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_10']['ptime_1'])?>
                                </div>
                                <!-- post comment -->
                            </div>                                
                                <?php
                                    echo htmlspecialchars_decode(@$pn['position_10']['short_news_1']); 
                                ?>
                                <a href="<?php echo html_escape(@$pn['position_10']['news_link_1'])?>"><?php echo display('read_more');?></a>
                            
                         </div>
                         <?php }?>
                    </div>
                </div>
                <?php } ?>
                <!-- /.travel -->
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                <?php if(@$home_page_positions[11]['status']==1){?>
                    <!-- food -->
                    <div class="food-inner">
                        <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[11]['cat_name'])?></h3>
                        <div class="headding-border bg-color-4"></div>
                         <?php if(@$pn['position_11']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo html_escape(@$pn['position_11']['news_link_1'])?>"><?php echo html_escape(@$pn['position_11']['news_title_1'])?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                            <?php if(@$pn['position_11']['image_check_1']){?>
                               <a href="<?php echo html_escape(@$pn['position_11']['news_link_1'])?>">
                                    <img src="<?php echo html_escape(@$pn['position_11']['image_large_1'])?>" class="img-responsive" alt="">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$pn['position_11']['news_link_1'])?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_11']['video_1']);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_11']['ptime_1'])?>
                                </div>
                                <!-- post comment -->
                            </div>
                            
                                <?php
                                echo htmlspecialchars_decode(@$pn['position_11']['short_news_1']); 
                                ?>
                                <a href="<?php echo html_escape(@$pn['position_11']['news_link_1'])?>"><?php echo display('read_more');?></a>

                       </div>
                       <?php }?>
                    </div>
                    <?php }?>
                </div>
                <!-- /.food -->
                <div class="col-md-4 col-sm-4">
                <?php if(@$home_page_positions[12]['status']==1){?>
                    <!-- politics -->
                    <div class="politics-inner">
                        <h3 class="category-headding "><?php echo html_escape($home_page_positions[12]['cat_name'])?></h3>
                        <div class="headding-border bg-color-5"></div>
                         <?php if(@$pn['position_12']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo html_escape(@$pn['position_12']['news_link_1'])?>"><?php echo html_escape(@$pn['position_12']['news_title_1'])?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                            <?php if(@$pn['position_12']['image_check_1']){?>
                                <a href="<?php echo html_escape(@$pn['position_12']['news_link_1'])?>">
                                    <img src="<?php echo html_escape(@$pn['position_12']['image_large_1'])?>" class="img-responsive" alt="">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$pn['position_12']['news_link_1'])?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_12']['video_1']);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                                
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_12']['ptime_1'])?>
                                </div>
                                <!-- post comment -->
                            </div>
                          
                                <?php echo htmlspecialchars_decode(@$pn['position_12']['short_news_1']); ?>
                                <a href="<?php echo html_escape(@$pn['position_12']['news_link_1'])?>"><?php echo display('read_more');?></a>
                            
                         </div>
                         <?php }?>
                    </div>
                    <?php }?>
                </div>
                <!-- /.politics -->
                <div class="col-md-4 col-sm-4">
                <?php if(@$home_page_positions[13]['status']==1){?>
                    <!-- health -->
                    <div class="health-inner">
                        <h3 class="category-headding "><?php echo html_escape($home_page_positions[13]['cat_name'])?></h3>
                        <div class="headding-border bg-color-3"></div>
                         <?php if(@$pn['position_13']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo html_escape(@$pn['position_13']['news_link_1'])?>"><?php echo html_escape(@$pn['position_13']['news_title_1'])?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                                <?php if(@$pn['position_13']['image_check_1']){?>
                                    <a href="<?php echo html_escape(@$pn['position_13']['news_link_1'])?>">
                                    <img class="img-responsive" src="<?php echo html_escape(@$pn['position_13']['image_thumb_1'])?>" alt="">
                                </a>
                                    <?php } else{ ?>
                                        <a href="<?php echo html_escape(@$pn['position_13']['news_link_1'])?>" rel="bookmark">
                                            <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_13']['video_1']);?>/0.jpg" alt="" >
                                        </a>
                                    <?php }?>
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_13']['ptime_1'])?>
                                </div>
                                <!-- post comment -->
                            </div>
                            
                                <?php
                                    echo  htmlspecialchars_decode(@$pn['position_13']['short_news_1']); 
                                ?>
                                <a href="<?php echo html_escape(@$pn['position_13']['news_link_1'])?>"><?php echo display('read_more');?></a>
                            
                        </div>
                        <?php }?>
                    </div>
                    <?php }?>
                </div>
                <!-- /.health -->
            </div>
        </div>
    </section>
    <!-- article section Area
        ============================================ -->
    <div class="lat_arti_cont_wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">

                    <?php

                    if(@$home_page_positions[14]['status']==1){?>
                    <section class="articale-inner">
                        <h3 class="category-headding "><?php echo html_escape($home_page_positions[14]['cat_name'])?></h3>
                        <div class="headding-border"></div>
                        <div class="row">
                            <div id="content-slide-5" class="owl-carousel">
                                <!-- item-1 -->
                                <div class="item">
                                    <div class="row rn_block">
                                    <?php for($i=1; $i<=6; $i++){
                                        if (!isset($pn['position_14']['news_title_'.$i]))
                                        continue;
                                    ?>
                                        <div class="col-xs-6 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                <!-- image -->
                                                <div class="post-thumb">
                                                    
                                                <?php if(@$pn['position_14']['image_check_'.$i]){?>
                                                        <a href="<?php echo html_escape(@$pn['position_14']['news_link_'.$i])?>">
                                                        <img class="img-responsive" src="<?php echo html_escape(@$pn['position_14']['image_thumb_'.$i])?>" alt="">
                                                    </a>
                                                        <?php } else{ ?>
                                                            <a href="<?php echo html_escape(@$pn['position_14']['news_link_'.$i])?>" rel="bookmark">
                                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_14']['video_'.$i]);?>/0.jpg" alt="" >
                                                            </a>
                                                        <?php }?>
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="<?php echo html_escape(@$pn['position_14']['news_link_'.$i])?>" class="post-badge btn_five"><?php echo html_escape(@$pn['position_14']['category_'.$i])?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <h4><a href="<?php echo html_escape(@$pn['position_14']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_14']['news_title_'.$i])?></a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_14']['ptime_'.$i])?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                                <!-- item-2 -->
                                <div class="item">
                                    <div class="row rn_block">
                                    <?php for($i=7; $i<=12; $i++){
                                        if (!isset($pn['position_14']['news_title_'.$i]))
                                    continue;
                                    ?>
                                        <div class="col-xs-6 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                <!-- image -->
                                                <div class="post-thumb">
                                                    <a href="<?php echo html_escape(@$pn['position_14']['news_link_'.$i])?>">
                                                        <img class="img-responsive" src="<?php echo html_escape(@$pn['position_14']['image_large_'.$i])?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="<?php echo html_escape(@$pn['position_14']['news_link_'.$i])?>" class="post-badge btn_five"><?php echo html_escape(@$pn['position_14']['category_'.$i])?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <h4><a href="<?php echo html_escape(@$pn['position_14']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_14']['news_title_'.$i])?></a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_14']['ptime_'.$i])?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php }?>



                </div>


                 <!-- /.article -->
                <div class="col-sm-4 left-padding">
                    <aside>
                        <h3 class="category-headding ">
                            <?php 
                            
                            if($cat_menus>0)
                                echo html_escape($cat_menus[0]->menu_name);
                            ?>
                            
                        </h3>

                        <div class="headding-border bg-color-2"></div>
                        <div class="cats-widget">
                            <ul>
                                <?php 
                                if (isset($cat_menus) && is_array($cat_menus)) {
                                    foreach ($cat_menus as $value) {
                                       echo '<li><a href="' . base_url() . html_escape($value->slug) . '">' . html_escape($value->menu_lavel) . '</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>


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



                    </aside>
                </div>

                

            </div>
        </div>
    </div>

    