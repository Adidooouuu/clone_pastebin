<?php
  include("../functions/form_treatment.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $stocked_title; ?></title>
  </head>
  <body>
      <h1><?php echo $stocked_title; ?></h1>
      <p>By <?php echo $stocked_creator_username; ?></p>
      <span><?php echo $stocked_creation_date; ?></span>
      <div class="content">
        <p><?php echo $stocked_content; ?></p>
      </div>
  </body>
</html>
