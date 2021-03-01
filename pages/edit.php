<?php

session_start();

include_once('includes/connection.php');
include_once('includes/edit-templates.php');
include_once('includes/objects/menu.php');

$menu = new Menu;
$allMenus = $menu->fetch_all();

if (isset($_SESSION['logged_in'])) {
  ?>

  <form method="post" action="handlers/edit-page.php";
  <label for="menuItem">Page: </label>
  <select class="form-control" id="menuItem" name="menuItem">
    <option value="0" selected disabled>Vælg</option>
    <?php
    foreach($allMenus as $item) {
      $id = $item['id'];
      $name = $item['name'];
      $link = $item['link'];

      echo "<option value='$id'>$name</option>";
    }
    ?>
  </select>

  <br />

  <?php
} else {

  header("Location: index.php?page=admin");

}

?>
