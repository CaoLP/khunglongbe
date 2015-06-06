<div class="container">
    <div class="col-lg-12">
        <div class="footer-2"></div>
    </div>
</div>
<div class="container-fluid" id="footer-info">
    <div class="container">
        <div class="col-md-4">
            <div class="footer-logo">
                <?php echo $this->Html->image('logo_bottom.png',array('width'=>56, 'alt'=>Configure::read('Site.title')))?>
            </div>
            <div class="fcol-01">
                <h1>HỖ TRỢ KHÁCH HÀNG</h1>
                <ul>
                    <li><a href="<?php echo $this->Html->url('/gioi-thieu')?>">Giới thiệu</a></li>
                    <li><a href="<?php echo $this->Html->url('/huong-dan')?>">Hướng dẫn đặt hàng</a></li>
                    <li><a href="https://www.facebook.com/khunglongbe.co">
                            <i class="fa fa-facebook-square facebook-logo"></i> <?php echo Configure::read('Site.title')?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="fb-page" data-href="https://www.facebook.com/khunglongbe.co"
                 data-hide-cover="false"
                 data-show-facepile="true"
                 data-show-posts="false">
                <div class="fb-xfbml-parse-ignore">
                    <blockquote cite="https://www.facebook.com/khunglongbe.co">
                        <a href="https://www.facebook.com/khunglongbe.co">Khủng long bé</a>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="fcol-03">
                <h1 style="text-align: right">LIÊN HỆ</h1>

                <div class="f-contact">
                    <a href="<?php echo $this->Html->url('/',true);?>">
                        <h1 style="text-align:right"><?php echo Configure::read('Site.title');?></h1>
                    </a>
                    <p style="text-align:right">
                        <span style="color:#ff0066">
                            <strong><span>ĐẶT HÀNG: 0938 116 698 (Xuân) - 0902 420 514 (Kao)</span>
                            </strong>
                        </span>
                    </p>

                    <p style="text-align:right"><span style="color:#ff0066">
                            <strong>
                                <span >TƯ VẤN: 0938 116 698 (Xuân)</span>
                            </strong>
                        </span>
                    </p>

                    <p style="text-align:right"><a href="mailto:khunglongbe.com@gmail.com">Email: khunglongbe.com@gmail.com</a></p>

                    <p style="text-align:right">&nbsp;</p></div>
            </div>
        </div>

    </div>

</div>