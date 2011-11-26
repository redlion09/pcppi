<?php
/* Transportation Fixture generated on: 2011-11-27 01:01:24 : 1322326884 */

/**
 * TransportationFixture
 *
 */
class TransportationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'description' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'amount' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '5,2', 'collate' => NULL, 'comment' => ''),
		'report_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
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
			'id' => '4ed11b64-5644-435a-8a21-0dc1840a7883',
			'description' => 'Lorem ipsum dolor sit amet',
			'amount' => 1,
			'report_id' => 'Lorem ipsum dolor sit amet'
		),
	);
}
