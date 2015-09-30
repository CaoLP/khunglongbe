<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?php echo Configure::read('Site.title') . ' - ' . $title_for_layout; ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo $this->Html->url('/icon/favicon.ico'); ?>" type="image/x-icon" rel="icon"/>
    <link href="<?php echo $this->Html->url('/icon/favicon.ico'); ?>" type="image/x-icon" rel="shortcut icon"/>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $this->Html->url('/icon/apple-icon-57x57.png'); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $this->Html->url('/icon/apple-icon-60x60.png'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->Html->url('/icon/apple-icon-72x72.png'); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->Html->url('/icon/apple-icon-76x76.png'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->Html->url('/icon/apple-icon-114x114.png'); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->Html->url('/icon/apple-icon-120x120.png'); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $this->Html->url('/icon/apple-icon-144x144.png'); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->Html->url('/icon/apple-icon-152x152.png'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->Html->url('/icon/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?php echo $this->Html->url('/icon/android-icon-192x192.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $this->Html->url('/icon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->Html->url('/icon/favicon-96x96.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $this->Html->url('/icon/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?php echo $this->Html->url('/icon/manifest.json'); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo $this->Html->url('/icon/ms-icon-144x144.png'); ?>">
    <meta name="theme-color" content="#ffffff">
    <?php
    echo $this->fetch('meta');
    echo $this->Html->css(array('bootstrap.min', 'jquery.smartmenus.bootstrap', 'khunglongbe.core', 'blogs'));
    echo $this->fetch('css');
    ?>
    <script>
        var slide = "<?php echo $this->Html->url(
            array(
                'controller' => 'pages',
                'action' => 'promotes',
            )
        );?>";
    </script>
</head>

<body>
<?php echo $this->element('facebook'); ?>
<header>
    <?php echo $this->element('header') ?>
</header>
<div class="container" id="sub-main">
    <div id="quickmenu" class="quickmenu">
        <div class="quickIn">
            <ul class="quicklist">
                <li class="cart"><a href="#none" onclick="javascript:fn_ShoppingBag();return false;">???? <span
                            class="n"><div id="myShoppingBag">0</div></span></a></li>
                <li class="wishlist"><a href="#none" onclick="javascript:fn_goWish();return false;">????? <span
                            id="wishCount" class="n">0</span></a></li>
                <li class="coupon"><a href="#none" onclick="javascript:fn_goCoupon();return false;">? ??? <span
                            id="myCoupon" class="n">0</span></a></li>
                <li class="vipinfo"><a href="/member/vipInfo">VIP/VVIP<br>??</a></li>
                <li class="proinfo"><a href="/event/eventList">???</a></li>
            </ul>
            <h4 class="title">?????</h4>

            <div id="recentlyPrd" class="recentlyPrd">
                <div class="prdlist">
                    <a href="http://www.aritaum.com/prod/productList?CATE1CD=PRD1CATE02">sample</a>
                    <!--                        <ul id="testDiv"><li><div class="li"><a href="/noleft/leftNonProductDetail?PRDID=P0000000000000002267"><img src="/upload//images/adm/items/2015/03/b050761e-4a86-4d48-90d5-b3f15aee3527" alt="" style="width:52px;height:52px;"></a></div></li></ul>-->
                </div>

            </div>
        </div>
        <div class="btn_toggle show"><a href="#none" class="close"><span>??</span></a><a href="#none"
                                                                                         class="open"><span>??</span></a>
        </div>
        <div class="btn_top"><a href="#none" onclick="goTop();return false;"><img
                    src="<?php echo $this->Html->url('/img/txt_quick_top.gif') ?>" alt="TOP"></a></div>
    </div>
    <?php echo $this->element('category_menu'); ?>
    <div class="row">
        <?php echo $this->element('slide'); ?>
    </div>
    <div class="row" id="content">
        <?php echo $this->fetch('content') ?>
        <div class="col-md-4" id="left-side-bar">
            <div class="sidebar-wrap">
                <aside class="widget clearfix">
                    <h3 class="widget-title">Most Popular (views)</h3>

                    <div class="side-item">
                        <figure class="side-item-thumb">
                            <a href="http://themes.birdwp.com/zefir/post-3/" title="Gallery format – Sticky post">
                                <img
                                    src="http://themes.birdwp.com/zefir/wp-content/uploads/2014/05/girl-flowers-150x150.jpg"
                                    class="widget-thumb-img" alt="Gallery format – Sticky post">
                            </a>
                        </figure>
                        <div class="side-item-content">
                            <h4><a href="http://themes.birdwp.com/zefir/post-3/" title="Gallery format – Sticky post">Gallery
                                    format – Sticky post</a></h4>

                            <p>Pellentesque libero tortor, tincidunt et, tincidunt eget, semper nec, quam. Sed
                                hendrerit. Morbi ac ...</p>
                            <ul class="list-unstyled side-item-meta clearfix">
                                <li><i class="fa fa-eye"></i>&nbsp;9493</li>
                                <li><span class="jm-post-like"><a rel="nofollow" href="#" data-post_id="127"
                                                                  onclick="return false;"><span class="like"><i
                                                    class="fa fa-heart-o"></i></span><span class="count">260</span></a></span>
                                </li>
                                <li><i class="fa fa-calendar-o"></i>&nbsp;May 1, 2014</li>
                            </ul>
                        </div>
                    </div>
                </aside>
                <aside id="bird_posts_thumbs_widget-8" class="widget bird_posts_thumbs_widget clearfix">
                    <h3 class="widget-title">Random posts</h3>

                    <div class="side-item-post-thumbs">
                        <ul class="list-unstyled clearfix">
                            <li>
                                <figure class="side-item-thumb">
                                    <a href="http://themes.birdwp.com/zefir/post-4/" class="thumb-post-title"
                                       data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Vestibulum ante ipsum primis">
                                        <img
                                            src="http://themes.birdwp.com/zefir/wp-content/uploads/2014/05/6-150x150.jpg"
                                            class="widget-thumb-img" alt="Vestibulum ante ipsum primis">
                                    </a>
                                </figure>
                            </li>
                        </ul>
                    </div>

                </aside>
                <aside id="categories-8" class="widget widget_categories clearfix">
                    <h3 class="widget-title">Categories</h3>
                    <ul>
                        <li class="cat-item cat-item-97"><a
                                href="http://themes.birdwp.com/zefir/category/fullwidth-post/"
                                title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec.">Fullwidth
                                post</a>
                        </li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
</div>
<footer>
    <?php echo $this->element('footer'); ?>
</footer>
<script>
    var cartUrl = '<?php echo $this->Html->url(array(
        'controller' => 'pages',
        'action' => 'cart'
    ))?>';
</script>
<?php
echo $this->Html->script(array('jquery-2.1.1.min', 'bootstrap', 'jquery.smartmenus', 'jquery.smartmenus.bootstrap', 'action'));
echo $this->fetch('script');

?>
</body>
</html>
