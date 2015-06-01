<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?php echo $title_for_layout . ' - ' . Configure::read('Site.title'); ?>
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
    echo $this->Html->css(array('bootstrap.min', 'jquery.smartmenus.bootstrap', 'khunglongbe.core'));
    ?>
    <script>
        var slide = "<?php echo $this->Html->url(
            array(
                'controller' => 'pages',
                'action' => 'promotes',
            )
        );?>";
    </script>
</head>

<body>
<header class="container-fluid">
    <?php echo $this->element('header') ?>
</header>
<?php echo $this->element('top_menu'); ?>
<div class="container-fluid" id="main">
    <div class="container" id="sub-main">
        <?php echo $this->element('category_menu'); ?>
        <div class="row">
            <?php echo $this->element('slide'); ?>
        </div>
        <div class="row" id="content">
            <?php echo $this->fetch('content') ?>
        </div>
    </div>
</div>
<footer>
 <?php echo $this->element('footer');?>
</footer>
<script>
    var cartUrl = '<?php echo $this->Html->url(array(
        'controller' => 'pages',
        'action' => 'cart'
    ))?>';
</script>
<?php
echo $this->Html->script(array('jquery-2.1.1.min', 'bootstrap', 'jquery.smartmenus', 'jquery.smartmenus.bootstrap', 'action'));
?>
</body>
</html>
