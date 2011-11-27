<?php
App::uses('AppController', 'Controller');
/**
 * Transportations Controller
 *
 * @property Transportation $Transportation
 */
class TransportationsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Transportation->recursive = 0;
		$this->set('transportations', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Transportation->id = $id;
		if (!$this->Transportation->exists()) {
			throw new NotFoundException(__('Invalid transportation'));
		}
		$this->set('transportation', $this->Transportation->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transportation->create();
			if ($this->Transportation->save($this->request->data)) {
				$this->Session->setFlash(__('The transportation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transportation could not be saved. Please, try again.'));
			}
		}
		$reports = $this->Transportation->Report->find('list');
		$this->set(compact('reports'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Transportation->id = $id;
		if (!$this->Transportation->exists()) {
			throw new NotFoundException(__('Invalid transportation'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Transportation->save($this->request->data)) {
				$this->Session->setFlash(__('The transportation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transportation could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Transportation->read(null, $id);
		}
		$reports = $this->Transportation->Report->find('list');
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
		$this->Transportation->id = $id;
		if (!$this->Transportation->exists()) {
			throw new NotFoundException(__('Invalid transportation'));
		}
		if ($this->Transportation->delete()) {
			$this->Session->setFlash(__('Transportation deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Transportation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
