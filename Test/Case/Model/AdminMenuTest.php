<?php
App::uses('AdminMenu', 'Model');

/**
 * AdminMenu Test Case
 *
 */
class AdminMenuTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.admin_menu'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AdminMenu = ClassRegistry::init('AdminMenu');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AdminMenu);

		parent::tearDown();
	}

}
