<?php
    if (isset($ads) && is_array(@$ads)) {
        extract($ads);
    }
    $bu = base_url();
?>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <article class="content">
                
                <?php if($pd['video_url']!='' || $pd['image_id']!=''){?>
                <div class="video-container">
                <?php if($pd['image_id']!=''){?>
                    <img src="<?php echo base_url().html_escape(@$pd['image_id'])?>">
                 <?php } else{ 
                     echo '<iframe width="100%" height="370px" src="https://www.youtube.com/embed/' . html_escape(@$pd['video_url']) . '" frameborder="0" allowfullscreen></iframe>';
                    }
                ?>
                </div>
                <?php } ?>

                <h2><?php echo html_escape(strip_tags(@$pd['title']));?></h2>

                <div>
                    <?php echo htmlspecialchars_decode(@$pd['description']);?>
                </div>
            </article>
        </div>

        <div class="col-sm-4 left-padding">
            <aside class="sidebar">
                <div class="banner-add"> <!-- add -->
                    <span class="add-title"></span>
                    <?php echo htmlspecialchars_decode(@$news_view_35); ?>
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
                                            <a href="<?php echo html_escape(@$ln['category_link_'.$i]);?>"><?php echo html_escape(@$ln['category_'.$i]);?></a>
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
                                            <a href="<?php echo html_escape(@$mr['category_link_'.$i]);?>"><?php echo html_escape(@$mr['category_'.$i]);?></a>
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
            </aside>
        </div>
    </div>
</div>
