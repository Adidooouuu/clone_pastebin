<?php
  include('../data/connection_to_db/db_connection.php');

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
    $url = "../shared_pages/$random_id.php";

    // ADD DATA TO DB
    $table_add_query = "INSERT INTO shared_link (title, content, random_id) VALUES (:link_name, :text_content, :random_id)";
    $insert_new_content = $bdd_connection->prepare($table_add_query);
    $insert_new_content->execute(
                                  [
                                    "link_name" => $link_name,
                                    "text_content" => $text_content,
                                    "random_id" => $random_id,
                                  ]
                                );

    // CREATES A DYNAMIC PAGE WITH RANDOM ID AS ITS NAME & APPENDS TEMPLATE
    $shared_page = fopen($url, "w") or die ("Can't create this file.");
    // $shared_page = fopen("../templates/form_treated.php", "a") or die ("Can't append this content !");
    $shared_page = fopen("form_treated.php", "a") or die ("Can't append this content !");
  }
?>
