<?php
  include('../db/db_connection.php');

  $form_check = "";

  if ((isset($_GET["id"])) && (strlen($_GET["id"]) === 15) && (@$_SESSION["Auth_OK"] == true))
  {
    $requser_query = "SELECT * FROM $users_table WHERE random_id_for_user = ?;";
    $requser = $bdd_connection->prepare($requser_query);
    $requser->execute(array($_GET["id"]));
    $userinfo = $requser->fetch();


    if ((isset($_SESSION["user_random_id"])) && (isset($_POST["submit"])))
    {
      $new_username = htmlspecialchars($_POST["new_username"]);
      $new_email = htmlspecialchars($_POST["new_email"]);
      $new_password = htmlspecialchars($_POST["new_password"]);

      if ((!empty($new_username)) || (!empty($new_email)) || (!empty($new_password)))
      {
        if ((!empty($new_username)) && ($new_username != $userinfo["username"]))
        {
          $reqpseudo = $bdd_connection->prepare("SELECT * FROM $users_table WHERE username = ?;");
          $reqpseudo->execute(array($new_username));
          $pseudoexist = $reqpseudo->rowCount();

          if ($pseudoexist === 1)
          {
            $form_check = "<p class='error'>Username already used. Try some others!</p>";
            return false;
          }
          else if ((strlen($new_username) < 3) || (strlen($new_username) > 20))
          {
            $form_check = "<p class='error'>Username must be between 3 and 20 characters.</p>";
            return false;
          }
          else
          {
            $users_table_add_query = "UPDATE $users_table SET username = ? WHERE random_id_for_user = ?;";
            $users_table_insert_new_content = $bdd_connection->prepare($users_table_add_query);
            $users_table_insert_new_content->execute(array($new_username, $_SESSION["user_random_id"]));

            $_SESSION["username"] = $new_username;
          }
        }

        if ((!empty($new_email)) && ($new_email != $userinfo["email"]) && (filter_var($new_email, FILTER_VALIDATE_EMAIL)))
        {
          $reqmail = $bdd_connection->prepare("SELECT * FROM $users_table WHERE email = ?;");
          $reqmail->execute(array($new_email));
          $mailexist = $reqmail->rowCount();

          if ($mailexist === 1)
          {
            $form_check = "<p class='error'>Email address already used. Try some others!</p>";
            return false;
          }
          else if (!filter_var($new_email, FILTER_VALIDATE_EMAIL))
          {
            $form_check = "<p class='error'>Please provide a valid email address.</p>";
            return false;
          }
          else
          {
            $users_table_add_query = "UPDATE $users_table SET email = ? WHERE random_id_for_user = ?;";
            $users_table_insert_new_content = $bdd_connection->prepare($users_table_add_query);
            $users_table_insert_new_content->execute(array($new_email, $_SESSION["user_random_id"]));
          }
        }

        if (!empty($new_password))
        {
          $new_password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);

          $users_table_add_query = "UPDATE $users_table SET password = ? WHERE random_id_for_user = ?;";
          $users_table_insert_new_content = $bdd_connection->prepare($users_table_add_query);
          $users_table_insert_new_content->execute(array($new_password, $_SESSION["user_random_id"]));
        }

        $new_username = "";
        $new_email = "";
        $new_password = "";
        header("Refresh:0");
        $form_check = "<p class = 'valid'>Infos modified!</p>";
      }
      else
      {
        return false;
      }
    }
  }
  else
  {
    header("Location: ../index.php");
    exit;
  }
?>
