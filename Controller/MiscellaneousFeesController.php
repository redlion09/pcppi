<?php
App::uses('AppController', 'Controller');
/**
 * MiscellaneousFees Controller
 *
 * @property MiscellaneousFee $MiscellaneousFee
 */
class MiscellaneousFeesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MiscellaneousFee->recursive = 0;
		$this->set('miscellaneousFees', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MiscellaneousFee->id = $id;
		if (!$this->MiscellaneousFee->exists()) {
			throw new NotFoundException(__('Invalid miscellaneous fee'));
		}
		$this->set('miscellaneousFee', $this->MiscellaneousFee->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MiscellaneousFee->create();
			if ($this->MiscellaneousFee->save($this->request->data)) {
				$this->Session->setFlash(__('The miscellaneous fee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The miscellaneous fee could not be saved. Please, try again.'));
			}
		}
		$reports = $this->MiscellaneousFee->Report->find('list');
		$this->set(compact('reports'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->MiscellaneousFee->id = $id;
		if (!$this->MiscellaneousFee->exists()) {
			throw new NotFoundException(__('Invalid miscellaneous fee'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MiscellaneousFee->save($this->request->data)) {
				$this->Session->setFlash(__('The miscellaneous fee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The miscellaneous fee could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MiscellaneousFee->read(null, $id);
		}
		$reports = $this->MiscellaneousFee->Report->find('list');
		$this->set(compact('reports'));
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
		$this->MiscellaneousFee->id = $id;
		if (!$this->MiscellaneousFee->exists()) {
			throw new NotFoundException(__('Invalid miscellaneous fee'));
		}
		if ($this->MiscellaneousFee->delete()) {
			$this->Session->setFlash(__('Miscellaneous fee deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Miscellaneous fee was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
