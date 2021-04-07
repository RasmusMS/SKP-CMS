<?php

// The file that'll handle the actual editing of content

session_start();

include_once('../includes/connection.php');
include_once('../includes/objects/section.php');
include_once('../includes/objects/menu.php');
include_once('../includes/objects/file.php');

// Instantiates the object needed in this file
$section = new Section;

// First we'll edit the image file.
function file_edit($name, $fileName, $fileTmp) {
  // File object needed in this function
  $file = new File;

  // If file successfully created..
  if($file->file_create($fileName, $fileTmp)) {
    // It'll delete the old file.
    $file->file_delete($name);
    echo "Image replaced!\n";
    echo "<br/>";
  } else {
    // Otherwise throw exception
    throw new Exception("Error: File could not be created!");
  }
}

// Checks if logged in
if(isset($_SESSION['logged_in'])) {
  $header = $_POST['Heading'];
  $text = $_POST['Text'];

  // Content to be edited
  $content = array('Heading' => $header,
                    'Text' => $text);

  // If file is edited
  if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
    $file = $_FILES['file']['name'];
    $fileTMP = $_FILES['file']['tmp_name'];
    $img = basename($file);

    // Edit file
    file_edit($_SESSION['Img'], $file, $fileTMP);

    // Add image name to content array
    $content['Img'] = $img;
  }

  $section_id = $_SESSION['section_id'];

  //$file->file_create($file, $fileTMP);
  //$file->file_delete($_SESSION['Img']);

  // Editing each content box
  foreach ($content as $key => $value) {
    echo "<br/>";
    // Getting content ID
    $content_id = $section->fetch_contentID($section_id, $key);

    echo "<br/>";

    // Editing content
    $section->edit_content($value, $content_id);
  }

}
?>
