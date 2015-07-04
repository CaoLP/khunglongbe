<div class="panel" id="brand-sidebar">
    <div class="panel-heading">
        THƯƠNG HIỆU
    </div>
    <div class="panel-body">
        <ul class="list-group">
            <?php foreach($providers as $p){ ?>
                <li class="list-group-item"><a href="<?php echo $this->Html->url(array(
                        'controller' => 'pages',
                        'action' => 'providers',
                        $p['slug']
                    ))?>"><?php echo $p['name'];?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>