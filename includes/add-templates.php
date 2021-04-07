<?php

// This function handles which template is called
function tpl_add($template_id) {

  switch ($template_id) {
    // First template. The featurette which is what I used for testing.
    case 1:
      tpl_add_featurette();
      break;

    // Second template, a carousel
    case 2:
      tpl_add_carousel();
      break;

    // Add more templates here

    default:
      // TODO: code...

      break;
  }
}

// Could have been created easier but I at the time chose to store them in a simpel variable.
// These templates are from bootstrap
function tpl_add_featurette() {

  $ID = "file";

  $code = '';

  $code .= "<main>";

      //<!-- START THE FEATURETTES -->

  $code .= "<hr class='featurette-divider'>";

  $code .= "<div class='row featurette'>";
  $code .= "<div class='col-md-7'>";
  $code .= "<input type='text' class='featurette-heading form-control' name='Heading' />";
  $code .= "<br />";
  $code .= "<textarea class='lead form-control' name='Text' style='height: 85%;'></textarea>";
  $code .= "</div>";
  $code .= "<div class='col-md-5'>";
  $code .= "<img class='featurette-image img-fluid img-responsive mx-auto rounded' id='Img' name='Img' width='100%' height='100%' src='uploads/placeholder.png' preserveAspectRatio='xMidYMid slice' focusable='false' onclick=\"fileUpload('$ID')\" />";
  $code .= "<input type='file' id='file' name='file' style='display: none;' onchange=\"showImg('Img', '$ID')\"/>";

  $code .= "</div>";
  $code .= "</div>";

  // I have saved this code in comment because its the code where the image is flipped to the other side.

  /*$code .= "<hr class='featurette-divider'>";

  $code .= "<div class='row featurette'>";
  $code .= "<div class='col-md-7 order-md-2'>";
  $code .= "<input type='text' class='featurette-heading form-control' name='Heading-2' />";
  $code .= "<br />";
  $code .= "<textarea class='lead form-control' name='Text-2' style='height: 85%;'></textarea>";
  $code .= "</div>";
  $code .= "<div class='col-md-5 order-md-1'>";
  $code .= "<img class='featurette-image mx-auto' id='Img-2' name='Img-2' src='uploads/placeholder.png' width='500' height='500' preserveAspectRatio='xMidYMid slice' focusable='false' onclick=\"fileUpload('$secondID')\" />";
  $code .= "<input type='file' id='secondFile' name='secondFile' style='display: none;' onchange=\"showImg('Img-2', '$secondID')\"/>";

  $code .= "</div>";
  $code .= "</div>";*/

  $code .= "<hr class='featurette-divider'>";

        //<!-- /END THE FEATURETTES -->
  $code .= "</main>";

  echo $code;

}

function tpl_add_carousel() {
  $code = '';

  $code .= "<div id='carouselExampleControls' class='carousel slide' data-bs-ride='carousel'>";
  $code .= "<div class='carousel-inner'>";
  $code .= "<div class='carousel-item active'>";
  $code .= "<img src='uploads/placeholder.png' class='d-block w-100' alt='...'>";
  $code .= "</div>";
  $code .= "<div class='carousel-item'>";
  $code .= "<img src='uploads/placeholder.png' class='d-block w-100' alt='...'>";
  $code .= "</div>";
  $code .= "<div class='carousel-item'>";
  $code .= "<img src='uploads/placeholder.png' class='d-block w-100' alt='...'>";
  $code .= "</div>";
  $code .= "</div>";
  $code .= "<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='prev'>";
  $code .= "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
  $code .= "<span class='visually-hidden'>Previous</span>";
  $code .= "</button>";
  $code .= "<button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls'  data-bs-slide='next'>";
  $code .= "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
  $code .= "<span class='visually-hidden'>Next</span>";
  $code .= "</button>";
  $code .= "</div>";

  echo $code;
}
?>
