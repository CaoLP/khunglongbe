<?php
App::uses('AppModel', 'Model');
/**
 * ProductPromote Model
 *
 * @property Product $Product
 * @property Promote $Promote
 */
class ProductPromote extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Promote' => array(
			'className' => 'Promote',
			'foreignKey' => 'promote_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    public function getProduct($limit = 6){
        $result = $this->find('all',
            array(
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
                'limit' => $limit
            )
        );
        return $result;
    }
}
