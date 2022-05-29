<?php

$images_url = $_GET["img_url"];

foreach ($images_url as $a) {
    unlink($a);
}
?>

<form action="https://telegram.zapwork.io/account" method="post">
    <input type="submit" name="img_del" value="1" id="btn" hidden>
</form>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $("#btn").click();
    });
</script>