<?php

session_start();

include_once('includes/connection.php');
include_once('includes/objects/menu.php');

$menu = new Menu;
$parentMenus = $menu->fetch_parents();

if (isset($_SESSION['logged_in'])) {

  ?>

  <br />

  <form class="form" action="handlers/create-menu.php" method="post">
    <div class="row mx-3 mb-3">
      <div class="justify-content-center mb-3">
        <label for="menuName">Menu navn:</label>
        <input type="text" id="menuName" name="menuName" class="form-control" />
      </div>
      <div class="justify-content-center mb-3">
        <label for="menuLink">Link navn (Ingen mellemrum):</label>
        <input type="text" id="menuLink" name="menuLink" class="form-control" />
      </div>
      <div class="justify-content-center">
        <label for="menuType">Vælg menupunkt</label>
        <select class="form-control" id="menuType" name="menuType">
          <option selected disabled>Vælg</option>
          <option value="0">Nyt menupunkt</option>
          <?php
          foreach($parentMenus as $row) {
            $id = $row['id'];
            $name = $row['name'];
            $parentID = $row['MenuItems_id'];

            if(empty($parentID)) {
              echo "<option value='$id'>$name</option>";
            }
          }

          ?>
        </select>
      </div>
    </div>
    <div class="justify-content-center">
      <button class="btn btn-sm btn-outline-success">
        Opret
      </button>
    </div>
  </form>

  <?php
} else {

  header("Location: index.php?page=admin");

}

?>
