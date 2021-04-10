'use strict';

 $(document).ready(function(){
    $("#form").submit(function(e) { //устанавливаем событие отправки для формы с id=form
            e.preventDefault(); // отменяем событие
            var form_data = $(this).serialize(); //собераем все данные из формы
            $.ajax({
            type: "POST", //Метод отправки
            url: "php/action_ajax_form.php", //путь до php фаила отправителя
            data: form_data,
            success: function(data) {  //в случае успеха выводим результаты в div "results"
			$('#form').remove(); //скрываем форму после отправки 
			$('#results').html(data); //показываем сообщение об успехе вместо неё 
		 },
		 error:  function(xhr, str){ //ошибка выводит соответствующее сообщение 
		 alert('Возникла ошибка: ' + xhr.responseCode);
		 }
            });
    });
});