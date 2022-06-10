<?php
  include('../data/connection_to_db/db_connection.php');
  include("../functions/random_id_function.php");

    error_reporting(E_ALL);
    ini_set("display_errors", 1);


  // PULL FORM DATA
  if (isset($_POST['submit']))
  {
    $user_name = htmlentities($_POST["username"]);
    $email = htmlentities($_POST["email"]);
    $password = htmlentities($_POST["password"]);
    $password_check = htmlentities($_POST["password_check"]);

    // CREATE UNIQUE ID FOR THE USER
    $random_id_user = genererChaineAleatoire(5). + time();

    // ADD DATA TO DB
    $users_table_add_query = "INSERT INTO users (username, email, pwd, random_id_for_user) VALUES (:user_name, :email, :password, :random_id_user)";
    $users_table_insert_new_content = $bdd_connection->prepare($users_table_add_query);
    $users_table_insert_new_content->execute(
                                  [
                                    "user_name" => $user_name,
                                    "email" => $email,
                                    "password" => $password,
                                    "random_id_user" => $random_id_user,
                                  ]
                                );
  }
?>
