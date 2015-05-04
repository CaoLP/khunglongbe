<?php
App::uses('OrdersController', 'Controller');

/**
 * OrdersController Test Case
 *
 */
class OrdersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order',
		'app.customer',
		'app.customer_promote',
		'app.promote',
		'app.store',
		'app.manager',
		'app.inout_warehouse',
		'app.inout_warehouse_detail',
		'app.product',
		'app.provider',
		'app.category',
		'app.order_detail',
		'app.product_category',
		'app.product_option',
		'app.option',
		'app.option_group',
		'app.warehouse',
		'app.reex',
		'app.user',
		'app.group'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->markTestIncomplete('testIndex not implemented.');
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->markTestIncomplete('testView not implemented.');
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$this->markTestIncomplete('testAdd not implemented.');
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$this->markTestIncomplete('testEdit not implemented.');
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$this->markTestIncomplete('testDelete not implemented.');
	}

}
