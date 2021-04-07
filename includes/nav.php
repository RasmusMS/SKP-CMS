<?php

include_once('includes/connection.php');
include_once('includes/objects/menu.php');

// The object I'll be using in this file
$menu = new Menu;
$parentMenu = $menu->fetch_parents();

 ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <?php

        // This loop will run for each existing parent menu
        foreach($parentMenu as $row) {
          $id = $row['id'];
          $name = $row['name'];
          $link = $row['link'];
          $ParentID = $row['MenuItems_id'];

          // Checks if it actually is a parent menu
          if(empty($ParentID)) {
            // Gets all the child menus of this parent menu
            $branch = $menu->fetch_branch($id);
            $count = count($branch);

            // Checks if the parent menu actually have any childs
            if($count >= 1) {
              ?>

              <!-- If it does, it will create a dropdown menu -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?=$name?>
                </a>

                <!-- The dropdown menu -->
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                  <!-- The parent menu -->
                  <li><a class="dropdown-item" href="index.php?page=<?=$link?>"><?=$name?></a></li>

                  <!-- A devider -->
                  <li><hr class="dropdown-divider"></li>

                  <?php

                  // All the child menus
                  foreach($branch as $row) {
                    $branchName = $row['name'];
                    $branchLink = $row['link'];

                    ?>
                    <li><a class="dropdown-item" href="index.php?page=<?=$branchLink?>"><?=$branchName?></a></li>
                    <?php
                  }

                  ?>
                </ul>
              </li>

              <?php
            } elseif ($count < 1) {
              ?>

              <!-- If the parent menu doesn't have any child menus it'll create a normal nav link -->
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php?page=<?=$link?>"><?=$name?></a>
              </li>
              <?php
            } else {
              // error
            }
          }
        }
        ?>
      </ul>
      <a class="btn btn-outline-primary" href="index.php?page=admin">Admin</a>
    </div>
  </div>
</nav>
