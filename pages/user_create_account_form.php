<?php
  include("../functions/create_account_treatment.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create your new account</title>
  </head>
  <body>
    <div class="container_placement">
      <div class="connection_container">
        <h1 class="form_title">Create your account</h1>
        <em><span class="required">*</span> = required</em>
        <form class="create_account_form" action="user_create_account_form.php" method="post">

          <label for="username" class="account_label">Username <span class="required">*</span> (max-length : 20 characters)</label>
          <input type="text" name="username" id="username" autocomplete="on" value="<?php if(isset($user_name)){echo $user_name;} ?>" required>

          <label for="email" class="account_label">Email <span class="required">*</span> </label>
          <input type="email" name="email" id="email" autocomplete="email" value="<?php if(isset($email)){echo $email;} ?>" required>

          <label for="password" class="account_label">Password <span class="required">*</span> </label>
          <input type="password" name="password" id="password" autocomplete="new-password" required>

          <label for="password_check" class="account_label">Confirm password <span class="required">*</span> </label>
          <input type="password" name="password_check" id="password_check" autocomplete="off" required>

          <?php
            if (!empty($_POST['password']) && !empty($_POST['password_check']))
            {
              echo $pw_check;
            }
          ?>
          <input type='submit' value='Create' name='submit'>
          <?php
            echo $form_check;
          ?>
          <p class="back_home">
            <a href="../index.php">Back home</a>
          </p>
      </div>
    </div>
  </body>
</html>
