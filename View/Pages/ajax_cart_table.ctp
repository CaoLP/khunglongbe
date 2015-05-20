<?php
$cart = $this->Session->read('Shop.cart');
$html_cart = '';
$total = 0;
if(count($cart) > 0)
    foreach($cart as $key=>$item){
        $price = $item['OrderDetail']['price'];
        $s_price = $item['OrderDetail']['price'];
        if(isset($item['OrderDetail']['promote_value'])){
            $price = $price - ($price * ($item['OrderDetail']['promote_value']/100));
        }
        $ops = '';
        if(isset($item['OrderDetail']['options']) && count($item['OrderDetail']['options']) > 0){
            $ops = array();
            foreach( $item['OrderDetail']['options'] as $k=>$op){
                $ops[] = explode('|',$op)[1];
            }
            $ops = implode('<br>', $ops);
        }
        $sum = $price * $item['OrderDetail']['qty'];
        $total+=$sum;
        $html_cart.="<tr>
                    <td>{$this->Media->image($item['OrderDetail']['thumb'], 50, 50, array())}</td>
                    <td class=\"\">
                    <div class='name'>{$item['OrderDetail']['name']}</div>
                    <div class='option'>{$ops}</div>
                    </td>
                    <td class=\"text-center\" class=\"price\">{$this->App->format_money($s_price)}</td>
                    <td class=\"text-center\" class=\"price\">{$this->App->format_money($price)}</td>
                    <td class=\"text-center\">
                    <a href=\"javascript:;\" class=\"pull-left cart-minus-p\" data-id=\"{$key}\"><i class=\"fa fa-minus\"></i></a>
                    <span class=\"qty\">{$item['OrderDetail']['qty']}</span>
                    <a href=\"javascript:;\" class=\"pull-right cart-add-p\" data-id=\"{$key}\"><i class=\"fa fa-plus\"></i></a>
                    </td>
                    <td class=\"text-right\" class=\"total\">{$this->App->format_money($sum)}</td>
                   <td><a href=\"javascript:;\" class=\"pull-left btn btn-mini btn-danger cart-remove-p\"
                        data-style=\"1\"
                        data-id=\"{$key}\"><i class=\"fa fa-trash\"></i></a></td>
                </tr>";
    }
?>
<thead>
<tr>
    <td></td>
    <td><strong>Tên</strong></td>
    <td class="text-center"><strong>Giá gốc</strong></td>
    <td class="text-center"><strong>Giá khuyến mãi</strong></td>
    <td class="text-center"><strong>Số lượng</strong></td>
    <td class="text-right"><strong>Thành tiền</strong></td>
    <td></td>
</tr>
</thead>
<tbody>
<?php echo $html_cart;?>
<tr>
    <td class="highrow"></td>
    <td class="highrow"></td>
    <td class="highrow"></td>
    <td class="highrow text-center" colspan="2"><strong>Tổng cộng</strong></td>
    <td class="highrow text-right"><?php echo $this->App->format_money($total);?></td>
    <td></td>
</tr>
</tbody>