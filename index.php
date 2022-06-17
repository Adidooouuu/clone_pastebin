<?php
  session_start();
  var_dump($_SESSION);
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/style/style.css">
    <title>Accueil</title>
  </head>
  <body>
    <header class="login_options">
      <?php
        if (@$_SESSION["Auth_OK"] == true)
        {
      ?>
          <h1>Welcome, <?php echo $_SESSION["username"]; ?>!</h1>
          <p>
            <a href="pages/profile.php?id=<?php echo $_SESSION["user_random_id"]; ?>">Check your profile</a>
          </p>
          <p>
            It's not you? <a href='pages/log_out.php'>Log out!</a>
          </p>
      <?php
        }
        else
        {
      ?>
          <h1>Hello, guest!</h1>
          <p>
            <a href='pages/user_login_form.php'>Log in</a>
             -
            <a href='pages/user_create_account_form.php'>Create your account</a>
          </p>
      <?php
        }
      ?>
    </header>
    <?php
      require("templates/form.php");
    ?>
  </body>
</html>
