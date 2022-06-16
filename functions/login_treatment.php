<?php
session_start();
  var_dump($_SESSION);

  include('../db/db_connection.php');
  include("random_id_function.php");

  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $form_check = "";
  $welcome = "";

  // PULL FORM DATA
  if (isset($_POST['submit']))
  {
    $user_name = htmlentities($_POST["username"]);
    $password = htmlentities($_POST["password"]);
    if (!empty($user_name) OR !empty($password))
    {
      if (password_verify($password, $stocked_password))
      {
        $requser_query = "SELECT * FROM users WHERE username = ? AND pwd = ?";
        $requser = $bdd_connection->prepare($requser_query);
        $requser->execute(array($user_name, $password));
        $userexist = $requser->rowCount();

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
          $form_check = "<p class='error'>Wrong username or password.</p>";
          return false;
        }
      }
      // if (($user_name == $stocked_user_name) && (password_verify($password, $stocked_password)))
      // {
      //   $_SESSION =
  		// 	[
      //     // "shared_links" =>
  		// 		// [
  		// 		// 	"link_name" => [],
  		// 		// 	"text_content" => [],
  		// 		// 	"random_id" => []
  		// 		// ],
      //
  		// 		"connect" =>
  		// 		[
  		// 			"user_name" => $user_name = $stocked_user_name,
      //       "random_id" => $random_id_user = $stocked_random_id_user
  		// 		]
  		// 	];
      //
      //   $_SESSION["Auth_OK"] = true;
      //
      //   $welcome = "Welcome, " .$_SESSION["user_name"]. "!";
      //
      //   header("Location: ../index.php");
      //   exit;
      // }
      // else
      // {
      //   $form_check = "<p class='error'>Username and/or password not found.</p>";
      //   $_SESSION["Auth_OK"] = false;
      //   echo $user_name;
      //   echo $random_id_user;
      //   echo $stocked_user_name;
      //   echo $stocked_random_id_user;
      //   return false;
      // }
    }
    else
    {
      $form_check = "<p class='error'>Please fill all the required fields.</p>";
      return false;
    }
  }
?>
