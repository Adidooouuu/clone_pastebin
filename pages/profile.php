<?php
  session_start();
  include("../functions/show_and_modify_profile_treatment.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $userinfo["username"]. "'s profile" ?></title>
  </head>
  <body>
    <?php
    if (($userinfo["random_id_for_user"] == $_SESSION["user_random_id"]) && ($_SESSION["Auth_OK"] == true))
    {
    ?>
      <header class="account_infos">
      <h1>Your profile</h1>
      <h2>Overview</h2>
        <ul>
          <li>Username: <?php echo $userinfo["username"]; ?></li>
          <li>Email address: <?php echo $userinfo["email"]; ?></li>
        </ul>
        <p class="cta">
          <a href="../index.php">Back home</a>
          <a href="log_out.php">Log out</a>
        </p>
      </header>
      <div class="modify_infos_container">
        <form class="modify_infos_form" action="" method="post">
          <h2 class="form_title">Modify your infos</h2>
          <label for="new_username">New username: </label>
          <input type="text" name="new_username" id="new_username" autocomplete="on" value="<?php if(isset($new_username)){echo $new_username;} ?>">

          <label for="new_email">New email: </label>
          <input type="email" name="new_email" id="new_email" autocomplete="email" value="<?php if(isset($new_email)){echo $new_email;} ?>">

          <label for="new_password">New password: </label>
          <input type="password" name="new_password" id="new_password" autocomplete="off" value="<?php if(isset($new_password)){echo $new_password;} ?>">
          <?php
            echo $form_check;
          ?>
          <input type="submit" name="submit" value="Modify">
        </form>

        <?php
          if ()
          {
        ?>
        <?php
          }
          else
          {
            echo "No recent links. Create one <a href='../index.php'>right here!</a>";
          }
        ?>
      <?php
        }
        else
        {
          header("Location: ../index.php");
          exit;
        }
      ?>
    </div>
  </body>
</html>
