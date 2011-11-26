<?php
/* Transportation Test cases generated on: 2011-11-27 01:01:24 : 1322326884*/
App::uses('Transportation', 'Model');

/**
 * Transportation Test Case
 *
 */
class TransportationTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.transportation', 'app.report', 'app.user', 'app.liquidation', 'app.location', 'app.miscellaneous_fee');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Transportation = ClassRegistry::init('Transportation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Transportation);

		parent::tearDown();
	}

}
