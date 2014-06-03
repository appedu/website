<?php

App::uses('AppController', 'Controller');
App::uses('File', 'Utility');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

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
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
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
                $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $schools = $this->User->School->find('list');
        $questions = $this->User->Question->find('list');
        $this->set(compact('schools', 'questions'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $schools = $this->User->School->find('list');
        $questions = $this->User->Question->find('list');
        $this->set(compact('schools', 'questions'));
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
            
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('User', $this->User->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {

        if ($this->request->is('post')) {
            $this->Uploader = $this->Components->load('Uploader');

//                        uncomment when needed
//			$file_cover = $this->Uploader->fileUpload($this->request->data['User']['file_cover_dir_tmp']);
//			$file_profile = $this->Uploader->fileUpload($this->request->data['User']['file_profile_dir_tmp']);
//
//			if(!empty($file_cover)){
//				$this->request->data['User']['file_cover'] = $file_cover['Attachment']['file_path'];
//			}
//
//			if(!empty($file_profile)){
//				$this->request->data['User']['file_profile'] = $file_profile['Attachment']['file_path'];
//			}

            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
            }

//                        $this->loadModel('Student');
//                        $this->Student->save($this->request->data['Student']);
//                        return $this->redirect(array('action' => 'index'));
        }
        $schools = $this->User->School->find('list');
        $questions = $this->User->Question->find('list');
        $this->set(compact('schools', 'questions'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Uploader = $this->Components->load('Uploader');

            $file_cover = $this->Uploader->fileUpload($this->request->data['User']['file_cover_dir_tmp']);
            $file_profile = $this->Uploader->fileUpload($this->request->data['User']['file_profile_dir_tmp']);

            if (!empty($file_cover)) {
                if ($this->request->data['User']['file_cover'] != '') {
                    $file = new File($this->request->data['User']['file_cover']);
                    unlink($file->path);
                }
                $this->request->data['User']['file_cover'] = $file_cover['Attachment']['file_path'];
            }

            if (!empty($file_profile)) {
                if ($this->request->data['User']['file_profile'] != '') {
                    $file = new File($this->request->data['User']['file_profile']);
                    unlink($file->path);
                }
                $this->request->data['User']['file_profile'] = $file_profile['Attachment']['file_path'];
            }

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $schools = $this->User->School->find('list');
        $questions = $this->User->Question->find('list');
        $this->set(compact('schools', 'questions'));
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function add_student() {

        if ($this->request->is('post')) {

            $this->User->create();

//                        $val = $this->request->data['User']['role'];
//                        if($val == 'Admin'){
//                            pr($this->request->data['User']['role']);
//                            exit;
//                        }
//                        if($val == 'Tutor'){
//                            pr($this->request->data['User']['role']);
//                            exit;
//                        }
//                        if($val == 'Student'){
//                            pr($this->request->data['User']['role']);
//                            exit;
//                        }

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $roles = $this->User->find('list');
        $schools = $this->User->School->find('list');
        $questions = $this->User->Question->find('list');
        $this->set(compact('roles', 'schools', 'questions'));
    }

}
