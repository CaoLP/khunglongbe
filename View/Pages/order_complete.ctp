<div class="col-md-12" id="p-content">
    <div class="panel">
        <div class="order-success"></div>
        <div class="panel-heading has-icon">ĐẶT HÀNG THÀNH CÔNG</small>
        </div>
        <div class="panel-body">
            <div class="text-center">
                <h3>Đặt hàng thành công</h3>
                <p><span>Cảm ơn bạn đã mua hàng tại <a href="<?php echo $this->Html->url('/',true)?>"><?php Configure::read('site.name')?></a>. Chúng tôi sẽ liên hệ bạn trong vòng 24h</span></p>
                <?php echo $this->Html->image('logo.png', array('width'=>'150'))?>
                <p><a id="turn-home" href="<?php echo $this->Html->url('/',true)?>">Quay về trang chủ</a></p>
                <p>Tự động về trang chủ sau <span  class="timer">3</span> giây nữa</p>
            </div>
        </div>
    </div>
</div>
