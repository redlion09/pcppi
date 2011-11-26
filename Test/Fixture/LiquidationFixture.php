<?php
/* Liquidation Fixture generated on: 2011-11-27 01:01:21 : 1322326881 */

/**
 * LiquidationFixture
 *
 */
class LiquidationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'lodging' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '6,2', 'collate' => NULL, 'comment' => ''),
		'total' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '7,2', 'collate' => NULL, 'comment' => ''),
		'isAccepted' => array('type' => 'boolean', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'user_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'location_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
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
			'id' => '4ed11b61-446c-4768-ae55-0dc1840a7883',
			'lodging' => 1,
			'total' => 1,
			'isAccepted' => 1,
			'user_id' => 'Lorem ipsum dolor sit amet',
			'location_id' => 'Lorem ipsum dolor sit amet'
		),
	);
}
