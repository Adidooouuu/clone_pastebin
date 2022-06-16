<?php
  include('../db/db_connection.php');
  include("random_id_function.php");

  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $form_check = "";
  $pw_check = "";

  // PULL FORM DATA
  if (isset($_POST['submit']))
  {
    $user_name = htmlentities($_POST["username"]);
    $email = htmlentities($_POST["email"]);
    $password = htmlentities($_POST["password"]);
    $password_check = htmlentities($_POST["password_check"]);

    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_check']))
    {
        // CHECKS THE USERNAME'S LENGTH
        if ((strlen($user_name) < 3) || (strlen($user_name) > 20))
        {
          $form_check = "<p class='error'>Username must be between 3 and 20 characters.</p>";
          return false;
        }
        else
        {
          if ($password_check == $password)
          {
            // HASHES THE PASSWORD
            $password = password_hash(htmlentities($_POST["password"]), PASSWORD_DEFAULT);

            if (filter_var($email, FILTER_VALIDATE_EMAIL))
            {
              $reqmail = $bdd_connection->prepare("SELECT * FROM $users_table WHERE email = ?");
              $reqmail->execute(array($email));
              $mailexist = $reqmail->rowCount();

              $reqpseudo = $bdd_connection->prepare("SELECT * FROM $users_table WHERE username = ?");
              $reqpseudo->execute(array($username));
              $pseudoexist = $reqpseudo->rowCount();

              if (($mailexist == 0) && ($pseudoexist == 0))
              {
                // CREATES UNIQUE ID FOR THE USER
                $random_id_user = genererChaineAleatoire(5). + time();

                // INSERTS DATA TO THE TABLE USERS
                $users_table_add_query = "INSERT INTO users (username, email, pwd, random_id_for_user) VALUES (?, ?, ?, ?)";
                $users_table_insert_new_content = $bdd_connection->prepare($users_table_add_query);
                $users_table_insert_new_content->execute(array($user_name, $email, $password, $random_id_user));

                $form_check = "</form><p class = 'valid'>Account created! <a href='user_login_form.php'>Let's log in.</a></p>";
              }
              else
              {
                $form_check = "<p class='error'>Username and/or email address already used. Try some others!</p>";
                return false;
              }
            }
            else
            {
              $form_check = "<p class='error'>Please provide a valid email address.</p>";
              return false;
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
    }
    else
    {
      $form_check = "<p class='error'>Please fill all the required fields.</p>";
      return false;
    }
  }
  else
  {
    $form_check = "   </form>
                      <p class='cta'>Already have an account? <a href='user_login_form.php'>Let's log in!</a></p>";
  }
?>
