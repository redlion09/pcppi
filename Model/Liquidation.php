<?php
App::uses('AppModel', 'Model');
/**
 * Liquidation Model
 *
 * @property User $User
 * @property Location $Location
 * @property Report $Report
 */
class Liquidation extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
        public $actsAs = array('Containable');
	public $validate = array(
		'user_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'location_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Location' => array(
			'className' => 'Location',
			'foreignKey' => 'location_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Report' => array(
			'className' => 'Report',
			'foreignKey' => 'liquidation_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
        
        function getRate($location_id, $position_id) {
            App::uses('Rate', 'Model');
            /**
             * Get position and location classes
             */
            $location = $this->Location->find('all', array('conditions'=>array('Location.id'=>$location_id)));
            $position = $this->User->Position->find('all', array('conditions'=>array('Position.id'=>$position_id)));
            /**
             * Create a rate class to call the find() method
             */
            $Rate = new Rate();
            $result = $Rate->find('all', array('conditions'=>array('Rate.location_class'=>$location[0]['Location']['class'], 'Rate.position_class'=>$position[0]['Position']['class']), 'order'=>'Rate.expense'));
            /**
             * Store values into an array and return
             */
            $rates = array();
            $rates['breakfast'] = $result[0]['Rate']['rate'];
            $rates['dinner'] = $result[1]['Rate']['rate'];
            $rates['lodging'] = $result[2]['Rate']['rate'];
            $rates['lunch'] = $result[3]['Rate']['rate'];
            return $rates;
        }

        function replaceBooleanExpense($data, $rates){
            for($i = 0; $i<count($data['Report']); $i++){
                foreach ($data['Report'][$i] as $key => $value){
                    if($key == 'breakfast' || $key == 'lunch' || $key == 'dinner'){
                        $data['Report'][$i][$key] = ($value == 1) ? $rates[$key] : 0;
                    }
                }
            }
            return $data;
        }
        
        function getTotal($data) {
            $total = 0;
            $total += $data['Liquidation']['lodging'];
            for($i = 0; $i<count($data['Report']); $i++){
                foreach ($data['Report'][$i] as $key => $value){
                    if($key == 'breakfast' || $key == 'lunch' || $key == 'dinner'){
                        $total += $data['Report'][$i][$key];
                    }
                }
            }
            if(!empty ($data['Transportation'])){
                foreach($data['Transportation'] as $key => $value){
                        for($j = 0; $j < count($data['Transportation'][$key]); $j++){
                            $total += $data['Transportation'][$key][$j]['amount'];
                        }
                }
            }
            if(!empty ($data['MiscellaneousFee'])){
                foreach($data['MiscellaneousFee'] as $key => $value){
                        for($j = 0; $j < count($data['MiscellaneousFee'][$key]); $j++){
                            $total += $data['MiscellaneousFee'][$key][$j]['amount'];
                        }
                }
            }
            return $total;
        }
        
        function populateTransportations($data) {
            $query = sprintf("select * from reports order by created desc limit %d;", count($data['Report']));
            $reports = array_reverse($this->Report->query($query));
            if(!empty ($data['Transportation'])){
                foreach($data['Transportation'] as $key => $value){
                        for($j = 0; $j < count($data['Transportation'][$key]); $j++){
                            $query = sprintf("insert into transportations values ('%s', '%s', %s, '%s')", String::uuid(), $data['Transportation'][$key][$j]['description'], $data['Transportation'][$key][$j]['amount'], $reports[$key]['reports']['id']);
                            $this->Report->Transportation->query($query);
                        }
                }
            }
        }
        function populateMiscellaneousFees($data) {
            $query = sprintf("select * from reports order by created desc limit %d;", count($data['Report']));
            $reports = array_reverse($this->Report->query($query));
            if(!empty ($data['MiscellaneousFee'])){
                foreach($data['MiscellaneousFee'] as $key => $value){
                        for($j = 0; $j < count($data['MiscellaneousFee'][$key]); $j++){
                            $query = sprintf("insert into miscellaneous_fees values ('%s', '%s', %s, '%s')", String::uuid(), $data['MiscellaneousFee'][$key][$j]['description'], $data['MiscellaneousFee'][$key][$j]['amount'], $reports[$key]['reports']['id']);
                            $this->Report->MiscellaneousFee->query($query);
                        }
                }
            }
        }
}
