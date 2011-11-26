<?php
/* Tag Test cases generated on: 2011-11-27 01:01:23 : 1322326883*/
App::uses('Tag', 'Model');

/**
 * Tag Test Case
 *
 */
class TagTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.tag', 'app.announcement', 'app.user', 'app.announcements_tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Tag = ClassRegistry::init('Tag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tag);

		parent::tearDown();
	}

}
