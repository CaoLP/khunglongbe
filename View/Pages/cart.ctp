<?php
$cart = $this->Session->read('Shop.cart');
$html_cart = '';
$total = 0;
if(count($cart) > 0)
foreach($cart as $item){
    $price = $item['OrderDetail']['price'];
    $s_price = $item['OrderDetail']['price'];
    if(isset($item['OrderDetail']['promote_value'])){
        $price = $price - ($price * ($item['OrderDetail']['promote_value']/100));
    }
    $sum = $price * $item['OrderDetail']['qty'];
    $total+=$sum;
    $html_cart.="<tr>
                    <td>
                    {$this->Media->image($item['OrderDetail']['thumb'], 50, 50, array())}
                    <div>{$item['OrderDetail']['name']}</div></td>
                    <td class=\"text-center\">{$this->App->format_money($s_price)}</td>
                    <td class=\"text-center\">{$this->App->format_money($price)}</td>
                    <td class=\"text-center\">{$item['OrderDetail']['qty']}</td>
                    <td class=\"text-right\">{$this->App->format_money($sum)}</td>
                </tr>";
}

?>

<div class="col-md-12" id="p-content">
        <div class="panel panel-pink">
            <div class="panel-heading">
                <h3 class="text-center"><strong>Giỏ hàng</strong></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <td><strong>Tên</strong></td>
                            <td class="text-center"><strong>Giá gốc</strong></td>
                            <td class="text-center"><strong>Giá khuyến mãi</strong></td>
                            <td class="text-center"><strong>Số lượng</strong></td>
                            <td class="text-right"><strong>Thành tiền</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                       <?php echo $html_cart;?>
                        <tr>
                            <td class="highrow"></td>
                            <td class="highrow"></td>
                            <td class="highrow"></td>
                            <td class="highrow text-center"><strong>Tổng cộng</strong></td>
                            <td class="highrow text-right"><?php echo $this->App->format_money($total);?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer text-right">
                <a href="" class="btn btn-bink">Thay đổi</a>
                <a href="" class="btn btn-bink">Xóa</a>
                <a href="" class="btn btn-bink">Thanh toán</a>
            </div>
        </div>
    </div>
