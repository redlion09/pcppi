<?php
/* Announcement Test cases generated on: 2011-11-27 01:01:20 : 1322326880*/
App::uses('Announcement', 'Model');

/**
 * Announcement Test Case
 *
 */
class AnnouncementTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.announcement', 'app.user', 'app.tag', 'app.announcements_tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Announcement = ClassRegistry::init('Announcement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Announcement);

		parent::tearDown();
	}

}
