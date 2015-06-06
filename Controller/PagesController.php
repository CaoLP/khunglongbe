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
        $this->setTitle('Trang chủ');
        $this->loadCategory();
        $best_sale = array();
        $new_products = array();
        $promote_products = array();
        $products = array();
        //Best sale
        $this->loadModel('OrderDetail');
        $best_sale = $this->OrderDetail->best_Sale(8);
        //New Product
        $this->loadModel('Product');
        $new_products = $this->Product->getProduct('Product.created DESC', 8);
        //Product Promote
        $this->loadModel('ProductPromote');
        $promote_products = $this->ProductPromote->getProduct(8);
        //Product
        $products = $this->Product->getProduct('Rand()', 8);
        $this->set(compact('best_sale', 'new_products', 'promote_products', 'products'));
    }

    public function loadCategory()
    {
        $this->loadModel('Category');
        $categories = $this->Category->find('threaded',
            array(
                'fields' => array('id', 'name', 'slug', 'parent_id'),
                'conditions' => array(
                    'Category.name <>' => '0',
                    'Category.status' => '1',
                ),
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
        $this->setTitle($product['Product']['name']);
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
        $this->setTitle('Sản phẩm');
    }
    public function search()
    {
        $q = '';
        if(isset($this->request->query['q'])){
            $q = $this->request->query['q'];
        }
        $this->loadCategory();
        $this->loadModel('Product');
        $this->Paginator->settings = array(
            'fields' => 'Product.*,Category.*,ProductPromote.*,Promote.*,Thumb.file',
            'conditions' => array(
                'NOT' => array(
                    'Product.name' => array('0', ''),
                ),
                'Product.name like' => '%'.$q.'%',
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
        $this->setTitle('Tìm kiếm : "' . $q . '"');
        $this->view = 'products';
    }
    public function promotes($id = null)
    {
        $this->loadModel('Promote');

        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
            $this->view = 'ajax_slide';
            $promotes = $this->Promote->find('all', array(
                'conditions' => array(
                    'Promote.begin <=' => date('Y-m-d H:i:s'),
                    'Promote.end >=' => date('Y-m-d H:i:s'),
                    'Promote.status' => 1
                )
            ));
            $this->set(compact('promotes'));
        } else if ($id != null) {
            $this->view = 'promote_view';
            $promote =  $this->Promote->find('first', array(
                'conditions' =>array(
                    'Promote.id' => $id
                )
            ));
            $this->set(compact('promote'));
            $this->setTitle($promote['Promote']['name']);
        } else {
            $this->Paginator->settings = array(
                'conditions' => array(
                    'Promote.status' => 1
                ),
                'limit' => 5,
                'order' => array(
                    'created' => 'desc'
                )
            );
            $promotes = $this->Paginator->paginate('Promote');
            $this->set(compact('promotes'));
            $this->setTitle('Khuyến mãi');
        }
    }

    public function order()
    {

    }

    public function cart()
    {
        $this->setTitle('Giỏ hàng');
//        $this->Session->delete('Shop.cart');
        if ($this->request->isAjax()) {
            $cart = array();
            if ($this->Session->check('Shop.cart')) {
                $cart = $this->Session->read('Shop.cart');
            }
            $temp = array();
            $isExist = false;
            if (isset($this->request->data['m'])) {
                $key = $this->request->data['id'];
                if (isset($cart[$key])) {
                    switch ($this->request->data['type']) {
                        case 'add':
                            $cart[$key]['OrderDetail']['qty'] = $cart[$key]['OrderDetail']['qty'] + 1;
                            break;
                        case 'minus':
                            $cart[$key]['OrderDetail']['qty'] = $cart[$key]['OrderDetail']['qty'] - 1;
                            if ($cart[$key]['OrderDetail']['qty'] < 1) {
                                $cart[$key]['OrderDetail']['qty'] = 1;
                            }
                            break;
                        case 'remove':
                            unset($cart[$key]);
                            break;
                    }
                }
            } else {
                if (isset($this->request->data['OrderDetail']['product_id'])) {
                    foreach ($cart as $item) {
                        $t = $item;
                        if (isset($this->request->data['OrderDetail']['product_id'])) {
                            if (
                                isset($this->request->data['OrderDetail']['options'])
                                && $item['OrderDetail']['product_id'] == $this->request->data['OrderDetail']['product_id']
                                && $item['OrderDetail']['options'] == $this->request->data['OrderDetail']['options']
                            ) {
                                $t['OrderDetail']['qty'] = $t['OrderDetail']['qty'] + $this->request->data['OrderDetail']['qty'];
                                $isExist = true;
                            } else {
                                if ($item['OrderDetail']['product_id'] == $this->request->data['OrderDetail']['product_id']) {
                                    $t['OrderDetail']['qty'] = $t['OrderDetail']['qty'] + $this->request->data['OrderDetail']['qty'];
                                    $isExist = true;
                                }
                            }
                        }
                        if ($t['OrderDetail']['thumb'] != Configure::read('Img.noImage')) {
                            $t['OrderDetail']['thumb'] = str_replace(Configure::read('Img.path') . '/', '', $t['OrderDetail']['thumb']);
                        }
                        $temp[] = $t;
                    }
                    $cart = $temp;
                    if (!$isExist)
                        $cart[] = $this->request->data;
                }
            }
            $this->Session->write('Shop.cart', $cart);
            $this->layout = 'ajax';
            if (isset($this->request->data['style'])) {
                $this->view = 'ajax_cart_table';
            } else {
                $this->view = 'ajax_cart';
            }
        } else if (isset($this->request->query['clear'])) {
            $this->Session->delete('Shop.cart');
            $this->redirect(array(
                'action' => 'index'
            ));
        } else if ($this->request->is('post')) {
            if ($this->Session->check('Shop.cart')) {
                $cart = $this->Session->read('Shop.cart');
                $save_detail = array();
                $save_order = $this->request->data;
                $total = 0;
                $total_promote = 0;
                $amount = 0;
                foreach ($cart as $item) {
                    $save_detail[] = array(
                        'order_id' => 0,
                        'product_id' => $item['OrderDetail']['product_id'],
                        'name' => $item['OrderDetail']['name'],
                        'price' => $item['OrderDetail']['price'],
                        'sku' => $item['OrderDetail']['sku'],
                        'qty' => $item['OrderDetail']['qty'],
                        'promote_id' => isset($item['OrderDetail']['promote_id']) ? $item['OrderDetail']['promote_id'] : 0,
                        'promote_value' => isset($item['OrderDetail']['promote_value']) ? $item['OrderDetail']['promote_value'] : 0,
                        'promote_type' => isset($item['OrderDetail']['promote_type']) ? $item['OrderDetail']['promote_type'] : 0,
                        'product_options' => isset($item['OrderDetail']['options']) ? json_encode($item['OrderDetail']['options']) : '',
                        'data' => $item['OrderDetail']['data'],
                    );
                    $sub_total = 0;
                    $sub_promote = 0;
                    $sub_amount = 0;
                    $total += ($item['OrderDetail']['price'] * $item['OrderDetail']['qty']);
                    if (isset($item['OrderDetail']['promote_id'])) {
                        $sub_promote = $item['OrderDetail']['price'] * ($item['OrderDetail']['promote_value'] / 100);
                        $sub_amount = ($item['OrderDetail']['price']) - ($item['OrderDetail']['price'] * ($item['OrderDetail']['promote_value'] / 100));
                    } else {
                        $sub_amount = ($item['OrderDetail']['price']);
                    }
                    $total_promote += ($sub_promote * $item['OrderDetail']['qty']);
                    $amount += ($sub_amount * $item['OrderDetail']['qty']);
                }
                $save_order['Order']['code'] = 'OR' . strtotime(date('Y-m-d'));;
                $save_order['Order']['customer_id'] = 1;
                $save_order['Order']['user_id'] = 0;
                $save_order['Order']['store_id'] = 1;
                $save_order['Order']['promote_id'] = 0;
                $save_order['Order']['promote_type'] = 0;
                $save_order['Order']['promote_value'] = 0;
                $save_order['Order']['total'] = $total;
                $save_order['Order']['total_promote'] = $total_promote;
                $save_order['Order']['amount'] = $amount;
                $this->loadModel('Order');
                $this->loadModel('OrderDetail');
                if ($this->Order->save($save_order)) {
                    foreach ($save_detail as $key => $item) {
                        $save_detail[$key]['order_id'] = $this->Order->id;
                    }
                    $this->OrderDetail->saveMany($save_detail);
                    $this->view = 'order_complete';
                    $this->Session->delete('Shop.cart');
                }
            }
        }
        $this->view = 'order_complete';
    }

    public function news($slug = null)
    {
        $this->setTitle('Tin tức');
    }

    public function blogs($slug = null)
    {
        $this->setTitle('Blog');
    }

    public function contact()
    {
        $this->setTitle('Liên hệ');
    }

    public function categories($category = null)
    {
        $this->loadCategory();
        $this->loadModel('Product');
        $this->loadModel('Category');
        $cat = $this->Category->find('first',array(
            'conditions' =>array(
                'Category.slug' => $category
            )
        ));
        $allChildren = array();
        if(isset($cat['Category']['id'])){
            $allChildren = $this->Category->children($cat['Category']['id']);
            $allChildren = Set::combine($allChildren,'{n}.Category.id','{n}.Category.id');
        }
        $this->Paginator->settings = array(
            'fields' => 'Product.*,Category.*,ProductPromote.*,Promote.*,Thumb.file',
            'conditions' => array(
                'NOT' => array(
                    'Product.name' => array('0', ''),
                ),
                'Category.id' => $allChildren
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
        if(isset($cat['Category']['name']))
            $this->setTitle($cat['Category']['name']);
        else
            $this->setTitle('Sản phẩm');
    }

    public function best_sale()
    {
        $this->setTitle('Sản phẩm bán chạy');
        $this->loadCategory();
        $this->loadModel('OrderDetail');
        $this->Paginator->settings = array(
            'fields' => 'Product.*,Category.*,Thumb.*, SUM(OrderDetail.qty) as total',
            'group' => array('OrderDetail.product_id'),
            'joins' => array(
                array(
                    'table' => 'categories',
                    'alias' => 'Category',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Product.category_id = Category.id'
                    )
                ),
                array(
                    'table' => 'medias',
                    'alias' => 'Thumb',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Product.media_id = Thumb.id'
                    )
                )
            ),
            'order' => array('total DESC'),
            'limit' => Configure::read('Page.limit')
        );
        $products = $this->Paginator->paginate('OrderDetail');
        $this->set(compact('products'));
    }

    public function new_products()
    {
        $this->setTitle('Sản phẩm mới');
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

    public function promote_products()
    {
        $this->setTitle('Sản phẩm khuyến mãi');
        $this->loadCategory();
        $this->loadModel('ProductPromote');
        $this->Paginator->settings = array(
            'fields' => 'Product.*, Promote.*, Category.*,Thumb.*',
            'conditions' => array(
                'Promote.begin <=' => date('Y-m-d H:i:s'),
                'Promote.end >=' => date('Y-m-d H:i:s'),
            ),
            'joins' => array(
                array(
                    'table' => 'categories',
                    'alias' => 'Category',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Product.category_id = Category.id'
                    )
                ),
                array(
                    'table' => 'medias',
                    'alias' => 'Thumb',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Product.media_id = Thumb.id'
                    )
                )
            ),
            'order' => array('total DESC'),
            'limit' => Configure::read('Page.limit')
        );
        $products = $this->Paginator->paginate('ProductPromote');
        $this->set(compact('products'));
    }
}
