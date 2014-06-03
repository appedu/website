<?php
App::uses('AppController', 'Controller');
/**
 * GroupsUsers Controller
 *
 * @property GroupsUser $GroupsUser
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GroupsUsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->GroupsUser->recursive = 0;
		$this->set('groupsUsers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GroupsUser->exists($id)) {
			throw new NotFoundException(__('Invalid groups user'));
		}
		$options = array('conditions' => array('GroupsUser.' . $this->GroupsUser->primaryKey => $id));
		$this->set('groupsUser', $this->GroupsUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GroupsUser->create();
			if ($this->GroupsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The groups user has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The groups user could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$groups = $this->GroupsUser->Group->find('list');
		$users = $this->GroupsUser->User->find('list');
		$this->set(compact('groups', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->GroupsUser->id = $id;
		if (!$this->GroupsUser->exists($id)) {
			throw new NotFoundException(__('Invalid groups user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GroupsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The groups user has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The groups user could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('GroupsUser.' . $this->GroupsUser->primaryKey => $id));
			$this->request->data = $this->GroupsUser->find('first', $options);
		}
		$groups = $this->GroupsUser->Group->find('list');
		$users = $this->GroupsUser->User->find('list');
		$this->set(compact('groups', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->GroupsUser->id = $id;
		if (!$this->GroupsUser->exists()) {
			throw new NotFoundException(__('Invalid groups user'));
		}
		if ($this->GroupsUser->delete()) {
			$this->Session->setFlash(__('Groups user deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Groups user was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->GroupsUser->recursive = 0;
		$this->set('groupsUsers', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->GroupsUser->exists($id)) {
			throw new NotFoundException(__('Invalid groups user'));
		}
		$options = array('conditions' => array('GroupsUser.' . $this->GroupsUser->primaryKey => $id));
		$this->set('groupsUser', $this->GroupsUser->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->GroupsUser->create();
			if ($this->GroupsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The groups user has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The groups user could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$groups = $this->GroupsUser->Group->find('list');
		$users = $this->GroupsUser->User->find('list');
		$this->set(compact('groups', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
        $this->GroupsUser->id = $id;
		if (!$this->GroupsUser->exists($id)) {
			throw new NotFoundException(__('Invalid groups user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GroupsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The groups user has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The groups user could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('GroupsUser.' . $this->GroupsUser->primaryKey => $id));
			$this->request->data = $this->GroupsUser->find('first', $options);
		}
		$groups = $this->GroupsUser->Group->find('list');
		$users = $this->GroupsUser->User->find('list');
		$this->set(compact('groups', 'users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->GroupsUser->id = $id;
		if (!$this->GroupsUser->exists()) {
			throw new NotFoundException(__('Invalid groups user'));
		}
		if ($this->GroupsUser->delete()) {
			$this->Session->setFlash(__('Groups user deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Groups user was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}}
