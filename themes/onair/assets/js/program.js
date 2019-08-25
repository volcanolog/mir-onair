(function ($) {
    $.ajax({
        url: '//dev19.mir24.tv/api/smart/v1/channels',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            let broadcastsToday = data[0].broadcasts.filter(item => dateFns.isToday(new Date(item.time.begin)));
            let index = broadcastsToday.findIndex(item => (new Date(item.time.begin).getTime()) >= Date.now()) - 1;
            let result = broadcastsToday.slice(index);
            $('span.onair__subtitle').empty().html(result[0].title);
            result = result.slice(1)
            $('.program .in').empty();
            result.forEach(item => $('.program .in').append('<div class="program__item">' +
                '<div class="program__time">' + dateFns.format(item.time.begin, 'HH:mm') + '</div>' +
                '<div class="program__name">' + item.title + '</div>' +
                '</div>'));
            $('.program').addClass('loaded').find('i').fadeOut(150);
        }
    });
})(jQuery);