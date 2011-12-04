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
        
        function editExpenses($data){
            /**
             * Function flow:
             *  1. Get previous record count
             *  2. Get updated count
             *  3. Compare and execute query depending on the comparison.
             */
//            debug($data);
            foreach($data['Report'] as $key => $value){
                /**
                 * Get the count of the previous records so that we can cross match it with the updated version
                 */
                $query = sprintf("select count(*) from transportations where report_id='%s'", $data['Report'][$key]['id']);
                $pointer = $this->Report->Transportation->query($query);
                /**
                 * Create a containable pointer
                 */
                $pointer = $pointer[0][0]['count(*)'];
                
                /**
                 * Make sure that there will be a default value if ever the index is empty.
                 */
                if(empty($data['Transportation'][$key])) $pointer = 0;
                
                /**
                 * Calculate the difference between the previous and the current records
                 */
                $difference = (empty($data['Transportation'][$key])) ?  (0 - $pointer) : count($data['Transportation'][$key]) - $pointer;
                
                /**
                 * If the difference is greater than 0, then add the queries then validate if the old records needs to be updated.
                 */
                if($difference > 0){
                    for($i = 0; $i < $difference; $i++){
                        $query = sprintf("insert into transportations values ('%s', '%s', %s, '%s')", String::uuid(), $data['Transportation'][$key][$pointer+$i]['description'], $data['Transportation'][$key][$pointer+$i]['amount'], $data['Report'][$key]['id']);
                        /**
                         * Insert the values.
                         */
                        $this->Report->Transportation->query($query);
                    }
                    /**
                     * If the records have been cut down, then, remove the latest updates then validate the remaining files.
                     */
                }else if($difference < 0){
                    /**
                     * Make sure that there is a non-negative counter
                     */
                    $difference = abs($difference);
                    $query = sprintf("select * from transportations where report_id = '%s'", $data['Report'][$key]['id']);
                    $results = $this->Report->Transportation->query($query);
                    $pointer -= $difference;
                    for($i = 0; $i < $difference; $i++){
                        $query = sprintf("delete from transportations where id = '%s'", $results[$pointer+$i]['transportations']['id']);
                        $this->Report->Transportation->query($query);
                    }
                }
                if(!empty($data['Transportation'][$key])) $this->validateTransportations($data['Transportation'][$key], $pointer);
            
                /**
                 * Get the count of the previous records so that we can cross match it with the updated version
                 */
                $query = sprintf("select count(*) from miscellaneous_fees where report_id='%s'", $data['Report'][$key]['id']);
                $pointer = $this->Report->MiscellaneousFee->query($query);
                /**
                 * Create a containable pointer
                 */
                $pointer = $pointer[0][0]['count(*)'];
                
                /**
                 * Make sure that there will be a default value if ever the index is empty.
                 */
                if(empty($data['MiscellaneousFee'][$key])) $pointer = 0;
                
                /**
                 * Calculate the difference between the previous and the current records
                 */
                $difference = (empty($data['MiscellaneousFee'][$key])) ?  (0 - $pointer) : count($data['MiscellaneousFee'][$key]) - $pointer;
                
                /**
                 * If the difference is greater than 0, then add the queries then validate if the old records needs to be updated.
                 */
                if($difference > 0){
                    for($i = 0; $i < $difference; $i++){
                        $query = sprintf("insert into miscellaneous_fees values ('%s', '%s', %s, '%s')", String::uuid(), $data['MiscellaneousFee'][$key][$pointer+$i]['description'], $data['MiscellaneousFee'][$key][$pointer+$i]['amount'], $data['Report'][$key]['id']);
                        /**
                         * Insert the values.
                         */
                        $this->Report->MiscellaneousFee->query($query);
                    }
                    /**
                     * If the records have been cut down, then, remove the latest updates then validate the remaining files.
                     */
                }else if($difference < 0){
                    /**
                     * Make sure that there is a non-negative counter
                     */
                    $difference = abs($difference);
                    $query = sprintf("select * from miscellaneous_fees where report_id = '%s'", $data['Report'][$key]['id']);
                    $results = $this->Report->MiscellaneousFee->query($query);
                    $pointer -= $difference;
                    for($i = 0; $i < $difference; $i++){
                        $query = sprintf("delete from miscellaneous_fees where id = '%s'", $results[$pointer+$i]['miscellaneous_fees']['id']);
                        $this->Report->MiscellaneousFee->query($query);
                    }
                }
                if(!empty($data['MiscellaneousFee'][$key])) $this->validateMiscellaneousFees($data['MiscellaneousFee'][$key], $pointer);
            }
//                $query = sprintf("select count(*) from miscellaneous_fees where report_id='%s'", $data['Report'][$i]['id']);
        }
        
        function validateTransportations($transportation, $ceiling) {
//            debug($transportations);
            for($i = 0; $i < $ceiling; $i++){
                $query= sprintf("select * from transportations  where id = '%s'", $transportation[$i]['id']);
                $result = $this->Report->Transportation->query($query);
                $result = $result[0]['transportations'];
//                debug($result);
                
                if($result['description'] != $transportation[$i]['description'] || $result['amount'] != $transportation[$i]['amount']){
                    $query = sprintf("update transportations set description = '%s', amount = %s where id = '%s'", $transportation[$i]['description'], $transportation[$i]['amount'], $transportation[$i]['id']);
                    $result = $this->Report->Transportation->query($query);
//                    debug($query);
                }
                
            }
        }

        function validateMiscellaneousFees($miscellaneous_fee, $ceiling) {
//            debug($miscellaneous_fees);
            for($i = 0; $i < $ceiling; $i++){
                $query= sprintf("select * from miscellaneous_fees  where id = '%s'", $miscellaneous_fee[$i]['id']);
                $result = $this->Report->MiscellaneousFee->query($query);
                $result = $result[0]['miscellaneous_fees'];
//                debug($result);
                
                if($result['description'] != $miscellaneous_fee[$i]['description'] || $result['amount'] != $miscellaneous_fee[$i]['amount']){
                    $query = sprintf("update miscellaneous_fees set description = '%s', amount = %s where id = '%s'", $miscellaneous_fee[$i]['description'], $miscellaneous_fee[$i]['amount'], $miscellaneous_fee[$i]['id']);
                    $result = $this->Report->MiscellaneousFee->query($query);
//                    debug($query);
                }
                
            }
        }
}
