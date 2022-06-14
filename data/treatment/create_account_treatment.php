<?php
  include('../data/connection_to_db/db_connection.php');
  include("../functions/random_id_function.php");

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

  $form_check = "";
  $pw_check = "";

  // PULL FORM DATA
  if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_check']))
  {
    $user_name = htmlentities($_POST["username"]);
    $email = htmlentities($_POST["email"]);
    $password = htmlentities($_POST["password"]);
    $password_check = htmlentities($_POST["password_check"]);
  }

  if (isset($_POST['submit']))
  {
    if ($users_table_fetch)
    {
      if (($user_name == $stocked_user_name) || ($email == $stocked_email))
      {
        $form_check = "<p class='error'>Username and/or email address already used. Try some others!</p>";
        return false;
      }
    }

    if ($password_check == $password)
    {
      // HASHES THE PASSWORD
      $password = password_hash(htmlentities($_POST["password"]), PASSWORD_DEFAULT);

      // CREATE UNIQUE ID FOR THE USER
      $random_id_user = genererChaineAleatoire(5). + time();

      // ADD DATA TO DB
      $users_table_add_query = "INSERT INTO users (username, email, pwd, random_id_for_user) VALUES (:user_name, :email, :password, :random_id_user)";
      $users_table_insert_new_content = $bdd_connection->prepare($users_table_add_query);
      $users_table_insert_new_content->execute(
                                    [
                                      "user_name" => $user_name,
                                      "email" => $email,
                                      "password" => $password,
                                      "random_id_user" => $random_id_user,
                                    ]
                                  );

      if ($users_table_insert_new_content)
      {
        $form_check = "</form><p class = 'valid'>Account created! <a href='user_login_form.php'>Let's log in.</a></p>";
      }
    }
    else
    {
      $pw_check = "<p class='error'>Passwords aren't matching.</p>";
      $form_check = "   </form>
                        <p class='cta'>Already have an account? <a href='user_login_form.php'>Let's log in!</a></p>";
      return false;
    }
  }
  else
  {
    $form_check = "   </form>
                      <p class='cta'>Already have an account? <a href='user_login_form.php'>Let's log in!</a></p>";
  }
?>
