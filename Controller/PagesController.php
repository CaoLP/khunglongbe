<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    public function index()
    {
        $this->loadCategory();
        $best_sale = array();
        $new_products = array();
        $promote_products = array();
        $products = array();
        //Best sale
        $this->loadModel('OrderDetail');
        $best_sale = $this->OrderDetail->best_Sale(6);
        //New Product
        $this->loadModel('Product');
        $new_products = $this->Product->getProduct('Product.created DESC', 6);
        //Product Promote
        $this->loadModel('ProductPromote');
        $promote_products = $this->ProductPromote->getProduct(6);
        //Product
        $products = $this->Product->getProduct('Rand()', 6);
        $this->set(compact('best_sale', 'new_products', 'promote_products', 'products'));
    }

    public function loadCategory()
    {
        $this->loadModel('Category');
        $categories = $this->Category->find('threaded',
            array(
                'fields' => array('id', 'name', 'slug', 'parent_id'),
                'recursive' => -1
            )
        );
        $this->set(compact('categories'));
    }

    public function view($category = null, $slug = null)
    {
        $this->loadCategory();
        $this->loadModel('Product');
        $product = $this->Product->getProductDetails($category, $slug);
        $this->set(compact('product'));
        $this->loadModel('Option');
        $option_ids = Set::combine($product['ProductOption'], '{n}.option_id', '{n}.id');
        $options = $this->Option->find('all', array(
            'conditions' => array(
                'Option.id' => array_keys($option_ids)
            )
        ));
        $options = Set::combine($options, '{n}.Option.id', '{n}.Option', '{n}.OptionGroup.name');
        $this->set(compact('options'));
    }

    public function products($slug = null)
    {
        $this->loadCategory();
        $this->loadModel('Product');
        $this->Paginator->settings = array(
            'fields' => 'Product.*,Category.*,ProductPromote.*,Promote.*,Thumb.file',
            'conditions' => array(
                'NOT' => array(
                    'Product.name' => array('0', ''),
                )
            ),
            'joins' => array(
                array(
                    'table' => 'product_promotes',
                    'alias' => 'ProductPromote',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Product.id = ProductPromote.product_id'
                    )
                ),
                array(
                    'table' => 'promotes',
                    'alias' => 'Promote',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'ProductPromote.promote_id = Promote.id',
                        'Promote.begin <=' => date('Y-m-d H:i:s'),
                        'Promote.end >=' => date('Y-m-d H:i:s'),
                    )
                )
            ),
            'order' => array('Product.created DESC'),
            'limit' => Configure::read('Page.limit')
        );
        $products = $this->Paginator->paginate('Product');
        $this->set(compact('products'));
    }

    public function promotes($slug = null)
    {

    }

    public function order()
    {

    }

    public function cart()
    {
//        $this->Session->delete('Shop.cart');
        if ($this->request->isAjax()) {
            $cart = array();
            if ($this->Session->check('Shop.cart')) {
                $cart = $this->Session->read('Shop.cart');
            }
            $temp = array();
            $isExist = false;
            foreach ($cart as $item) {
                $t = $item;
                if (
                    isset($this->request->data['OrderDetail']['product_id'])
                    && $item['OrderDetail']['product_id'] == $this->request->data['OrderDetail']['product_id']
                    && $item['OrderDetail']['options'] == $this->request->data['OrderDetail']['options']
                ) {
                    $t['OrderDetail']['qty'] = $t['OrderDetail']['qty'] + $this->request->data['OrderDetail']['qty'];
                    $isExist = true;
                }
                if($t['OrderDetail']['thumb']!= Configure::read('Img.noImage')){
                    $t['OrderDetail']['thumb'] = str_replace(Configure::read('Img.path').'/','',$t['OrderDetail']['thumb']);

                }
                $temp[] = $t;
            }
            $cart = $temp;
            if(!$isExist)
                $cart[] = $this->request->data;
            $this->Session->write('Shop.cart', $cart);
            $this->layout = 'ajax';
            $this->view = 'ajax_cart';
        }
    }

    public function news($slug = null)
    {

    }

    public function blogs($slug = null)
    {

    }

    public function contact()
    {

    }

    public function categories($category = null)
    {
        $this->loadCategory();
        $this->loadModel('Product');
        $this->Paginator->settings = array(
            'fields' => 'Product.*,Category.*,ProductPromote.*,Promote.*,Thumb.file',
            'conditions' => array(
                'NOT' => array(
                    'Product.name' => array('0', ''),
                ),
                'Category.slug' => $category
            ),
            'joins' => array(
                array(
                    'table' => 'product_promotes',
                    'alias' => 'ProductPromote',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Product.id = ProductPromote.product_id'
                    )
                ),
                array(
                    'table' => 'promotes',
                    'alias' => 'Promote',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'ProductPromote.promote_id = Promote.id',
                        'Promote.begin <=' => date('Y-m-d H:i:s'),
                        'Promote.end >=' => date('Y-m-d H:i:s'),
                    )
                )
            ),
            'order' => array('Product.created DESC'),
            'limit' => Configure::read('Page.limit')
        );
        $products = $this->Paginator->paginate('Product');
        $this->set(compact('products'));
    }
}
