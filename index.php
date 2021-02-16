<?php

require_once 'includes/settings.php';
require_once 'includes/header.php';

// Getting the current page and displaying it.
// If page cannot be found it'll display 404 page.
$page .= ".php";

if(file_exists("pages/$page")){
    include_once "pages/$page";
}
else {
    include_once 'pages/404.php';
}

// Footer
require_once 'includes/footer.php';

?>
