<?php
App::uses('AppController', 'Controller');
/**
 * Liquidations Controller
 *
 * @property Liquidation $Liquidation
 */
class LiquidationsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Liquidation->recursive = 0;
		$this->set('liquidations', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Liquidation->id = $id;
		if (!$this->Liquidation->exists()) {
			throw new NotFoundException(__('Invalid liquidation'));
		}
		$this->set('liquidation', $this->Liquidation->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            if($this->Session->read('Report.0.date') == NULL){
                $this->redirect(array('action' => 'date'));
            }
		if ($this->request->is('post')) {
                    $userInfo = $this->_userInfo();
                    
                    /**
                     * Set the default values for the Liquidation Entity
                     */
                    $this->request->data['Liquidation']['user_id'] = $userInfo['id'];
                    $this->request->data['Liquidation']['isAccepted'] = NULL;
                    
                    /**
                     * Trace all rates from the database
                     */
                    $rates = $this->Liquidation->getRate($this->data['Liquidation']['location_id'], $userInfo['position_id']);
                    $this->request->data['Liquidation']['lodging'] = ($this->data['Liquidation']['lodging'] == 1) ? $rates['lodging'] : 0;
                    /**
                     * Replace all boolean expenses with actual values.
                     */
                    $this->request->data = $this->Liquidation->replaceBooleanExpense($this->data, $rates);
                    
                    /**
                     * Compute for the total amount.
                     */
                    $this->request->data['Liquidation']['total'] = $this->Liquidation->getTotal($this->data);
                    
                    unset($this->Liquidation->Report->validate['liquidation_id']);
                    $this->Liquidation->create();
			if ($this->Liquidation->saveAll($this->request->data)) {
                                /**
                                 * Insert transportations and miscellaneous fees
                                 */
                                $this->Liquidation->populateTransportations($this->data);
                                $this->Liquidation->populateMiscellaneousFees($this->data);
                                
                                $this->Session->delete('Report');
				$this->Session->setFlash(__('The liquidation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The liquidation could not be saved. Please, try again.'));
			}
		}
		$users = $this->Liquidation->User->find('list');
		$locations = $this->Liquidation->Location->find('list');
		$this->set(compact('users', 'locations'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
            $this->Liquidation->Behaviors->attach('Containable');
		$this->Liquidation->id = $id;
		if (!$this->Liquidation->exists()) {
			throw new NotFoundException(__('Invalid liquidation'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
                    $userInfo = $this->_userInfo();
                    /**
                     * Set the default values for the Liquidation Entity
                     */
                    $this->request->data['Liquidation']['user_id'] = $userInfo['id'];
                    
                    /**
                     * Trace all rates from the database
                     */
                    $rates = $this->Liquidation->getRate($this->request->data['Liquidation']['location_id'], $userInfo['position_id']);
                    $this->request->data['Liquidation']['lodging'] = ($this->request->data['Liquidation']['lodging'] == 1) ? $rates['lodging'] : 0;
                    /**
                     * Replace all boolean expenses with actual values.
                     */
                    $this->request->data = $this->Liquidation->replaceBooleanExpense($this->request->data, $rates);
                    /**
                     * Compute for the total amount.
                     */
                    $this->request->data['Liquidation']['total'] = $this->Liquidation->getTotal($this->request->data);
                    $this->Liquidation->editExpenses($this->request->data);
                    unset($this->Liquidation->Report->validate['liquidation_id']);
			if ($this->Liquidation->save($this->request->data)) {
				$this->Session->setFlash(__('The liquidation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The liquidation could not be saved. Please, try again.'));
			}
		} else {
			$this->data = $this->Liquidation->find('all', array('contain'=>array('Location','Report' => array('Transportation', 'MiscellaneousFee'), 'User'), 'conditions' => array('Liquidation.id'=>$id)));
                        $this->data = $this->data[0];
		}
		$users = $this->Liquidation->User->find('list');
		$locations = $this->Liquidation->Location->find('list');
		$this->set(compact('users', 'locations'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Liquidation->id = $id;
		if (!$this->Liquidation->exists()) {
			throw new NotFoundException(__('Invalid liquidation'));
		}
		if ($this->Liquidation->delete()) {
			$this->Session->setFlash(__('Liquidation deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Liquidation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function date() {
                if (!empty($this->data)) {
                    $this->Liquidation->create();
                    $this->Session->delete('Report');
                    $this->Session->write("Report.date.count", count($this->data['Liquidation']['dates']));
                    for($i = 0; $i<count($this->data['Liquidation']['dates']); $i++){
                        $this->Session->write("Report.$i.date", $this->data['Liquidation']['dates'][$i]);
                    }
                    $this->redirect(array('action'=>'add'));
                }
        }
        
        public function review($id = null) {
            $this->Liquidation->id = $id;
            $this->Liquidation->Behaviors->attach('Containable');
            if(!empty($this->data)){
//                debug($this->data);
                if($this->Liquidation->reviewReport($this->data)){
                    $this->Session->setFlash(__('The liquidation has been saved', true));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The liquidation could not be saved. Please, try again.', true));
                }
			}
		if (!$this->Liquidation->exists()) {
			$this->Session->setFlash(__('Invalid liquidation', true));
			$this->redirect(array('action' => 'index'));
		}
                if(empty($this->data)){
                    $liquidation = $this->Liquidation->find('all', array('contain'=>array('Location', 'User' => array('Department', 'Position'), 'Report' => array( 'Transportation', 'MiscellaneousFee')), 'conditions' => array('Liquidation.id'=>$id)));
                    $liquidation = $liquidation[0];
                }
		$this->set(compact('liquidation'));
        }
}
