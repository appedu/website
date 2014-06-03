<?php

App::uses('AppController', 'Controller');

/**
 * StudentsSubjects Controller
 *
 * @property StudentsSubjects $StudentsSubject
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TutorsSubjectsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->TutorsSubject->recursive = 0;
        $this->set('TutorsSubjects', $this->paginate());
    }

    /**
     * diaTutor method
     *
     * @return void
     */
    public function admin_add() {

        if ($this->request->is('post')) {
            $this->TutorsSubject->create();
            if ($this->TutorsSubject->save($this->request->data)) {

                $this->Session->setFlash(__('The TutorsSubject has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The TutorsSubject could not be saved. Please, try again.'), 'flash/error');
            }
        }

        $users = $this->TutorsSubject->User->find('list');
        $this->set(compact('users'));

        $subjects = $this->TutorsSubject->Subject->find('list');
        $this->set(compact('subjects'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
  public function admin_edit($id = null) {
        $this->TutorsSubject->id = $id;
        if (!$this->TutorsSubject->exists($id)) {
            throw new NotFoundException(__('Invalid TutorsSubject'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->TutorsSubject->save($this->request->data)) {
                $this->Session->setFlash(__('The TutorsSubject has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The TutorsSubject could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('TutorsSubject.' . $this->TutorsSubject->primaryKey => $id));
            $this->request->data = $this->TutorsSubject->find('first', $options);
        }
        $users = $this->TutorsSubject->User->find('list');
        $subjects = $this->TutorsSubject->Subject->find('list');
        $this->set(compact('users', 'subjects'));
    }
    
    /**
     * delete method
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
        $this->TutorsSubject->id = $id;
        if (!$this->TutorsSubject->exists()) {
            throw new NotFoundException(__('Invalid TutorsSubject'));
        }
        if ($this->TutorsSubject->delete()) {
            $this->Session->setFlash(__('TutorsSubject deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('TutorsSubject was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }
    
     /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     */
    public function admin_view($id = null) {
		if (!$this->TutorsSubject->exists($id)) {
			throw new NotFoundException(__('Invalid TutorsSubject'));
		}
		$options = array('conditions' => array('TutorsSubject.' . $this->TutorsSubject->primaryKey => $id));
		$this->set('TutorsSubject', $this->TutorsSubject->find('first', $options));
    }
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->TutorsSubject->recursive = 0;
        $this->set('TutorsSubjects', $this->paginate());
    }

}


