$(function () {
    $('#etalage').etalage({
        thumb_image_width: 300,
        thumb_image_height: 400,
        source_image_width: 900,
        source_image_height: 1200,
        show_hint: true,
        click_callback: function (image_anchor, instance_id) {

        }
    });
    $.ajax({
        url: relative,
        type: 'post',
        data: {
            category: category,
            total: 8,
            total_item: 4,
            use_slide: true,
            title : 'Sản phẩm liên quan'
        },
        success: function (data) {
            $('#relative-1').html(data);
        }
    });
    $.ajax({
        url: relative,
        type: 'post',
        data: {
            total: 4,
            total_item: 2,
            use_slide: true,
            title : 'Có thể bạn thích'
        },
        success: function (data) {
            $('#relative-2').html(data);
        }
    });
});