<?php
/* Position Fixture generated on: 2011-11-27 01:01:23 : 1322326883 */

/**
 * PositionFixture
 *
 */
class PositionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'position' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 24, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'class' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '4ed11b63-d244-46d1-ad6c-0dc1840a7883',
			'position' => 'Lorem ipsum dolor sit ',
			'class' => ''
		),
	);
}
