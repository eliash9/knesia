<?php
$bu = base_url();
if (isset($ads) && is_array($ads)) {
    extract($ads);
}
?>

<section class="block-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Search</h1>
                <div class="breadcrumbs">
                    <ul>
                        <li><i class="pe-7s-home"></i> <a href="<?php echo base_url();?>" title=""><?php echo display('home')?></a></li>
                        <li><a href="<?php echo base_url();?>" title=""><?php echo htmlspecialchars_decode($keyword);?></a></li>
                    </ul>
                </div>

                <?php
                $fa = array('method' =>'GET' ); 
                echo form_open('search',$fa);?>
                    <div class="col-sm-12 form-group">
                        <input type="text" class="form-control" required="1" placeholder="<?php echo display('search')?>" name="q">
                        <input class="btn btn-style" type="submit" value="<?php echo display('search')?>">
                    </div> 
                <?php echo form_close();?>    
            </div>
        </div>
    </div>
</section>


<section class="archive">
    <!-- left content -->
    <div class="container">
        <div class="row">
            <!-- Left content -->
            <?php
            $n_s = 1;
            $total = 0;
            if (is_array(@$search_newses)) {
                foreach (@$search_newses as $key => $value) {
                $exploded_TITLE = @trim(@implode('-', @preg_split("/[\s,-\:]+/", @$value->title)), '-')
            ?>
                    <div class="col-sm-12 col-md-12">
                        <!-- archive post -->
                        <div class="post-style2 archive-post-style-2">
                            <?php if($value->image!=NULL){?>
                                <a href="<?php echo base_url() .  html_escape($value->page) . '/details/' .  html_escape($value->news_id) . '/' .  html_escape($exploded_TITLE); ?>"><img src="<?php echo base_url() . 'uploads/thumb/' .  html_escape($value->image); ?>" alt="" ></a> 
                           <?php } else{?>
                            <a href="<?php echo base_url() .  html_escape($value->page) . '/details/' .  html_escape($value->news_id) . '/' .  html_escape($exploded_TITLE); ?>" rel="bookmark">
                            <img width="200" src="http://img.youtube.com/vi/<?php echo html_escape($value->videos); ?>/0.jpg" alt="" >
                           </a>
                            <?php }?>
                            <div class="post-style2-detail">
                                <h4><a href="<?php echo base_url() .  html_escape($value->page) . '/details/' .  html_escape($value->news_id) . '/' .  html_escape($exploded_TITLE); ?>" title=""><?php echo html_escape(strip_tags(@$value->title)); ?></a></h4>
                                <div class="date">
                                    <ul>
                                        <li><?php echo display('by')?><a title="" href="#"><span><?php echo html_escape(strip_tags(@$value->name)); ?></span></a> --</li>
                                        <li><a title="" href="#"><?php echo date('l, d M, Y', html_escape($value->time_stamp)) ; ?></a> --</li>
                                        <li><div class="comments"><a href="#"><?php echo html_escape(@$value->reader_hit); ?></a></div></li>

                                    </ul>
                                </div>
                                <?php echo implode(' ', array_slice(explode(' ', htmlspecialchars_decode(strip_tags(@$value->news))), 0, 35));
                                ?><a href="<?php echo base_url() . html_escape($value->page) . '/details/' . html_escape($value->news_id) . '/' . html_escape($exploded_TITLE); ?>"> <?php echo display('read_more')?></a>
                            </div>
                        </div>
                    </div>
                    <?php
                    $total = ++$n_s;
                }
            }else {


            echo '<div class="col-sm-12 col-md-12">';
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo "<span >There is no news available on the Date = ". html_escape($keyword?$keyword:'')."</span>";
            echo '</b></div>';
            echo '</div>';
               
            }
            ?>

            <!-- pagination -->
            <div class="row">
                <div class="col-sm-12">
                <?php echo htmlspecialchars_decode($links);?>
                </div>
            </div>
          
        </div>
        <!-- pagination -->     
    </div>
</section>

 
