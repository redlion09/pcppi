<?php
/* AnnouncementsTag Test cases generated on: 2011-11-27 01:01:21 : 1322326881*/
App::uses('AnnouncementsTag', 'Model');

/**
 * AnnouncementsTag Test Case
 *
 */
class AnnouncementsTagTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.announcements_tag', 'app.announcement', 'app.user', 'app.tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->AnnouncementsTag = ClassRegistry::init('AnnouncementsTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AnnouncementsTag);

		parent::tearDown();
	}

}
