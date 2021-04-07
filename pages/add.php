<?php

//session_start();

include_once('includes/connection.php');
include_once('includes/add-templates.php');
include_once('includes/objects/menu.php');
include_once('includes/objects/template.php');

// Instantiating the classes I'll use in this file.
$menu = new Menu;
$parentMenus = $menu->fetch_parents();

$template = new Template;
$allTemplates = $template->fetch_all();

// If loop to check if logged in
if (isset($_SESSION['logged_in'])) {

  ?>

  <br />

<!-- Form for creating page -->
  <form class="form" action='index.php?page=add' method="post" enctype="multipart/form-data" id="form">
    <div class="row mx-3 mb-3">

      <!-- Name of the menu tab -->
      <div class="justify-content-center mb-3">
        <label for="menuName">Menu navn:</label>
        <input type="text" id="menuName" name="menuName" value="<?php if(isset($_POST['menuName'])) { echo $_POST['menuName']; }?>" class="form-control" />
      </div>

      <!-- Name for the link -->
      <div class="justify-content-center mb-3">
        <label for="menuLink">Link navn (Ingen mellemrum):</label>
        <input type="text" id="menuLink" name="menuLink" value="<?php if(isset($_POST['menuLink'])) { echo $_POST['menuLink']; }?>" class="form-control" />
      </div>

      <!-- Select menu to choose if its a child of a menu or its own parent menu -->
      <div class="justify-content-center mb-3">
        <label for="menuType">Vælg menupunkt</label>
        <select class="form-control" id="menuType" name="menuType">
          <option selected disabled>Vælg</option>
          <option value="0">Nyt menupunkt</option>
          <?php

          // Getting all the current parent menus
          foreach($parentMenus as $row) {
            $id = $row['id'];
            $name = $row['name'];

            echo "<option value='$id'>$name</option>";
          }

          ?>
        </select>
      </div>

      <!-- Choosing an initial template for the page -->
      <div class="justify-content-center">
        <label for="template">Vælg template</label>
        <select class="form-control" id="template" name="template" onchange="this.form.submit()">
          <option selected disabled>Vælg</option>
          <?php

          // Getting all the template options
          foreach($allTemplates as $row) {
            $id = $row['id'];
            $name = $row['name'];

            echo "<option value='$id'>$name</option>";
          }

          ?>
        </select>
      </div>
    </div>

    <!--
    Here I'm showcasing the template chosen.
    The template also functions as a form so you'll be adding the content here aswell.
    Its not currently supported but the idea is that you'll be able to add more than one template
    -->
    <div id="sections">
      <?php
      if(isset($_POST['template'])) {
        $template_id = $_POST['template'];

        $_SESSION['template_id'] = $template_id;

        tpl_add($template_id);
      }
      ?>
    </div>

    <!-- Button to add another template -->
    <div class="row justify-content-center">
      <a class="btn btn-sm btn-outline-success" id="addTemplates" style="width: 100px;">
        Tilføj sektion
      </a>
    </div>

    <!-- Button to add everything on the current edited page -->
    <div class="justify-content-center">
      <button class="btn btn-sm btn-outline-success" onclick="changeAction()">
        Opret
      </button>
    </div>
  </form>

  <?php

} else {

  header("Location: index.php?page=admin");

}

?>

<script type="text/javascript">

// I tried fiddeling with some jQuery and ajax here to support more than one template per page
$(document).ready(function(){
  $("#addTemplates").click(function(){

    $.ajax({
      type: 'POST',
      url: 'includes/featurette.php',
      success: function(data) {
        alert(data);
      }
    });

  });
});

// This is the function I use to make it possible to add the preview version of a template.
// When you chose a template it'll refresh the form with the template added.
// Then when you submit the page it'll change the action for the same function to work with a new action.
function changeAction() {

  var myForm = document.getElementById('form');
  myForm.action = "handlers/create-menu.php";

}

// This function is used to make the images work as buttons.
// So when an image is pressed, it'll open a file upload popup.
function fileUpload() {

  let fileID = arguments[0];

  document.getElementById(fileID).click();

}

// This is how I preview an image without uploading it.
// So when an image is uploaded it'll show in the image box.
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

</script>
