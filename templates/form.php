<div class="container">
  <form class="main_form" action="templates/form_recap.php" method="post">

    <label for="text_content" class="label_textarea">New paste <span class="required">*</span></label>
    <textarea name="text_content" id="text_content" required></textarea>

    <fieldset class="fieldset_options">
      <legend>Optional paste settings <span class="required">*</span></legend>
      <label for="name_of_paste_sharing" class="label_text">Paste name / title: </label>
      <input type="text" name="name_of_paste_sharing" id="name_of_paste_sharing" required>
    </fieldset>

    <input type="submit" value="Create new paste" name="submit">
  </form>
  <aside class="fantom"></aside>
</div>
