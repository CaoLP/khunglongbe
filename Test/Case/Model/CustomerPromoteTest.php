<?php
App::uses('CustomerPromote', 'Model');

/**
 * CustomerPromote Test Case
 *
 */
class CustomerPromoteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.customer_promote',
		'app.customer',
		'app.promote',
		'app.store'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CustomerPromote = ClassRegistry::init('CustomerPromote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CustomerPromote);

		parent::tearDown();
	}

}
