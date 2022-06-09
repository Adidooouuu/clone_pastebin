<meta charset="utf-8">
<?php // TODO: faire une boucle foreach avec les noms des dossiers et fichiers et qui rajouterait automatiquement un "../" à chaque sous-dossier scanné en fonction de s'il s'y trouve un fichier php ou html, ce qui permettrait de de nouveau atteindre la racine et de repartir sur assets etc (aucune idée de si je suis claire)?>
<?php
  $search = "form";
  $my_string = $_SERVER["PHP_SELF"];

  if(preg_match("/{$search}/i", $my_string))
  {
    echo '<link rel="stylesheet" href="../assets/style/style.css">';
  }
  else
  {
    echo '<link rel="stylesheet" href="assets/style/style.css">';
  }
?>
