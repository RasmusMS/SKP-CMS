<?php

// This is my template object. All functions directly related to template handling will go here.

class Template {

  // This function will fetch all the different templates created.
  public function fetch_all() {
    global $pdo;

    $query = $pdo->prepare("SELECT template.id, template.name FROM template");
    $query->execute();

    return $query->fetchAll();
  }

}

 ?>
