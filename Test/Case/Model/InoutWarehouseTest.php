<?php
App::uses('InoutWarehouse', 'Model');

/**
 * InoutWarehouse Test Case
 *
 */
class InoutWarehouseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.inout_warehouse',
		'app.store',
		'app.inout_warehouse_detail',
		'app.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InoutWarehouse = ClassRegistry::init('InoutWarehouse');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InoutWarehouse);

		parent::tearDown();
	}

}
