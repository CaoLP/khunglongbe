<?php
App::uses('ProductOption', 'Model');

/**
 * ProductOption Test Case
 *
 */
class ProductOptionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_option',
		'app.option',
		'app.option_group',
		'app.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductOption = ClassRegistry::init('ProductOption');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductOption);

		parent::tearDown();
	}

}
