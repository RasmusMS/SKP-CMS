<?php

// I haven't really made any designs for this page

include_once('includes/connection.php');

// Checks if logged in
if (isset($_SESSION['logged_in'])) {
  ?>

  <a href="index.php" id="logo">CMS</a>

  <br />

  <!-- Temporary links for admin pages -->
  <ol>
    <li><a href="index.php?page=add">Add Page</a></li>
    <li><a href="index.php?page=edit">Edit Page</a></li>
    <li><a href="handlers/logout.php">Logout</a></li>
  </ol>

  <?php
} else {

  // If user exist, log in.
  if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if (empty($username) or empty($password)) {
      $error = 'All fields are required!';
    } else {

      // Prepares query
      $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

      // Bind values
      $query->bindValue(1, $username);
      $query->bindValue(2, $password);

      // Execute query
      $query->execute();

      // Get rowcount
      $num = $query->rowCount();

      if ($num == 1) {
        // user entered correct details
        $_SESSION['logged_in'] = true;
        header('Location: index.php?page=admin');
        exit();
      } else {
        // user entered false details
        $error = 'Incorrect details';
      }
    }
  }

  require_once('pages/login.php');

}

?>
