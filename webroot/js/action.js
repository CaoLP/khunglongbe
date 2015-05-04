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
});