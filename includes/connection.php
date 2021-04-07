<?php

// Creating a PDO connection to the database.
try {
  $pdo = new PDO('mysql:host=localhost;dbname=cms;charset=utf8', 'root', '');
} catch (PDOException $e) {
  exit('Database error.');
}

// TODO: FIX THIS

?>
