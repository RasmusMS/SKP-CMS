<?php

session_start();

include_once('includes/connection.php');
$pdo = db_connect();

if (isset($_SESSION['logged_in'])) {
  ?>

  <a href="index.php" id="logo">CMS</a>

  <br />

  <?php
} else {

  header("Location: index.php?page=admin");

}

?>
