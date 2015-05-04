<?php
App::uses('AppModel', 'Model');
/**
 * ProductOption Model
 *
 * @property Option $Option
 * @property Product $Product
 */
class ProductOption extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'option_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'product_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'code' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed
    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Option' => array(
            'className' => 'Option',
            'foreignKey' => 'option_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'product_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public function updateOptions($data, $product_id)
    {

        $old_options = $this->find('list',
            array(
                'fields' => 'option_id,id',
                'conditions' =>
                    array(
                        'product_id' => $product_id
                    )
            )
        );
        $saveData = array();
        foreach($data as $d){
               if(in_array($d,array_keys($old_options))){
                   $saveData[] = array(
                       'id' => $old_options[$d],
                       'option_id' => $d,
                       'disable' => 0
                   );
               }else{
                   $saveData[] = array(
                       'product_id' => $product_id,
                       'option_id' => $d,
                       'disable' => 0
                   );
               }
        }
        foreach(array_keys($old_options) as $d){
            if(!in_array($d,$data)){
                $saveData[] = array(
                    'id' => $old_options[$d],
                    'option_id' => $d,
                    'disable' => 1
                );
            }
        }
        $this->saveMany($saveData);
    }
}
