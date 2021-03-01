<?php

session_start();

include_once('../includes/connection.php');
include_once('../includes/objects/menu.php');

$menu = new Menu;

if(isset($_SESSION['logged_in'])) {
  $menuName = $_POST['menuName'];
  $menuLink = $_POST['menuLink'];
  $parentID = $_POST['menuType'];

  $fileName = "../pages/" . $menuLink;

  if(!file_exists($fileName)) {
    fopen("../pages/$menuLink", "w");
  } else {
    throw new Exception("Error: Menu already exist");
  }

  if($parentID == 0) {
    $menu->add_branch($menuName, $menuLink);
  } else {
    $menu->add_submenu($menuName, $menuLink, $parentID);
  }
}

//var_dump($menuName);
//var_dump($menuLink);
//var_dump($parentID);

?>
