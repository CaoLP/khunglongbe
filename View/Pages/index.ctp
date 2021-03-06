<div class="col-md-10" id="p-content">
<?php
echo $this->element(
    'slide-product',
    array(
        'data' => array(
            'title'=>'SẢN PHẨM BÁN CHẠY',
            'class' => 'hot',
            'url'=> $this->Html->url(array('controller' => 'pages', 'action' => 'best_sale')),
            'products'=> $best_sale,
            'img_w' => 340,
            'img_h' => 400,
            'total' => 4,
        )
    )
);
echo $this->element(
    'slide-product',
    array(
        'data' => array(
            'title'=>'SẢN PHẨM MỚI',
            'class' => 'new',
            'url'=> $this->Html->url(array('controller' => 'pages', 'action' => 'new_products')),
            'products'=> $new_products,
            'img_w' => 340,
             'img_h' => 400,
            'total' => 4,
        )
    )
);
echo $this->element(
    'slide-product',
    array(
        'data' => array(
            'title'=>'SẢN PHẨM KHUYẾN MÃI',
            'class' => 'sale',
            'url'=> $this->Html->url(array('controller' => 'pages', 'action' => 'promote_products')),
            'products'=> $promote_products,
            'img_w' => 340,
             'img_h' => 400,
            'total' => 4,
        )
    )
);
echo $this->element(
    'slide-product',
    array(
        'data' => array(
            'title'=>'SẢN PHẨM',
            'class' => 'cart',
            'url'=> $this->Html->url(array('controller' => 'pages', 'action' => 'products')),
            'products'=> $products,
            'img_w' => 340,
             'img_h' => 400,
            'total' => 4,
        )
    )
);
?>
</div>