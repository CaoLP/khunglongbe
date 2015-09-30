<div class="col-md-8">
    <?php foreach($posts as $post) : ?>
        <!-- blog post -->
        <article class="post-full-width">
            <div class="post-wrap-full col-md-6" style="border-top: 4px solid #8de3e8">

                <!-- top meta inf -->
                <div class="top-meta-inf-wrap">
                    <ul class="list-unstyled meta-inf meta clearfix">
                        <li>
                            <i class="fa fa-bookmark"></i><a href="<?php echo $this->Html->url('/blog/' . $blog_cat['PostCategory']['slug']);?>" rel="category tag">
                                <?php echo $blog_cat['PostCategory']['name']?>
                            </a>
                        </li>
                        <li><i class="fa fa-calendar-o"></i>&nbsp;<?php echo date('\N\g\à\y y \t\h\á\n\g d \n\ă\m Y',strtotime($post['Post']['created']));?></li>
                    </ul>
                </div>
                <!-- end top meta inf -->

                <!-- post title box -->
                <div class="post-title-wrap">
                    <h1 class="h3 post-title entry-title">
                        <a href="<?php echo $this->Html->url('/blog/' . $post['Post']['slug']);?>">
                            <?php echo $post['Post']['title'] ?>
                        </a>
                    </h1>
                </div>
                <!-- end post title box -->

                <!-- post thumb -->
                <figure class="post-thumb-wrap">
                    <div class="post-thumb">
                        <a href="<?php echo $this->Html->url('/blog/'  . '/' . $post['Post']['slug']);?>">
                            <?php echo $this->Media->image($post['Post']['thumb'], 373,249 ,
                                array(
                                    'class' => 'attachment-single-post-thumb-crop wp-post-image',
                                    'alt' => $post['Post']['title']
                                )
                            );?>
                        </a>
                    </div>
                </figure>
                <!-- end post thumb -->

                <!-- post content -->
                <div class="post-content " itemprop="articleBody">
                    <?php $post['Post']['excert'] ?>
                </div>
                <!-- end post content -->

                <!-- bottom meta inf -->
                <div class="bottom-meta-inf-wrap">
                    <?php if(false) :?>
                    <ul class="list-unstyled bottom-meta-inf meta clearfix">
                        <li><i class="fa fa-eye"></i>7558</li>
                        <li><a href="http://themes.birdwp.com/zefir/post-25/#comments"><i class="fa fa-comment-o"></i>5</a></li>
                        <li><span class="jm-post-like"><a rel="nofollow" href="#" data-post_id="827" onclick="return false;"><span class="like"><i class="fa fa-heart-o"></i></span><span class="count">249</span></a></span></li>
                        <li class="share-icon">
                            <a rel="nofollow" href="#" data-share_id="827"><i class="fa fa-share-alt"></i></a>
              <span id="share-block-827" class="share-block-wrap share-block-hidden">
                <ul class="list-unstyled clearfix">
                    <li class="share-facebook">
                        <a rel="nofollow" href="#" onclick="window.open('http://www.facebook.com/sharer.php?u=http://themes.birdwp.com/zefir/post-25/', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0'); return false" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="share-twitter">
                        <a rel="nofollow" href="#" onclick="window.open('https://twitter.com/intent/tweet?text=Post with featured image&url=http://themes.birdwp.com/zefir/post-25/', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0'); return false" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="share-google-plus">
                        <a rel="nofollow" href="#" onclick="window.open('https://plus.google.com/share?url=http://themes.birdwp.com/zefir/post-25/', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0'); return false" target="_blank"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li class="share-linkedin">
                        <a rel="nofollow" href="#" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=http://themes.birdwp.com/zefir/post-25/&title=Post with featured image', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=600, height=400, toolbar=0, status=0'); return false" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li class="share-vk">
                        <a rel="nofollow" href="#" onclick="window.open('http://vkontakte.ru/share.php?url=http://themes.birdwp.com/zefir/post-25/', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=600, height=300, toolbar=0, status=0'); return false" target="_blank"><i class="fa fa-vk"></i></a>
                    </li>
                </ul>
              </span>
                        </li>
                    </ul>
                    <?php endif;?>
                </div>
                <!-- end bottom meta inf -->

            </div>
        </article>
        <!-- end blog post -->
    <?php endforeach;?>
</div>