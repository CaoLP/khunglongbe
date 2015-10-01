<?php
if(!empty($use_slide))
echo $this->element(
    'slide-product',
    array(
        'data' => array(
            'title'=> $title,
            'class' => uniqid(),
            'url'=> $this->Html->url(array('controller' => 'pages', 'action' => 'new_products')),
            'products'=> $products,
            'img_w' => 340,
            'img_h' => 400,
            'total' => $total_item,
        )
    )
);
else
    foreach ($products as $p) {
        ?>
        <li>
            <figure class="side-item-thumb">
                <a href="<?php
                echo $this->Html->url(
                    array(
                        'controller' => 'pages',
                        'action' => 'view',
                        'category' => $p['Category']['slug'],
                        'slug' => $p['Product']['slug'],
                    )
                )
                ?>" class="thumb-post-title"
                   title="<?php echo $p['Product']['name'] ?>">
                    <?php echo $this->Media->image($p['Thumb']['file'], 150,150 ,
                        array(
                            'class' => 'widget-thumb-img',
                            'alt' => $p['Product']['name']
                        )
                    );?>
                </a>
            </figure>
        </li>
    <?php } ?>

