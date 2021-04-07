<?php

// This is the file that'll handle the actual page creation.

session_start();

include_once('../includes/connection.php');
include_once('../includes/file-templates.php');
include_once('../includes/objects/menu.php');
include_once('../includes/objects/section.php');
include_once('../includes/objects/file.php');

// The objects needed in this file
$menu = new Menu;
$section = new Section;
$file = new File;

// Checks if logged in
if(isset($_SESSION['logged_in'])) {
  // Gets the data specified for the page
  $menuName = $_POST['menuName'];
  $menuLink = $_POST['menuLink'];
  $parentID = $_POST['menuType'];
  $templateID = $_SESSION['template_id'];

  // Checks whether its a parent or child menu and creates the page file.
  if($parentID == 0) {
    $menu->add_branch($menuName, $menuLink);
  } else {
    $menu->add_submenu($menuName, $menuLink, $parentID);
  }

  // Get page ID
  $pageID = $menu->fetch_id($menuName);

  // Create the section
  $section->add_section($templateID, $pageID);

  // Get section ID
  $sectionID = $section->fetch_id($pageID);

  $fileName = "../pages/" . $menuLink . ".php";

  // Checks if the file exist
  if(!file_exists($fileName)) {

    // Creates the file
    $myFile = fopen("$fileName", "w") or die("Unable to open file!");

    // Get the file template
    $fileTxt = tpl_file_featurette($sectionID);

    // Writes the code to the file
    fwrite($myFile, $fileTxt);

    // Closes the file
    fclose($myFile);
  } else {
    throw new Exception("Error: Menu already exist");
  }

  // A switch case that returns an array with the content to be added to the database
  switch ($templateID) {

    // In this case, 1 represents the featurette.
    case 1:

      // Gets the content. Heading, text and image data.
      $header = $_POST['Heading'];
      $text = $_POST['Text'];
      $file = $_FILES['file']['name'];
      $fileTMP = $_FILES['file']['tmp_name'];

      // Creates the file and returns the fileName
      $fileName = $file->file_create($file, $fileTMP);

      // Pushing the content to an array.
      $contents = array('Heading' => $header,
                      'Text' => $text,
                      'Img' => $fileName);

      break;

    default:
      // code...
      break;
  }

  // For each content in an array, it'll create that content in the database.
  foreach ($contents as $key => $value) {
    $section->add_content($value, $key, $sectionID);
  }
}

?>
