<?php
/**
 * WarehouseFixture
 *
 */
class WarehouseFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'warehouse';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'store_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'options' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'price' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'retail_price' => array('type' => 'float', 'null' => true, 'default' => '0', 'unsigned' => false),
		'qty' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'store_id' => 1,
			'product_id' => 1,
			'options' => 'Lorem ipsum dolor ',
			'price' => 1,
			'retail_price' => 1,
			'qty' => 1,
			'code' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-03-21 09:40:48',
			'created_by' => 1,
			'updated' => '2015-03-21 09:40:48',
			'updated_by' => 1
		),
	);

}
