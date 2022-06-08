<?php
  // DEFINED DATAS
  $hostname = constant("HOST");
  $username = constant('USER');
  $bdd = constant('DBNAME');
  $pwd = constant('PWD');
  $table = constant('LINK_TABLE');

  // DB CONNECTION
  $connect = mysqli_connect($hostname, $username, $pwd);
  mysqli_select_db($connect, $bdd);

  if(!$connect)
  {
    die('Could not Connect MySql Server:' .mysql_error());
  }
?>
