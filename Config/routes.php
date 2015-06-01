<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'index'));

    Router::connect('/san-pham', array('controller' => 'pages', 'action' => 'products'));
    Router::connect('/khuyen-mai/*', array('controller' => 'pages', 'action' => 'promotes'));
    Router::connect('/tin-tuc/*', array('controller' => 'pages', 'action' => 'news'));
    Router::connect('/blog/*', array('controller' => 'pages', 'action' => 'blogs'));
    Router::connect('/lien-he', array('controller' => 'pages', 'action' => 'contact'));
    Router::connect('/thanh-toan', array('controller' => 'pages', 'action' => 'order'));
    Router::connect('/gio-hang', array('controller' => 'pages', 'action' => 'cart'));
    Router::connect('/tim-kiem', array('controller' => 'pages', 'action' => 'search'));

    Router::connect('/ban-chay', array('controller' => 'pages', 'action' => 'best_sale'));
    Router::connect('/san-pham-moi', array('controller' => 'pages', 'action' => 'new_products'));
    Router::connect('/san-pham-khuyen-mai', array('controller' => 'pages', 'action' => 'promote_products'));


    Router::connect('/:category', array('controller' => 'pages', 'action' => 'categories'),
        array(
            'pass'=>array('category'),
            'slug'=>"[a-z0-9-]+",
        )
    );
    Router::connect('/:category/:slug', array('controller' => 'pages', 'action' => 'view'),
        array(
            'pass'=>array('category','slug'),
            'category'=>"[a-z0-9-]+",
            'slug'=>"[a-z0-9-]+",
        )
    );
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
