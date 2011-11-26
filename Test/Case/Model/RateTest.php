<?php
/* Rate Test cases generated on: 2011-11-27 01:01:23 : 1322326883*/
App::uses('Rate', 'Model');

/**
 * Rate Test Case
 *
 */
class RateTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.rate');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Rate = ClassRegistry::init('Rate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Rate);

		parent::tearDown();
	}

}
