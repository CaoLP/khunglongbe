<?php
App::uses('Promote', 'Model');

/**
 * Promote Test Case
 *
 */
class PromoteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.promote',
		'app.store',
		'app.order_detail',
		'app.order',
		'app.customer',
		'app.customer_promote',
		'app.user',
		'app.product',
		'app.provider',
		'app.category',
		'app.inout_warehouse_detail',
		'app.inout_warehouse',
		'app.product_category',
		'app.product_option',
		'app.option',
		'app.option_group',
		'app.warehouse'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Promote = ClassRegistry::init('Promote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Promote);

		parent::tearDown();
	}

}
