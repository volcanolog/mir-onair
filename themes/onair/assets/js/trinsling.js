(function ($) {

    $(document).ready(function() {

        window.players = [];

        let radio = window.mirplayer;

        $('.translation .video').each(function () {
            let playerId = 'html5player-' + $(this).data('rand');
            let poster = $(this).data('poster');
            let stream = $(this).data('stream');
            let autoplay = false;
            if(Modernizr.video){
                $(this).html("<video poster='" + poster + "' id='" + playerId + "' class='html5video video-js vjs-default-skin' controls>" +
                    "<source src=\"" +stream + "\" type='application/x-mpegurl' >" +
                    "</video>");
                if($('.channel[data-id="' + $(this).closest('.tab.active').data('index') + '"]').hasClass('channel--active')) {
                    autoplay = true;
                }else {
                    autoplay = false;
                }
                let player = videojs(playerId, {autoplay: autoplay})
                    .on('playing', function () {
                        radio.pause();
                    });
                window.players.push(player);
                $(this).data('player', player);
            } else {
                $(this).data('player', flowplayer(playerId,{
                    swf : "//flowplayer.swf",
                    clip: {
                        sources: [{
                            type: 'application/x-mpegurl',
                            src: stream
                        }]
                    }
                }));
            }
        });

        $('.channels .channel').on('click', function () {
            let that = $(this);
            if(that.is('.channel--active')) return;
            radio.pause();
            let id = that.data('id');
            $('.channels .channel').removeClass('channel--active');
            that.addClass('channel--active');
            $('.trinsling-tabs .tab').removeClass('active');
            $('.trinsling-tabs .tab[data-index="' + id + '"]').addClass('active');
            $('.translation .video').each(function () {
                $(this).data('player').pause();
            });
            $('.further__title:eq(0)').empty().html('Далее на ' + that.find('.channel__name').html());
            $('.further__title:eq(1)').empty().html('Программа ' + that.find('.channel__name').html());
            window.program.reset().render(id).update(id, 6000);
            $('.trinsling-tabs .tab[data-index="' + id + '"]').find('.video').data('player').play();
        });

        let activeId = $('.channels .channel.channel--active').data('id');
        window.program.reset().render(activeId).update(activeId, 6000);
        $('.further__title:eq(0)').empty().html('Далее на ' + $('.channels .channel.channel--active .channel__name').html());
        $('.further__title:eq(1)').empty().html('Программа ' + $('.channels .channel.channel--active .channel__name').html());

        function getSong() {
            $.get('//radiomir.fm/radiometa.php').done((res) => {
                if(res) {
                    $('span.player__name').empty().html(res);
                }
            });
        };
        getSong();
        setInterval(getSong,3000);
    });

})(jQuery);