<?php

App::uses('AppController', 'Controller');

/**
 * StudentsSubjects Controller
 *
 * @property StudentsSubjects $StudentsSubject
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StudentsSubjectsController extends AppController {

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
        $this->StudentsSubject->recursive = 0;
        $this->set('studentssubjects', $this->paginate());
    }

    /**
     * diaTutor method
     *
     * @return void
     */
    public function admin_add() {

        if ($this->request->is('post')) {
            $this->StudentsSubject->create();
            if ($this->StudentsSubject->save($this->request->data)) {

                $this->Session->setFlash(__('The subject studying has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The subject studying could not be saved. Please, try again.'), 'flash/error');
            }
        }

        $users = $this->StudentsSubject->User->find('list');
        $this->set(compact('users'));

        $subjects = $this->StudentsSubject->Subject->find('list');
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
        $this->StudentsSubject->id = $id;
        if (!$this->StudentsSubject->exists($id)) {
            throw new NotFoundException(__('Invalid StudentsSubject'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->StudentsSubject->save($this->request->data)) {
                $this->Session->setFlash(__('The subject studying has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The subject studying could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('StudentsSubject.' . $this->StudentsSubject->primaryKey => $id));
            $this->request->data = $this->StudentsSubject->find('first', $options);
        }
        $users = $this->StudentsSubject->User->find('list');
        $subjects = $this->StudentsSubject->Subject->find('list');
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
        $this->StudentsSubject->id = $id;
        if (!$this->StudentsSubject->exists()) {
            throw new NotFoundException(__('Invalid subject studying'));
        }
        if ($this->StudentsSubject->delete()) {
            $this->Session->setFlash(__('Subject studying deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Subject studying was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     */
    public function admin_view($id = null) {
        if (!$this->StudentsSubject->exists($id)) {
            throw new NotFoundException(__('Invalid subject studying'));
        }
        $options = array('conditions' => array('StudentsSubject.' . $this->StudentsSubject->primaryKey => $id));
        $this->set('StudentsSubject', $this->StudentsSubject->find('first', $options));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->StudentsSubject->recursive = 0;
        $this->set('studentssubjects', $this->paginate());
    }

}
