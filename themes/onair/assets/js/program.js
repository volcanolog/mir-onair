(function ($) {
    window.program = {
        programData: null,
        interval: null,
        programContain: $('.program'),
        program: $('.program .in'),
        playingNow: $('span.onair__subtitle'),
        reset: function() {
            this.clear();
            this.programContain.removeClass('loaded').find('i').fadeIn(150);
            return this;
        },
        getProgram: function() {
            let that = this;
            if(!that.programData) {
                $.ajax({
                    url: '//dev19.mir24.tv/api/smart/v1/channels',
                    type: 'GET',
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        that.programData = data;
                    }
                });
            }
        },
        render: function(id) {
            let that = this;
            let mapping = {
                1: 2,
                2: 2,
                3: 2,
                4: 2,
                5: 1,
                6: 0
            };
            let items = that.programData[mapping[id]].broadcasts;
            let subHours;
            switch (id) {
                case 2:
                    subHours = 2;
                    break;
                case 3:
                    subHours = 4;
                    break;
                case 4:
                    subHours = 7;
                    break;
                default:
                    subHours = 0;
                    break;
            }
            if(subHours) {
                items = items.map(function (item) {
                    return {
                        ...item,
                        time: {
                            ...item.time,
                            begin: dateFns.subHours(item.time.begin, subHours),
                        }
                    }
                });
            }
            let broadcastsToday = items.filter(item => dateFns.isToday(new Date(item.time.begin)));
            let index = broadcastsToday.findIndex(item => (new Date(item.time.begin).getTime()) >= Date.now()) - 1;
            let result = broadcastsToday.slice(index);
            that.clear();
            that.playingNow.html(result[0].title);result = result.slice(1);
            result.forEach(item => that.program.append('<div class="program__item">' +
                '<div class="program__time">' + dateFns.format(item.time.begin, 'HH:mm') + '</div>' +
                '<div class="program__name">' + item.title + '</div>' +
                '</div>'));
            that.programContain.addClass('loaded').find('i').fadeOut(150);
            return this;
        },
        clear: function() {
            this.playingNow.empty();
            this.program.empty();
        },
        update: function(id, timeout) {
            let that = this;
            clearInterval(this.interval);
            this.interval = setInterval(function () {
                that.render(id);
            }, timeout);
        }
    }
    window.program.getProgram();
})(jQuery);