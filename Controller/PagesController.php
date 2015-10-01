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
    public function view($category = null, $slug = null)
    {
        $this->layout = 'view';
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
        $this->layout = 'view';
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
    }

    public function news($slug = null)
    {
        $this->setTitle('Tin tức');
    }

    public function blogs($slug = null)
    {
        $this->setTitle('Blog');
        $this->loadModel('PostCategory');
        $this->loadModel('Post');
        $blog_cat = $this->PostCategory->find('first',
            array(
                'conditions'=>array('PostCategory.slug' => $slug),
                'recursive' => -1
            ));
        if($blog_cat) {
            $this->setTitle($blog_cat['PostCategory']['name']);
            $this->Paginator->settings = array(
                'fields'=> array('Post.title,Post.slug,Post.excert,Post.created,Post.media_id'),
                'conditions'=> array(
                    'Post.post_category_id' => $blog_cat['PostCategory']['id']
                )
            );
            $posts = $this->Paginator->paginate('Post');
            $this->set(compact('posts'));
            $this->set(compact('blog_cat'));
        }else{
            $post = $this->Post->find('first', array(
                'Post.slug' => $slug
            ));
            if($post){
                $this->setTitle($post['Post']['title']);
                $this->set(compact('post'));
                $this->view = 'post_detail';
            }
        }
        $recents = $this->Post->find('all', array(
            'fields'=> array('Post.title,Post.slug,Post.excert,Post.created,Post.media_id,Thumb.file'),
            'conditions' => array(

            ),
            'recursive' => 0,
            'limit' =>10,
            'order' => array('Post.created DESC')
        ));
        $randoms = $this->Post->find('all', array(
            'fields'=> array('Post.title,Post.slug,Post.excert,Post.created,Post.media_id,Thumb.file'),
            'conditions' => array(

            ),
            'recursive' => 0,
            'limit' =>10,
            'order' => array('RAND()')
        ));
        $cats = $this->PostCategory->find('all', array(
            'conditions' => array(
                'PostCategory.id <>' => 1
            ),
            'recursive' => -1,
        ));
        $this->set(compact('recents','cats','randoms'));
        $this->layout = 'blogs';
    }

    public function contact()
    {
        $this->setTitle('Liên hệ');
    }

    public function categories($category = null)
    {
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
    public function providers($slug)
    {
        $provider = $this->Provider->find('first',array(
            'conditions' =>array(
                'Provider.slug' => $slug
            ),
            'recursive' => -1
        ));
        $provider_id = 0;
        if(isset($provider['Provider']['id'])){
            $provider_id = $provider['Provider']['id'];
        }
        $this->Paginator->settings = array(
            'fields' => 'Product.*,Category.*,ProductPromote.*,Promote.*,Thumb.file',
            'conditions' => array(
                'NOT' => array(
                    'Product.name' => array('0', ''),
                ),
                'Product.provider_id' => $provider_id
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
        if($provider_id != 0)
            $this->setTitle($provider['Provider']['name']);
        else
            $this->setTitle('Sản phẩm');
    }
    public function relative(){
        if($this->request->is('ajax')){
            $this->layout= 'ajax';
            $this->Product->hasMany = array();
            $total = $this->request->data('total');
            $total_item = $this->request->data('total_item');
            if(empty($total)) $total = 4;
            if(empty($total_item)) $total_item = 4;
            $this->set(compact('total_item'));
            $this->set('title', $this->request->data('title'));
            if(!empty($this->request->data['use_slide'])) $this->set('use_slide',1);
            $conditions = array(
                'fields' => 'Product.*,Category.*,Thumb.file',
                'conditions' => array(
                    'NOT' => array(
                        'Product.name' => array('0', ''),
                    ),
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
                'order' => array('RAND()'),
                'limit' => $total
            );
            if(isset($this->request->data['category']) && !empty($this->request->data['category']))
                $conditions['conditions']['Product.category_id'] = $this->request->data('category');
            $products = $this->Product->find('all', $conditions);
            $this->set(compact('products'));
        }else die;
    }
}
