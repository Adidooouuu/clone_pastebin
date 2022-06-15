<?php
  include("../functions/login_treatment.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
  </head>
  <body>
    <div class="container_placement">
      <div class="connection_container">
        <h1 class="form_title">Login to your account</h1>
        <em><span class="required">*</span> = required</em>
        <form class="login_form" action="user_login_form.php" method="post">
          <label for="username" class="account_label">Username <span class="required">*</span> </label>
          <input type="text" name="username" id="username" autocomplete="on" required>

          <label for="password" class="account_label">Password <span class="required">*</span> </label>
          <input type="password" name="password" id="password" autocomplete="current-password" required>

          <input type="submit" value="Login" name="submit">
        </form>
        <?php
          echo $form_check;
        ?>
        <p class="cta">Don't have an account? <a href="user_create_account_form.php">Let's create one!</a></p>
      </div>
    </div>
  </body>
</html>
