<?php

class Section {

  public function fetch_page($pageID) {
    global $pdo;

    $query = $pdo->prepare("SELECT
      section.id,
      section.Template_id,
      section.MenuItems_id
      FROM section WHERE section.MenuItems_id = ?");

      $query->bindValue(1, $pageID);
      $query->execute();

      return $query->fetchAll();
    }

    public function fetch_content($pageID) {
      global $pdo;

      $query = $pdo->prepare("SELECT
        content.id,
        content.content,
        content.type,
        content.Section_id
        FROM content WHERE content.Section_id = ?");

      $query->bindValue(1, $pageID);
      $query->execute();

      return $query->fetchAll();
    }

    public function fetch_one($sectionID) {
      global $pdo;

      $query = $pdo->prepare("SELECT
        section.id,
        section.content,
        section.MenuItems_id
        FROM section WHERE section.id = ?");

        $query->bindValue(1, $sectionID);
        $query->execute();

        return $query->fetchAll();
      }

    }

?>
