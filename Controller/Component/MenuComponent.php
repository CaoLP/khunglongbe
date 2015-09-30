<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/23/15
 * Time: 9:20 AM
 */
App::uses('Component', 'Controller');

class MenuComponent extends Component
{
    public function initialize(Controller $controller)
    {
        $controller->loadModel('MenuPosition');
        $controller->loadModel('FrontMenu');
//        $menu_pos = $controller->MenuPosition->find('first',
//            array(
//                'conditions' =>
//                    array('MenuPosition.name' => 'Top'), 'recursive' => -1));
        $menus = $controller->FrontMenu->find('threaded', array(
                'conditions' => array(
                    'MenuPosition.name' => 'Top'
                ),
            )
        );
//        debug($menus);
//        die;
//        $menus = Set::combine($menus, '{n}.MenuPosition.name', '{n}');
        $controller->set('menus', $menus);
    }
}