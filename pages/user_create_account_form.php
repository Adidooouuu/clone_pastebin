<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require("../templates/head.php"); ?>
    <title>Create your new account</title>
  </head>
  <body>
    <div class="container_placement">
      <div class="connection_container">
        <h1 class="form_title">Create your account</h1>
        <form class="create_account_form" action="user_login_form.php" method="post">

          <label for="username" class="account_label">Username <span class="required">*</span> (max-length : 20 characters)</label>
          <input type="text" name="username" autocomplete="on" required>

          <label for="email" class="account_label">Email <span class="required">*</span> </label>
          <input type="email" name="email" autocomplete="email" required>

          <label for="password" class="account_label">Password <span class="required">*</span> </label>
          <input type="password" name="password" autocomplete="new-password" required>

          <label for="password_check" class="account_label">Confirm password <span class="required">*</span> </label>
          <input type="password" name="password_check" autocomplete="off" required>

          <input type="submit" value="Create" name="submit">
        </form>
        <p class="cta">Already have an account? <a href="user_login_form.php">Login to your account</a></p>
      </div>
    </div>
  </body>
</html>
