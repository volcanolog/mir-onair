(function ($) {
    $.ajax({
        url: 'https://dev19.mir24.tv/api/smart/v1/channels',
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            console.log(data);
        }
    });
})(jQuery);