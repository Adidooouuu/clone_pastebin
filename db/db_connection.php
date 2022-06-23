<?php
  include("../config.php");

  // DEFINED DATAS
  $hostname = constant("HOST");
  $username = constant('USER');
  $bdd = constant('DBNAME');
  $pwd = constant('PWD');
  $table = constant('LINK_TABLE');
  $users_table = constant('USERS_TABLE');

  // DB CONNECTION
  try
  {
    $bdd_connection = new PDO(
                                "mysql:host=$hostname; dbname=$bdd",
                                $username,
                                $pwd,
                                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
                              );
                              // [PDO::ATTR_EMULATE_PREPARES, false],
  }
  catch(Exception $e)
  {
    die("Erreur : " . $e->getMessage());
  }

  // PULL DB DATA
    // SHARED LINK
    $table_query = "SELECT * FROM $table";
    $table_statement = $bdd_connection->prepare($table_query);
    $table_statement->execute();
    $table_fetch = $table_statement->fetchAll();

    foreach ($table_fetch as $table_content)
    {
      $stocked_title = $table_content["title"];
      $stocked_content = $table_content["content"];
      $stocked_random_id = $table_content["random_id"];
      $stocked_creation_date = $table_content["creation_date"];
      $stocked_creator_username = $table_content["user_name"];
      $stocked_creator_random_id = $table_content["random_id_user"];
    }

    // USERS
    $users_table_query = "SELECT * FROM $users_table";
    $users_table_statement = $bdd_connection->prepare($users_table_query);
    $users_table_statement->execute();
    $users_table_fetch = $users_table_statement->fetchAll();

    foreach ($users_table_fetch as $user_table_content)
    {
      $stocked_user_name = $user_table_content["username"];
      $stocked_email = $user_table_content["email"];
      $stocked_password = $user_table_content["pwd"];
      $stocked_random_id_user = $user_table_content["random_id_for_user"];
    }
?>
