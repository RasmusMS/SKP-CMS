<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=cms;charset=utf8', 'root', '');
} catch (PDOException $e) {
  exit('Database error.');
}

?>
