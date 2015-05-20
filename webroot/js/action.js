$(function () {
    $(".share-popup").click(function () {
        var window_size = "";
        var url = this.href;
        var domain = url.split("/")[2];
        switch (domain) {
            case "www.facebook.com":
                window_size = "width=585,height=368";
                break;
            case "www.twitter.com":
                window_size = "width=585,height=261";
                break;
            case "plus.google.com":
                window_size = "width=517,height=511";
                break;
            default:
                window_size = "width=585,height=511";
        }
        window.open(url, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,' + window_size);
        return false;
    });
    $('.buy').on('click',function(){
        $('#OrderDetailViewForm').submit();
    });
    $('.add-cart').on('click',function(){
        var form = $('#OrderDetailViewForm').serialize();
        $.ajax({
            url: cartUrl,
            type : 'post',
            data : form,
            success: function(data){
                $('#cart').html(data);
            }
        });
    });
    $(document).on('click','.cart-add-p',function(){
        change_cart('add',$(this).data('id'),2);
    });
    $(document).on('click','.cart-minus-p',function(){
        change_cart('minus',$(this).data('id'),2);
    });
    $(document).on('click','.cart-remove-p',function(){
        change_cart('remove',$(this).data('id'),2);
    });
    $(document).on('click','.remove',function(){
        change_cart('remove',$(this).data('id'));
    });
});
var change_cart = function(type,id,style){
    $.ajax({
        url: cartUrl,
        type: 'post',
        data: {
            m: true,
            type: type,
            id : id,
            style : style
        },
        beforeSend: function(){

        },
        success : function(data){
            if(typeof style != "undefined"){
                $('#p-cart').html(data);
                $.ajax({
                    url: cartUrl,
                    success: function(data){
                        $('#cart').html(data);
                    }
                });
            }else{
                $('#cart').html(data);
            }
        }
    });
};