<?php
  include("../db/db_connection.php");
  include("random_id_function.php");

  if (isset($_POST['submit']))
  {
    // PULL FORM DATA
    $link_name = htmlspecialchars($_POST["name_of_paste_sharing"]);
    $text_content = htmlspecialchars($_POST["text_content"]);

    // URL WITH RANDOM ID
    $random_id = genererChaineAleatoire(5). + time();
    $url = "../shared_pages/$random_id.php";

    // ADD DATA TO DB ; USER IS LOGGED IN = ADD ITS ID, ELSE IT STAYS NULL
    if (@$_SESSION["Auth_OK"] == true)
    {
      $table_add_query = "INSERT INTO shared_link (title, content, random_id, user_name, random_id_user) VALUES (:link_name, :text_content, :random_id, :user_name, :user_random_id)";
      $insert_new_content = $bdd_connection->prepare($table_add_query);
      $insert_new_content->execute(
                                    [
                                      "link_name" => $link_name,
                                      "text_content" => $text_content,
                                      "random_id" => $random_id,
                                      "user_name" => $_SESSION["connect"]["user_name"],
                                      "user_random_id" => $_SESSION["connect"]["random_id"],
                                    ]
                                  );
    }
    else
    {
      $table_add_query = "INSERT INTO shared_link (title, content, random_id) VALUES (:link_name, :text_content, :random_id)";
      $insert_new_content = $bdd_connection->prepare($table_add_query);
      $insert_new_content->execute(
                                    [
                                      "link_name" => $link_name,
                                      "text_content" => $text_content,
                                      "random_id" => $random_id,
                                    ]
                                  );
    }

    // CREATES A DYNAMIC PAGE WITH RANDOM ID AS ITS NAME & APPENDS TEMPLATE
    $shared_page = fopen($url, "w") or die ("Can't create this file.");
    $form_treated_path = "../templates/form_treated.php";
    copy($form_treated_path, $url);
  }
?>
