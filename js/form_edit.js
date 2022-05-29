/* Article FructCode.com */
$(document).ready(function() {
    $("#btn").click(
        function() {
            sendAjaxForm('result_form', 'ajax_form', '/big_card.php');
            return false;
        }
    );
});


function sendAjaxForm(result_form, ajax_form, url) {
    jQuery.ajax({
        url: url, //url страницы (action_ajax_form.php)
        type: "POST", //метод отправки
        dataType: "html", //формат данных
        data: jQuery("#" + ajax_form).serialize(), // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
            jQuery("#" + result_form).html(response);
        },
        error: function(response) { // Данные не отправлены
            document.getElementById(result_form).innerHTML = "<p>Ошибка. Данные не отправлены.</p><b>Попробуйте отключить AdBlock</b>";
        }
    });
}