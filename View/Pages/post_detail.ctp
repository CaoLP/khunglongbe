<div class="col-md-8">
    <div class="single-container hentry " style="border-top: 4px solid #8de3e8;">


        <!-- post title -->
        <div class="single-title-wrap">
            <h1 class="single-title h2 entry-title"><?php echo $post['Post']['title'];?></h1>
        </div>
        <!-- end post title -->


        <!-- start content -->
        <div class="content clearfix">
            <?php echo $post['Post']['descriptions'];?>
        </div>
        <!-- end content -->

        <!-- edit post link -->
        <!-- end edit post link -->


        <!-- start single meta -->
        <div class="single-meta-wrap">

            <ul class="list-unstyled single-meta-inf meta clearfix">
                <li class="post-date date updated"><i class="fa fa-calendar-o"></i><?php echo date('\N\g\à\y y \t\h\á\n\g d \n\ă\m Y',strtotime($post['Post']['created']));?></li>
                <li>
                    <i class="fa fa-bookmark-o"></i>
                    <a href="<?php echo $this->Html->url('/blog/' . $post['PostCategory']['slug']);?>" rel="category tag">
                        <?php echo $post['PostCategory']['name']?>
                    </a>
                </li>
                <?php if(false):?>
                <li class="single-share-icon">
                    <a rel="nofollow" href="#" data-share_id="827">Share<i class="fa fa-share-alt"></i></a>
                    <span id="share-block-827" class="share-block-wrap single-share-block-wrap share-block-hidden">
                      <ul class="list-unstyled clearfix">
                          <li class="share-facebook">
                              <a rel="nofollow" href="#" onclick="window.open('http://www.facebook.com/sharer.php?u=http://themes.birdwp.com/zefir/post-25/', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0'); return false" target="_blank"><i class="fa fa-facebook"></i></a>
                          </li>
                          <li class="share-twitter">
                              <a rel="nofollow" href="#" onclick="window.open('https://twitter.com/intent/tweet?text=Post with featured image&amp;url=http://themes.birdwp.com/zefir/post-25/', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0'); return false" target="_blank"><i class="fa fa-twitter"></i></a>
                          </li>
                          <li class="share-google-plus">
                              <a rel="nofollow" href="#" onclick="window.open('https://plus.google.com/share?url=http://themes.birdwp.com/zefir/post-25/', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0'); return false" target="_blank"><i class="fa fa-google-plus"></i></a>
                          </li>
                          <li class="share-linkedin">
                              <a rel="nofollow" href="#" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=http://themes.birdwp.com/zefir/post-25/&amp;title=Post with featured image', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=600, height=400, toolbar=0, status=0'); return false" target="_blank"><i class="fa fa-linkedin"></i></a>
                          </li>
                          <li class="share-vk">
                              <a rel="nofollow" href="#" onclick="window.open('http://vkontakte.ru/share.php?url=http://themes.birdwp.com/zefir/post-25/', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=600, height=300, toolbar=0, status=0'); return false" target="_blank"><i class="fa fa-vk"></i></a>
                          </li>
                      </ul>
                    </span>
                </li>
                <?php endif;?>
            </ul>
        </div>
        <!-- end single meta -->

    </div>
</div>
<?php
