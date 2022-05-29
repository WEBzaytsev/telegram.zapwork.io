  <link rel="stylesheet" href="/css/image-picker.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/image-picker/0.3.1/image-picker.min.js" integrity="sha512-76tAVeQq8wkwtFWzKPU03XJGMF/mcLDeBgi9wIlRICXdkLNUYVBiOL3O/R9Bold+u0eN0OUftCcBTjFkchPyBg==" crossorigin="anonymous"></script>
  <select name="img_url" onchange="$('#btn').click()">
    <?php
    $directory = "img/";    // Папка с изображениями
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

  <script>
    $("select").imagepicker();
  </script>