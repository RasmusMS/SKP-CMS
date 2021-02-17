<?php

session_start();

include_once('includes/connection.php');
include_once('includes/objects/menu.php');

$menu = new Menu;
$parentMenus = $menu->fetch_parents();

if (isset($_SESSION['logged_in'])) {

  ?>

  <br />

  <form class="form" action="" method="post">
    <div class="row mx-3">
      <div class="justify-content-center mb-3">
        <label for="menuName">Menu navn:</label>
        <input type="text" id="menuName" class="form-control" />
      </div>
      <div class="justify-content-center">
        <label for="menuType">Vælg menupunkt</label>
        <select class="form-control" id="menuType">
          <option selected disabled>Vælg</option>
          <option value="0">Hovedpunkt</option>
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
  </form>

  <?php
} else {

  header("Location: index.php?page=admin");

}

?>
