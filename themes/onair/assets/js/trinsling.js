(function ($) {

    $(document).ready(function() {

        $('.translation .video').each(function () {
            let playerId = 'html5player-' + $(this).data('rand');
            let stream = $(this).data('stream');
            if(Modernizr.video){
                $(this).html("<video id='" + playerId + "' class='html5video video-js vjs-default-skin' controls autoplay>" +
                    "<source src=\"" +stream + "\" type='application/x-mpegurl' >" +
                    "</video>");
                let player = videojs(playerId);
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
            let id = that.data('id');
            $('.channels .channel').removeClass('channel--active');
            that.addClass('channel--active');
            $('.trinsling-tabs .tab').removeClass('active');
            $('.trinsling-tabs .tab[data-index="' + id + '"]').addClass('active');
            $('.translation .video').each(function () {
                $(this).data('player').pause();
            });
            $('.trinsling-tabs .tab[data-index="' + id + '"]').find('.video').data('player').play();

        });

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