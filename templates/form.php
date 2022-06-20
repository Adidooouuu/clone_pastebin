<div class="container">
  <form class="main_form" action="templates/form_recap.php" method="post">

    <label for="text_content" class="label_textarea">New paste <span class="required">*</span></label>
    <textarea name="text_content" id="text_content" required>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </textarea>

    <fieldset class="fieldset_options">
      <legend>Optional paste settings <span class="required">*</span></legend>
      <label for="name_of_paste_sharing" class="label_text">Paste name / title: </label>
      <input type="text" name="name_of_paste_sharing" id="name_of_paste_sharing" value="test_title" required>
    </fieldset>

    <input type="submit" value="Create new paste" name="submit">
  </form>
  <aside class="fantom"></aside>
</div>
