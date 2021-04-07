<?php

// Not dynamically made. I made this page myself

include_once('includes/templates.php');
include_once('includes/objects/section.php');

$sectionID = 1;

$section = new Section;
$allContent = $section->fetch_content($sectionID);

foreach($allContent as $row) {
  $content = $row['content'];
  $type = $row['type'];

  switch ($type) {
    case 'Heading':
      $header = $content;
      break;

    case 'Text':
      $text = $content;
      break;

    case 'Img':
      $img = $content;
      break;

    default:
      echo "Wrong type! Type doesn't exists: $content";
      break;
  }

}

tpl_featurette($header, $text, $img);


?>
