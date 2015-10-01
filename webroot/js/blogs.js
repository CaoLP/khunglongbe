$(function () {
    $.ajax({
        url: relative,
        type: 'post',
        data: {
            total: 8,
            title : 'Có thể bạn thích'
        },
        success: function (data) {
            $('#relative').html(data);
        }
    });
});