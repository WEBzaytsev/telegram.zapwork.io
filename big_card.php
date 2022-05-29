<link rel="stylesheet" href="/css/bootstrap.css">
<link rel="stylesheet" href="/css/style.css">

<?php
$back_color = "style='background:" . $_POST['back_color'] . "; width: " . $_POST['widthCard'] . "px; padding: " . $_POST['paddingCard'] . "px 0;'";

$back_shadow_up = $_POST['back_shadow_up'];
$back_shadow_down = $_POST['back_shadow_down'];

$shadow_img_up = $_POST['img_shadow_up'];
$shadow_img_down = $_POST['img_shadow_down'];
$color_img = "background: " . $_POST['img_shadow_in'];

$card_color = "style='background-color:" . $_POST['card_color'] . "; box-shadow: 12px 12px 16px " . $back_shadow_down . ", -12px -12px 16px " . $back_shadow_up . ";'";
$text_color = "style='color:" . $_POST['text_color'] . ";'";
$zap_color = "style='color:" . $_POST['zap_color'] . ";'";
$img_shadow = "box-shadow: inset 7px 7px 15px " . $shadow_img_up . ", inset -7px -7px 15px " . $shadow_img_down . ";";
?>

<div class="flex outline" id="jobcontainer" <?= $back_color; ?>>
  <div class="card" <?= $card_color; ?>>

    <section class="center">
      <div class="about_job">
        <h3 <?= $text_color; ?>><?= $_POST["title"]; ?></h3>
        <div class="job_desc">
          <p <?= $text_color; ?>><?= $_POST["description"]; ?></p>
        </div>
        <?php if ($_POST["price"] != "") { ?>
          <b <?= $text_color; ?>><?= $_POST["price"]; ?> <span <?= $zap_color; ?>>@zapwork</span></b>
        <?php } else { ?>
        <?php } ?>
        <b <?= $text_color; ?>></b>
      </div>
    </section>

    <section class="job_image">
      <div class="row">
        <div class="col-12">
          <div class="circle_img" style="<?= $img_shadow; ?>; <?= $color_img; ?>; margin: 25% <?= $_POST['section_width']; ?>px;">
            <img src="<?= $_POST['img_url']; ?>" alt="">
          </div>
        </div>
        <div class="col-12">
          <span class="span-zap" <?= $zap_color; ?>>@zapwork</span>
        </div>
      </div>
    </section>

  </div>
</div>