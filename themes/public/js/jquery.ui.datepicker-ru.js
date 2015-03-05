
jQuery(function($){
	$.datepicker.regional['ru'] = {
        changeYear: true,
        minDate: 0,
        yearRange: '+0:+5',
        onSelect: function(dateText) {
            setTimeout(function() {
                var calendarDate = $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val();
                $.ajax({
                    url: '/site/ajaxSelectCalendarDate',
                    type: "POST",
                    cashe: false,
                    data: 'calendarDate='+calendarDate,
                    success: function(data, status){
						var city_select = $('.city-main-api').val();
                        if(city_select == '' || city_select == undefined){
                            $('.popup-link-1').click();
                        } else {
							window.location.href = '/services';
                        }
                    }
                });
            }, 500)

        },


		closeText: 'Закрыть',
		prevText: '&#x3c;Пред',
		nextText: 'След&#x3e;',
		currentText: 'Сегодня',
		monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
		'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
		monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
		'Июл','Авг','Сен','Окт','Ноя','Дек'],
		dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
		dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
		dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
		weekHeader: 'Нед',
		dateFormat: 'dd.mm.yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['ru']);
});