<?php

// TODO: Error handling for the entire page
// This is my Menu object. Also know as page object.

class Menu {

  // Function to fetch all the parent menu tabs / pages
  public function fetch_parents() {
    // Declares PDO
    global $pdo;

    // Prepares query
    $query = $pdo->prepare("SELECT menu.id, menu.name, menu.link, menu.MenuItems_id FROM menu WHERE menu.MenuItems_id IS NULL");

    // Execute query
    $query->execute();

    // Return the result
    return $query->fetchAll();
  }

  // Function to get all menu tabs / pages, both parent and child.
  public function fetch_all() {
    global $pdo;

    $query = $pdo->prepare("SELECT menu.id, menu.name, menu.link, menu.MenuItems_id FROM menu");
    $query->execute();

    return $query->fetchAll();
  }

  // Fetch all child menu tabs / pages related to the parent menu specified.
  public function fetch_branch($parentID) {
    global $pdo;

    $query = $pdo->prepare("SELECT menu.id, menu.name, menu.link, menu.MenuItems_id FROM menu WHERE menu.MenuItems_id = ?");
    $query->bindValue(1, $parentID);

    $query->execute();

    return $query->fetchAll();
  }

  // Fetch ID for a given page / menu. Recieves the menu name
  public function fetch_id($name) {
    global $pdo;

    $query = $pdo->prepare("SELECT menu.id FROM menu WHERE menu.name = ?");
    $query->bindValue(1, $name);

    if($query->execute()) {
      echo "Select Menu ID: Success!";
    } else {
      echo "Select Menu ID: Failure!";
    }

    $row = $query->fetch();
    return $row['id'];
  }

  // Function to add a submenu. Recieves a name, the link name and the ID of its parent menu
  public function add_submenu($name, $link, $parentID) {
    global $pdo;

    $query = $pdo->prepare("INSERT INTO menu (menu.name, menu.link, menu.MenuItems_id) VALUES (?, ?, ?)");

    $query->bindValue(1, $name);
    $query->bindValue(2, $link);
    $query->bindValue(3, $parentID);

    $query->execute();
  }

  // Function to add a parent menu. Recieves name and link name. Parent id will be NULL in the database.
  public function add_branch($name, $link) {
    global $pdo;

    $query = $pdo->prepare("INSERT INTO menu (menu.name, menu.link) VALUES (?, ?)");

    $query->bindValue(1, $name);
    $query->bindValue(2, $link);

    $query->execute();
  }
}

?>
