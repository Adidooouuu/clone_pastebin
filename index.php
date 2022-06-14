<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  // include('config.php');
  include("data/treatment/login_treatment.php");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require("templates/head.php"); ?>
    <title>Accueil</title>
  </head>
  <body>
    <?php
      echo $welcome;
      require("templates/form.php");
    ?>
  </body>
</html>
