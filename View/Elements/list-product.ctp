<?php if(isset($data['products']) && count($data['products'])): ?>
<div class="panel">
    <div class="<?php echo $data['class']?>"></div>
    <div class="panel-heading has-icon"><a href="<?php echo $data['url']?>"><?php echo $data['title']?></a>
        <small class="pull-right"><a href="<?php echo $data['url']?>">Xem thêm</a></small>
    </div>
    <div class="panel-body">
        <?php foreach ($data['products'] as $p): ?>
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
                            <?php echo $this->Media->image($p['Thumb']['file'], $data['img_w'], $data['img_h'], array()); ?>
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
<?php endif;?>