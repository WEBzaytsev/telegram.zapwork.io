<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?PHP
if (isset($_SESSION["user_id"])) {
  Header("Location: /account");
  return;
}

if (isset($_POST["id"])) {
  $uid = $_POST["id"];
  $auth_date = $_POST["auth_date"];
  $db->Query("SELECT id, user_id, username FROM db_admins WHERE user_id = '$uid'");
  if ($db->NumRows() == 1) {
    $log_data = $db->FetchArray();
    if ($log_data["username"] == $_POST["username"]) {
      $db->Query("UPDATE db_admins SET auth_date = '$auth_date' WHERE id = '" . $log_data["id"] . "'");
      $_SESSION["user_id"] = $log_data["id"];
      $_SESSION["user"] = $log_data["username"];
      Header("Location: /account");
    } else echo "<script>
                  Swal.fire({
                    icon: 'error',
                    text: 'Доступ запрещен.'
                  })
                </script>";
  } else echo "<script>
                Swal.fire({
                  icon: 'error',
                  text: 'Доступ запрещен.'
                })
              </script>";
}
?>

<style>
  #telegram-login-zapwork_auth_bot {
    margin: auto;
  }
</style>
<div class="container mt-3" style="height: 100%;align-content: center;">
  <div class="form-container mx-auto">
    <h1 style="text-align: center;">Авторизация</h1>
    <div class="fields mt-3">
      <div class="shadow">
        <div class="row">
          <div class="col" style="margin: auto;text-align: center; display: flex;">
            <script async src="https://telegram.org/js/telegram-widget.js?14" data-telegram-login="zapwork_auth_bot" data-size="large" data-radius="5" data-onauth="onTelegramAuth(user)" data-request-access="write"></script>
            <script type="text/javascript">
              function onTelegramAuth(user) {
                $("#id").val(user.id);
                $("#username").val(user.username);
                $("#auth_date").val(user.auth_date);
                $("#btn-submit").click();
              }
            </script>
            <form action="" method="POST">
              <input type="text" name="id" id="id" hidden>
              <input type="text" name="username" id="username" hidden>
              <input type="text" name="auth_date" id="auth_date" hidden>
              <input type="submit" id="btn-submit" hidden>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>