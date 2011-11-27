<?php
App::uses('AppController', 'Controller');
/**
 * AnnouncementsTags Controller
 *
 * @property AnnouncementsTag $AnnouncementsTag
 */
class AnnouncementsTagsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AnnouncementsTag->recursive = 0;
		$this->set('announcementsTags', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->AnnouncementsTag->id = $id;
		if (!$this->AnnouncementsTag->exists()) {
			throw new NotFoundException(__('Invalid announcements tag'));
		}
		$this->set('announcementsTag', $this->AnnouncementsTag->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AnnouncementsTag->create();
			if ($this->AnnouncementsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The announcements tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The announcements tag could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->AnnouncementsTag->id = $id;
		if (!$this->AnnouncementsTag->exists()) {
			throw new NotFoundException(__('Invalid announcements tag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AnnouncementsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The announcements tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The announcements tag could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->AnnouncementsTag->read(null, $id);
		}
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
		$this->AnnouncementsTag->id = $id;
		if (!$this->AnnouncementsTag->exists()) {
			throw new NotFoundException(__('Invalid announcements tag'));
		}
		if ($this->AnnouncementsTag->delete()) {
			$this->Session->setFlash(__('Announcements tag deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Announcements tag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
