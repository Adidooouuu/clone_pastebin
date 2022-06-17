<?php
  include('../db/db_connection.php');

if (isset($_GET["id"]))
{
  $requser_query = "SELECT * FROM $users_table WHERE random_id_for_user = ?;";
  $requser = $bdd_connection->prepare($requser_query);
  $requser->execute(array($_GET["id"]));
  $userinfo = $requser->fetch();

  $form_check = "";

  if (isset($_POST["submit"]))
  {
    $new_username = htmlentities($_POST["new_username"]);
    $new_email = htmlentities($_POST["new_email"]);
    $new_password = htmlentities($_POST["new_password"]);
    if (!empty($new_username) || !empty($new_email) || !empty($new_password))
    {
      if (!empty($new_username))
      {
        if ((strlen($new_username) < 3) || (strlen($new_username) > 20))
        {
          $form_check = "<p class='error'>Username must be between 3 and 20 characters.</p>";
          return false;
        }
        else
        {
          $users_table_add_query = "INSERT INTO $users_table (username) VALUES (?);";
          $users_table_insert_new_content = $bdd_connection->prepare($users_table_add_query);
          $users_table_insert_new_content->execute(array($new_username));

          $form_check = "<p class = 'valid'>Username modified!</p>";
          // NON FONCTIONNEL (normal)
        }
      }
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
