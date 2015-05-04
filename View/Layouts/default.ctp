<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    echo $this->Html->meta('icon');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    echo $this->Html->css(array('bootstrap.min','jquery.smartmenus.bootstrap', 'khunglongbe.core'));
    ?>
</head>

<body>
<header class="container-fluid">
    <?php echo $this->element('header')?>
</header>
<?php echo $this->element('top_menu');?>
<div class="container-fluid" id="main">
    <div class="container" id="sub-main">
        <?php echo $this->element('category_menu');?>
        <div class="row">
            <?php echo $this->element('slide');?>
        </div>
        <div class="row" id="content">
            <?php echo $this->fetch('content')?>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="col-lg-12">
            <div class="footer-2"></div>
        </div>
    </div>
    <div class="container-fluid" id="footer-info">
        <div class="container">
            <div class="col-md-3">
                <div class="footer-logo">
                    <img src="images/footer_logo.png" alt="logo">
                </div>
                <div class="fcol-01">
                    <h1>HỖ TRỢ KHÁCH HÀNG</h1>
                    <ul>
                        <li><a href="/web/vi/content/gioi-thieu.html">Giới thiệu</a></li>
                        <li><a href="/web/vi/content/huong-dan-dat-hang.html">Hướng dẫn đặt hàng</a></li>
                        <li><a href="/web/vi/content/chinh-sach-va-quy-dinh-chung.html">Chính sách và quy định chung</a></li>
                        <li><a href="/web/vi/content/dieu-khoan-giao-dich.html">Điều khoản giao dịch</a></li>
                        <li><a href="/web/vi/content/chinh-sach-bao-mat.html">Chính sách bảo mật</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <div class="fcol-03">
                    <h1 style="text-align: right">LIÊN HỆ</h1>
                    <div class="f-contact">
                        <h1 style="text-align:right">ETUDE HOUSE COSMETIC CO., LTD</h1>

                        <p style="text-align:right">44 Đinh Tiên Hoàng, Phường 1,Quận Bình Thạnh,<br>
                            Tp. Hồ Chí Minh, Việt Nam<br>
                            Tel: (84-8)3517&nbsp;6354<br>
                            Fax (84-8) 3517 6359<br>
                            <a href="http://www.beautyhousespa.vn">www.beautyhousespa.vn</a> ; <a href="http://www.etudehouse.com.vn">www.smartdeals.vn</a></p>

                        <p style="text-align:right"><span style="color:#ff0066"><strong><span style="font-family:comic sans ms,cursive">ĐẶT HÀNG: 0902 313 103</span></strong></span></p>

                        <p style="text-align:right"><span style="color:#ff0066"><strong><span style="font-family:comic sans ms,cursive">TƯ VẤN: 0906 770 335</span></strong></span></p>

                        <p style="text-align:right">Email: info@etudehouse.com.vn</p>

                        <p style="text-align:right">&nbsp;</p>                                                    </div>
                </div>
            </div>

        </div>

    </div>
</footer>
<script>
    var cartUrl = '<?php echo $this->Html->url(array(
        'controller' => 'pages',
        'action' => 'cart'
    ))?>';
</script>
<?php
echo $this->Html->script(array('jquery-2.1.1.min', 'bootstrap','jquery.smartmenus','jquery.smartmenus.bootstrap','action'));
?>
</body>
</html>
