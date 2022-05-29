<script src="/js/form_edit.js"></script>

<div class="container mt-3 mb-3">
  <div class="form-container" style="margin: auto;text-align: center;">
    <h2>Добавление нового пресета</h2>
  </div>
</div>

<?PHP
if ($_POST["save"]) {
  $title = $_POST["title"];
  $back_color = $_POST["back_color"];
  $card_color = $_POST["card_color"];
  $back_shadow_up = $_POST["back_shadow_up"];
  $back_shadow_down = $_POST["back_shadow_down"];
  $img_shadow_up = $_POST["img_shadow_up"];
  $img_shadow_down = $_POST["img_shadow_down"];
  $img_shadow_in = $_POST["img_shadow_in"];
  $text_color = $_POST["text_color"];
  $zap_color = $_POST["zap_color"];
  $width = $_POST["widthCard"];
  $padding = $_POST["paddingCard"];
  $section_width = $_POST["section_width"];
  $date_add = time();
  $db->Query("INSERT INTO db_presets (title, back_color, card_color, back_shadow_up, back_shadow_down, img_shadow_up, img_shadow_down, img_shadow_in, text_color, zap_color, width, padding, section_width, date_add, date_edit) VALUE ('$title', '$back_color','$card_color','$back_shadow_up','$back_shadow_down','$img_shadow_up','$img_shadow_down','$img_shadow_in','$text_color','$zap_color','$width','$padding','$section_width','$date_add', '0')");
  echo "<h2 style='text-align: center;'>Пресет добавлен</h2>";
}
?>

<form method="post" id="ajax_form" action="">
  <div class="container mt-3">
    <div class="fields mt-3">
      <div class="shadow">
        <div class="row">
          <div class="col-5" style="margin: auto;text-align: center;"><label for="back_color">Название</label></div>
          <div class="col-7"><input type="text" name="title" minlength="6" maxlength="50" required>
          </div>
        </div>
      </div>
      <div class="shadow">
        <div class="row">
          <div class="col-5" style="margin: auto;text-align: center;"><label for="back_color">Цвет фона</label></div>
          <div class="col-7"><input type="text" name="back_color" id="back_color" value="#ebecf0" onchange="circle(this, 'back_color', 'btn-back_color');" />
            <button class="btn-color" id="btn-back_color" style="background: #ebecf0;">
              <input type="color" value="#ebecf0" onchange="circle(this, 'back_color', 'btn-back_color');" style="opacity: 0;">
            </button>
          </div>
        </div>
      </div>
      <div class="shadow">
        <div class="row">
          <div class="col-5" style="margin: auto;text-align: center;"><label for="card_color">Цвет карточки</label></div>
          <div class="col-7"><input type="text" name="card_color" id="card_color" value="#ebecf0" onchange="circle(this, 'card_color', 'btn-card_color');" />
            <button class="btn-color" id="btn-card_color" style="background: #ebecf0;">
              <input type="color" value="#ebecf0" onchange="circle(this, 'card_color', 'btn-card_color');" style="opacity: 0;">
            </button>
          </div>
        </div>
      </div>
      <div class="shadow">
        <div class="row">
          <div class="col-5" style="margin: auto;text-align: center;"><label for="back_shadow_up">Цвет тени карточки сверху</label></div>
          <div class="col-7"><input type="text" name="back_shadow_up" id="back_shadow_up" value="#ffffff" onchange="circle(this, 'back_shadow_up', 'btn-back_shadow_up');" />
            <button class="btn-color" id="btn-back_shadow_up" style="background: #ffffff;">
              <input type="color" value="#ffffff" onchange="circle(this, 'back_shadow_up', 'btn-back_shadow_up');" style="opacity: 0;">
            </button>
          </div>
        </div>
      </div>
      <div class="shadow">
        <div class="row">
          <div class="col-5" style="margin: auto;text-align: center;"><label for="back_shadow_down">Цвет тени карточки снизу</label></div>
          <div class="col-7"><input type="text" name="back_shadow_down" id="back_shadow_down" value="#c8c9cc" onchange="circle(this, 'back_shadow_down', 'btn-back_shadow_down');" />
            <button class="btn-color" id="btn-back_shadow_down" style="background: #c8c9cc;">
              <input type="color" value="#c8c9cc" onchange="circle(this, 'back_shadow_down', 'btn-back_shadow_down');" style="opacity: 0;">
            </button>
          </div>
        </div>
      </div>
      <div class="shadow">
        <div class="row">
          <div class="col-5" style="margin: auto;text-align: center;"><label for="img_shadow_up">Цвет тени изображения сверху</label></div>
          <div class="col-7"><input type="text" name="img_shadow_up" id="img_shadow_up" value="#c8c9cc" onchange="circle(this, 'img_shadow_up', 'btn-img_shadow_up');" />
            <button class="btn-color" id="btn-img_shadow_up" style="background: #c8c9cc;">
              <input type="color" value="#c8c9cc" onchange="circle(this, 'img_shadow_up', 'btn-img_shadow_up');" style="opacity: 0;">
            </button>
          </div>
        </div>
      </div>
      <div class="shadow">
        <div class="row">
          <div class="col-5" style="margin: auto;text-align: center;"><label for="img_shadow_up">Цвет тени изображения снизу</label></div>
          <div class="col-7"><input type="text" name="img_shadow_down" id="img_shadow_down" value="#ffffff" onchange="circle(this, 'img_shadow_down', 'btn-img_shadow_down');" />
            <button class="btn-color" id="btn-img_shadow_down" style="background: #ffffff;">
              <input type="color" value="#ffffff" onchange="circle(this, 'img_shadow_down', 'btn-img_shadow_down');" style="opacity: 0;">
            </button>
          </div>
        </div>
      </div>
      <div class="shadow">
        <div class="row">
          <div class="col-5" style="margin: auto;text-align: center;"><label for="img_shadow_in">Цвет внутри изображения</label></div>
          <div class="col-7"><input type="text" name="img_shadow_in" id="img_shadow_in" value="#ebecf0" onchange=" circle(this, 'img_shadow_in' , 'btn-img_shadow_in' );" />
            <button class="btn-color" id="btn-img_shadow_in" style="background: #ebecf0;">
              <input type="color" value="#ebecf0" onchange="circle(this, 'img_shadow_in', 'btn-img_shadow_in');" style="opacity: 0;">
            </button>
          </div>
        </div>
      </div>
      <div class="shadow">
        <div class="row">
          <div class="col-5" style="margin: auto;text-align: center;"><label for="text_color">Цвет текста</label></div>
          <div class="col-7"><input type="text" name="text_color" id="text_color" value="#292b34" onchange="circle(this, 'text_color', 'btn-text_color');" />
            <button class="btn-color" id="btn-text_color" style="background: #292b34;">
              <input type="color" value="#292b34" onchange="circle(this, 'text_color', 'btn-text_color');" style="opacity: 0;">
            </button>
          </div>
        </div>
      </div>
      <div class="shadow">
        <div class="row">
          <div class="col-5" style="margin: auto;text-align: center;"><label for="zap_color">Цвет @zapwork</label></div>
          <div class="col-7"><input type="text" name="zap_color" id="zap_color" value="#585e72" onchange="circle(this, 'zap_color', 'btn-zap_color');" />
            <button class="btn-color" id="btn-zap_color" style="background: #585e72;">
              <input type="color" value="#585e72" onchange="circle(this, 'zap_color', 'btn-zap_color');" style="opacity: 0;">
            </button>
          </div>
        </div>
      </div>
      <div class="shadow">
        <p title="Размер карточки - фиксированный. Имеется в виду отступы по бокам.">Размер превью по ширине</p>
        <div class="row">
          <div class="col-8">
            <input type="range" name="widthCard" min="1200" max="1400" step="10" value="1300" onchange="updateTextInput(this.value);" style="width:100%;">
          </div>
          <div class="col-4"><input type="text" id="textInput" value="1300px" style="width:100%;" disabled></div>
        </div>
        <p>Отступы по высоте</p>
        <div class="row">
          <div class="col-8">
            <input type="range" name="paddingCard" min="0" max="200" step="10" value="150" onchange="updateTextInput2(this.value);" style="width:100%;">
          </div>
          <div class="col-4"><input type="text" id="textInput2" value="50px" style="width:100%;" disabled></div>
        </div>
        <p>Отступ изображения</p>
        <div class="row">
          <div class="col-8">
            <input type="range" name="section_width" id="section_width" min="-30" max="35" step="1" value="0" onchange="updateTextInput3(this.value);" style="width:100%;">
          </div>
          <div class="col-4"><input type="text" id="textInput3" value="0px" style="width:100%;" disabled></div>
        </div>
      </div>
      <div class="switch-btn" title="Показать/Скрыть область превью" style="display: flex; margin: 20px auto;"></div>
      <input type="submit" class="send-buton" name="save" value="Сохранить">
    </div>
  </div>
  <input type="button" id="btn" class="send-buton" value="Сгенерировать" hidden>

  <div class="container mt-3" style="justify-content: center;">
    <div id="result_form">Сделайте любое изменение, чтобы открыть превью</div>
  </div>
  <p style="margin-top: 30px; height: 60px;"></p>

</form>

<script>
  $(function() {
    $('form :input').change(function(e) {
      $("#btn").click();
    });
  });

  function circle(val, input, btn) {
    $('#' + input).val(val.value);
    $('#' + btn).css("background", val.value);
  }

  function updateTextInput(val) {
    document.getElementById('textInput').value = val + "px";
  }

  function updateTextInput2(val) {
    document.getElementById('textInput2').value = val + "px";
  }

  function updateTextInput3(val) {
    document.getElementById('textInput3').value = val + "px";
  }

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