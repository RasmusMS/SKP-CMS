<?php

//session_start();

include_once('includes/connection.php');
include_once('includes/edit-templates.php');
include_once('includes/objects/menu.php');
include_once('includes/objects/section.php');

// Initiating classes I'll use in this file.
$menu = new Menu;
$section = new Section;

$allMenus = $menu->fetch_all();

// Checking if logged in
if (isset($_SESSION['logged_in'])) {
  ?>

  <!-- Form used to edit the pages-->
  <form class="form" method="post" enctype="multipart/form-data" id="form">

    <!-- First we select the page we want to edit -->
    <label for="menuItem">Page: </label>
    <select class="form-control" id="menuItem" name="menuItem" onchange="this.form.submit()">
      <option value="0" selected disabled>Vælg</option>
      <?php

      // Looping through all the pages.
      foreach($allMenus as $item) {
        $id = $item['id'];
        $name = $item['name'];
        $link = $item['link'];

        echo "<option value='$id'>$name</option>";
      }
      ?>
    </select>
    <?php

    // Getting the selected page.
    if(isset($_POST['menuItem'])) {
      $menuItem = $_POST['menuItem'];
      echo "<br/>";
      echo "Selected menu is => ".$menuItem;

      $_SESSION['pageID'] = $_POST['menuItem'];

      tpl_edit($menuItem);

    }

    ?>

    <!-- Submit button to edit the page -->
    <div class="justify-content-center">
      <button class="btn btn-sm btn-outline-success" onclick="changeAction()">
        Edit
      </button>
    </div>
  </form>

  <br />

  <?php
} else {

  header("Location: index.php?page=admin");

}

?>


<script>

// For some reason I never made a javascript file so I have repetitive functions.

// Same function as in the add.php file
function fileUpload() {

  let fileID = arguments[0];

  document.getElementById(fileID).click();

}

// Same function as in the add.php file
function showImg() {
  let imgID = arguments[0];
  let fileID = arguments[1];

  const preview = document.getElementById(imgID);
  const file = document.getElementById(fileID).files[0];
  const reader = new FileReader();

  reader.addEventListener("load", function () {
    // convert image file to base64 string
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}

// Same function as in the add.php file
function changeAction() {

  var myForm = document.getElementById('form');
  myForm.action = "handlers/edit-page.php";

}

</script>
