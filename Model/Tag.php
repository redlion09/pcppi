<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 * @property Announcement $Announcement
 */
class Tag extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
        public $displayField = 'tag';
	public $validate = array(
		'tag' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Announcement' => array(
			'className' => 'Announcement',
			'joinTable' => 'announcements_tags',
			'foreignKey' => 'tag_id',
			'associationForeignKey' => 'announcement_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
