<?php

function tpl_featurette($heading_1, $heading_2, $heading_3, $text_1, $text_2, $text_3, $img_1, $img_2, $img_3) {

$code = '';

$code .= "<main>";

    //<!-- START THE FEATURETTES -->

$code .= "<hr class='featurette-divider'>";

$code .= "<div class='row featurette'>";
$code .= "<div class='col-md-7'>";
$code .= "<h2 class='featurette-heading'>$heading_1</h2>";
$code .= "<p class='lead'>$text_1</p>";
$code .= "</div>";
$code .= "<div class='col-md-5'>";
$code .= "<img class='featurette-image img-fluid mx-auto' src='uploads/$img_1' width='500' height='500' preserveAspectRatio='xMidYMid slice' focusable='false' />";

$code .= "</div>";
$code .= "</div>";

$code .= "<hr class='featurette-divider'>";

$code .= "<div class='row featurette'>";
$code .= "<div class='col-md-7 order-md-2'>";
$code .= "<h2 class='featurette-heading'>$heading_2</h2>";
$code .= "<p class='lead'>$text_2</p>";
$code .= "</div>";
$code .= "<div class='col-md-5 order-md-1'>";
$code .= "<img class='featurette-image img-fluid mx-auto' src='uploads/$img_2' width='500' height='500' preserveAspectRatio='xMidYMid slice' focusable='false' />";

$code .= "</div>";
$code .= "</div>";

$code .= "<hr class='featurette-divider'>";

$code .= "<div class='row featurette'>";
$code .= "<div class='col-md-7'>";
$code .= "<h2 class='featurette-heading'>$heading_3</h2>";
$code .= "<p class='lead'>$text_3</p>";
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
