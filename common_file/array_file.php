<?php
// page array --------------------------------------------------------------;

$home_position = array(0 => '--Select--');
for ($i = 1; $i <= 21; $i++) {
    $home_position[] = $i;
}

$other_positions = array();
for ($i = 0; $i <= 13; $i++) {
    $other_positions[] = $i;
}


$ad_positions = array();
for ($i = 0; $i <= 35; $i++):
    $ad_positions[] = $i;
endfor;


$nw_img_search = array(
    'width' => '1000',
    'height' => '600',
    'scrollbars' => 'yes',
    'status' => 'yes',
    'resizable' => 'yes',
    'screenx' => '100',
    'screeny' => '10',
    'class' => ''
);
?>