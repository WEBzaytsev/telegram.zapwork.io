<link rel="stylesheet" href="/css/bootstrap.css">
<link rel="stylesheet" href="/css/style.css">

<?PHP
$img_shadow = "box-shadow: inset 7px 7px 15px " . $_POST['img_shadow_up'] . ", inset -7px -7px 15px " . $_POST['img_shadow_down'] . ";";
$card_color = "box-shadow: 6px 6px 8px " . $_POST['back_shadow_down'] . ", -6px -6px 8px " . $_POST['back_shadow_up'] . ";'";
?>

<div class="form-container" style="background: <?= $_POST['back_color']; ?>;">

  <div class="flex-mini" style="background: <?= $_POST['back_color']; ?>;">
    <div class="card-mini" style="background: <?= $_POST['card_color']; ?>;<?= $card_color; ?>;">

      <section class="center">
        <div class="about_job">
          <h3 style="color: <?= $_POST['text_color']; ?>;"><?= $_POST["title"]; ?></h3>
          <div class="job_desc">
            <p style="color: <?= $_POST['text_color']; ?>;"><?= $_POST["description"]; ?></p>
          </div>
          <?php if ($_POST["price"] != "") { ?>
            <b style="color: <?= $_POST['text_color']; ?>;"><?= $_POST["price"]; ?></b>
          <?php } ?>
        </div>
      </section>

      <section class="job_image">
        <div class="row">
          <div class="col-12">
            <div class="circle_img" style="<?= $img_shadow; ?>; background: <?= $_POST['img_shadow_in']; ?>; margin: 25% <?= $_POST['section_width']; ?>px;">
              <img src="<?= $_POST['img_url']; ?>" alt="">
            </div>
          </div>
          <div class="col-12">
            <span class="span-zap small" <?= $zap_color; ?>>@zapwork</span>
          </div>
        </div>
      </section>

    </div>
  </div>

  <form action="/download" method="POST" target="_blank">
    <input type="text" name="title" value="<?= $_POST['title']; ?>" hidden>
    <input type="text" name="description" value="<?= $_POST['description']; ?>" hidden>
    <input type="text" name="price" value="<?= $_POST['price']; ?>" hidden>
    <input type="text" name="img_url" value="<?= $_POST['img_url']; ?>" hidden>
    <input type="text" name="back_color" value="<?= $_POST['back_color']; ?>" hidden>
    <input type="text" name="card_color" value="<?= $_POST['card_color']; ?>" hidden>
    <input type="text" name="back_shadow_up" value="<?= $_POST['back_shadow_up']; ?>" hidden>
    <input type="text" name="back_shadow_down" value="<?= $_POST['back_shadow_down']; ?>" hidden>
    <input type="text" name="img_shadow_up" value="<?= $_POST['img_shadow_up']; ?>" hidden>
    <input type="text" name="img_shadow_down" value="<?= $_POST['img_shadow_down']; ?>" hidden>
    <input type="text" name="img_shadow_in" value="<?= $_POST['img_shadow_in']; ?>" hidden>
    <input type="text" name="text_color" value="<?= $_POST['text_color']; ?>" hidden>
    <input type="text" name="zap_color" value="<?= $_POST['zap_color']; ?>" hidden>
    <input type="text" name="widthCard" value="<?= $_POST['widthCard']; ?>" hidden>
    <input type="text" name="paddingCard" value="<?= $_POST['paddingCard']; ?>" hidden>
    <input type="text" name="section_width" value="<?= $_POST['section_width']; ?>" hidden>
    <input type="submit" value="Скачать" class="send-buton" style="margin: 20px auto;">
  </form>
</div>