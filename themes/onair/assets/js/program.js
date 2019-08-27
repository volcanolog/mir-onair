(function ($) {
    window.program = {
        programContain: $('.program'),
        program: $('.program .in'),
        playingNow: $('span.onair__subtitle'),
        reset: function() {
            this.playingNow.empty()
            this.program.empty();
            this.programContain.removeClass('loaded').find('i').fadeIn(150);
            return this;
        },
        getProgram: function(id) {
            let that = this;
            let mapping = {
                1: null,
                2: null,
                3: null,
                4: null,
                5: 1,
                6: 0
            };
            $.ajax({
                url: '//dev19.mir24.tv/api/smart/v1/channels',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if(mapping[id] === undefined) {
                        return true;
                    }
                    let broadcastsToday = data[mapping[id]].broadcasts.filter(item => dateFns.isToday(new Date(item.time.begin)));
                    let index = broadcastsToday.findIndex(item => (new Date(item.time.begin).getTime()) >= Date.now()) - 1;
                    let result = broadcastsToday.slice(index);
                    that.playingNow.html(result[0].title);
                    result = result.slice(1)
                    result.forEach(item => that.program.append('<div class="program__item">' +
                        '<div class="program__time">' + dateFns.format(item.time.begin, 'HH:mm') + '</div>' +
                        '<div class="program__name">' + item.title + '</div>' +
                        '</div>'));
                    that.programContain.addClass('loaded').find('i').fadeOut(150);
                }
            });

        }
    }
})(jQuery);