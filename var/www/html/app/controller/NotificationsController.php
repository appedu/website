<?php
App::uses('AppController', 'Controller');
/**
 * Notifications Controller
 *
 * @property Notification $Notification
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NotificationsController extends AppController {

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
		$this->Notification->recursive = 0;
		$this->set('notifications', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Notification->exists($id)) {
			throw new NotFoundException(__('Invalid notification'));
		}
		$options = array('conditions' => array('Notification.' . $this->Notification->primaryKey => $id));
		$this->set('notification', $this->Notification->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Notification->create();
			if ($this->Notification->save($this->request->data)) {
				$this->Session->setFlash(__('The notification has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notification could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->Notification->User->find('list');
		$questions = $this->Notification->Question->find('list');
		$groups = $this->Notification->Group->find('list');
		$initUsers = $this->Notification->InitUser->find('list');
		$this->set(compact('users', 'questions', 'groups', 'initUsers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Notification->id = $id;
		if (!$this->Notification->exists($id)) {
			throw new NotFoundException(__('Invalid notification'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Notification->save($this->request->data)) {
				$this->Session->setFlash(__('The notification has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notification could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Notification.' . $this->Notification->primaryKey => $id));
			$this->request->data = $this->Notification->find('first', $options);
		}
		$users = $this->Notification->User->find('list');
		$questions = $this->Notification->Question->find('list');
		$groups = $this->Notification->Group->find('list');
		$initUsers = $this->Notification->InitUser->find('list');
		$this->set(compact('users', 'questions', 'groups', 'initUsers'));
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
		$this->Notification->id = $id;
		if (!$this->Notification->exists()) {
			throw new NotFoundException(__('Invalid notification'));
		}
		if ($this->Notification->delete()) {
			$this->Session->setFlash(__('Notification deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Notification was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Notification->recursive = 0;
		$this->set('notifications', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Notification->exists($id)) {
			throw new NotFoundException(__('Invalid notification'));
		}
		$options = array('conditions' => array('Notification.' . $this->Notification->primaryKey => $id));
		$this->set('notification', $this->Notification->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Notification->create();
			if ($this->Notification->save($this->request->data)) {
				$this->Session->setFlash(__('The notification has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notification could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->Notification->User->find('list');
		$questions = $this->Notification->Question->find('list');
		$groups = $this->Notification->Group->find('list');
		$initUsers = $this->Notification->InitUser->find('list');
		$this->set(compact('users', 'questions', 'groups', 'initUsers'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
        $this->Notification->id = $id;
		if (!$this->Notification->exists($id)) {
			throw new NotFoundException(__('Invalid notification'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Notification->save($this->request->data)) {
				$this->Session->setFlash(__('The notification has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notification could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Notification.' . $this->Notification->primaryKey => $id));
			$this->request->data = $this->Notification->find('first', $options);
		}
		$users = $this->Notification->User->find('list');
		$questions = $this->Notification->Question->find('list');
		$groups = $this->Notification->Group->find('list');
		$initUsers = $this->Notification->InitUser->find('list');
		$this->set(compact('users', 'questions', 'groups', 'initUsers'));
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
		$this->Notification->id = $id;
		if (!$this->Notification->exists()) {
			throw new NotFoundException(__('Invalid notification'));
		}
		if ($this->Notification->delete()) {
			$this->Session->setFlash(__('Notification deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Notification was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}}
