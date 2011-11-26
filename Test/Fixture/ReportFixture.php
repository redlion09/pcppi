<?php
/* Report Fixture generated on: 2011-11-27 01:01:23 : 1322326883 */

/**
 * ReportFixture
 *
 */
class ReportFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'day' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 9, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'date' => array('type' => 'date', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'breakfast' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '5,2', 'collate' => NULL, 'comment' => ''),
		'lunch' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '5,2', 'collate' => NULL, 'comment' => ''),
		'dinner' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '5,2', 'collate' => NULL, 'comment' => ''),
		'user_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'liquidation_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
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
			'id' => '4ed11b63-97a0-4c20-a12a-0dc1840a7883',
			'day' => 'Lorem i',
			'date' => '2011-11-27',
			'breakfast' => 1,
			'lunch' => 1,
			'dinner' => 1,
			'user_id' => 'Lorem ipsum dolor sit amet',
			'liquidation_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2011-11-27 01:01:23',
			'modified' => '2011-11-27 01:01:23'
		),
	);
}
