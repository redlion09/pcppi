<?php
/* Liquidation Test cases generated on: 2011-11-27 01:01:21 : 1322326881*/
App::uses('Liquidation', 'Model');

/**
 * Liquidation Test Case
 *
 */
class LiquidationTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.liquidation', 'app.user', 'app.location', 'app.report');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Liquidation = ClassRegistry::init('Liquidation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Liquidation);

		parent::tearDown();
	}

}
