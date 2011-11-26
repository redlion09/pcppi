<?php
/* Location Test cases generated on: 2011-11-27 01:01:22 : 1322326882*/
App::uses('Location', 'Model');

/**
 * Location Test Case
 *
 */
class LocationTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.location', 'app.liquidation', 'app.user', 'app.report');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Location = ClassRegistry::init('Location');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Location);

		parent::tearDown();
	}

}
