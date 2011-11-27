<?php
/* AnnouncementsTags Test cases generated on: 2011-11-27 09:28:53 : 1322357333*/
App::uses('AnnouncementsTagsController', 'Controller');

/**
 * TestAnnouncementsTagsController *
 */
class TestAnnouncementsTagsController extends AnnouncementsTagsController {
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
 * AnnouncementsTagsController Test Case
 *
 */
class AnnouncementsTagsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.announcements_tag', 'app.announcement', 'app.user', 'app.position', 'app.department', 'app.group', 'app.notification', 'app.liquidation', 'app.location', 'app.report', 'app.miscellaneous_fee', 'app.transportation', 'app.tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->AnnouncementsTags = new TestAnnouncementsTagsController();
		$this->AnnouncementsTags->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AnnouncementsTags);

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
