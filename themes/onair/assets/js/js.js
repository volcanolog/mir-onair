window.mirplayer = {
    isPlay: false,

    init: function () {
        this.audio = document.getElementById('radio-stream');
        this.slider = $('#range');

        this.slider.slider({
            orientation: "horizontal",
            range: "min",
            max: 100,
            value: 50,
            slide: this.moveSlider,
            change: this.moveSlider
        });

        this.bind();
    },

    play: function () {
        this.audio.play();
    },

    pause: function () {
        $('.player__button').removeClass('player__button--play');
        this.audio.pause();
    },

    moveSlider: function () {
        var volume = mirplayer.slider.slider('value');
        mirplayer.setVolume(volume / 100);
    },

    /** volume может быть от 0 до 1 */
    setVolume: function (volume) {
        this.audio.volume = volume
    },

    mute: function () {
        this.audio.volume = 0;
        this.slider.slider( "value", 0);
    },

    bind: function () {
        var _this = this;
        $('.js-player-button').on('click', function () {
            if(_this.audio.paused) {
                window.players.forEach(function (player) {
                    if (!player.paused()) {
                        player.pause();
                    }
                });
                $('.player__button').addClass('player__button--play');
                _this.audio.play();
            }else if (_this.audio.played) {
                $('.player__button').removeClass('player__button--play');
                _this.audio.pause();
            }else {
                $('.player__button').addClass('player__button--play');
                _this.audio.play();
                _this.setVolume(.5);
                _this.slider.slider( "value", 50);
            }
            return false;
        });

        $('.js-player-mute').on('click', function () {
            _this.mute();
            return false;
        })
    }
};

$(document).ready(function () {
    const $slider = $('.slider__items');
    if ($slider.length) {
        $slider.slick({
            arrows: false,
            dots: true,
            /** Автоматическое перелистывание карусели */
            autoplay: true,
            /** Таймаут автоматического перелистывания */
            autoplaySpeed: 6000
        });
    }

    $('.burger').on('click', function () {
        $('.nav').toggleClass('nav--open');
        $(this).toggleClass('burger--open');
        $('body').toggleClass('ovh');
        return false;
    });

    $(window).on('resize', function () {
       $('.nav').removeClass('nav--open');
       $('.burger').removeClass('burger--open');
       $('body').removeClass('ovh');
    });

    mirplayer.init();
});
