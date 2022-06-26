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
    <title><?php if (isset($_GET["s"]) && (strlen($_GET["s"]) === 15)){ echo $_GET["s"]; } else { header("Location: ../index.php"); exit; } ?></title>
  </head>
  <body>
    <?php
      if (isset($_GET["s"]) && (strlen($_GET["s"]) === 15))
      {
        $reqlink_query = "SELECT * FROM $links_table WHERE random_id = ?;";
        $reqlink = $bdd_connection->prepare($reqlink_query);
        $reqlink->execute(array($_GET["s"]));
        $linkinfo = $reqlink->fetch();
      }
      else
      {
        header("Location: ../index.php");
        exit;
      }
    ?>

    <h1><?php echo $linkinfo["title"]; ?></h1>
    <em>Shared by: <?php echo $linkinfo["user_name"] ?></em>
    <b>Created at: <?php echo $linkinfo["creation_date"] ?></b>
    <p><?php echo $linkinfo["content"] ?></p>
  </body>
</html>
