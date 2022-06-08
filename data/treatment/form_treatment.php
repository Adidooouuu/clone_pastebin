<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  include_once('../../config.php');
  include('../connection_to_db/db_connection.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php require("../../templates/head.php"); ?>
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
        // PULL FORM DATA
        $link_name = htmlentities($_POST["name_of_paste_sharing"]);
        $text_content = htmlentities($_POST["text_content"]);

        // URL WITH RANDOM ID
        $random_id = genererChaineAleatoire(5). + time();
        $url = constant("WEBSITE") .$_SERVER["PHP_SELF"]. "/" .$random_id;

        $sql = "INSERT INTO shared_link (title, content, random_id) VALUES ('$link_name','$text_content','$random_id')";

        if (mysqli_query($connect, $sql))
        {
          echo "Your paste is available.";
        }
        else
        {
          echo "Error: " . $sql . ":-" . mysqli_error($connect);
        }
        mysqli_close($connect);
      }
        // PULL DB DATA
        $query = "SELECT * FROM $table";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_all($result);

        echo "<pre>";
        print_r($row);
        echo "</pre>";
    ?>

    <div class="container">
      <div class="recap">
        <h1 class="main_title">Recapitulation</h1>
        <p class="shared_text_name"><?php echo "Name: " .$link_name; ?></p>
        <p class="shared_text"><?php echo "Your text content: " .$text_content; ?></p>
        <p class="shared_url"><?php echo "Your URL: " .$url; ?></p>
      </div>
    </div>
  </body>
</html>
