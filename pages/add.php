<?php

session_start();

include_once('includes/connection.php');
$pdo = db_connect();

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
          $query = $pdo->prepare("SELECT id, name, MenuItems_id FROM menu WHERE MenuItems_id = ?");
          $query->bindValue(1, 0);

          var_dump("Hey");

          $query->execute();

          $result = $query->fetch_assoc();

          foreach($result as $row) {
            $id = $row['id'];
            $name = $row['name'];
            $parentID = $row['MenuItems_id'];

            if($parentID == 0) {
              echo "<option value='$parentID'>$name</option>";
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
