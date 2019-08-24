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

        var QueryString = function () {
            // This function is anonymous, is executed immediately and
            // the return value is assigned to QueryString!
            var query_string = {};
            var query = window.location.search.substring(1);
            var vars = query.split("&");
            for (var i=0;i<vars.length;i++) {
                var pair = vars[i].split("=");
                // If first entry with this name
                if (typeof query_string[pair[0]] === "undefined") {
                    query_string[pair[0]] = decodeURIComponent(pair[1]);
                    // If second entry with this name
                } else if (typeof query_string[pair[0]] === "string") {
                    var arr = [ query_string[pair[0]],decodeURIComponent(pair[1]) ];
                    query_string[pair[0]] = arr;
                    // If third or later entry with this name
                } else {
                    query_string[pair[0]].push(decodeURIComponent(pair[1]));
                }
            }
            return query_string;
        }();

        var p = jQuery("#player")[0];
        var dat = QueryString.d;

        if(!maintenance){
            if (!dat) dat = 3;
            if (dat == 1) { location.href="/mirtv.html"; }
            if (dat == 2) { location.href="/premium.html"; }
            $( ".channel-block" ).each(function( index ) {
                $(this).removeClass('active');
                if ($(this).attr('data')==dat) {
                    $(this).addClass('active');
                }
            });
            if(dat == 4){
                p.play();
                $("#radio").show();
                $("#container").hide();
            } else {
                if(Modernizr.video){
                    $("#container").html("<video id='html5player' class='html5video video-js vjs-default-skin' controls autoplay>" +
                        "<source src=\"" + stream[dat-1] + "\" type='application/x-mpegurl' >" +
                        "</video>");
                    var player = videojs('html5player');
                    player.play();
                } else {
                    var $f = flowplayer('#container',{
                        swf : "//flowplayer.swf",
                        clip: {
                            sources: [{
                                type: 'application/x-mpegurl',
                                src: stream[dat-1]
                            }]
                        }
                    });
                }
            }
        } else {
            $("#container").html("<img src='/images/maintenance.png'>");
        }

        $(".channel-block").click(function() {
            var dat = $(this).attr('data');
            if (dat == 1) {
                location.href = "mirtv.html";
            }
            $( ".channel-block" ).each(function( index ) {
                $(this).removeClass('active');
            });
            $(this).addClass('active');

            location.href = "other.html?d="+dat;
        });
    });
})(jQuery);