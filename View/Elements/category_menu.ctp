<?php if (isset($categories) && count($categories) > 0) { ?>
    <div class="navbar navbar-collapse-center" id="menu-1" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-cat">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="navbar-collapse navbar-collapse-cat collapse ">

            <!-- Left nav -->
            <ul class="nav nav-pills navbar-nav navbar-center">
               <?php echo $this->Menu->loadCategory($categories, 'Category','children', false);?>
            </ul>

        </div>
        <!--/.nav-collapse -->
    </div>
<?php } ?>
<!-- Static navbar -->
