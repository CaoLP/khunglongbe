<div class="sidebar-wrap">
    <aside class="widget clearfix">
        <h3 class="widget-title">Bài viết mới</h3>
        <?php foreach ($recents as $post) : ?>
            <div class="side-item">
                <figure class="side-item-thumb">
                    <a href="<?php echo $this->Html->url('/blog/' . $post['Post']['slug']); ?>"
                       title="<?php echo $post['Post']['title'] ?>">
                        <?php echo $this->Media->image($post['Post']['thumb'], 150,150 ,
                            array(
                                'class' => 'widget-thumb-img',
                                'alt' => $post['Post']['title']
                            )
                        );?>
                    </a>
                </figure>
                <div class="side-item-content">
                    <h4><a href="<?php echo $this->Html->url('/blog/' . $post['Post']['slug']); ?>"
                           title="<?php echo $post['Post']['title'] ?>">
                            <?php echo $post['Post']['title'] ?>
                        </a>
                    </h4>

                    <p><?php echo $post['Post']['excert'] ?></p>
                    <ul class="list-unstyled side-item-meta clearfix">
                        <li>
                            <div class="fb-like" data-href="<?php echo $this->Html->url('/blog/'  . '/' . $post['Post']['slug']);?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                        </li>
                        <li>
                            <i class="fa fa-calendar-o"></i>&nbsp;<?php echo date('\N\g\à\y y \t\h\á\n\g d \n\ă\m Y', strtotime($post['Post']['created'])); ?>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </aside>
    <aside id="bird_posts_thumbs_widget-8" class="widget bird_posts_thumbs_widget clearfix">
        <h3 class="widget-title">Bài viết random</h3>
        <?php foreach ($randoms as $post) : ?>
        <div class="side-item-post-thumbs">
            <ul class="list-unstyled clearfix">
                <li>
                    <figure class="side-item-thumb">
                        <a href="<?php echo $this->Html->url('/blog/' . $post['Post']['slug']); ?>" class="thumb-post-title"
                           title="<?php echo $post['Post']['title'] ?>">
                            <?php echo $this->Media->image($post['Post']['thumb'], 150,150 ,
                                array(
                                    'class' => 'widget-thumb-img',
                                    'alt' => $post['Post']['title']
                                )
                            );?>
                        </a>
                    </figure>
                </li>
            </ul>
        </div>
        <?php endforeach; ?>
    </aside>
    <aside id="categories-8" class="widget widget_categories clearfix">
        <h3 class="widget-title">Danh mục</h3>
        <ul>
            <?php foreach ($cats as $cat) : ?>
            <li class="cat-item"><a
                    href="<?php echo $this->Html->url('/blog/' . $cat['PostCategory']['slug']); ?>"
                    title="<?php echo $cat['PostCategory']['name'];?>"><?php echo $cat['PostCategory']['name'];?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </aside>
    <aside class="widget bird_posts_thumbs_widget clearfix">
        <h3 class="widget-title">Có thể bạn thích</h3>
        <div class="side-item-post-thumbs">
            <ul class="list-unstyled clearfix" id="relative">

            </ul>
            </div>
    </aside>
</div>