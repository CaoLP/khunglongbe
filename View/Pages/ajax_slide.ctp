<div id="carousel-example-generic" class="carousel slide banner_home_big" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
        foreach ($promotes as $key => $promote) {
            if ($key == 0) {
                $class = "active";
            } else
                $class = "";

            echo "<li data-target=\"#carousel-example-generic\" data-slide-to=\"{$key}\" class=\"{$class}\"></li>";
        }
        ?>
    </ol>
    <div class="carousel-inner" role="listbox">
        <?php
        foreach ($promotes as $key => $promote) {
            if ($key == 0) {
                $class = "active";
            } else
                $class = "";
            ?>
            <div class="item <?php echo $class;?>">
                <?php echo $this->Media->image($promote['Thumb']['file'], 900, 334, array()); ?>

                <div class="carousel-caption">
                    <h5><?php echo $promote['Promote']['name']; ?></h5>
                </div>
            </div>
        <?php
        }
        ?>
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
