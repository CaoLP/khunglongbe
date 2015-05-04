<?php
App::uses('Provider', 'Model');

/**
 * Provider Test Case
 *
 */
class ProviderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.provider',
		'app.product',
		'app.category',
		'app.inout_warehouse_detail',
		'app.inout_warehouse',
		'app.store',
		'app.order_detail',
		'app.order',
		'app.customer',
		'app.customer_promote',
		'app.promote',
		'app.user',
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
		$this->Provider = ClassRegistry::init('Provider');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Provider);

		parent::tearDown();
	}

}
