<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?php echo Configure::read('Site.title') . ' - ' . $title_for_layout ; ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo $this->Html->url('/icon/favicon.ico');?>" type="image/x-icon" rel="icon" />
    <link href="<?php echo $this->Html->url('/icon/favicon.ico');?>" type="image/x-icon" rel="shortcut icon" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $this->Html->url('/icon/apple-icon-57x57.png');?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $this->Html->url('/icon/apple-icon-60x60.png');?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->Html->url('/icon/apple-icon-72x72.png');?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->Html->url('/icon/apple-icon-76x76.png');?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->Html->url('/icon/apple-icon-114x114.png');?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->Html->url('/icon/apple-icon-120x120.png');?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $this->Html->url('/icon/apple-icon-144x144.png');?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->Html->url('/icon/apple-icon-152x152.png');?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->Html->url('/icon/apple-icon-180x180.png');?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $this->Html->url('/icon/android-icon-192x192.png');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $this->Html->url('/icon/favicon-32x32.png');?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->Html->url('/icon/favicon-96x96.png');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $this->Html->url('/icon/favicon-16x16.png');?>">
    <link rel="manifest" href="<?php echo $this->Html->url('/icon/manifest.json');?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo $this->Html->url('/icon/ms-icon-144x144.png');?>">
    <meta name="theme-color" content="#ffffff">
    <?php
    echo $this->fetch('meta');
    echo $this->Html->css(array('bootstrap.min', 'jquery.smartmenus.bootstrap', 'khunglongbe.core'));
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
<?php echo $this->element('facebook');?>
<header>
    <?php echo $this->element('header') ?>
</header>
<div class="container" id="sub-main">
    <div id="quickmenu" class="quickmenu">
        <div class="quickIn">
            <ul class="quicklist">
                <li class="cart"><a href="#none" onclick="javascript:fn_ShoppingBag();return false;">장바구니 <span class="n"><div id="myShoppingBag">0</div></span></a></li>
                <li class="wishlist"><a href="#none" onclick="javascript:fn_goWish();return false;">위시리스트 <span id="wishCount" class="n">0</span></a></li>
                <li class="coupon"><a href="#none" onclick="javascript:fn_goCoupon();return false;">내 쿠폰함 <span id="myCoupon" class="n">0</span></a></li>
                <li class="vipinfo"><a href="/member/vipInfo">VIP/VVIP<br>안내</a></li>
                <li class="proinfo"><a href="/event/eventList">이벤트</a></li>
            </ul>
            <h4 class="title">오늘본상품</h4>

            <div id="recentlyPrd" class="recentlyPrd">
                <div class="prdlist">
                    <a href="http://www.aritaum.com/prod/productList?CATE1CD=PRD1CATE02">sample</a>
                    <!--                        <ul id="testDiv"><li><div class="li"><a href="/noleft/leftNonProductDetail?PRDID=P0000000000000002267"><img src="/upload//images/adm/items/2015/03/b050761e-4a86-4d48-90d5-b3f15aee3527" alt="" style="width:52px;height:52px;"></a></div></li></ul>-->
                </div>

            </div>
        </div>
        <div class="btn_toggle show"><a href="#none" class="close"><span>닫기</span></a><a href="#none" class="open"><span>열기</span></a>
        </div>
        <div class="btn_top"><a href="#none" onclick="goTop();return false;"><img src="<?php echo $this->Html->url('/img/txt_quick_top.gif')?>" alt="TOP"></a></div>
    </div>
    <?php echo $this->element('category_menu'); ?>
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->element('slide'); ?>
        </div>
    </div>
    <div class="row" id="content">
        <?php echo $this->fetch('content') ?>
    </div>
</div>
<footer>
 <?php echo $this->element('footer');?>
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
