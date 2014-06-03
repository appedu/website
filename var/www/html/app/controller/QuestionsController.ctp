<?php
App::uses('AppController', 'Controller');
/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QuestionsController extends AppController {

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
		$this->Question->recursive = 0;
		$this->set('questions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
		$this->set('question', $this->Question->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Question->create();
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('The question has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->Question->User->find('list');
		$topics = $this->Question->Topic->find('list');
		$sourceTypes = $this->Question->SourceType->find('list');
		$schools = $this->Question->School->find('list');
		$groups = $this->Question->Group->find('list');
		$tags = $this->Question->Tag->find('list');
		$users = $this->Question->User->find('list');
		$this->set(compact('users', 'topics', 'sourceTypes', 'schools', 'groups', 'tags', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Question->id = $id;
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('The question has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
			$this->request->data = $this->Question->find('first', $options);
		}
		$users = $this->Question->User->find('list');
		$topics = $this->Question->Topic->find('list');
		$sourceTypes = $this->Question->SourceType->find('list');
		$schools = $this->Question->School->find('list');
		$groups = $this->Question->Group->find('list');
		$tags = $this->Question->Tag->find('list');
		$users = $this->Question->User->find('list');
		$this->set(compact('users', 'topics', 'sourceTypes', 'schools', 'groups', 'tags', 'users'));
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
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->Question->delete()) {
			$this->Session->setFlash(__('Question deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Question was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Question->recursive = 0;
		$this->set('questions', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
		$this->set('question', $this->Question->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Question->create();
			if ($this->Question->save($this->request->data)) {
				$this->Uploader = $this->Components->load('Uploader');
				if(isset($this->request->data['attachment'])){
					foreach ($this->request->data['attachment'] as $attachment){
						$this->Uploader->fileUpload($attachment, $this->Question->id, '');
					}
				}
				$this->Session->setFlash(__('The question has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->Question->User->find('list');
		$topics = $this->Question->Topic->find('list');
		$sourceTypes = $this->Question->SourceType->find('list');
		$schools = $this->Question->School->find('list');
		$groups = $this->Question->Group->find('list');
		$tags = $this->Question->Tag->find('list');
		$users = $this->Question->User->find('list');
		$this->set(compact('users', 'topics', 'sourceTypes', 'schools', 'groups', 'tags', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
        $this->Question->id = $id;
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Question->save($this->request->data)) {
				$this->Uploader = $this->Components->load('Uploader');
				if(isset($this->request->data['attachment'])){
					foreach ($this->request->data['attachment'] as $attachment){
						$this->Uploader->fileUpload($attachment, $this->Question->id, '');
					}
				}
				$this->Session->setFlash(__('The question has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
			$this->request->data = $this->Question->find('first', $options);
		}
		$users = $this->Question->User->find('list');
		$topics = $this->Question->Topic->find('list');
		$sourceTypes = $this->Question->SourceType->find('list');
		$schools = $this->Question->School->find('list');
		$groups = $this->Question->Group->find('list');
		$tags = $this->Question->Tag->find('list');
		$users = $this->Question->User->find('list');
		$this->set(compact('users', 'topics', 'sourceTypes', 'schools', 'groups', 'tags', 'users'));
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
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->Question->delete()) {
			$this->Session->setFlash(__('Question deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Question was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}}
