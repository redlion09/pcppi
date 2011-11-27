<?php
/* Notifications Test cases generated on: 2011-11-27 09:28:53 : 1322357333*/
App::uses('NotificationsController', 'Controller');

/**
 * TestNotificationsController *
 */
class TestNotificationsController extends NotificationsController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * NotificationsController Test Case
 *
 */
class NotificationsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.notification', 'app.user', 'app.position', 'app.department', 'app.group', 'app.announcement', 'app.tag', 'app.announcements_tag', 'app.liquidation', 'app.location', 'app.report', 'app.miscellaneous_fee', 'app.transportation');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Notifications = new TestNotificationsController();
		$this->Notifications->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Notifications);

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {

	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {

	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {

	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {

	}

}
