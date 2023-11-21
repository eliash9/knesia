<?php $bu = base_url();?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="<?php echo base_url().@$setting->favicon;?>" type="image/x-icon" />
<META NAME="copyright" CONTENT="">
<title><?php echo html_escape(@$setting->website_title);?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dist/css/print.css">

 <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/jquery/jquery-3.5.1.min.js"></script>
 <script src="<?php echo base_url();?>assets/dist/js/custom_funcion.js"></script>


</head>
        
<body>

    <div id="print">
        <a href="#" onclick="nprint()" title="Click to Print"><img src="<?php echo $bu;?>assets/icon/print.jpg" height="30" width="30" align="" /></a>
    </div>
    
    <div class="printpage"> 
        <div class="header"><img src="<?php echo $bu.@$setting->logo;?>" height="75" alt="<?php echo html_escape(@$setting->website_title);?>"  title="<?php echo @$setting->website_title;?>" /></div>
        <div class="title"><?php  echo html_escape($stitle).' '.html_escape($title); ?></div>
        <div class="post-time"><?php  echo date("l, d M Y H:i a",$time_stamp); ?></div>
        
        <div class="news">
            <?php
            if ($videos) {
                echo '<img  src="http://img.youtube.com/vi/' . $videos . '/0.jpg" align="left" width="400" title="'.html_escape(@$setting->website_title).'" alt="'.html_escape(@$setting->website_title).'" />';
            } else {
              echo'<img src="'.$bu.'/uploads/'.$image.'" align="left" width="400" title="'.html_escape(@$setting->website_title).'" alt="'.html_escape(@$setting->website_title).'" />';
            }
            ?>  
            
            <h1><?php echo html_escape(@$setting->website_title);?></h1>
            <?php echo htmlspecialchars_decode($news); ?>
        </div>
        
        <div class="footer">
            <div class="fc_left">
                <a href="<?php echo $bu;?>">
                <img src="<?php echo $bu.@$setting->logo; ?>" height="35" title="<?php echo @$setting->website_title;?>" alt="<?php echo @$setting->website_title;?>" />
                </a>
                <p>Copyright &copy; <?php echo html_escape(@$setting->copy_right); ?></p>        
            </div>
            <div class="fc_center">
            <?php
                echo htmlspecialchars_decode(@$setting->footer_text);
            ?>
            <?php
                echo html_escape(@$setting->copy_right);
            ?>
               
            </div>
        </div>

    </div>

</body>
</html>
