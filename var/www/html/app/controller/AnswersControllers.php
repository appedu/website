<?php
App::uses('AppController', 'Controller');
/**
 * Answers Controller
 *
 * @property Answer $Answer
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AnswersController extends AppController {

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
		$this->Answer->recursive = 0;
		$this->set('answers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Answer->exists($id)) {
			throw new NotFoundException(__('Invalid answer'));
		}
		$options = array('conditions' => array('Answer.' . $this->Answer->primaryKey => $id));
		$this->set('answer', $this->Answer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Answer->create();
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__('The answer has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answer could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->Answer->User->find('list');
		$questions = $this->Answer->Question->find('list');
		$this->set(compact('users', 'questions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Answer->id = $id;
		if (!$this->Answer->exists($id)) {
			throw new NotFoundException(__('Invalid answer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__('The answer has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answer could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Answer.' . $this->Answer->primaryKey => $id));
			$this->request->data = $this->Answer->find('first', $options);
		}
		$users = $this->Answer->User->find('list');
		$questions = $this->Answer->Question->find('list');
		$this->set(compact('users', 'questions'));
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
		$this->Answer->id = $id;
		if (!$this->Answer->exists()) {
			throw new NotFoundException(__('Invalid answer'));
		}
		if ($this->Answer->delete()) {
			$this->Session->setFlash(__('Answer deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Answer was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Answer->recursive = 0;
		$this->set('answers', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Answer->exists($id)) {
			throw new NotFoundException(__('Invalid answer'));
		}
		$options = array('conditions' => array('Answer.' . $this->Answer->primaryKey => $id));
		$this->set('answer', $this->Answer->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Answer->create();
			if ($this->Answer->save($this->request->data)) {
				$this->Uploader = $this->Components->load('Uploader');
				if(isset($this->request->data['attachment'])){
					foreach ($this->request->data['attachment'] as $attachment){
						$this->Uploader->fileUpload($attachment, $this->Answer->id, '');
					}
				}
				$this->Session->setFlash(__('The answer has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answer could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->Answer->User->find('list');
		$questions = $this->Answer->Question->find('list');
		$this->set(compact('users', 'questions'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
        $this->Answer->id = $id;
		if (!$this->Answer->exists($id)) {
			throw new NotFoundException(__('Invalid answer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Answer->save($this->request->data)) {
				$this->Uploader = $this->Components->load('Uploader');
				if(isset($this->request->data['attachment'])){
					foreach ($this->request->data['attachment'] as $attachment){
						$this->Uploader->fileUpload($attachment, $this->Answer->id, '');
					}
				}
				$this->Session->setFlash(__('The answer has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answer could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Answer.' . $this->Answer->primaryKey => $id));
			$this->request->data = $this->Answer->find('first', $options);
		}
		$users = $this->Answer->User->find('list');
		$questions = $this->Answer->Question->find('list');
		$this->set(compact('users', 'questions'));
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
		$this->Answer->id = $id;
		if (!$this->Answer->exists()) {
			throw new NotFoundException(__('Invalid answer'));
		}
		if ($this->Answer->delete()) {
			$this->Session->setFlash(__('Answer deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Answer was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}}
