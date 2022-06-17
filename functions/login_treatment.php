<?php
session_start();
  var_dump($_SESSION);

  include('../db/db_connection.php');
  include("random_id_function.php");

  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $form_check = "";

  if (isset($_POST['submit']))
  {
    // PULL FORM DATA
    $user_name = htmlentities($_POST["username"]);
    $email = htmlentities($_POST["email"]);
    $password = htmlentities($_POST["password"]);
    if (!empty($user_name) && !empty($email) && !empty($password))
    {
      // CHECKS IF THE USERNAME IS IN THE DB, IF YES CREATES THE SESSION
      $requser_query = "SELECT * FROM $users_table WHERE username = ? AND email = ?;";
      $requser = $bdd_connection->prepare($requser_query);
      $requser->execute(array($user_name, $email));
      $userexist = $requser->rowCount();
      if (password_verify($password, $stocked_password))
      {
        if ($userexist == 1)
        {
          $userinfo = $requser->fetch();
          $_SESSION["username"] = $userinfo["username"];
          $_SESSION["user_random_id"] = $userinfo["random_id_for_user"];
          $_SESSION["Auth_OK"] = true;

          header("Location: ../index.php");
          exit;
        }
        else
        {
          $form_check = "<p class='error'>Wrong identifiers.</p>";
          return false;
        }
      }
      else
      {
        $form_check = "<p class='error'>Wrong identifiers.</p>";
        return false;
      }
    }
    else
    {
      $form_check = "<p class='error'>Please fill all the required fields.</p>";
      return false;
    }
  }
?>
