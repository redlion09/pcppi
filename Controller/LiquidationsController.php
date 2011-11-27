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
		if ($this->request->is('post')) {
			$this->Liquidation->create();
			if ($this->Liquidation->save($this->request->data)) {
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
		$this->Liquidation->id = $id;
		if (!$this->Liquidation->exists()) {
			throw new NotFoundException(__('Invalid liquidation'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Liquidation->save($this->request->data)) {
				$this->Session->setFlash(__('The liquidation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The liquidation could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Liquidation->read(null, $id);
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
}
