<div class="col-md-2" id="side">
    <?php echo $this->element('sidebar'); ?>
</div>
<div class="col-md-10" id="p-content">
    <div class="panel">
        <div class="hot"></div>
        <div class="panel-heading has-icon">SẢN PHẨM BÁN CHẠY
            <small class="pull-right"><a href="<?php echo $this->Html->url(
                    array('controller' => 'pages', 'action' => 'best_sale'))
                ?>">Xem thêm</a></small>
        </div>
        <div class="panel-body">
            <?php foreach ($best_sale as $p): ?>
                <div class="col-xs-6 col-md-2 item">
                    <div class="thumbnail">
                        <a href="<?php
                        echo $this->Html->url(
                            array(
                                'controller' => 'pages',
                                'action' => 'view',
                                'category' => $p['Category']['slug'],
                                'slug' => $p['Product']['slug'],
                            )
                        )
                        ?>">
                            <div class="caption">
                                <?php echo $p['Product']['name']; ?>
                            </div>
                            <div class="img">
                                <?php echo $this->Media->image($p['Thumb']['file'], 153, 102, array()); ?>
                                <?php
                                if(isset($p['Promote']['value'])){
                                    echo "<span class=\"promo\"></span>";
                                    echo "<span class=\"promoTxt\">{$p['Promote']['value']}%</span>";
                                }
                                ?>
                            </div>
                            <div class="price-box">
                                <button class="pull-right btn-buy">Mua</button>
                                <ul>
                                    <?php
                                    if(isset($p['Promote']['value'])){
                                        echo "<li class=\"price\">";
                                        echo $this->App->format_money(h($p['Product']['price']), $p['Promote']['value']);
                                        echo "</li>";
                                        echo "<li class=\"price2\">";
                                        echo $this->App->format_money(h($p['Product']['price']));
                                        echo "</li>";
                                    }else{
                                        echo "<li class=\"price\">";
                                        echo $this->App->format_money(h($p['Product']['price']));
                                        echo "</li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="panel">
        <div class="new"></div>
        <div class="panel-heading has-icon">SẢN PHẨM MỚI
            <small class="pull-right"><a href="<?php echo $this->Html->url(
                    array(
                        'controller' => 'pages', 'action' => 'new_products'))?>">Xem thêm</a></small>
        </div>
        <div class="panel-body">
            <?php foreach ($new_products as $p): ?>
                <div class="col-xs-6 col-md-2 item">
                    <div class="thumbnail">
                        <a href="<?php
                        echo $this->Html->url(
                            array(
                                'controller' => 'pages',
                                'action' => 'view',
                                'category' => $p['Category']['slug'],
                                'slug' => $p['Product']['slug'],
                            )
                        )
                        ?>">
                            <div class="caption">
                                <?php echo $p['Product']['name']; ?>
                            </div>
                            <div class="img">
                                <?php echo $this->Media->image($p['Thumb']['file'], 153, 102, array()); ?>
                                <?php
                                if(isset($p['Promote']['value'])){
                                    echo "<span class=\"promo\"></span>";
                                    echo "<span class=\"promoTxt\">{$p['Promote']['value']}%</span>";
                                }
                                ?>
                            </div>
                            <div class="price-box">
                                <button class="pull-right btn-buy">Mua</button>
                                <ul>
                                    <?php
                                    if(isset($p['Promote']['value'])){
                                        echo "<li class=\"price\">";
                                        echo $this->App->format_money(h($p['Product']['price']), $p['Promote']['value']);
                                        echo "</li>";
                                        echo "<li class=\"price2\">";
                                        echo $this->App->format_money(h($p['Product']['price']));
                                        echo "</li>";
                                    }else{
                                        echo "<li class=\"price\">";
                                        echo $this->App->format_money(h($p['Product']['price']));
                                        echo "</li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="panel">
        <div class="sale"></div>
        <div class="panel-heading has-icon">SẢN PHẨM KHUYẾN MÃI
            <small class="pull-right"><a href="<?php echo $this->Html->url(
                    array(
                        'controller' => 'pages', 'action' => 'promote_products'))?>">Xem thêm</a></small>
        </div>
        <div class="panel-body">
            <?php foreach ($promote_products as $p): ?>
                <div class="col-xs-6 col-md-2 item">
                    <div class="thumbnail">
                        <a href="<?php
                        echo $this->Html->url(
                            array(
                                'controller' => 'pages',
                                'action' => 'view',
                                'category' => $p['Category']['slug'],
                                'slug' => $p['Product']['slug'],
                            )
                        )
                        ?>">
                            <div class="caption">
                                <?php echo $p['Product']['name']; ?>
                            </div>
                            <div class="img">
                                <?php echo $this->Media->image($p['Thumb']['file'], 153, 102, array()); ?>
                                <?php
                                if(isset($p['Promote']['value'])){
                                    echo "<span class=\"promo\"></span>";
                                    echo "<span class=\"promoTxt\">{$p['Promote']['value']}%</span>";
                                }
                                ?>
                            </div>
                            <div class="price-box">
                                <button class="pull-right btn-buy">Mua</button>
                                <ul>
                                    <?php
                                    if(isset($p['Promote']['value'])){
                                        echo "<li class=\"price\">";
                                        echo $this->App->format_money(h($p['Product']['price']), $p['Promote']['value']);
                                        echo "</li>";
                                        echo "<li class=\"price2\">";
                                        echo $this->App->format_money(h($p['Product']['price']));
                                        echo "</li>";
                                    }else{
                                        echo "<li class=\"price\">";
                                        echo $this->App->format_money(h($p['Product']['price']));
                                        echo "</li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="panel">
        <div class="cart"></div>
        <div class="panel-heading has-icon">SẢN PHẨM
            <small class="pull-right"><a href="<?php echo $this->Html->url(
                    array(
                        'controller' => 'pages', 'action' => 'products'))?>">Xem thêm</a></small>
        </div>
        <div class="panel-body">
            <?php foreach ($products as $p): ?>
                <div class="col-xs-6 col-md-2 item">
                    <div class="thumbnail">
                        <a href="<?php
                        echo $this->Html->url(
                            array(
                                'controller' => 'pages',
                                'action' => 'view',
                                'category' => $p['Category']['slug'],
                                'slug' => $p['Product']['slug'],
                            )
                        )
                        ?>">
                            <div class="caption">
                                <?php echo $p['Product']['name']; ?>
                            </div>
                            <div class="img">
                                <?php echo $this->Media->image($p['Thumb']['file'], 153, 102, array()); ?>
                                <?php
                                if(isset($p['Promote']['value'])){
                                    echo "<span class=\"promo\"></span>";
                                    echo "<span class=\"promoTxt\">{$p['Promote']['value']}%</span>";
                                }
                                ?>
                            </div>
                            <div class="price-box">
                                <button class="pull-right btn-buy">Mua</button>
                                <ul>
                                    <?php
                                    if(isset($p['Promote']['value'])){
                                        echo "<li class=\"price\">";
                                        echo $this->App->format_money(h($p['Product']['price']), $p['Promote']['value']);
                                        echo "</li>";
                                        echo "<li class=\"price2\">";
                                        echo $this->App->format_money(h($p['Product']['price']));
                                        echo "</li>";
                                    }else{
                                        echo "<li class=\"price\">";
                                        echo $this->App->format_money(h($p['Product']['price']));
                                        echo "</li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>