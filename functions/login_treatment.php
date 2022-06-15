<?php

  session_start();

  include('../db/db_connection.php');
  include("random_id_function.php");

  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $form_check = "";
  $welcome = "";

  // PULL FORM DATA
  if ($users_table_fetch)
  {
    if (!empty($_POST['username']) && !empty($_POST['password']))
    {
      $user_name = htmlentities($_POST["username"]);
      $password = htmlentities($_POST["password"]);

      if (($user_name == $stocked_user_name) && (password_verify($password, $stocked_password)))
      {
        $_SESSION =
  			[
          // "shared_links" =>
  				// [
  				// 	"link_name" => [],
  				// 	"text_content" => [],
  				// 	"random_id" => []
  				// ],
  				"connect" =>
  				[
  					"user_name" => $user_name = $stocked_user_name,
  					"password" => $password = $stocked_password
  				]
  			];

        $_SESSION["Auth_OK"] = true;

        $welcome = "Welcome, " .$_SESSION["user_name"]. "!";

        header("Location: ../index.php");
        exit;
      }
      else
      {
        $form_check = "<p class='error'>Username and/or password not found.</p>";
        $_SESSION["Auth_OK"] = false;
        return false;
      }
    }
  }
?>
