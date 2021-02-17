<?php

class Menu {
  public function fetch_parents() {
    global $pdo;

    $query = $pdo->prepare("SELECT menu.id, menu.name, menu.link, menu.MenuItems_id FROM menu WHERE menu.MenuItems_id IS NULL");
    $query->execute();

    return $query->fetchAll();
  }

  public function fetch_all() {
    global $pdo;

    $query = $pdo->prepare("SELECT menu.id, menu.name, menu.link, menu.MenuItems_id FROM menu");
    $query->execute();

    return $query->fetchAll();
  }

  public function fetch_branch($parentID) {
    global $pdo;

    $query = $pdo->prepare("SELECT menu.id, menu.name, menu.link, menu.MenuItems_id FROM menu WHERE menu.MenuItems_id = ?");
    $query->bindValue(1, $parentID);

    $query->execute();

    return $query->fetchAll();
  }
}

?>
