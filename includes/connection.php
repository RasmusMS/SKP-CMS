<?php

function db_connect() {
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=cms;charset=utf8', 'root', '');
    return $pdo;
  } catch (PDOException $e) {
    exit('Database error.');
  }
}

?>
