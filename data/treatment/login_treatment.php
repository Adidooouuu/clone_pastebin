<?php
  $welcome = "";

  // PULL FORM DATA
  if (!empty($_POST['username']) && !empty($_POST['password']))
  {
    $username = htmlentities($_POST["username"]);
    $password = htmlentities($_POST["password"]);

    if (password_verify($password, $stocked_password))
    {
      $welcome = "Welcome, " .$stocked_user_name. "!";
    }
  }
// TODO : à finir c'est cassé c'est normal
?>
