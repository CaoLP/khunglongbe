<div class="container relative-position">
    <div class="logo">

    </div>

    <div class="box-search">
        <div class="container">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control input-sm" placeholder="Tìm kiếm...">
              <span class="input-group-btn">
                <button class="btn btn-pink" type="button">Tìm !</button>
              </span>
                </div>
            </form>
        </div>

    </div>

    <div class="shop-cart">
        <ul class="nav navbar-nav navbar-right">
            <?php
            $cart = $this->Session->read('Shop.cart');
            $html_cart = '';
            $total = 0;
            if(count($cart) > 0)
            foreach ($cart as $item) {
                $price = $item['OrderDetail']['price'];
                if (isset($item['OrderDetail']['promote_value'])) {
                    $price = $price - ($price * ($item['OrderDetail']['promote_value'] / 100));
                }
                $sum = $price * $item['OrderDetail']['qty'];
                $total += $sum;
                $html_cart .= "<li>
                <div class=\"item\">
                    <div class=\"item-left\">
                        {$this->Media->image($item['OrderDetail']['thumb'], 50, 50, array())}
                        <div class=\"item-info\">
                            <div class=\"name\">{$item['OrderDetail']['name']}</div>
                            <div class=\"price\">
                                <small>({$item['OrderDetail']['qty']}) {$this->App->format_money($sum)}</small>
                            </div>
                        </div>
                    </div>
                    <div class=\"item-right\">
                        <button class=\"btn btn-xs btn-danger pull-right remove\">x</button>
                    </div>
                </div>
            </li>";
            }

            ?>

            <li class="dropdown" id="cart">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <div class="price pull-left">
                        <?php echo $this->App->format_cart_money($total); ?>
                    </div>
                    <i class="fa fa-shopping-cart">(<?php echo count($cart); ?>)</i>
                </a>
                <ul class="dropdown-menu dropdown-cart" role="menu">
                    <?php echo $html_cart; ?>
                    <li><a class="text-center" href="<?php
                        echo $this->Html->url(array(
                            'controller' => 'pages',
                            'action' => 'cart'
                        ));
                        ?>">Xem giỏ</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>