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
})(jQuery);