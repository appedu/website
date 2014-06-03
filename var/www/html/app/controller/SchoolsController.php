<?php
App::uses('AppController', 'Controller');
/**
 * Schools Controller
 *
 * @property School $School
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SchoolsController extends AppController {

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
		$this->School->recursive = 0;
		$this->set('schools', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->School->exists($id)) {
			throw new NotFoundException(__('Invalid school'));
		}
		$options = array('conditions' => array('School.' . $this->School->primaryKey => $id));
		$this->set('school', $this->School->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->School->create();
			if ($this->School->save($this->request->data)) {
				$this->Session->setFlash(__('The school has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->School->id = $id;
		if (!$this->School->exists($id)) {
			throw new NotFoundException(__('Invalid school'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->School->save($this->request->data)) {
				$this->Session->setFlash(__('The school has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('School.' . $this->School->primaryKey => $id));
			$this->request->data = $this->School->find('first', $options);
		}
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
		$this->School->id = $id;
		if (!$this->School->exists()) {
			throw new NotFoundException(__('Invalid school'));
		}
		if ($this->School->delete()) {
			$this->Session->setFlash(__('School deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('School was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->School->recursive = 0;
		$this->set('schools', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->School->exists($id)) {
			throw new NotFoundException(__('Invalid school'));
		}
		$options = array('conditions' => array('School.' . $this->School->primaryKey => $id));
		$this->set('school', $this->School->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->School->create();
			if ($this->School->save($this->request->data)) {
				$this->Session->setFlash(__('The school has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
        $this->School->id = $id;
		if (!$this->School->exists($id)) {
			throw new NotFoundException(__('Invalid school'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->School->save($this->request->data)) {
				$this->Session->setFlash(__('The school has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('School.' . $this->School->primaryKey => $id));
			$this->request->data = $this->School->find('first', $options);
		}
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
		$this->School->id = $id;
		if (!$this->School->exists()) {
			throw new NotFoundException(__('Invalid school'));
		}
		if ($this->School->delete()) {
			$this->Session->setFlash(__('School deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('School was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}}
