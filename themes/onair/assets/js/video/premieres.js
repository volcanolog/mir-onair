(function ($) {
    $.ajax({
        url: '//dev19.mir24.tv/v2/premiere',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            return false;
            if(mapping[id] === undefined) {
                let hoursPlus = 0;
                switch (id) {
                    case 2:
                        hoursPlus = 2;
                        break;
                    case 3:
                        hoursPlus = 4;
                        break;
                    case 4:
                        hoursPlus = 7;
                        break;
                    default:
                        return true;
                }
                data[mapping[id]] = data[2];
                data[mapping[id]].broadcasts.concat().map(function (item) {
                    item.time.begin = dateFns.addHours(item.time.begin, hoursPlus);
                    return item;
                });
            }
            let broadcastsToday = data[mapping[id]].broadcasts.filter(item => dateFns.isToday(new Date(item.time.begin)));
            let index = broadcastsToday.findIndex(item => (new Date(item.time.begin).getTime()) >= Date.now()) - 1;
            let result = broadcastsToday.slice(index);
            that.playingNow.html(result[0].title);
            result = result.slice(1);
            result.forEach(item => that.program.append('<div class="program__item">' +
                '<div class="program__time">' + dateFns.format(item.time.begin, 'HH:mm') + '</div>' +
                '<div class="program__name">' + item.title + '</div>' +
                '</div>'));
            that.programContain.addClass('loaded').find('i').fadeOut(150);
        }
    });
})(jQuery);