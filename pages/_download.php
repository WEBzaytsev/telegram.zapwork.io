<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title>Генератор превьюшек для телеграм</title>
  <link rel="stylesheet" href="/assets/css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script>
</head>

<body style="min-width: 1280px;">

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

  <div class="flex" id="jobcontainer" <?= $back_color; ?>>
    <div class="card" <?= $card_color; ?>>

      <section class="center">
        <div class="about_job">
          <h3 <?= $text_color; ?>><?= $_POST["title"]; ?></h3>
          <div class="job_desc">
            <p <?= $text_color; ?>><?= $_POST["description"]; ?></p>
          </div>
          <?php if ($_POST["price"] != "") { ?>
            <b <?= $text_color; ?>><?= $_POST["price"]; ?></b>
          <?php } ?>
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

  <div class="container mx-auto mt-3">
    <div class="col-md-10 col-sm-12"><button id="demo" class="send-buton downloadpng" onclick="downloadpng()" style="margin: auto;"> Скачать изображение</button></div>
    <div class="col-md-2 col-sm-12">
      <div class="switch-btn" title="Показать/Скрыть область превью"></div>
    </div>

  </div>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

<script>
  function downloadpng() {

    var node = document.getElementById('jobcontainer');

    domtoimage.toPng(node)
      .then(function(dataUrl) {
        var img = new Image();
        img.src = dataUrl;
        downloadURI(dataUrl, "records.png")
      })
      .catch(function(error) {
        console.error('oops, something went wrong!', error);
      });

  }


  function downloadURI(uri, name) {
    var link = document.createElement("a");
    link.download = name;
    link.href = uri;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    delete link;
  }
</script>

<script>
  $('.switch-btn').click(function() {
    $(this).toggleClass('switch-on');
    $('#jobcontainer').addClass('outline');
    if ($(this).hasClass('switch-on')) {
      $(this).trigger('on.switch');
    } else {
      $(this).trigger('off.switch');
      $('#jobcontainer').removeClass('outline');
    }
  });
</script>

</html>