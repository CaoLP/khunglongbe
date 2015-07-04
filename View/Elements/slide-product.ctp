<?php if (isset($data['products']) && count($data['products'])): ?>
    <div class="panel slide-item">
        <div class="<?php echo $data['class'] ?>"></div>
        <div class="panel-heading has-icon">
            <a href="<?php echo $data['url'] ?>"><?php echo $data['title'] ?></a>
            <hr>
            <small class="pull-right">
                <a href="<?php echo $data['url'] ?>">Xem tất cã</a>
            </small>
        </div>
        <div class="panel-body">
            <div>
                <div id="carousel-<?php echo $data['class']; ?>" class="carousel" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <?php
                        $count = 0;
                        $col = 12 / $data['total'];
                        foreach ($data['products'] as $p):?>
                            <?php $check = $count % $data['total']; ?>
                            <?php if ($count == 0) { ?>
                                <div class="item <?php echo $count == 0 ? "active" : ""; ?>">
                                <div class="row">
                            <?php
                            }
                            if ($check == 0 && $count != 0) {
                                ?>
                                </div>
                                <!--/row-->
                                </div>
                                <!--/item-->
                                <div class="item">
                                <div class="row">
                            <?php } ?>
                            <div class="col-xs-<?php echo $col; ?> p-item">
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
                                        <?php echo $this->Media->image(
                                            $p['Thumb']['file'],
                                            $data['img_w'],
                                            $data['img_h'],
                                            array('class' => 'img-responsive')); ?>
                                    </a>
                                </div>
                                <span class="brdname"><?php
                                        if(isset($providers[$p['Product']['provider_id']])){
                                            echo $this->Html->image(
                                                Configure::read('Img.path')
                                                .$providers[$p['Product']['provider_id']]['thumb'],
                                                array('height'=>'35')
                                            );
                                        }
                                    ?></span>
                                <span class="prdname"> <?php echo $p['Product']['name']; ?></span>
                                <span class="price">
                                    <?php
                                    if(isset($p['Promote']['value'])){
                                        echo "<span class=\"default\"><strong>";
                                        echo $this->App->format_money(h($p['Product']['price']));
                                        echo "</strong></span>";
                                        echo "<span class=\"now\"><strong>";
                                        echo $this->App->format_money(h($p['Product']['price']), $p['Promote']['value']);
                                        echo "</strong></span>";
                                    }else{
                                        echo "<span class=\"now\"><strong>";
                                        echo $this->App->format_money(h($p['Product']['price']));
                                        echo "</strong></span>";
                                    }
                                    ?>
                                </span>

                            </div>
                            <?php
                            $count++;
                            if ($count == count($data['products'])) {
                                ?>
                                </div>
                                <!--/row-->
                                </div>
                                <!--/item-->
                            <?php } ?>
                        <?php endforeach; ?>
                    </div>
                    <a class="left carousel-control" href="#carousel-<?php echo $data['class']; ?>" role="button"
                       data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-<?php echo $data['class']; ?>" role="button"
                       data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>