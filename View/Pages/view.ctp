<?php
echo $this->Html->script(array('jquery.etalage.min.js','view.js'),array('inline'=>false));
echo $this->Html->css(array('etalage.css'),array('inline'=>false));
?>
<div class="col-md-12" id="p-content">
    <div class="panel productDetail">
        <div class="panel-heading">
            <h2><?php echo $product['Product']['name'] ?>
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
            </h2>
            <p class="des">
                <?php echo $product['Product']['excert'] ?>
            </p>
        </div>
        <div class="panel-body prod-detail">
            <div class="row detail">
                <div class="col-md-4 text-center">
                    <div class="row m-top-10">
                        <div
                            class="fb-like"
                            data-share="true"
                            data-width="450"
                            data-show-faces="true">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 preview-item">
                            <ul id="etalage">
                                <?php foreach ($product['Media'] as $media) { ?>
                                    <li>
                                        <?php echo $this->Media->image($media['file'], 302, 402, array('class'=>'etalage_thumb_image img-responsive', 'disable_size'=>true)); ?>
                                        <img src="<?php echo Configure::read('Img.path') . $media['file']; ?>" class="etalage_source_image img-responsive">
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 summaryinfo">
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
                    <dl>
                        <dt class="col-xs-4">Giá</dt>
                        <dd class="col-xs-8">
                            <?php if (isset($product['Promote']['value'])) {
                                $price = $product['Product']['price'] - ($product['Product']['price'] * ($product['Promote']['value']/100))
                                ?>
                                <strong class="old-price"><?php echo $this->App->format_money_normal($product['Product']['price'])?></strong>
                                <strong class="c-pink" id="b-price" data-price="<?php echo $price;?>"><?php echo $this->App->format_money_normal($price)?></strong> VNĐ
                            <?php } else {
                                $price = $product['Product']['price'];
                                ?>
                                <strong class="c-pink" id="b-price" data-price="<?php echo $price;?>"><?php echo $this->App->format_money_normal($price)?></strong> VNĐ
                            <?php }?>
                        </dd>
                    </dl>
                    <?php
                    foreach($options as $key=>$option){
                        echo "<dl>";
                        echo " <dt class=\"col-xs-4\"><span class=\"prop-name\">{$key}</span></dt>";
                        if(count($option) <= 1){
                            foreach($option as $op){
                                echo "<dd class=\"col-xs-8\"><span class=\"prop-val\">{$op['name']}</span></dd>";
//                                                echo $this->Form->input('options.',array('type'=>'hidden','value'=>$op['id'].'-'.$op['name'], 'div'=>false,'label'=>false));
                            }
                        }else{
                            $temp = array();
                            foreach($option as $each){
                                $each['group_name'] = $key;
                                $temp[] = $each;
                            }
                            echo "<dd class=\"col-xs-8\"><span class=\"prop-val\">";
                            $ops = Set::combine($temp,array('{0}|{1}: {2}','{n}.id','{n}.group_name','{n}.name'),'{n}.name');
                            echo $this->Form->input('options.',array('options'=>$ops, 'div'=>false,'label'=>false));
                            echo "</span></dd>";
                        }
                        echo "</dl>";
                    }
                    ?>
                    <dl class="qty">
                        <dt class="col-xs-4">Số lượng</dt>
                        <dd class="col-xs-8">
                            <span class="select-qty">
                                <button type="button" class="minus" onclick="prcChange2(-1); return false;"><i class="fa fa-minus"></i></button>
                                <?php echo $this->Form->input('qty',array(
                                        'value'=>'1','readonly','data-type'=>'number','id'=>'qty','class'=>'p-qty','div'=>false,'label'=>false,'min'=> 1
                                    )
                                );?>
                                <button type="button" class="plus" onclick="prcChange2(1); return false;"><i class="fa fa-plus"></i></button>
                            </span>
                        </dd>
                    </dl>
                    <div class="total">
                        <strong class="t col-xs-4">Tổng cộng</strong>
                        <div class="col-xs-8">
                            <em id="totalPrcDiv">
                                <?php echo $this->App->format_money_normal($price)?>
                            </em>
                            <small>VNĐ</small>
                        </div>
                    </div>
                    <div class="row btnwrap">
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
                               class="btn btn-sm btn-blue share-popup">Chia sẻ</a>
                        </div>
                    </div>
                    <?php echo $this->Form->end();?>
                </div>
                <div class="col-md-2">

                </div>
            </div>
            <div class="row relation">
                <div class="col-md-8">

                </div>
                <div class="col-md-4">

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