<div class="col-md-2" id="side">
    <?php echo $this->element('sidebar');?>
</div>
<div class="col-md-10" id="p-content">
    <div class="panel">
        <div class="cart"></div>
        <div class="panel-heading has-icon">SẢN PHẨM MỚI
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
        </div>
    </div>
</div>