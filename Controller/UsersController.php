<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {


/**
 * index method
 *
 * @return void
 */
    
        public function beforeFilter() {
            parent::beforeFilter();
        }
        
        public function login() {
            if ($this->Session->read('Auth.User')) {
                $this->Session->setFlash('You are logged in!');
                $this->redirect('/', null, false);
            }
            if ($this->request->is('post')) {
                if ($this->Auth->login()) {
                    $this->redirect($this->Auth->redirect());
                } else {
                    $this->Session->setFlash('Your username or password was incorrect.');
                }
            }
        }
        public function logout() {
            $this->Session->setFlash('Good-Bye');
            $this->redirect($this->Auth->logout());
        }
	
        public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}
	public function profile() {
		$userInfo = $this->_userInfo();
                $id = $userInfo['id'];
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$positions = $this->User->Position->find('list');
		$departments = $this->User->Department->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('positions', 'departments', 'groups'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$positions = $this->User->Position->find('list');
		$departments = $this->User->Department->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('positions', 'departments', 'groups'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
//        function initDB() {
//            $group = $this->User->Group;
//
//            //admins
//            $group->id = '4ed1cad3-0d70-4965-b963-055c7f000101' ;     
//            $this->Acl->allow($group, 'controllers');
//
//            //accounting
//            $group->id = '4ed1cb14-f3f8-452b-b627-055f7f000101';
//            $this->Acl->deny($group, 'controllers');
//            $this->Acl->deny($group, 'controllers/Liquidations/add');
//            $this->Acl->allow($group, 'controllers/Pages');
//            $this->Acl->allow($group, 'controllers/Liquidations');
//            $this->Acl->deny($group, 'controllers/Liquidations/add');
//            $this->Acl->allow($group, 'controllers/Announcements');
//            $this->Acl->allow($group, 'controllers/Users/profile');
//            $this->Acl->allow($group, 'controllers/Users/logout');
//            $this->Acl->allow($group, 'controllers/Notifications/index');
//
//            //regular
//            $group->id = '4ed1cb93-1050-4480-804f-299b7f000101';
//            $this->Acl->deny($group, 'controllers');        
//            $this->Acl->allow($group, 'controllers/Pages');
//            $this->Acl->allow($group, 'controllers/Liquidations');
//            $this->Acl->deny($group, 'controllers/Liquidations/review');
//            $this->Acl->allow($group, 'controllers/Users/profile');
//            $this->Acl->allow($group, 'controllers/Announcements/view');
//            $this->Acl->allow($group, 'controllers/Users/logout');
//            $this->Acl->allow($group, 'controllers/Notifications/index');
//            //we add an exit to avoid an ugly "missing views" error message
//            echo "all done";
//            exit;
//        }
}
