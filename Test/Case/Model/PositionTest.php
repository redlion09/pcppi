<?php
/* Position Test cases generated on: 2011-11-27 01:01:23 : 1322326883*/
App::uses('Position', 'Model');

/**
 * Position Test Case
 *
 */
class PositionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.position', 'app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Position = ClassRegistry::init('Position');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Position);

		parent::tearDown();
	}

}
