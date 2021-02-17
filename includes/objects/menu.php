<?php

class Menu {
  public function fetch_parents() {
    global $pdo;

    $query = "SELECT menu.id, menu.name, menu.MenuItems_id FROM menu WHERE MenuItems_id IS NULL";
    $data = $pdo->query($query);

    return $data->fetchAll();
  }

  public function fetch_all() {
    global $pdo;

    $query = $pdo->prepare("SELECT menu.id, menu.name, menu.MenuItems_id FROM menu");
    $query->execute();

    return $query->fetchAll();
  }
}

?>
