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
    echo $this->Html->css(array('bootstrap.min', 'style'));
    ?>

</head>

<body>

<?php
echo $this->Element('navigation');
?>

<div class="container" id="main">
    <div id="top">
        <div class="div-left">
            <div class="list-group">
                <a href="#" class="list-group-item">Cras justo odio</a>
                <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                <a href="#" class="list-group-item">Morbi leo risus</a>
                <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                <a href="#" class="list-group-item">Vestibulum at eros</a>
                <a href="#" class="list-group-item">Vestibulum at eros</a>
                <a href="#" class="list-group-item">Vestibulum at eros</a>
                <a href="#" class="list-group-item">Vestibulum at eros</a>
            </div>
        </div>
        <div class="div-right">
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
            <div class="banner_home_small">
                <a href="#" class="">
                    <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
                </a>
                <a href="#" class="">
                    <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
                </a>
                <a href="#" class="">
                    <img class="end" src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /.container 1 -->

<div class="container list-deal" style="margin-top: 10px">
<div class="row">
    <div class="col-lg-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12"><h5>Khuyến mãi tốt nhất</h5></div>
</div>
<div class="row">
    <div class="col-lg-4 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12"><h5 class="pull-left">Thời Trang - Phụ Kiện</h5><div class="pull-right">
            <a class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i></a>
            <a class="btn btn-sm btn-default"><i class="fa fa-arrow-right"></i></a>
        </div></div>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 p-item">
        <div class="thumbnail">
            <img src="http://krazicode.com/codecanyon/html/flatron/img/1.png" alt="">
            <div class="caption">
                <h6>Thumbnail label</h6>
                <strong>8.390.000đ</strong>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container 2 -->

<?php
echo $this->Html->script(array('jquery-2.1.1.min', 'bootstrap'));
?>
</body>
</html>
