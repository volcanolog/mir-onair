(function ($) {
    $('.channels .channel').on('click', function () {
        let that = $(this);
        if(that.is('.channel--active')) return;
        let id = that.data('id');
        $('.channels .channel').removeClass('channel--active');
        that.addClass('channel--active');
        $('.trinsling-tabs .tab').removeClass('active');
        $('.trinsling-tabs .tab[data-index="' + id + '"]').addClass('active');
    });

    $(document).ready(function() {
        // $('.translation .video').each(function () {
        //     let playerId = 'player-' + $(this).data('rand');
        //     let stream = $(this).data('stream');
        //     if(Hls.isSupported())
        //     {
        //         let video = document.getElementById(playerId);
        //         let hls = new Hls();
        //         hls.loadSource(stream);
        //         hls.attachMedia(video);
        //         hls.on(Hls.Events.MANIFEST_PARSED,function()
        //         {
        //             video.play();
        //         });
        //     }
        //     else if (video.canPlayType('application/vnd.apple.mpegurl'))
        //     {
        //         video.src = stream;
        //         video.addEventListener('canplay',function()
        //         {
        //             video.play();
        //         });
        //     }
        // });
    //
        let dat = 0;
        if(dat == 4){
            p.play();
            $("#radio").show();
            $("#container").hide();
        } else {
            $('.translation .video').each(function () {
                let playerId = 'html5player-' + $(this).data('rand');
                let stream = $(this).data('stream');
                let player = new Plyr(playerId, {
                    /* options */
                });

                player.source = {
                    type: 'video',
                    title: 'Example title',
                    sources: [
                        {
                            src: stream,
                            type: 'application/x-mpegurl',
                            // size: 720,
                        }
                    ]
                };
                // if(Modernizr.video){
                //     $(this).html("<video id='" + playerId + "' class='html5video video-js vjs-default-skin' controls autoplay>" +
                //         "<source src=\"" +stream + "\" type='application/x-mpegurl' >" +
                //         "</video>")
                //     let player = videojs(playerId);
                //     player.play();
                // } else {
                //     let flw = flowplayer(playerId,{
                //         swf : "//flowplayer.swf",
                //         clip: {
                //             sources: [{
                //                 type: 'application/x-mpegurl',
                //                 src: stream
                //             }]
                //         }
                //     });
                // }
            });
        }
    });
})(jQuery);