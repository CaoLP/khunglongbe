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
    $ops = '';
    if(count($item['OrderDetail']['options']) > 0){
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
                    <td class=\"text-center\">{$this->App->format_money($s_price)}</td>
                    <td class=\"text-center\">{$this->App->format_money($price)}</td>
                    <td class=\"text-center\">{$item['OrderDetail']['qty']}</td>
                    <td class=\"text-right\">{$this->App->format_money($sum)}</td>
                </tr>";
}

?>

<div class="col-md-12" id="p-content">
    <?php echo $this->Form->create('Order', array('role' => 'form')); ?>
        <div class="col-lg-6">
            <div class="panel panel-pink">
                <div class="panel-heading">
                    <h5 class="text-center"><strong>Giỏ hàng</strong></h5>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed" id="cart">
                            <thead>
                            <tr>
                                <td></td>
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
                                <td class="highrow text-center" colspan="2"><strong>Tổng cộng</strong></td>
                                <td class="highrow text-right"><?php echo $this->App->format_money($total);?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <a href="" class="btn btn-bink">Thay đổi</a>
                    <a href="" class="btn btn-bink">Xóa</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-pink">
                <div class="panel-heading">
                    <h5 class="text-center"><strong>Thông tin của bạn</strong></h5>
                </div>
                <div class="panel-body customer-info">
                    <div class="form-group">
                        <?php echo $this->Form->input('name', array('class' => 'form-control', 'label'=>array('text'=>'Họ Tên'), 'placeholder' => 'Họ Tên')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('phone', array('class' => 'form-control', 'label'=>array('text'=>'Số điện thoại'), 'placeholder' => 'Số điện thoại')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('email', array('class' => 'form-control', 'label'=>array('text'=>'Hộp thư điện tử'), 'placeholder' => 'Hộp thư điện tử')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('address', array('class' => 'form-control', 'label'=>array('text'=>'Địa chỉ'), 'placeholder' => 'Địa chỉ')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('district', array('class' => 'form-control', 'label'=>array('text'=>'Quận, Huyện'), 'placeholder' => 'Quận, Huyện')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('city', array('class' => 'form-control', 'label'=>array('text'=>'Thành phố'), 'placeholder' => 'Thành phố')); ?>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <a href="" class="btn btn-bink">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
<?php echo $this->Form->end();?>
