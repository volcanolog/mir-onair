(function ($) {
    let m = {
        1: 'января',
        2: 'февраля',
        3: 'марта',
        4: 'апреля',
        5: 'мая',
        6: 'июня',
        7: 'июля',
        8: 'августа',
        9: 'сентября',
        10: 'октября',
        11: 'ноября',
        12: 'декабря'
    };
    $.ajax({
        url: config_api.url + 'v2/premiere',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            let container = $('.stream__items');
            container.empty();
            data.forEach(item => container.append('<a href="//mirtv.ru/premiere/main/' + item.premiere_id + '" class="stream__item">' +
                '<div class="stream__top">' +
                '<div class="stream__image">' +
                '<img src="//mirtv.ru/files/premiere/' + item.premiere_id + '/second.jpg" alt="">' +
                '</div>' +
                '<div class="stream__icon">' +
                '<img src="images/channels/mir-logo.png" alt="">' +
                '</div>' +
                '<div class="stream__date">' +
                '<span class="stream__date-day">' + dateFns.format(item.start, 'D') + '</span>' +
                '<span class="stream__date-month"> ' + m[dateFns.format(item.start, 'M')] + '</span>' +
                '<span> в</span>' +
                '<span class="stream__date-time"> ' + dateFns.format(item.start, 'HH:mm') + '</span>' +
                '</div>' +
                '</div>' +
                '<div class="stream__bottom">' +
                '<div class="stream__item-title">' + item.title + '</div>' +
                '<div class="stream__item-text">' + item.description + '</div>' +
                '</div>' +
                '</a>'));
            container.closest('.container').css('display', 'block');
        }
    });
})(jQuery);