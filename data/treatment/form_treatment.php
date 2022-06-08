<?php
  include('../connection_to_db/db_connection.php');

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
    // $url = constant("WEBSITE") .$_SERVER["PHP_SELF"]. "+" .$random_id;

    // AD DATA TO DB
    $table_add_query = "INSERT INTO shared_link (title, content, random_id) VALUES (:link_name, :text_content, :random_id)";
    $insert_new_content = $bdd_connection->prepare($table_add_query);
    $insert_new_content->execute(
                                  [
                                    "link_name" => $link_name,
                                    "text_content" => $text_content,
                                    "random_id" => $random_id,
                                  ]
                                );
    header("Location: ../../templates/form_treated.php");
  }
?>
