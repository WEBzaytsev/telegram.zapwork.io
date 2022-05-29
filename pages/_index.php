<script src="/js/form.js"></script>
<form method="post" id="ajax_form" action="">
  <div class="container mt-3">
    <div class="row" style="width: 100%;">
      <div class="col-md-6 col-sm-12">
        <div class="form-container">
          <h2>Заполните форму</h2>
          <div class="fields">
            <div class="title"><input type="text" name="title" placeholder="Заголовок" autocomplete="off"></div>
            <div class="description"><textarea name="description" placeholder="Описание" maxlength="280" autocomplete="off"></textarea></div>
            <div class="price"><input type="text" name="price" placeholder="Зарплата" autocomplete="off"></div>
          </div>
        </div>
        <div class="form-container dark">
          <h2>Стилизация формы</h2>
          <h4>Готовый набор стилей</h4>

          <?PHP
          $db->Query("SELECT * FROM db_presets");
          if ($db->NumRows() > 0) {
            while ($data = $db->FetchArray()) {
          ?>

              <input type="button" onclick="setStyle(<?= $data['id']; ?>, '<?= $data['back_color']; ?>', '<?= $data['card_color']; ?>', '<?= $data['back_shadow_up']; ?>', '<?= $data['back_shadow_down']; ?>', '<?= $data['img_shadow_up']; ?>', '<?= $data['img_shadow_down']; ?>', '<?= $data['img_shadow_in']; ?>', '<?= $data['text_color']; ?>', '<?= $data['zap_color']; ?>', '<?= $data['width']; ?>', '<?= $data['padding']; ?>', '<?= $data['section_width']; ?>')" id="btn-<?= $data['id']; ?>" class="send-buton small" value="<?= $data['title']; ?>">

          <?PHP }
          } else echo "Нет пресетов</tr>"
          ?>

          <div class="fields mt-3">
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
                <div class="col-7"><input type="text" name="back_shadow_up" id="back_shadow_up" value="#c8c9cc" onchange="circle(this, 'back_shadow_up', 'btn-back_shadow_up');" />
                  <button class="btn-color" id="btn-back_shadow_up" style="background: #c8c9cc;">
                    <input type="color" value="#ebecf0" onchange="circle(this, 'back_shadow_up', 'btn-back_shadow_up');" style="opacity: 0;">
                  </button>
                </div>
              </div>
            </div>
            <div class="shadow">
              <div class="row">
                <div class="col-5" style="margin: auto;text-align: center;"><label for="back_shadow_down">Цвет тени карточки снизу</label></div>
                <div class="col-7"><input type="text" name="back_shadow_down" id="back_shadow_down" value="#ffffff" onchange="circle(this, 'back_shadow_down', 'btn-back_shadow_down');" />
                  <button class="btn-color" id="btn-back_shadow_down" style="background: #ffffff;">
                    <input type="color" value="#ffffff" onchange="circle(this, 'back_shadow_down', 'btn-back_shadow_down');" style="opacity: 0;">
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
          </div>
        </div>
        <input type="button" id="btn" class="send-buton" value="Сгенерировать" hidden>
      </div>
      <div class="col-md-6 col-sm-12">

        <div class="form-container">
          <h2>Выбор изображения</h2>
          <div id="image_picker"></div>
        </div>

        <div id="result_form">Сделайте любое изменение, чтобы открыть превью</div>

        <div class="form-container">
          <p title="Размер карточки - фиксированный. Имеется в виду отступы по бокам.">Размер превью по ширине</p>
          <div class="row">
            <div class="col-8">
              <input type="range" name="widthCard" id="widthCard" min="1200" max="1400" step="10" value="1300" onchange="updateTextInput(this.value);" style="width:100%;">
            </div>
            <div class="col-4"><input type="text" id="textInput" value="1300px" style="width:100%;" disabled></div>
          </div>
          <p>Отступы по высоте</p>
          <div class="row">
            <div class="col-8">
              <input type="range" name="paddingCard" id="paddingCard" min="0" max="200" step="10" value="150" onchange="updateTextInput2(this.value);" style="width:100%;">
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
      </div>
    </div>
  </div>
</form>

<script>
  $(function() {
    $('form :input').change(function(e) {
      $("#btn").click();
    });
  });
</script>

<script>
  function updateTextInput(val) {
    document.getElementById('textInput').value = val + "px";
  }

  function updateTextInput2(val) {
    document.getElementById('textInput2').value = val + "px";
  }

  function updateTextInput3(val) {
    document.getElementById('textInput3').value = val + "px";
  }

  function circle(val, input, btn) {
    $('#' + input).val(val.value);
    $('#' + btn).css("background", val.value);
  }
</script>

<script>
  function setStyle(id, back_color, card_color, back_shadow_up, back_shadow_down, img_shadow_up, img_shadow_down, img_shadow_in, text_color, zap_color, width, padding, section_width) {
    $("#back_color").val(back_color);
    $("#btn-back_color").css("background", back_color);
    $("#card_color").val(card_color);
    $("#btn-card_color").css("background", card_color);
    $("#back_shadow_up").val(back_shadow_up);
    $("#btn-back_shadow_up").css("background", back_shadow_up);
    $("#back_shadow_down").val(back_shadow_down);
    $("#btn-back_shadow_down").css("background", back_shadow_down);
    $("#img_shadow_up").val(img_shadow_up);
    $("#btn-img_shadow_up").css("background", img_shadow_up);
    $("#img_shadow_down").val(img_shadow_down);
    $("#btn-img_shadow_down").css("background", img_shadow_down);
    $("#img_shadow_in").val(img_shadow_in);
    $("#btn-img_shadow_in").css("background", img_shadow_in);
    $("#text_color").val(text_color);
    $("#btn-text_color").css("background", text_color);
    $("#zap_color").val(zap_color);
    $("#btn-zap_color").css("background", zap_color);
    $("#widthCard").val(width);
    $("#textInput").val(width + "px");
    $("#paddingCard").val(padding);
    $("#textInput2").val(padding + "px");
    $("#section_width").val(section_width);
    $("#textInput3").val(section_width + "px");

    $("input[type=button]").removeClass("active");
    $("#btn-" + id).addClass("active");
    $("#btn").click();
  }
</script>

<script>
  // lazyload
  $(document).ready(function() {
    $('#image_picker').load('img_list.php');
  });
</script>