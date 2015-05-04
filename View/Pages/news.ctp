<div class="col-md-2" id="side">
    <?php echo $this->element('sidebar');?>
</div>
<div class="col-md-10" id="p-content">
    <?php for ($i = 0; $i < 5; $i++): ?>
        <div class="panel">
            <div class="panel-heading">Heading
                <small class="pull-right"><a href="#">Xem thêm</a></small>
            </div>
            <div class="panel-body">
                <?php for ($j = 0; $j < 6; $j++): ?>
                    <div class="col-xs-6 col-md-2 item">
                        <div class="thumbnail">
                            <a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view'))?>">
                                <div class="caption">
                                    Thumbnail label
                                </div>
                                <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png">
                                <div class="price-box"><span class="price">400,000</span>
                                    <button class="pull-right btn-buy">Mua</button>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    <?php endfor; ?>
</div>