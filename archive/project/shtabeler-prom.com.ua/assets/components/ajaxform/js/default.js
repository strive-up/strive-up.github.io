    $(document).ready(function () {
        $('form').submit(function () {
			var formData = $("form").serialize();
		console.log("?" + formData);
            var formID = $(this).attr('id'); // Получение ID формы
            var formNm = $('#' + formID);
            $.ajax({
                type: 'POST',
                url: '/assets/components/ajaxform/action.php', // Обработчик формы отправки
                data: formNm.serialize(),
                success: function (data) {
                   $.fancybox.close();
		
		$.fancybox.open({
		src  : '#modalSuccess',
		type : 'inline',
		opts : {
		}
		});
                }
            });
            return false;
        });
    });
