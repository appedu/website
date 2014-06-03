<?php
App::uses('AppController', 'Controller');
/**
 * SourceTypes Controller
 *
 * @property SourceType $SourceType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SourceTypesController extends AppController {

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
		$this->SourceType->recursive = 0;
		$this->set('sourceTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SourceType->exists($id)) {
			throw new NotFoundException(__('Invalid source type'));
		}
		$options = array('conditions' => array('SourceType.' . $this->SourceType->primaryKey => $id));
		$this->set('sourceType', $this->SourceType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SourceType->create();
			if ($this->SourceType->save($this->request->data)) {
				$this->Session->setFlash(__('The source type has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source type could not be saved. Please, try again.'), 'flash/error');
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
        $this->SourceType->id = $id;
		if (!$this->SourceType->exists($id)) {
			throw new NotFoundException(__('Invalid source type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SourceType->save($this->request->data)) {
				$this->Session->setFlash(__('The source type has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source type could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('SourceType.' . $this->SourceType->primaryKey => $id));
			$this->request->data = $this->SourceType->find('first', $options);
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
		$this->SourceType->id = $id;
		if (!$this->SourceType->exists()) {
			throw new NotFoundException(__('Invalid source type'));
		}
		if ($this->SourceType->delete()) {
			$this->Session->setFlash(__('Source type deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Source type was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->SourceType->recursive = 0;
		$this->set('sourceTypes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->SourceType->exists($id)) {
			throw new NotFoundException(__('Invalid source type'));
		}
		$options = array('conditions' => array('SourceType.' . $this->SourceType->primaryKey => $id));
		$this->set('sourceType', $this->SourceType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SourceType->create();
			if ($this->SourceType->save($this->request->data)) {
				$this->Session->setFlash(__('The source type has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source type could not be saved. Please, try again.'), 'flash/error');
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
        $this->SourceType->id = $id;
		if (!$this->SourceType->exists($id)) {
			throw new NotFoundException(__('Invalid source type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SourceType->save($this->request->data)) {
				$this->Session->setFlash(__('The source type has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source type could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('SourceType.' . $this->SourceType->primaryKey => $id));
			$this->request->data = $this->SourceType->find('first', $options);
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
		$this->SourceType->id = $id;
		if (!$this->SourceType->exists()) {
			throw new NotFoundException(__('Invalid source type'));
		}
		if ($this->SourceType->delete()) {
			$this->Session->setFlash(__('Source type deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Source type was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}}
