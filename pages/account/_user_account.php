<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_admins WHERE id = '$user_id'");
$user_data = $db->FetchArray();
?>

<?PHP
if ($_POST["admin_add"]) {
  $uid = $_POST["user_id"];
  if ($uid != "") {
    $uname = $_POST["username"];
    if ($uname != "") {
      $db->Query("SELECT id, user_id, username FROM db_admins WHERE user_id = '$uid'");
      if ($db->NumRows() == 0) {
        $db->Query("SELECT id, user_id, username FROM db_admins WHERE username = '$uname'");
        if ($db->NumRows() == 0) {
          $db->Query("INSERT INTO db_admins (user_id, username) VALUE ('$uid', '$uname')");
          echo "<script>
                  Swal.fire({
                    icon: 'success',
                    text: 'Новый администратор успешно добавлен.'
                  })
                </script>";
        } else echo "<script>
                        Swal.fire({
                          icon: 'error',
                          title: 'Ошибка',
                          text: 'Такой логин уже есть в базе данных.'
                        })
                      </script>";
      } else echo "<script>
                    Swal.fire({
                      icon: 'error',
                      title: 'Ошибка',
                      text: 'Такой ID уже есть в базе данных.'
                    })
                  </script>.";
    } else echo "<script>
                  Swal.fire({
                    icon: 'error',
                    title: 'Ошибка',
                    text: 'Логин не может быть пустым.'
                  })
                </script>.";
  } else echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Ошибка',
                  text: 'ID не может быть пустым.'
                })
              </script>.";
}

if ($_POST["admin_del"]) {
  $id = $_POST["id"];
  $db->Query("DELETE FROM db_admins WHERE id = '$id'");
  echo "<script>
          Swal.fire({
            icon: 'success',
            text: 'Администратор успешно удален.'
          })
        </script>";
}

if ($_POST["delete_preset"]) {
  $id = $_POST["id"];
  $db->Query("DELETE FROM db_presets WHERE id = '$id'");
  echo "<script>
          Swal.fire({
            icon: 'success',
            text: 'Пресет успешно удален.'
          })
        </script>";
}

if ($_POST["img_del"] == 1) {
  echo "<script>
          Swal.fire({
            icon: 'success',
            text: 'Изображение успешно удалено.'
          })
        </script>";
}

if ($_POST["img_upload"] == 1) {
  echo "<script>
          Swal.fire({
            icon: 'success',
            text: 'Изображение успешно загружено.'
          })
        </script>";
}
?>

<div class="container mt-3">
  <div class="col-12">
    <div class="form-container" style="padding: 10px 25px; text-align: center;">
      <h2>Здравствуйте, <?= $user_data["username"]; ?>!</h2>
      <a href="/account/exit" class="send-buton">Выйти</a>
    </div>
  </div>
  <div class="col-md-6 col-sm-12">
    <div class="form-container">
      <h3>Удаление изображений</h3>
      <form action="https://telegram.zapwork.io/delete.php" method="get">
        <select multiple="multiple" name="img_url[]">
          <?php
          $directory = "./img/";    // Папка с изображениями
          $allowed_types = array("png");  //разрешеные типы изображений
          $file_parts = array();
          $ext = "";
          $title = "";
          $i = 0;
          //пробуем открыть папку
          $dir_handle = @opendir($directory) or die("Ошибка при открытии папки !!!");
          while ($file = readdir($dir_handle))    //поиск по файлам
          {
            if ($file == "." || $file == "..") continue;  //пропустить ссылки на другие папки
            $file_parts = explode(".", $file);          //разделить имя файла и поместить его в массив
            $ext = strtolower(array_pop($file_parts));   //последний элеменет - это расширение


            if (in_array($ext, $allowed_types)) {
              $value = $directory . $file;
          ?>
              <option data-img-src="<?php echo $directory . $file; ?>" value="<?php echo $directory . $file; ?>">
            <?php
              $i++;
            }
          }
          closedir($dir_handle);  //закрыть папку
            ?>

        </select>
        <input type="submit" class="send-buton" value="Удалить" />
      </form>
    </div>
  </div>
  <div class="col-md-6 col-sm-12">
    <div class="form-container">
      <h3>Загрузить новое изображение</h3>
      <form enctype="multipart/form-data" action="https://telegram.zapwork.io/upload.php" method="POST">
        <div class="fields">
          <div class="title"><input type="file" aria-describedby="file" name="img_file[]" multiple></div>
        </div>
        <input type="submit" class="send-buton" value="Отправить файл" />
      </form>
    </div>
  </div>
  <div class="col-12">
    <div class="form-container">
      <h3>Список администраторов</h3>
      <table id="customers">
        <thead>
          <th>ID</th>
          <th>Логин</th>
          <th>Дата авторизации</th>
          <th>Действие</th>
        </thead>
        <tbody>
          <?PHP
          $db->Query("SELECT * FROM db_admins");
          if ($db->NumRows() > 0) {
            while ($data = $db->FetchArray()) {
          ?>

              <tr>
                <form action="" method="POST">
                  <input type="text" name="id" value="<?= $data['id']; ?>" hidden>
                  <td><?= $data["user_id"]; ?></td>
                  <td><?= $data["username"]; ?></td>
                  <?PHP if ($data["auth_date"] == 0) {
                    echo "<td>Не входил</td>";
                  } else {
                  ?>
                    <td><?= date("d.m В H:i", $data["auth_date"]); ?></td>
                  <?PHP } ?>
                  <td><input type="submit" class="send-buton small" name="admin_del" value="Удалить"></td>
                </form>
              </tr>


          <?PHP }
          } else echo "<tr><td colspan='4'>Нет записей</td></tr>"
          ?>
          <tr>
            <td colspan="4">
              <h4>Добавить нового администратора</h4>
            </td>
          </tr>
          <tr>
            <form action="" method="POST">
              <td><input type="text" name="user_id" placeholder="ID пользователя"></td>
              <td><input type="text" name="username" placeholder="Логин пользователя"></td>
              <td colspan="2"><input type="submit" class="send-buton small" name="admin_add" value="Добавить"></td>
            </form>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-12">
    <div class="form-container">
      <h3>Список пресетов</h3>
      <table id="customers">
        <thead>
          <th>#</th>
          <th>Название</th>
          <th>Дата создания</th>
          <th>Дата последнего изменения</th>
          <th>Действие</th>
        </thead>
        <tbody>
          <?PHP
          $db->Query("SELECT * FROM db_presets");
          if ($db->NumRows() > 0) {
            while ($data = $db->FetchArray()) {
          ?>

              <tr>
                <form action="" method="POST">
                  <input type="text" name="id" value="<?= $data['id']; ?>" hidden>
                  <td><?= $data["id"]; ?></td>
                  <td><?= $data["title"]; ?></td>
                  <td><?= date("d.m В H:i", $data["date_add"]); ?></td>
                  <?PHP if ($data["date_edit"] == 0) {
                    echo "<td>Не редактировался</td>";
                  } else { ?>
                    <td><?= date("d.m В H:i", $data["date_edit"]); ?></td>
                  <?PHP } ?>
                  <td><input type="submit" class="send-buton small" name="delete_preset" value="Удалить"></td>
                </form>
              </tr>


          <?PHP }
          } else echo "<tr><td colspan='4'>Нет пресетов</td></tr>"
          ?>
          <tr>
            <td colspan="5">
              <a href="/account/add_preset" style="color: #000000; font-weight: bold; font-size: 16px;">Создать новый пресет</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  $("select").imagepicker({
    limit: 10,
    limit_reached: function() {
      alert('За 1 раз можно удалить не более 10 изображений')
    }
  })
</script>