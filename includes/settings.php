<?php

// This is basically a page handler. $page will contain the current page

// Getting page from GET or POST.
// If page isn't defined it'll default to form page.
$page = $_GET['page'] ?? $_POST['page'] ?? 'home';

?>
