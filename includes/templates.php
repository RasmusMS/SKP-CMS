<?php

// This is the template that will show the content on each pages.
// So if its a featurette it'll show this function with the content.
function tpl_featurette($heading, $text, $img) {

$code = '';

$code .= "<main>";

    //<!-- START THE FEATURETTES -->

$code .= "<hr class='featurette-divider'>";

$code .= "<div class='row featurette'>";
$code .= "<div class='col-md-7'>";
$code .= "<h2 class='featurette-heading'>$heading</h2>";
$code .= "<p class='lead'>$text</p>";
$code .= "</div>";
$code .= "<div class='col-md-5'>";
$code .= "<img class='featurette-image mx-auto' src='uploads/$img' width='500' height='500' preserveAspectRatio='xMidYMid slice' focusable='false' />";

$code .= "</div>";
$code .= "</div>";

/*$code .= "<hr class='featurette-divider'>";

$code .= "<div class='row featurette'>";
$code .= "<div class='col-md-7 order-md-2'>";
$code .= "<h2 class='featurette-heading'>$heading_2</h2>";
$code .= "<p class='lead'>$text_2</p>";
$code .= "</div>";
$code .= "<div class='col-md-5 order-md-1'>";
$code .= "<img class='featurette-image mx-auto' src='uploads/$img_2' width='500' height='500' preserveAspectRatio='xMidYMid slice' focusable='false' />";

$code .= "</div>";
$code .= "</div>";*/

$code .= "<hr class='featurette-divider'>";

      //<!-- /END THE FEATURETTES -->
$code .= "</main>";

echo $code;
}




?>
