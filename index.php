<?php
  session_start();
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
          echo "
                <h1>Welcome, " .$_SESSION["connect"]["user_name"]. "!</h1>
                <p>
                  It's not you? <a href='pages/log_out.php'>Log out!</a>
                </p>
                ";
        }
        else
        {
          echo "
                <div class='login_options'>
                  <h1>Hello, guest!</h1>
                  <p>
                    <a href='pages/user_login_form.php'>Log in</a>
                     -
                    <a href='pages/user_create_account_form.php'>Create your account</a>
                  </p>
                </div>
               ";
        }
      ?>
    </header>
    <?php
      require("templates/form.php");
    ?>
  </body>
</html>
