<?php
  include("../data/treatment/form_treatment.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require("../templates/head.php"); ?>
    <title><?php echo $stocked_random_id; ?></title>
  </head>
  <body>
      <h1><?php echo $stocked_title; ?></h1>
      <span><?php echo $stocked_creation_date; ?></span>
      <div class="content">
        <p><?php echo $stocked_content; ?></p>
      </div>
  </body>
</html>
