<?php
  include('../config.php');
  // DEFINED DATAS
  $hostname = constant("HOST");
  $username = constant('USER');
  $bdd = constant('DBNAME');
  $pwd = constant('PWD');
  $table = constant('LINK_TABLE');

  // DB CONNECTION
  try
  {
    $bdd_connection = new PDO(
                                "mysql:host=$hostname; dbname=$bdd",
                                $username,
                                $pwd,
                                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
                              );
  }
  catch(Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }

  // PULL DB DATA
  $table_query = "SELECT * FROM $table";
  $table_statement = $bdd_connection->prepare($table_query);
  $table_statement->execute();
  $table_fetch = $table_statement->fetchAll();

  foreach ($table_fetch as $table_content)
  {
      $stocked_title = $table_content['title'];
      $stocked_content = $table_content['content'];
      $stocked_random_id = $table_content['random_id'];
      $stocked_creation_date = $table_content['creation_date'];
  }
?>
