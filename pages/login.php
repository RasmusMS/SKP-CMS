<a href="index.php" id="logo">CMS</a>

<br /><br />

<?php if (isset($error)) { ?>
  <small style="color:#aa0000;">
    <?php echo $error; ?>
  </small>
  <br /><br />
<?php } ?>

<form action="index.php?page=admin" method="post" autocomplete="off">
  <input type="text" name="username" placeholder="Username" />
  <input type="password" name="password" placeholder="Password" />
  <input type="submit" value="Login" />
</form>
