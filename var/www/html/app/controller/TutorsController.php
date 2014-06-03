<?php

App::uses('AppController', 'Controller');

/**
 * Tutors Controller
 *
 * @property Tutor $Tutor
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TutorsController extends AppController {

    public $layout = 'forum';
//    public $helpers = array('Html', 'Form', 'Session');
    public $helpers = array('Js' => array('Jquery'));
    public $components = array('Session');

    public function index() {
        $this->set('tutors', $this->Tutor->find('all'));
    }

    public function is_online() {
        $this->autoRender = false;
        $this->set('tutors', $this->Tutor->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid tutor'));
        }

        $tutor = $this->Tutor->findById($id);
        if (!$tutor) {
            throw new NotFoundException(__('Invalid tutor'));
        }
        $this->set('tutor', $tutor);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Tutor->create();
            if ($this->Tutor->save($this->request->data)) {
                $this->Session->setFlash(__('Tutor has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add tutor.'));
        }
    }

    /**
     * diaTutor method
     *
     * @return void
     */
    public function test_save() {
        $id = AuthComponent::user('id');


        $dt = new DateTime();
        echo $dt->format('Y-m-d H:i:s');
    }

    /**
     * set_online method
     *
     * @return void
     */
    public function set_online() {

        $this->autoRender = false;

        $id = AuthComponent::user('id');
        $tutor = $this->Tutor->findById($id);
        $status = "";


        if ($tutor) {
            $this->Session->setFlash(__('tutor is already online.'), 'flash/success');
        } else {
            $dt = new DateTime();

            $this->Tutor->set(array(
                'id' => $id,
                'is_available' => true,
                'last_available' => $dt->format('Y-m-d H:i:s')
            ));

            if ($this->Tutor->save()) {
                $this->Session->setFlash(__('tutor is online.'), 'flash/success');
                $status = "online";
            } else {
                $this->Session->setFlash(__('error.'), 'flash/error');
            }
        }

        $this->redirect(array('action' => 'index'));

        //$this->redirect(array('controller' => 'pages', 'action' => 'index'));
    }

    /**
     * set_offline method
     *
     * @return void
     */
    public function set_offline() {

        $this->autoRender = false;

        $id = AuthComponent::user('id');
        $tutor = $this->Tutor->findById($id);
        $status = "";

        if ($tutor) {
            if ($this->Tutor->delete($tutor['Tutor'][id])) {
                $this->Session->setFlash(__('tutor is offline.'), 'flash/success');
                $status = "offline";
            } else {
                $this->Session->setFlash(__('error.'), 'flash/error');
            }
        } else {
            $this->Session->setFlash(__('tutor is already offline.'), 'flash/success');
        }

        $this->redirect(array('action' => 'index'));
    }

}
