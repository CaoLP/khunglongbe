<nav class="navbar navbar-collapse-center" role="navigation" id="menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse navbar-collapse-top collapse">
        <ul class="nav nav-pills navbar-center">
           <?php echo $this->Menu->createMenu($menus, 'Top');?>
        </ul>
    </div>
    </div>
</nav>