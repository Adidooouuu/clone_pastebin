<?php
  $requserlinks_query = "SELECT * FROM $links_table WHERE random_id_user = ?;";
  $requserlinks = $bdd_connection->prepare($requserlinks_query);
  $requserlinks->execute(array($_GET["id"]));
?>
