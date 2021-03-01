<?php

include_once('includes/templates.php');
include_once('includes/objects/section.php');

$pageID = 1;

$section = new Section;
$allContent = $section->fetch_content($pageID);

foreach($allContent as $row) {
  $content = $row['content'];
  $type = $row['type'];

  switch ($type) {
    case 'Heading-1':
      $firstHeader = $content;
      break;

    case 'Heading-2':
      $secondHeader = $content;
      break;

    case 'Heading-3':
      $thirdHeader = $content;
      break;

    case 'Text-1':
      $firstText = $content;
      break;

    case 'Text-2':
      $secondText = $content;
      break;

    case 'Text-3':
      $thirdText = $content;
      break;

    case 'Img-1':
      $firstImg = $content;
      break;

    case 'Img-2':
      $secondImg = $content;
      break;

    case 'Img-3':
      $thirdImg = $content;
      break;

    default:
      echo "Wrong type! Type doesn't exists: $content";
      break;
  }

}

tpl_featurette($firstHeader,$secondHeader, $thirdHeader, $firstText, $secondText, $thirdText, $firstImg, $secondImg, $thirdImg);


?>
