<?php

function tpl_edit_featurette($heading_1, $heading_2, $heading_3, $text_1, $text_2, $text_3, $img_1, $img_2, $img_3) {

$code = '';

$code .= "<main>";

    //<!-- START THE FEATURETTES -->

$code .= "<hr class='featurette-divider'>";

$code .= "<div class='row featurette'>";
$code .= "<div class='col-md-7'>";
$code .= "<input type='text' class='featurette-heading' name=''>$heading_1</input>";
$code .= "<input class='lead' name=''>$text_1</input>";
$code .= "</div>";
$code .= "<div class='col-md-5'>";
$code .= "<img class='featurette-image img-fluid mx-auto' src='uploads/$img_1' width='500' height='500' preserveAspectRatio='xMidYMid slice' focusable='false' />";

$code .= "</div>";
$code .= "</div>";

$code .= "<hr class='featurette-divider'>";

$code .= "<div class='row featurette'>";
$code .= "<div class='col-md-7 order-md-2'>";
$code .= "<input class='featurette-heading' name=''>$heading_2</input>";
$code .= "<input class='lead' name=''>$text_2</input>";
$code .= "</div>";
$code .= "<div class='col-md-5 order-md-1'>";
$code .= "<img class='featurette-image img-fluid mx-auto' src='uploads/$img_2' width='500' height='500' preserveAspectRatio='xMidYMid slice' focusable='false' />";

$code .= "</div>";
$code .= "</div>";

$code .= "<hr class='featurette-divider'>";

$code .= "<div class='row featurette'>";
$code .= "<div class='col-md-7'>";
$code .= "<input class='featurette-heading' name=''>$heading_3</input>";
$code .= "<input class='lead' name=''>$text_3</input>";
$code .= "</div>";
$code .= "<div class='col-md-5'>";
$code .= "<img class='featurette-image img-fluid mx-auto' src='uploads/$img_3' width='500' height='500' preserveAspectRatio='xMidYMid slice' focusable='false' />";

$code .= "</div>";
$code .= "</div>";

$code .= "<hr class='featurette-divider'>";

      //<!-- /END THE FEATURETTES -->
$code .= "</main>";

echo $code;
}


 ?>
