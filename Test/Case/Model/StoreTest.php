<?php
App::uses('Store', 'Model');

/**
 * Store Test Case
 *
 */
class StoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.store',
		'app.manager',
		'app.customer_promote',
		'app.customer',
		'app.order',
		'app.user',
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
		'app.warehouse',
		'app.reex'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Store = ClassRegistry::init('Store');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Store);

		parent::tearDown();
	}

}
