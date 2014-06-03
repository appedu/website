<?php
App::uses('AppController', 'Controller');
/**
 * Foci Controller
 *
 * @property Focus $Focus
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FociController extends AppController {

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
		$this->Focus->recursive = 0;
		$this->set('foci', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Focus->exists($id)) {
			throw new NotFoundException(__('Invalid focus'));
		}
		$options = array('conditions' => array('Focus.' . $this->Focus->primaryKey => $id));
		$this->set('focus', $this->Focus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Focus->create();
			if ($this->Focus->save($this->request->data)) {
				$this->Session->setFlash(__('The focus has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The focus could not be saved. Please, try again.'), 'flash/error');
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
        $this->Focus->id = $id;
		if (!$this->Focus->exists($id)) {
			throw new NotFoundException(__('Invalid focus'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Focus->save($this->request->data)) {
				$this->Session->setFlash(__('The focus has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The focus could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Focus.' . $this->Focus->primaryKey => $id));
			$this->request->data = $this->Focus->find('first', $options);
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
		$this->Focus->id = $id;
		if (!$this->Focus->exists()) {
			throw new NotFoundException(__('Invalid focus'));
		}
		if ($this->Focus->delete()) {
			$this->Session->setFlash(__('Focus deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Focus was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Focus->recursive = 0;
		$this->set('foci', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Focus->exists($id)) {
			throw new NotFoundException(__('Invalid focus'));
		}
		$options = array('conditions' => array('Focus.' . $this->Focus->primaryKey => $id));
		$this->set('focus', $this->Focus->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Focus->create();
			if ($this->Focus->save($this->request->data)) {
				$this->Session->setFlash(__('The focus has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The focus could not be saved. Please, try again.'), 'flash/error');
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
        $this->Focus->id = $id;
		if (!$this->Focus->exists($id)) {
			throw new NotFoundException(__('Invalid focus'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Focus->save($this->request->data)) {
				$this->Session->setFlash(__('The focus has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The focus could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Focus.' . $this->Focus->primaryKey => $id));
			$this->request->data = $this->Focus->find('first', $options);
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
		$this->Focus->id = $id;
		if (!$this->Focus->exists()) {
			throw new NotFoundException(__('Invalid focus'));
		}
		if ($this->Focus->delete()) {
			$this->Session->setFlash(__('Focus deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Focus was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}}
