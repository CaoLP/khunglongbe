<?php echo $this->element('top_menu'); ?>
<div class="container header-box">
    <div class="col-md-3">
        <div class="box-search">
                <form action="<?php echo $this->Html->url('/tim-kiem')?>">
                    <div class="input-group">
                        <input type="text" name="q" value="" class="form-control input-sm" placeholder="Tìm kiếm...">
                        <button class="btn-search" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
    </div>
    <div class="col-md-6">
<!--        <h1>--><?php //echo Configure::read('Site.title');?><!--</h1>-->
    </div>
    <div class="col-md-3 text-right">
        <ul class="nav-side">
            <li><a href="<?php echo $this->Html->url('/su-kien');?>"><i class="fa fa-gift"></i> Sự kiện</a></li>
            <li><a href="<?php echo $this->Html->url('/blog');?>"><i class="fa fa-heart"></i> Blog</a></li>
        </ul>
    </div>
</div>