<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  include("../data/treatment/form_treatment.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require("head.php"); ?>
    <title>Recap</title>
  </head>
  <body>
    <div class='container'>
      <div class='recap'>
        <h1 class='main_title'>Recapitulation</h1>
          <p class='shared_text_name'><?php echo 'Name: ' .$link_name; ?></p>
          <p class='shared_text'><?php echo 'Your text content: ' .$text_content; ?></p>
          <p><?php echo 'Random id: ' .$random_id; "<hr>"; ?></p>
          <p>Share your pasted content: </p><a href="<?php echo "$url"; ?>" target="_blank"><?php echo "$url"; ?></a>
      </div>
    </div>
  </body>
</html>
