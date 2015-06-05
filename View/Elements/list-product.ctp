<?php if(isset($data['products']) && count($data['products'])): ?>
<div class="panel">
    <div class="<?php echo $data['class']?>"></div>
    <div class="panel-heading has-icon"><a href="<?php echo $data['url']?>"><?php echo $data['title']?></a>
        <small class="pull-right">
            <?php if(isset($data['use_paginate'])){?>
                <small class="pull-right">
                    <?php
                    $params = $this->Paginator->params();
                    if ($params['pageCount'] > 1) {
                        ?>
                        <ul class="pagination pagination-sm">
                            <?php
                            echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                            echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
                            echo $this->Paginator->next('Next &rarr;', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
                            ?>
                        </ul>
                    <?php } ?>
                </small>
            <?php } else {?>
            <a href="<?php echo $data['url']?>">Xem thêm</a>
            <?php } ?>
        </small>
    </div>
    <div class="panel-body">
        <?php foreach ($data['products'] as $p): ?>
            <div class="col-xs-6 col-md-3 item">
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
        <?php if(isset($data['use_paginate'])){?>
            <div class="row">
                <div class="col-lg-12 m-b-30">
                    <small class="pull-right">
                        <?php
                        $params = $this->Paginator->params();
                        if ($params['pageCount'] > 1) {
                            ?>
                            <ul class="pagination pagination-sm">
                                <?php
                                echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                                echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
                                echo $this->Paginator->next('Next &rarr;', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
                                ?>
                            </ul>
                        <?php } ?>
                    </small>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php endif;?>