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

                <!-- ad area one -->
                <div class="ad-s <?php echo (html_escape(@$lg_status_31)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_31)==0?'hidden-xs hidden-sm':'')?>">
                    <?php echo htmlspecialchars_decode(@$news_view_31); ?>
                </div>
                    
                <div class="video-container">
                    <?php $img_url = (is_file('uploads/' . $image)) ? $bu . 'uploads/' . $image : $bu . 'uploads/' . $image; ?>
                    
                    <?php
                        if ($videos!=NULL) {
                            echo '<iframe width="100%" height="370px" src="https://www.youtube.com/embed/' . html_escape($videos) . '" frameborder="0" allowfullscreen></iframe>';
                        }else{
                            echo'<img src="'. html_escape($img_url).'" class="img-responsive" width="100%">
                        ';
                        }
                    ?>
                </div>


                <div class="">
                    <!-- Shear button -->
                    <div class="shareBtm margin-top15" >
                        <div class="shareButton">
                            <div class="bss" >
                                <span class='st_sharethis_hcount' displayText='ShareThis'></span>
                                <span class='st_facebook_hcount' displayText='Facebook'></span>
                                <span class='st_twitter_hcount' displayText='Tweet'></span>
                                <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                                <span class='st_pinterest_hcount' displayText='Pinterest'></span>
                                <a href="<?php echo html_escape($bu) . 'Print_article/print_page/' . $news_id; ?>" class="icon_n_d"  target="_blank" title="Click to Print"><img src="<?php echo html_escape($bu); ?>assets/icon/print.jpg" height="23" width="25" alt="No icon"/></a>
                            </div>
                        </div>
                    </div>
            
                        

                    <p class="short-head"><?php echo html_escape(strip_tags(@$stitle));?></p>

                    <h1><?php echo html_escape(strip_tags($title)); ?></h1>
                    
                    <div class="date">
                        <ul>
                            <li><?php echo display('by')?> <a title="" href="#"><span><?php echo html_escape(strip_tags($name)); ?></span></a> --</li>
                            <li><a title="" href="#"><?php echo date('l, d M, Y',html_escape($time_stamp)); ?></a> </li>
                        </ul>
                    </div>

                    <!-- ad area two -->
                    <div class="ad-s <?php echo (html_escape(@$lg_status_32)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_32)==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo htmlspecialchars_decode(@$news_view_32); ?>
                    </div>


                    <div id="DetailsNews" >       
                        <?php echo htmlspecialchars_decode($news); ?>

                        <?php if($reference!=NULL){?>
                            <b><?php echo html_escape($reference);?></b>
                        <?php } ?>
                    </div>

                    <!-- ad area three -->
                    <div class="<?php echo (html_escape(@$lg_status_33)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_33)==0?'hidden-xs hidden-sm':'')?>">
                     <?php echo htmlspecialchars_decode(@$news_view_33); ?>
                    </div>

            </div>
                

                <?php
                    // reader_hit count ;
                    $data_arr = array('reader_hit' => $reader_hit + 1);
                    $this->db->where('news_id', $news_id);
                    $this->db->update('news_mst', $data_arr);
                    // reader_hit count ;
                ?> 


                <!-- tags -->
                <div class="tags">
                    <ul>
                        <?php
                        if (@$post_meta['meta_keyword']) {
                            $keyword = explode(',', @$post_meta['meta_keyword']);
                            foreach ($keyword as $value) {
                                echo '<li> <a href="#">' . html_escape($value) . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div> 


                <!-- Related news area
                ============================================ -->
                <div class="related-news-inner">
                    <h3 class="category-headding "> <?php echo html_escape(@$page) .' '. display('related_news'); ?></h3>
                    <div class="headding-border"></div>
                    <div class="row">
                        <div id="content-slide-5" class="owl-carousel">
                            <!-- item-1 -->
                            <div class="item">
                                <div class="row rn_block">

                                    <?php
                                    for ($i = 2; $i <= 4; $i++) {
                                        if (!isset($sn['hn']['title_' . $i]))
                                            continue;
                                        ?>
                                    
                                        <div class="col-xs-12 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s"><!-- image -->
                                                <div class="post-thumb">
                                                    <?php
                                                        if (@$sn['hn']['image_check_' . $i]!=NULL) {
                                                    ?>
                                                    <a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i])?>">
                                                        <img class="img-responsive" src="<?php echo html_escape(@$sn['hn']['image_thumb_' . $i]);?>" alt="">
                                                    </a>
                                                    <?php 
                                                        } else {
                                                        echo '<img width="250" src="http://img.youtube.com/vi/'.html_escape($sn['hn']['video_'.$i]).'/0.jpg" alt="photography" class="img-responsive"/>';
                                                    }
                                                    ?>                                                
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="<?php echo base_url(). html_escape(@$sn['hn']['category_' . $i]); ?>" class="post-badge btn_five"><?php echo html_escape(@$sn['hn']['category_' . $i]); ?></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="post-title-author-details">
                                                <h4><a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i]) ?>"><?php echo html_escape(@$sn['hn']['news_title_' . $i]); ?></a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', html_escape(@$sn['hn']['ptime_' . $i]))); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>


                            <!-- item-2 -->
                            <div class="item">
                                <div class="row rn_block">
                                    <?php
                                    for ($i = 4; $i <= 6; $i++) {
                                        if (!isset($sn['hn']['title_' . $i]))
                                            continue;
                                        ?>

                                        <div class="col-xs-12 col-md-4 col-sm-4 padd">
                                            
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s"><!-- image -->
                                                <div class="post-thumb">
                                                    <?php
                                                        if (@$sn['hn']['image_check_' . $i]!=NULL) {
                                                    ?>
                                                    <a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i])?>">
                                                        <img class="img-responsive" src="<?php echo html_escape(@$sn['hn']['image_thumb_' . $i]);?>" alt="">
                                                    </a>
                                                    <?php 
                                                        } else {
                                                        echo '<img width="250" src="http://img.youtube.com/vi/'.html_escape($sn['hn']['video_'.$i]).'/0.jpg" alt="photography" class="img-responsive"/>';
                                                    }
                                                    ?>                                                
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="<?php echo base_url(). html_escape(@$sn['hn']['category_' . $i]); ?>" class="post-badge btn_five"><?php echo html_escape(@$sn['hn']['category_' . $i]); ?></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="post-title-author-details">
                                                <h4><a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i]) ?>"><?php echo html_escape(@$sn['hn']['news_title_' . $i]); ?></a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', html_escape(@$sn['hn']['ptime_' . $i]))); ?>
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

                <!-- ad area four -->
                    <div class="<?php echo (html_escape(@$lg_status_34)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_34)==0?'hidden-xs hidden-sm':'')?>">
                     <?php echo htmlspecialchars_decode(@$news_view_34); ?>
                    </div><br>


                <div class="row">
                        <div class="col-md-12">

                            <div class="comment-bx-area">
                             <?php echo form_open('Comments_controller/comments', 'id="CommentForm"');?>
                                <div class="comment-body">
                                    <div class="comment-as">
                                        <span class="com-title"><?php echo makeString(['comment','as'])?>:</span>
                                        
                                        <div class="dropdown main-nav">
                                            <?php if($this->session->userdata('id')!=NULL){?>
                                           
                                            <button class="btn btn-com dropdown-toggle" type="button" data-toggle="dropdown"> <?php echo $this->session->userdata('name');?>
                                                    <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo base_url(); ?>Signout/index" class="popup-with-zoom-anim"><?php echo display('signout')?></a></li>
                                            </ul>
                                            <?php } else{?>
                                                <button class="btn btn-com dropdown-toggle" type="button" data-toggle="dropdown"><?php echo display('sign_in')?>
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo base_url();?>Registration/index" class="cd-signin" ><?php echo display('sign_in')?></a></li>
                                                    <li><a href="<?php echo base_url();?>Registration/index" class="cd-signup" ><?php echo display('sign_up')?></a></li>
                                                </ul>

                                            <?php }?>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <span class="successMessage"></span>

                                    <?php if($this->session->userdata('id')!=NULL){?>
                                        <textarea class="form-control" id="message" name="comment" placeholder="Entter Your Comment ..." maxlength="140" rows="4"></textarea>
                                        <input type="hidden" name="news_id" value="<?php echo html_escape($news_id);?>">

                                        <div class="comment-footer">
                                            <button type="submit" class="btn btn-com active"><?php echo display('publish')?></button>
                                        </div>
                                    
                                    <?php }?>
                                <?php echo form_close();?>
                            </div>



                            <!-- comment box
                            ============================================ -->
                            <div class="comments-container">

                                <div class="block">
                                    <!-- filters select -->
                                    <h4 class="block-title"><span><?php echo display('comment')?> (<?php echo html_escape(@$total_comments);?>)</span></h4>
                                </div>

                                <div class="mid-content">
                                <?php
                                if (isset($comments)) {
                                    foreach ($comments as $comment) {
                                ?>
                                <ul id="comments-list" class="comments-list loadMoreicon">
                                    <li>
                                        <div class="comment-main-level">
                                            <!-- Avatar -->
                                            <div class="comment-avatar">
                                                <?php if($comment->photo!=NULL){?>
                                                <img src="<?php echo base_url(). $comment->photo;?>" class="img-responsive" alt="">
                                                <?php } else{ ?>
                                                <img src="<?php echo base_url();?> uploads/user/user.png" class="img-responsive" alt="">
                                                <?php } ?>
                                            </div>
                                            <!-- Contenedor del Comentario -->
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name"><a href="#"><?php echo html_escape(strip_tags($comment->name));?></a></h6>
                                                    <span>
                                                        <?php 
                                                            echo html_escape($comment->com_date_time);
                                                        ?>   
                                                    </span>
                                                    
                                                    <i class="fa fa-reply replayComment"></i>
                                                    <input type="hidden" value="<?php echo html_escape($comment->com_id);?>">
                                                </div>

                                                <div class="comment-content">
                                                    <?php echo htmlspecialchars_decode($comment->comments)?>
                                                </div>

                                                 <?php
                                                    $c_u_isLogedIn=$this->session->userdata("id");
                                                    if ($c_u_isLogedIn != null) {
                                                ?>

                                                <div class="comment-bx-area hide replayCommentBox">
                                                   <?php echo form_open('Comments_controller/re_comments', 'class="reComments"');?>
                                                    <div class="comment-body">
                                                        <textarea class="form-control" name="comments" placeholder="Enter Your Message" rows="4"></textarea>
                                                        
                                                        <input type="hidden" name="com_replay_id" value="<?php echo html_escape($comment->com_id)?>">
                                                        <input type="hidden" name="news_id" value="<?php echo html_escape($news_id);?>">
                                                    </div>
                                                    <div class="comment-footer">
                                                        <button type="submit" class="btn btn-com active"><?php echo display('publish')?></button>
                                                    </div>
                                                    <?php echo form_close();?>
                                                </div>

                                                <?php }?>
                                            </div>
                                        </div>

                                        <!-- Respuestas de los comentarios -->
                                        <ul class="comments-list reply-list">
                                                <?php
                                                   $replies = $this->db->select('user_info.id,user_info.name,user_info.photo,comments_info.*')
                                                    ->from('comments_info')
                                                    ->join('user_info', 'comments_info.com_user_id = user_info.id')
                                                    ->where('com_replay_id', $comment->com_id)
                                                    ->where('com_status', '1')
                                                    ->where_not_in('com_status', '0')
                                                    ->get()
                                                    ->result();
                                                    foreach ($replies as $reply) {
                                                ?>
                                            <li>
                                                <!-- Avatar -->
                                                <div class="comment-avatar">
                                                    <?php if($reply->photo!=NULL){?>
                                                    <img src="<?php echo base_url(). html_escape($reply->photo);?>" class="img-responsive" alt="">
                                                    <?php } else{ ?>
                                                    <img src="<?php echo base_url();?> uploads/user/user.png" class="img-responsive" alt="">
                                                    <?php } ?>
                                                </div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box">
                                                    <div class="comment-head">
                                                        <h6 class="comment-name"><a href="#"><?php echo html_escape(strip_tags(@$reply->name))?></a></h6>
                                                        <span>
                                                            <?php 
                                                                echo html_escape($reply->com_date_time);
                                                            ?>
                                                        </span>
                                                        <i class="fa fa-reply replayComment1"></i>
                                                    </div>

                                                    <div class="comment-content">
                                                       <?php echo html_escape($reply->comments)?>
                                                    </div>


                                                    <?php
                                                        $c_u_isLogedIn=$this->session->userdata("id");
                                                        if ($c_u_isLogedIn != null) {
                                                    ?>
                                                    <div class="comment-bx-area hide replayCommentBox margin-bottom15" >
                                                        
                                                        <?php echo form_open('Comments_controller/re_comments', 'class="reComments1"');?>
                                                        
                                                        <div class="comment-body">
                                                            <textarea class="form-control" name="comments" placeholder="Enter Your Message" rows="4"></textarea>
                                                            <input type="hidden" name="com_replay_id" value="<?php echo html_escape($reply->com_id)?>">
                                                            <input type="hidden" name="news_id" value="<?php echo html_escape($news_id);?>">
                                                        </div>
                                                        <div class="comment-footer">
                                                            <button type="submit" class="btn btn-com active"><?php echo display('publish')?></button>
                                                        </div>

                                                        <?php echo form_close();?>
                                                    </div>
                                                    <?php } ?>
                                                </div>


                                                <ul class="comments-list reply-list">
                                                    <?php
                                                       $recommentrep = $this->db->select('user_info.id,user_info.name,user_info.photo,comments_info.*')
                                                        ->from('comments_info')
                                                        ->join('user_info', 'comments_info.com_user_id = user_info.id')
                                                        ->where('com_replay_id', $reply->com_id)
                                                        ->where('com_status', '1')
                                                        ->where_not_in('com_status', '0')
                                                        ->get()
                                                        ->result();

                                                    foreach ($recommentrep as $reply1) {
                                                    ?>
                                                    <li>
                                                        <!-- Avatar -->
                                                         <div class="comment-avatar">
                                                            <?php if(@$reply1->photo!=NULL){?>
                                                            <img src="<?php echo base_url(). html_escape($reply1->photo);?>" class="img-responsive" alt="">
                                                            <?php } else{ ?>
                                                            <img src="<?php echo base_url();?> uploads/user/user.png" class="img-responsive" alt="">
                                                            <?php } ?>
                                                        </div>
                                                        <!-- Contenedor del Comentario -->
                                                        <div class="comment-box">
                                                            <div class="comment-head">
                                                                <h6 class="comment-name"><a href="#"><?php echo html_escape(strip_tags($reply1->name))?></a></h6>
                                                                <span>
                                                                <?php 
                                                                    echo html_escape($reply1->com_date_time);
                                                                    $now = date("Y-m-d H:i:s");
                                                                     
                                                                ?> 
                                                                </span>
                                                                <input type="hidden" name="com_replay_id" value="<?php echo html_escape($reply1->com_id);?>">
                                                                <input type="hidden" name="news_id" value="<?php echo html_escape($news_id);?>">
                                                            </div>
                                                            <div class="comment-content">
                                                               <?php echo htmlspecialchars_decode($reply1->comments)?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php
                                                    }
                                                    ?>  
                                                </ul>

                                            </li>
                                        <?php }?>
                                        </ul>
                                    </li>
                                </ul>
                                <?php
                                    }
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div><!--END OF COMMENTS AREA-->

                    <!-- ad area five -->
                    <div class="<?php echo (html_escape(@$lg_status_35)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_35)==0?'hidden-xs hidden-sm':'')?>">
                     <?php echo htmlspecialchars_decode(@$news_view_35); ?>
                    </div><br>
                
            </article>
        </div>

        <div class="col-sm-4 left-padding">
            <aside class="sidebar">

                <!-- ad area five -->
                <div class="banner-add <?php echo (@$lg_status_36==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_36==0?'hidden-xs hidden-sm':'')?>">
                    <?php echo @$news_view_36; ?>
                </div>


                <div class="banner-add">
                    <h3 class="category-headding "><?php echo display('social_pixel')?></h3>
                    <div class="headding-border"></div>
                    <div class="ssm">
                        <?php if (@$social_page->fb) { ?>
                                <div class="fb-page" data-href="<?php echo html_escape(@$social_page->fb);?>/" data-tabs="timeline" data-width="" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="<?php echo html_escape(@$social_page->fb);?>/" class="fb-xfbml-parse-ignore">
                        <?php }?>
                    </div>
                </div>
                <br><br>

                <div class="tab-inner">
                        <ul class="tabs">
                            <li><a href="#"><?php echo display('latest_news');?></a></li>
                            <li><a href="#"><?php echo display('most_read');?></a></li>
                        </ul><hr> <!-- tabs -->
                        <div class="tab_content">
                            <div class="tab-item-inner">
                            <?php 
                            for($i=1; $i<=3; $i++){ 
                                if(!isset($ln['news_title_'.$i]))
                                    continue
                            ?>
                                <div class="box-item wow fadeIn" data-wow-duration="1s">
                                    <div class="img-thumb">
                                        <?php if(@$ln['image_check_' . $i]!=NULL){?>
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
                            <?php 
                             for($i=1; $i<=3; $i++){ 
                                if(!isset($mr['news_title_'.$i]))
                                continue
                            ?>
                                <div class="box-item">
                                    <div class="img-thumb">
                                        <?php if(@$mr['image_check_' . $i]!=Null){?>
                                            <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" rel="bookmark"><img class="entry-thumb" src="<?php echo @$mr['image_thumb_' . $i]; ?>" alt="" height="80" width="90"></a>
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

                <!-- ad area seven -->
                <div class="banner-add <?php echo (html_escape(@$lg_status_37)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_37)==0?'hidden-xs hidden-sm':'')?>"> <!-- add -->
                    <span class="add-title"></span>
                    <?php echo @$news_view_37; ?>
                </div>
               
                <!-- slider widget -->
                <div class="widget-slider-inner">
                    <h3 class="category-headding "><?php echo  html_escape(@$Editor['hn']['category_1']); ?></h3>
                    <div class="headding-border"></div>
                    <div id="widget-slider" class="owl-carousel owl-theme">
                        <!-- widget item -->
                            <?php 
                            for($i=1;$i<=3;$i++){
                                if(!isset($Editor['hn']['news_title_'.$i]))
                                    continue
                            ?>
                            <div class="item">

                                <a href="<?php echo html_escape(@$Editor['hn']['news_link_'.$i])?>">
                                <?php
                                    if (@$Editor['hn']['image_check_'.$i]!=NULL) {
                                          echo'<img  src="'. html_escape(@$Editor['hn']['image_thumb_'.$i]).'" alt="">';
                                        } else {
                                            echo '<img  class="img-responsive"  src="http://img.youtube.com/vi/' . html_escape(@$Editor['hn']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                        }
                                    ?>
                                </a>
                                <h4><a href="<?php echo html_escape(@$Editor['hn']['news_link_'.$i])?>"><?php echo html_escape(@$Editor['hn']['news_title_'.$i])?></a></h4>
                                <div class="date">
                                    <ul>
                                        <li><?php echo display('by')?><a><span><?php echo html_escape(@$Editor['hn']['post_by_name_'.$i])?></span></a> --</li>
                                        <li><a><?php echo date('l, d M, Y', html_escape(@$Editor['hn']['ptime_'.$i])) ;?></a></li>
                                    </ul>
                                </div>
                                <?php 
                                    $news_details = @$Editor['hn']['full_news_'.$i];
                                    $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                    echo htmlspecialchars_decode($exploded);
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                

                <!-- ad area eight -->
                <div class="banner-add <?php echo (html_escape(@$lg_status_38)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_38)==0?'hidden-xs hidden-sm':'')?>"> <!-- add -->
                    <span class="add-title"></span>
                    <?php echo htmlspecialchars_decode(@$news_view_38); ?>
                </div>


              
            </aside>
        </div>
    </div>
</div>

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">

<script src="<?php echo base_url()?>assets/dist/js/comments.js"></script>

