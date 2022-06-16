<?php
  session_start();
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  include("../functions/form_treatment.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recap'</title>
  </head>
  <body>
    <div class="container">
      <div class="recap">
        <header class="recap_titles">
          <h1 class="main_title">Recapitulation</h1>
          <hr>
          <h2 class="shared_text_name"><?php echo "Name: " .$link_name; ?></h2>
          <?php
            if (@$_SESSION["Auth_OK"] == true)
            {
              echo "<em class='creator_username'>By ".$_SESSION['connect']['user_name']."</em>";
            }
            else
            {
              echo "<em class='creator_username'>By Guest</em>";
            }
          ?>
        </header>
        <section class="text_content">
          <h2 class="title">Your text content:</h2>
          <div class="shared_text">
            <?php echo $text_content; ?>
          </div>
        </section>
        <hr>
        <section class="link">
          <h2 class="title">Share it now!</h2>
          <a href="<?php echo "$url"; ?>" target="_blank"><?php echo "$url"; ?></a>
        </section>
        <?php
          if (@$_SESSION["Auth_OK"] == true)
          {
            echo "<p>No need to save this link: it is stocked in your profile.</p>";
          }
          else
          {
            echo "<p>Don't forget to save this link! <a href='../pages/user_create_account_form.php'>Create an account</a> if you want to save them all in one place.</p>";
          }
        ?>
        <p>Want to create another sharing link? <a href="../index.php">Back home</a></p>
      </div>
    </div>
  </body>
</html>
