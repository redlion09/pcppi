<?php
/* Report Test cases generated on: 2011-11-27 01:01:23 : 1322326883*/
App::uses('Report', 'Model');

/**
 * Report Test Case
 *
 */
class ReportTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.report', 'app.user', 'app.liquidation', 'app.location', 'app.miscellaneous_fee', 'app.transportation');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Report = ClassRegistry::init('Report');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Report);

		parent::tearDown();
	}

}
