<?php

include_once('includes/connection.php');
include_once('includes/objects/menu.php');

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

        foreach($parentMenu as $row) {
          $id = $row['id'];
          $name = $row['name'];
          $link = $row['link'];
          $ParentID = $row['MenuItems_id'];

          if(empty($ParentID)) {
            $branch = $menu->fetch_branch($id);
            $count = count($branch);

            if($count >= 1) {
              ?>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?=$name?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="index.php?page=<?=$link?>"><?=$name?></a></li>
                  <li><hr class="dropdown-divider"></li>

                  <?php

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
