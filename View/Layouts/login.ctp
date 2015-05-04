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
    echo $this->Html->css(array('site.min'));
    echo $this->Html->css(array('//fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic'));
    ?>
    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #303641;
            color: #C1C3C6
        }
    </style>
</head>

<body>

<div class="container">
    <?php echo $this->fetch('content'); ?>
</div><!-- /.container -->

<?php
echo $this->Html->script(array('site.min'));
?>
</body>
</html>
