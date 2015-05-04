<?php
App::uses('InoutWarehouseDetail', 'Model');

/**
 * InoutWarehouseDetail Test Case
 *
 */
class InoutWarehouseDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.inout_warehouse_detail',
		'app.inout_warehouse',
		'app.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InoutWarehouseDetail = ClassRegistry::init('InoutWarehouseDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InoutWarehouseDetail);

		parent::tearDown();
	}

}
