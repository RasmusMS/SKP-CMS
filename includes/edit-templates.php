<?php

include_once('objects/section.php');

// Handler for which template the section being edited have.
function tpl_edit($page_id) {
  $section = new Section;
  $pageInfo = $section->fetch_page($page_id);
  $template_id = $pageInfo[0]['Template_id'];

  switch ($template_id) {
    // Featurette edit template
    case 1:
      tpl_edit_featurette($page_id);
      break;

    // Carousel edit template
    case 2:
      tpl_edit_carousel($page_id);
      break;

    // Add more templates here

    default:
      echo "Template not found!";
      break;
  }
}

// To be able to have inputs in these and show current content, I have to have different functions for templates used for editing.
// Not very optimal but I wasn't sure how else to do it.
function tpl_edit_featurette($page_id) {

// Instantiate the object I'll be using in this function
$section = new Section;

// Fetch id for the section using this templates
$section_id = $section->fetch_id($page_id);

// Fetch the content for this section
$content = $section->fetch_content($section_id);

$_SESSION['section_id'] = $section_id;

// Getting all the content for the section being edited.
foreach($content as $item) {
  $data = $item['content'];
  $type = $item['type'];

  switch ($type) {
    case 'Heading':
      $heading = $data;
      break;

    case 'Text':
      $text = $data;
      break;

    case 'Img':
      $img = $data;
      $_SESSION['Img'] = $img;
      break;

    default:
      echo 'Error! Wrong type!';
      break;
  }
}

$ID = "file";

$code = '';

$code .= "<main>";

    //<!-- START THE FEATURETTES -->

$code .= "<hr class='featurette-divider'>";

$code .= "<div class='row featurette'>";
$code .= "<div class='col-md-7'>";
$code .= "<input type='text' class='featurette-heading form-control' name='Heading' value='$heading' />";
$code .= "<br />";
$code .= "<textarea class='lead form-control' name='Text' style='height: 85%;'>$text</textarea>";
$code .= "</div>";
$code .= "<div class='col-md-5'>";
$code .= "<img class='featurette-image img-fluid mx-auto' id='Img' name='Img' src='uploads/$img' width='100%' height='100%' preserveAspectRatio='xMidYMid slice' focusable='false' onclick=\"fileUpload('$ID')\" />";
$code .= "<input type='file' id='file' name='file' style='display: none;' onchange=\"showImg('Img', '$ID')\"/>";

$code .= "</div>";
$code .= "</div>";

// I have saved this code in comment because its the code where the image is flipped to the other side.

/*$code .= "<hr class='featurette-divider'>";

$code .= "<div class='row featurette'>";
$code .= "<div class='col-md-7 order-md-2'>";
$code .= "<input type='text' class='featurette-heading form-control' name='Heading-2' value='$heading_2' />";
$code .= "<br />";
$code .= "<textarea class='lead form-control' name='Text-2' style='height: 85%;'>$text_2</textarea>";
$code .= "</div>";
$code .= "<div class='col-md-5 order-md-1'>";
$code .= "<img class='featurette-image img-fluid mx-auto' id='Img-2' name='Img-2' src='uploads/$img_2' width='500' height='500' preserveAspectRatio='xMidYMid slice' focusable='false' onclick=\"fileUpload('$secondID')\" />";
$code .= "<input type='file' id='secondFile' name='secondFile' style='display: none;' onchange=\"showImg('Img-2', '$secondID')\"/>";

$code .= "</div>";
$code .= "</div>";*/

$code .= "<hr class='featurette-divider'>";

      //<!-- /END THE FEATURETTES -->
$code .= "</main>";

echo $code;
}

function tpl_edit_carousel($page_id) {

}


 ?>
