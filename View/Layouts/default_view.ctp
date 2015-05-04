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
    echo $this->Html->css(array('bootstrap.min', 'khunglongbe.core'));
    ?>
</head>

<body>
<header class="container-fluid">

</header>
<nav class="navbar navbar-collapse-center" role="navigation" id="menu">
    <div class="container">
        <ul class="nav nav-pills navbar-center">
            <li><a href="#home-pills" data-toggle="tab">Home</a></li>
            <li><a href="#home-pills" data-toggle="tab">Home</a></li>
            <li><a href="#home-pills" data-toggle="tab">Home</a></li>
            <li><a href="#home-pills" data-toggle="tab">Home</a></li>
            <li><a href="#home-pills" data-toggle="tab">Home</a></li>
            <li><a href="#home-pills" data-toggle="tab">Home</a></li>
            <li><a href="#home-pills" data-toggle="tab">Home</a></li>
            <li><a href="#home-pills" data-toggle="tab">Home</a></li>
        </ul>
    </div>
</nav>
<div class="container-fluid" id="main">
    <div class="container" id="sub-main">
        <div class="row navbar-collapse-center" id="menu-1">
            <ul class="nav nav-pills navbar-center">
                <li><a href="#home-pills" data-toggle="tab">Home</a>
                <li><a href="#home-pills" data-toggle="tab">Home</a>
                <li><a href="#home-pills" data-toggle="tab">Home</a>
                <li><a href="#home-pills" data-toggle="tab">Home</a>
                <li><a href="#home-pills" data-toggle="tab">Home</a>
                <li><a href="#home-pills" data-toggle="tab">Home</a>
                <li><a href="#home-pills" data-toggle="tab">Home</a>
                <li><a href="#home-pills" data-toggle="tab">Home</a>
                <li><a href="#home-pills" data-toggle="tab">Home</a>
            </ul>
        </div>
        <div class="row">
            <div id="carousel-example-generic" class="carousel slide banner_home_big" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item">
                        <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png">

                        <div class="carousel-caption">
                            <h5>Second slide label</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png">

                        <div class="carousel-caption">
                            <h5>Second slide label</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="item active">
                        <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png">

                        <div class="carousel-caption">
                            <h5>Second slide label</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="row" id="content">
            <div class="col-md-3" id="side">
                <ul class="list-group" id="left-side-bar">
                    <li class="list-group-item"><a href="#">Menu 1</a></li>
                    <li class="list-group-item"><a href="#">Menu 2</a></li>
                    <li class="list-group-item"><a href="#">Menu 3</a></li>
                    <li class="list-group-item"><a href="#">Menu 4</a></li>
                </ul>
                <div class="footer_side"></div>
            </div>
            <div class="col-md-9" id="p-content">
                <div class="panel">
                    <div class="panel-heading">WONDER PORE WHIPPING FOAMING | 0g
                        <small class="pull-right"><a href="#">Chia sẻ</a></small>
                    </div>
                    <div class="panel-body prod-detail">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="row">
                                    <div class="col-lg-12 preview-item">
                                        <img src="http://placehold.it/200x300" class="thumbnail image-item img-responsive">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 gallery-item-list">
                                        <div class="thumbnail image-item">
                                            <img src="http://placehold.it/60x70" class="">
                                        </div>
                                        <div class="thumbnail image-item">
                                            <img src="http://placehold.it/60x70" class="">
                                        </div>
                                        <div class="thumbnail image-item">
                                            <img src="http://placehold.it/60x70" class="">
                                        </div>
                                        <div class="thumbnail image-item">
                                            <img src="http://placehold.it/60x70" class="">
                                        </div>
                                        <div class="thumbnail image-item">
                                            <img src="http://placehold.it/60x70" class="">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="desc"><p>WONDER PORE WHIPPING FOAMING | 0g</p></div>
                                        <div class="desc-line"><div></div></div>
                                        <div class="price-box m-top-10">
                                            <div class="bg1">
                                                <ul class="price">
                                                    <li><span>450.</span></li>
                                                    <li><span>000VND</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="props-box m-top-10">
                                            <table>
                                                <tbody><tr>
                                                    <td><span class="prop-name">Trọng lượng</span></td>
                                                    <td>:</td>
                                                    <td><span class="prop-val">0g</span></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="prop-name">Tình trạng</span></td>
                                                    <td>:</td>
                                                    <td><span class="prop-val">Còn hàng</span></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="prop-name">Đánh giá</span></td>
                                                    <td>:</td>
                                                    <td>
                                                        <ul class="rating">
                                                            <li></li>
                                                            <li></li>
                                                            <li></li>
                                                            <li class="dark"></li>
                                                            <li class="dark"></li>
                                                        </ul>
                                                        <span class="rating-val">(0)</span>
                                                    </td>
                                                </tr>
                                                </tbody></table>
                                        </div>
                                        <div class="ym-clearfix"></div>
                                    </div>
                                </div>
                                <div class="row m-top-10">
                                    <div class="col-lg-12 text-center">
                                        <a href="javascript:;" class="btn btn-sm btn-bink">Mua</a>
                                        <a href="javascript:;" class="btn btn-sm btn-bink">Cho vào giỏ</a>
                                        <a href="javascript:;" class="btn btn-sm btn-bink">Chia sẻ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div role="tabpanel">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-bink" role="tablist">
                                    <li role="presentation" class="active"><a href="#info" aria-controls="home" role="tab" data-toggle="tab">Thông tin</a></li>
                                    <li role="presentation"><a href="#vote" aria-controls="profile" role="tab" data-toggle="tab">Đánh giá</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="info">..0.</div>
                                    <div role="tabpanel" class="tab-pane fade" id="vote">..1.</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <li><a href="/web/vi/content/chinh-sach-va-quy-dinh-chung.html">Chính sách và quy định chung</a>
                        </li>
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
                            <a href="http://www.beautyhousespa.vn">www.beautyhousespa.vn</a> ; <a
                                href="http://www.etudehouse.com.vn">www.smartdeals.vn</a></p>

                        <p style="text-align:right"><span style="color:#ff0066"><strong><span
                                        style="font-family:comic sans ms,cursive">ĐẶT HÀNG: 0902 313 103</span></strong></span>
                        </p>

                        <p style="text-align:right"><span style="color:#ff0066"><strong><span
                                        style="font-family:comic sans ms,cursive">TƯ VẤN: 0906 770 335</span></strong></span>
                        </p>

                        <p style="text-align:right">Email: info@etudehouse.com.vn</p>

                        <p style="text-align:right">&nbsp;</p></div>
                </div>
            </div>

        </div>

    </div>
</footer>
<?php
echo $this->Html->script(array('jquery-2.1.1.min', 'bootstrap'));
?>
</body>
</html>
