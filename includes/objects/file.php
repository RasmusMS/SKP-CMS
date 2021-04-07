<?php

// My file object. This contains my functions directly related to file handling

class File {

  // This will create the file
  function file_create($file, $fileTmp) {
    $target_dir = null;
    $target_file = null;
    $fileType = null;
    $path = "../uploads/";

    // Checks if it recieves a file
    if (isset($file)) {

      // Specifies the file path
      $target_dir = $path;
      $target_file = $target_dir . basename($file);

      // Gets file type
      $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      // Checks if file type is allowed
      if ($fileType != "jpg" && $fileType != "jpeg"
        && $fileType != "png" && $fileType != "pdf") {
          throw new Exception("Error: Filetype not accepted!");
      } else {
        // If correct file type, file is uploaded.
        move_uploaded_file($fileTmp, $target_file);
        return basename($file);
      }
    }
  }

  // Function for deleting a file
  function file_delete($name) {
    $path = "../uploads/" . $name;

    // Checks if file exist
    if(file_exists($path)) {
      // If it exists it will be deleted
      unlink($path);
    } else {
      echo "File does not exist!\n";
      echo "<br/>";
    }
  }

}

?>
