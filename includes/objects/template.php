<?php

class Template {

  public function fetch_all() {
    global $pdo;

    $query = $pdo->prepare("SELECT template.id, template.name FROM template");
    $query->execute();

    return $query->fetchAll();
  }

}

 ?>
