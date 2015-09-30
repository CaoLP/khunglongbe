<?php
/**
 * Created by PhpStorm.
 * User: LePhan
 * Date: 3/23/15
 * Time: 6:38 AM
 */
App::uses('Helper', 'View');
class MenuHelper extends Helper
{
    public function loopChildMenu($data, $parent_name, $prefix = '__')
    {
        foreach ($data as $child):
            ?>
            <tr>
                <td><?php echo $prefix . h($child['name']); ?>&nbsp;</td>
                <td><?php echo h($child['icon']); ?>&nbsp;</td>
                <td><?php echo h($child['url']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->_View->Html->link($parent_name, array('controller' => 'admin_menus', 'action' => 'view', $child['parent_id'])); ?>
                </td>
                <td><?php echo h($child['lft']); ?>&nbsp;</td>
                <td><?php echo h($child['rght']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->_View->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $child['id']), array('escape' => false)); ?>
                    <?php echo $this->_View->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $child['id']), array('escape' => false)); ?>
                    <?php echo $this->_View->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $child['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $child['id'])); ?>
                </td>
            </tr>
        <?php
        endforeach;
    }

    public function createMenu($menu , $parent = 'FrontMenu', $child = 'children', $sub = false)
    {
        $html = '';
        if($sub) $html .= '<ul class="dropdown-menu">';
        foreach($menu as $m){
            $url =  $this->_View->Html->url($m[$parent]['url']);
            $html.='<li><a href="'.$url.'">'.$m[$parent]['name'].'</a>';
            if(count($m[$child])>0){
                $html .= $this->createMenu($m[$child], $parent, $child, true);
            }
            $html.='</li>';
        }
        if($sub) $html .= '</ul>';
        return $html;
    }
    public function loadCategory($categories, $parent = 'Category' , $child = 'children', $sub = false){
        $html = '';
        if($sub) $html .= '<ul class="dropdown-menu">';
        foreach($categories as $cat){
            $url =  $this->_View->Html->url(
                array(
                    'controller' => 'pages',
                    'action' => 'categories',
                    'category' => $cat[$parent]['slug']
                )
            );
            $html.='<li><a href="'.$url.'">'.$cat[$parent]['name'].'</a>';
            if(count($cat[$child])>0){
                $html .= $this->loadCategory($cat[$child], $parent, $child, true);
            }
            $html.='</li>';
        }
        if($sub) $html .= '</ul>';
        return $html;
    }
}
