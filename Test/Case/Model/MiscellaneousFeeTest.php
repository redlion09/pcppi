<?php
/* MiscellaneousFee Test cases generated on: 2011-11-27 01:01:22 : 1322326882*/
App::uses('MiscellaneousFee', 'Model');

/**
 * MiscellaneousFee Test Case
 *
 */
class MiscellaneousFeeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.miscellaneous_fee', 'app.report');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->MiscellaneousFee = ClassRegistry::init('MiscellaneousFee');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MiscellaneousFee);

		parent::tearDown();
	}

}
