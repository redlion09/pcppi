<?php
App::uses('AppController', 'Controller');
/**
 * Announcements Controller
 *
 * @property Announcement $Announcement
 */
class AnnouncementsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Announcement->recursive = 0;
		$this->set('announcements', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Announcement->id = $id;
		if (!$this->Announcement->exists()) {
			throw new NotFoundException(__('Invalid announcement'));
		}
		$this->set('announcement', $this->Announcement->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Announcement->create();
			if ($this->Announcement->save($this->request->data)) {
				$this->Session->setFlash(__('The announcement has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The announcement could not be saved. Please, try again.'));
			}
		}
		$users = $this->Announcement->User->find('list');
		$tags = $this->Announcement->Tag->find('list');
		$this->set(compact('users', 'tags'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Announcement->id = $id;
		if (!$this->Announcement->exists()) {
			throw new NotFoundException(__('Invalid announcement'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Announcement->save($this->request->data)) {
				$this->Session->setFlash(__('The announcement has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The announcement could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Announcement->read(null, $id);
		}
		$users = $this->Announcement->User->find('list');
		$tags = $this->Announcement->Tag->find('list');
		$this->set(compact('users', 'tags'));
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
		$this->Announcement->id = $id;
		if (!$this->Announcement->exists()) {
			throw new NotFoundException(__('Invalid announcement'));
		}
		if ($this->Announcement->delete()) {
			$this->Session->setFlash(__('Announcement deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Announcement was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
