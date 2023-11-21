<?php
$bu = base_url();
if (isset($ads) && is_array($ads)) {
    extract($ads);
}
    $menu_slug = $this->uri->segment(1);

if(isset($menu_slug)){
    $selected = 'active';
}else{
    $selecte = 'active';
}
?>



            <div class="top_banner_wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-4 col-sm-4">
                            <div class="header-logo">
                                <!-- logo -->
                                <a href="<?php echo base_url()?>" >
                                <img class="td-retina-data img-responsive" src="<?php echo base_url().html_escape(@$setting->logo)?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-8 col-md-8 col-sm-8 hidden-xs">
                           <div class="header-banner <?php echo (html_escape(@$lg_status_11)==0?'hidden-lg hidden-md':'')?> 
                           <?php echo (html_escape(@$sm_status_11)==0?'hidden-xs hidden-sm':'')?>">
                                
                                <?php
                                    // ad one
                                    if(isset($home_11) && !empty($home_11))
                                        echo htmlspecialchars_decode(@$home_11); 
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- navber -->
            <nav class="navbar header-sticky hidden-xs">
                <div class="container">
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="<?php echo html_escape(@$selecte);?>"><a href="<?php echo html_escape($bu) ?>" class="category01 active"><?php echo display('home')?></a></li>
                            <?php


                            $i = 2;
                            foreach ($main_menu as $key => $value) {

                                $num_rows1 = $this->db->select('*')->from('menu_content')->where('parents_id',$value->menu_content_id)->order_by('menu_position','ASC')->get()->result();
                            
                                if($value->slug!=NULL){
                                    $slug1 = $bu.$value->slug;
                                }elseif ($value->link_url!=NULL) {
                                    $slug1 = $value->link_url;
                                }else{
                                    $slug1 = $bu."#";
                                }

                                if ($num_rows1) {
                                    echo '<li class="dropdown">';
                                    echo '<a  href="' . $slug1 . '" class="dropdown-toggle category0' . $i++ . '" data-toggle="dropdown">' . $value->menu_lavel . '<span class="pe-7s-angle-down"></span></a>';
                                    echo '<ul class="dropdown-menu menu-slide">';
                                    foreach ($num_rows1 as $key1 => $value1) {
                                        if($value1->slug!=NULL){
                                            $slug2 = $bu.$value1->slug;
                                        }elseif ($value1->link_url!=NULL) {
                                            $slug2 = $value1->link_url;
                                        }else{
                                            $slug2 = $bu."#";
                                        }
                                        echo' <li class="'.(($value1->slug == $menu_slug) ? @$selected : '').'"><a  href="' . $slug2. '">' . $value1->menu_lavel . '</a></li>';
                                    }
                                    echo '</ul>';
                                } else {



                                    if(@$value->parents_id>0){

                                    }else{
                                        echo '<li class="'.(($value->slug == $menu_slug) ? @$selected : '').'"> <a  href="' . $slug1 . '" class="category0' . $i++ . '">' . html_escape($value->menu_lavel) . '</a>';
                                    }            
                                }
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- navbar-collapse -->
                </div>
            </nav>
        </header>