<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  include('../../config.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php require("../../templates/head.html"); ?>
    <title>Recap</title>
  </head>
  <body>
    <?php
      function genererChaineAleatoire($longueur = 10)
      {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurMax = strlen($caracteres);
        $chaineAleatoire = '';
        for ($i = 0; $i < $longueur; $i++)
        {
          $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        return $chaineAleatoire;
      }

      if (isset( $_POST['submit']))
      {
        $text_content = htmlentities($_POST["text_content"]);
        $link_name = htmlentities($_POST["name_of_paste_sharing"]);

        $validation = "Your paste has been posted.";

        $random_id = genererChaineAleatoire(5). + time();

        $url = constant("WEBSITE") .$_SERVER["PHP_SELF"]. "/" .$random_id;
      }
    ?>

    <div class="container">
      <div class="recap">
        <span class="validation_message"><?php echo $validation; ?></span>
        <h1 class="main_title">Recapitulation</h1>
        <p class="shared_text_name"><?php echo "Name: " .$link_name; ?></p>
        <p class="shared_text"><?php echo "Your text content: " .$text_content; ?></p>
        <p class="sharing_url"><?php echo "Your sharing URL: " .$url ?></p>
      </div>
    </div>
  </body>
</html>
