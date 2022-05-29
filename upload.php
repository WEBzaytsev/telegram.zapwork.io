<?php
$target_dir = 'img/';

if (isset($_FILES['img_file']['name'])) {

  $total_files = count($_FILES['img_file']['name']);

  for ($key = 0; $key < $total_files; $key++) {

    if (isset($_FILES['img_file']['name'][$key]) && $_FILES['img_file']['size'][$key] > 0) {
      $original_filename = $_FILES['img_file']['name'][$key];
      $target = $target_dir . basename($original_filename);
      $tmp  = $_FILES['img_file']['tmp_name'][$key];
      move_uploaded_file($tmp, $target);
?>

      <form action="https://telegram.zapwork.io/account" method="post">
        <input type="submit" name="img_upload" id="btn" value="1" hidden>
      </form>

<?PHP
    }
  }
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $("#btn").click();
  });
</script>