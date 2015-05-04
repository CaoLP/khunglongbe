<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/23/15
 * Time: 9:20 AM
 */
App::uses('Component', 'Controller');
class MenuComponent extends Component {
    public function initialize(Controller $controller) {
        $controller->loadModel('MenuPosition');
        $menus = $controller->MenuPosition->find('all',array('recursive' => 2));
        $menus = Set::combine($menus,'{n}.MenuPosition.name','{n}');
        $controller->set('menus', $menus);
    }
}