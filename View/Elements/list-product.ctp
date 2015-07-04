<?php if (isset($data['products']) && count($data['products'])): ?>
    <div class="panel slide-item">
        <div class="<?php echo $data['class'] ?>"></div>
        <div class="panel-heading has-icon">
            <a href="<?php echo $data['url'] ?>"><?php echo $data['title'] ?></a>
            <hr>
            <small class="pull-right">
                <?php if (isset($data['use_paginate'])) { ?>
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
                <?php } else { ?>
                    <a href="<?php echo $data['url'] ?>">Xem thêm</a>
                <?php } ?>
            </small>
        </div>
        <div class="panel-body">
            <?php
            if (!isset($data['total'])) $data['total'] = 3;
            $count = 0;
            $col = 12 / $data['total'];
            foreach ($data['products'] as $p):?>
                <?php $check = $count % $data['total']; ?>
                <?php if ($count == 0) { ?>
                    <div class="row">
                <?php
                }
                if ($check == 0 && $count != 0) {
                    ?>
                    </div>
                    <!--/row-->
                    <div class="row">
                <?php } ?>
                <div class="col-xs-6 col-md-4 p-item m-b-30">
                    <div class="thumbnail">
                        <div class="img">
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
                                <?php echo $this->Media->image($p['Thumb']['file'], $data['img_w'], $data['img_h'], array()); ?>
                            </a>
                        </div>
                        <span class="brdname"><?php
                            if (isset($providers[$p['Product']['provider_id']])) {
                                echo $this->Html->image(
                                    Configure::read('Img.path')
                                    . $providers[$p['Product']['provider_id']]['thumb'],
                                    array('height' => '35')
                                );
                            }
                            ?></span>
                        <span class="prdname"> <?php echo $p['Product']['name']; ?></span>
                        <span class="price">
                            <?php
                            if (isset($p['Promote']['value'])) {
                                echo "<span class=\"default\"><strong>";
                                echo $this->App->format_money(h($p['Product']['price']));
                                echo "</strong></span>";
                                echo "<span class=\"now\"><strong>";
                                echo $this->App->format_money(h($p['Product']['price']), $p['Promote']['value']);
                                echo "</strong></span>";
                            } else {
                                echo "<span class=\"now\"><strong>";
                                echo $this->App->format_money(h($p['Product']['price']));
                                echo "</strong></span>";
                            }
                            ?>
                        </span>
                    </div>
                </div>

                <?php
                $count++;
                if ($count == count($data['products'])) {
                    ?>
                    </div>
                    <!--/row-->
                <?php } ?>
            <?php endforeach; ?>
            <?php if (isset($data['use_paginate'])) { ?>
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
<?php endif; ?>