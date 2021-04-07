<?php

// TODO: Error handling for the entire page.
// My section object

class Section {

  // Fetch ID of a given page section
  public function fetch_id($pageID) {
    // Declares PDO
    global $pdo;

    // Prepares the query
    $query = $pdo->prepare("SELECT
      section.id FROM section WHERE section.MenuItems_id = ?");

    // Binds the value
    $query->bindValue(1, $pageID);

    // Execute query
    $query->execute();

    // Fetch the row
    $row = $query->fetch();

    // Return the id
    return $row['id'];
  }

  // Fetch all sections related to a page
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

    // Fetch all the content related to a section
    public function fetch_content(int $section_id) {
      global $pdo;

      $query = $pdo->prepare("SELECT
        content.id,
        content.content,
        content.type,
        content.Section_id
        FROM content WHERE content.Section_id = ?");

      $query->bindValue(1, $section_id);
      $query->execute();

      return $query->fetchAll();
    }

    // Fetch a specific section by ID
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


    // Add a section to the database.
    // On a database level the section only contains a template and the page it relates to.
    // Recieves template id and page id
    public function add_section($template_id, $page_id) {
      global $pdo;

      $query = $pdo->prepare("INSERT INTO section (section.Template_id, section.MenuItems_id) VALUES (?, ?)");

      $query->bindValue(1, $template_id);
      $query->bindValue(2, $page_id);

      if($query->execute()) {
        echo "Add section: Success!";
      } else {
        echo "Add section: Failure!";
      }
    }

    // This function adds the content to a given section.
    // So this function recieves the actual content, the type of content, and the section it belongs to
    public function add_content($content, $type, $section_id) {
      global $pdo;

      $query = $pdo->prepare("INSERT INTO content (content.content, content.type, content.Section_id) VALUES (?, ?, ?)");

      $query->bindValue(1, $content);
      $query->bindValue(2, $type);
      $query->bindValue(3, $section_id);

      // TODO: Error handling!
      if($query->execute()) {
        echo "Add content: Success!\n";
      } else {
        echo "Add content: Failure!\n";
      }
    }

    // This function will edit the content of a given portion in a section.
    public function edit_content($content, $content_id) {
      global $pdo;

      $query = $pdo->prepare("UPDATE content SET content.content = ? WHERE content.id = ?");

      $query->bindValue(1, "$content");
      $query->bindValue(2, $content_id);

      if($query->execute()) {
        echo "Edit content: Success!\n";
      } else {
        echo "Edit content: Failure!\n";
      }
    }

    // This function will get the ID for a specific content box.
    public function fetch_contentID($section_id, $type) {
      global $pdo;

      $query = $pdo->prepare("SELECT content.id FROM content WHERE content.Section_id = ? AND content.type = ?");

      $query->bindValue(1, $section_id);
      $query->bindValue(2, $type);

      if($query->execute()) {
        echo "Fetch content id: Success!\n";
        $row = $query->fetch();

        return $row['id'];
      } else {
        echo "Fetch content id: Failure!\n";
      }
    }

  }

?>
