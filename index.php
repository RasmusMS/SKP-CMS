<?php

// Starts a session
session_start();

// Requires the header and the page handler in settings.
require_once 'includes/settings.php';
require_once 'includes/header.php';

// Adds a .php to the page variable so it'll be the full filename
$page .= ".php";

// Checks if the page exist
if(file_exists("pages/$page")){
  // If it exists, it'll include the page file.
    include_once "pages/$page";
}
else {
  // Else it'll display a 404, page not found file.
    include_once 'pages/404.php';
}

// Footer
require_once 'includes/footer.php';

?>
