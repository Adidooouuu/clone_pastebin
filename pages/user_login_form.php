<?php
  include("../data/treatment/create_account_treatment.php");
  include("../data/treatment/login_treatment.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require("../templates/head.php"); ?>
    <title>Login</title>
  </head>
  <body>
    <div class="container_placement">
      <div class="connection_container">
        <h1 class="form_title">Login to your account</h1>
        <em><span class="required">*</span> = required</em>
        <form class="login_form" action="../index.php" method="post">
          <label for="username" class="account_label">Username <span class="required">*</span> </label>
          <input type="text" name="username" id="username" autocomplete="on" required>

          <label for="password" class="account_label">Password <span class="required">*</span> </label>
          <input type="password" name="password" id="password" autocomplete="current-password" required>

          <input type="submit" value="Login" name="submit">
        </form>
        <p class="cta">Don't have an account? <a href="user_create_account_form.php">Let's create one!</a></p>
      </div>
    </div>
  </body>
</html>
