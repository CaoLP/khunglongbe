<?php
App::uses('Warehouse', 'Model');

/**
 * Warehouse Test Case
 *
 */
class WarehouseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.warehouse',
		'app.store',
		'app.manager',
		'app.customer_promote',
		'app.customer',
		'app.order',
		'app.user',
		'app.group',
		'app.promote',
		'app.order_detail',
		'app.product',
		'app.provider',
		'app.category',
		'app.inout_warehouse_detail',
		'app.inout_warehouse',
		'app.product_category',
		'app.product_option',
		'app.option',
		'app.option_group',
		'app.reex'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Warehouse = ClassRegistry::init('Warehouse');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Warehouse);

		parent::tearDown();
	}

}
