<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Генератор превью для Telegram</title>
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/image-picker.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/image-picker/0.3.1/image-picker.min.js" integrity="sha512-76tAVeQq8wkwtFWzKPU03XJGMF/mcLDeBgi9wIlRICXdkLNUYVBiOL3O/R9Bold+u0eN0OUftCcBTjFkchPyBg==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
  <style>
    #telegram-login-zapwork_auth_bot {
      margin: auto;
    }
  </style>
  <?PHP

  # Автоподгрузка классов
  function __autoload($name)
  {
    include("classes/_class." . $name . ".php");
  }

  # Класс конфига 
  $config = new config;

  # Функции
  $func = new func;

  # База данных
  $db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);

  if ($_GET["id"]) {
    $uid = $_GET["id"];
    $uname = $_GET["username"];
    $db->Query("SELECT id, user_id, username FROM db_admins WHERE user_id = '$uid'");
    if ($db->NumRows() == 0) {
      $db->Query("SELECT id, user_id, username FROM db_admins WHERE username = '$uname'");
      $db->Query("INSERT INTO db_admins (user_id, username) VALUE ('$uid', '$uname')");
      if ($db->NumRows() == 0) {
        echo "<script>window.location.href = 'https://telegram.zapwork.io/admin'</script>";
      } else echo "<script>
                    Swal.fire({
                      icon: 'error',
                      title: 'Ошибка',
                      text: 'Такой логин уже есть.'
                    })
                  </script>";
    } else echo "<script>
                  Swal.fire({
                    icon: 'error',
                    title: 'Ошибка',
                    text: 'Такой ID уже есть.'
                  })
                </script>";
  }
  ?>
  <div class="container mt-3" style="height: 100%;align-content: center;">
    <div class="form-container mx-auto">
      <div class="fields mt-3">
        <div class="shadow">
          <div class="row">
            <div class="col" style="margin: auto;text-align: center; display: flex;">
              <script async src="https://telegram.org/js/telegram-widget.js?14" data-telegram-login="zapwork_auth_bot" data-size="large" data-userpic="false" data-radius="5" data-auth-url="https://telegram.zapwork.io/add_admin.php" data-request-access="write"></script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>