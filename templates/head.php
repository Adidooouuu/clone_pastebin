<meta charset="utf-8">
<?php // TODO: faire une boucle foreach avec les noms des dossiers et fichiers ?>
<?php
  $search = "form_treatment.php";
  $my_string = $_SERVER["PHP_SELF"];

  if(preg_match("/{$search}/i", $my_string))
  {
    echo '<link rel="stylesheet" href="../../assets/style/style.css">';
  }
  else
  {
    echo '<link rel="stylesheet" href="assets/style/style.css">';
  }
?>
