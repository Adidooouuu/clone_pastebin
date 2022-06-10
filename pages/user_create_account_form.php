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
        <form class="create_account_form" action="index.php" method="post">

          <label for="username" class="account_label">Username (max-length : 20 characters) <span class="required">*</span> </label>
          <input type="text" name="username" required>

          <label for="email" class="account_label">Email <span class="required">*</span> </label>
          <input type="email" name="email" required>

          <label for="password" class="account_label">Password <span class="required">*</span> </label>
          <input type="password" name="password" required>

          <label for="confirm_password" class="account_label">Confirm password <span class="required">*</span> </label>
          <input type="password" name="confirm_password" required>

          <input type="submit" value="Login" name="submit">
        </form>
        <p class="cta">Already have an account? <a href="user_login_form.php">Login to your account</a></p>
      </div>
    </div>
  </body>
</html>
