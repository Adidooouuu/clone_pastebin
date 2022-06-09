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
    ?>
      <p><?php echo $table_content['title']; ?></p>
      <p><?php echo $table_content['content']; ?></p>
      <p><?php echo $table_content['random_id']; ?></p>
      <p><?php echo $table_content['creation_date']; ?></p>
    <?php
  }
?>
