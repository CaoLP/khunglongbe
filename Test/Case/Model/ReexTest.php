<?php
App::uses('Reex', 'Model');

/**
 * Reex Test Case
 *
 */
class ReexTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reex',
		'app.store'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Reex = ClassRegistry::init('Reex');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Reex);

		parent::tearDown();
	}

}
