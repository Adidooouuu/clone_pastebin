<?php
  include('../data/connection_to_db/db_connection.php');
  // include("../functions/random_id_function.php");

  // PULL FORM DATA
  $username = htmlentities($_POST["username"]);
  $password = htmlentities($_POST["password"]);
?>
