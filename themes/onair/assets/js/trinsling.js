(function ($) {

    $(document).ready(function() {

        window.players = [];

        let radio = window.mirplayer;

        $('.translation .video').each(function () {
            let playerId = 'html5player-' + $(this).data('rand');
            let stream = $(this).data('stream');
            if(Modernizr.video){
                $(this).html("<video id='" + playerId + "' class='html5video video-js vjs-default-skin' controls>" +
                    "<source src=\"" +stream + "\" type='application/x-mpegurl' >" +
                    "</video>");
                let player = videojs(playerId, {autoplay: false})
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
            $('.further__title').empty().html('Далее на ' + that.find('.channel__name').html());
            window.program.reset().getProgram(id);
            $('.trinsling-tabs .tab[data-index="' + id + '"]').find('.video').data('player').play();
        });

        window.program.reset().getProgram($('.channels .channel.channel--active').data('id'));
        $('.further__title').empty().html('Далее на ' + $('.channels .channel.channel--active .channel__name').html());

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