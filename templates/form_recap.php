<?php
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
    <title>Recap</title>
  </head>
  <body>
    <div class="container">
      <div class="recap">
        <h1 class="main_title">Recapitulation</h1>
          <p class="shared_text_name"><?php echo "Name: " .$link_name; ?></p>
          <p class="shared_text"><?php echo "Your text content: " .$text_content; ?></p>
          <p><?php echo "Random id: " .$random_id; "<hr>"; ?></p>
          <p>Share your pasted content: </p><a href="<?php echo "$url"; ?>" target="_blank"><?php echo "$url"; ?></a>
      </div>
    </div>
  </body>
</html>
