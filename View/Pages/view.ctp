<div class="col-md-2" id="side">
    <?php echo $this->element('sidebar'); ?>
</div>
<div class="col-md-10" id="p-content">
    <div class="panel">
        <div class="panel-heading"><?php echo $product['Product']['name'] ?>
            <small class="pull-right"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php
                echo $this->Html->url(
                    array(
                        'controller' => 'pages',
                        'action' => 'view',
                        'category' => $product['Category']['slug'],
                        'slug' => $product['Product']['slug'],
                    ),true
                );
                ?>&t=<?php echo $product['Product']['name'];?>"
                class="share-popup"
                target="_blank" title="Share on Facebook">Chia sẻ</a></small>
        </div>
        <div class="panel-body prod-detail">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="row">
                        <div class="col-lg-12 preview-item">
                            <img src="<?php
                            if (isset($product['Thumb']['file']))
                                echo Configure::read('Img.path') . $product['Thumb']['file'];
                            else echo Configure::read('Img.noImage')
                            ?>" class="thumbnail image-item img-responsive">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 gallery-item-list">
                            <?php foreach ($product['Media'] as $media) { ?>
                                <div class="thumbnail image-item">
                                    <img src="<?php echo Configure::read('Img.path') . $media['file']; ?>" class="">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <?php echo $this->Form->create('OrderDetail',array('id'=>'OrderDetailViewForm','url'=> $this->Html->url(
                            array(
                                'controller' => 'pages',
                                'action' => 'order'
                            )
                        )));
                    echo $this->Form->input('product_id',array('type'=>'hidden','value'=>$product['Product']['id']));
                    echo $this->Form->input('price',array('type'=>'hidden','value'=>$product['Product']['price']));
                    echo $this->Form->input('name',array('type'=>'hidden','value'=>$product['Product']['name']));
                    echo $this->Form->input('sku',array('type'=>'hidden','value'=>$product['Product']['sku']));
                    if(isset($product['Promote']['value'])){
                        echo $this->Form->input('promote_id',array('type'=>'hidden','value'=>$product['Promote']['id']));
                        echo $this->Form->input('promote_value',array('type'=>'hidden','value'=>$product['Promote']['value']));
                        echo $this->Form->input('promote_type',array('type'=>'hidden','value'=>$product['Promote']['type']));
                    }
                    if(isset($product['Product']['thumb']))
                        echo $this->Form->input('thumb',array('type'=>'hidden','value'=>$product['Product']['thumb']));
                    else
                        echo $this->Form->input('thumb',array('type'=>'hidden','value'=>Configure::read('Img.noImage')));
                    $t = $product;
                    unset($t['Product']['descriptions']);
                    echo $this->Form->input('data',array('type'=>'textarea',
                        'div'=>array('class'=>'hidden'),
                        'value'=> json_encode($t)
                        )
                    );
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="desc"><strong><?php echo $product['Product']['excert'] ?></strong></div>
                            <div class="desc-line">
                                <div></div>
                            </div>
                            <div class="product-type"><strong><?php echo $types[$product['Product']['type']] ?></strong></div>
                            <div class="price-box m-top-10">
                                <?php if (isset($product['Promote']['value'])) {
                                    echo '
                                <div class="bg2">
                                    <ul class="price">
                                       ' . $this->App->format_detail_money($product['Product']['price'],$product['Promote']['value']) . '
                                    </ul>
                                     <ul class="price2">
                                       ' . $this->App->format_detail_money($product['Product']['price']) . '
                                    </ul>
                                </div>';
                                }else{
                                    echo '
                                <div class="bg1">
                                    <ul class="price">
                                       ' . $this->App->format_detail_money($product['Product']['price']) . '
                                    </ul>
                                </div>';
                                }
                                ?>

                            </div>
                            <div class="props-box m-top-10">
                                <table>
                                    <tbody>
                                    <?php
                                    foreach($options as $key=>$option){
                                        echo "<tr>";
                                        echo " <td><span class=\"prop-name\">{$key}</span></td>";
                                        echo "<td>:</td>";
                                        if(count($option) <= 1){
                                            foreach($option as $op){
                                                echo "<td><span class=\"prop-val\">{$op['name']}</span></td>";
//                                                echo $this->Form->input('options.',array('type'=>'hidden','value'=>$op['id'].'-'.$op['name'], 'div'=>false,'label'=>false));
                                            }
                                        }else{
                                            $temp = array();
                                            foreach($option as $each){
                                                $each['group_name'] = $key;
                                                $temp[] = $each;
                                            }
                                            echo "<td><span class=\"prop-val\">";
                                            $ops = Set::combine($temp,array('{0}|{1}: {2}','{n}.id','{n}.group_name','{n}.name'),'{n}.name');
                                            echo $this->Form->input('options.',array('options'=>$ops, 'div'=>false,'label'=>false));
                                            echo "</span></td>";
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                    <tr>
                                        <td><span class="prop-name">Số lượng</span></td>
                                        <td>:</td>
                                        <td><span class="prop-val"><?php echo $this->Form->input('qty',array(
                                                    'value'=>'1','data-type'=>'number','class'=>'border-1 qty','div'=>false,'label'=>false,'min'=> 1
                                                    )
                                                );?></span></td>
                                    </tr>
<!--                                    <tr>-->
<!--                                        <td><span class="prop-name">Đánh giá</span></td>-->
<!--                                        <td>:</td>-->
<!--                                        <td>-->
<!--                                            <ul class="rating">-->
<!--                                                <li></li>-->
<!--                                                <li></li>-->
<!--                                                <li></li>-->
<!--                                                <li class="dark"></li>-->
<!--                                                <li class="dark"></li>-->
<!--                                            </ul>-->
<!--                                            <span class="rating-val">(0)</span>-->
<!--                                        </td>-->
<!--                                    </tr>-->
                                    </tbody>
                                </table>
                            </div>
                            <div class="ym-clearfix"></div>
                        </div>
                    </div>
                    <div class="row m-top-10">
                        <div class="col-lg-12 text-center">
                            <a href="javascript:;" class="btn btn-sm btn-bink buy">Mua</a>
                            <a href="javascript:;" class="btn btn-sm btn-bink add-cart">Cho vào giỏ</a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php
                            echo $this->Html->url(
                                array(
                                    'controller' => 'pages',
                                    'action' => 'view',
                                    'category' => $product['Category']['slug'],
                                    'slug' => $product['Product']['slug'],
                                ),true
                            );
                            ?>&t=<?php echo $product['Product']['name'];?>"
                               target="_blank" title="Share on Facebook"
                               class="btn btn-sm btn-bink share-popup">Chia sẻ</a>
                        </div>
                    </div>
                    <?php echo $this->Form->end();?>
                    <div class="row m-top-10">
                        <div
                            class="fb-like"
                            data-share="true"
                            data-width="450"
                            data-show-faces="true">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div role="tabpanel">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-bink" role="tablist">
                        <li role="presentation" class="active"><a href="#info" aria-controls="home" role="tab"
                                                                  data-toggle="tab">Thông tin</a></li>
                        <li role="presentation"><a href="#vote" aria-controls="profile" role="tab" data-toggle="tab">Đánh
                                giá</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="info">
                            <?php echo $product['Product']['descriptions'] ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="vote">

                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="fb-comments"
                         data-href="<?php echo $this->Html->url($this->request->here,true); ?>"
                         data-numposts="15" data-colorscheme="light">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>