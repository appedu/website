<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class VisessionsController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();
    public $layout = 'forum';
// public $components = array('Auth');

    public $helpers = array(
        'Html',
        'Form',
        'Session',
        'Time',
        'Text'
    );
//    public $components = array(
//        'Acl',
//        'Security' => array(
//            'csrfUseOnce' => false
//        ),
//        'Auth'
//    );
    
    public $components = array('RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title_for_layout', 'Appedu');
        $this->Auth->allow('index', 'tos');
    }

    public function call_tutor() {
        
//        $subjects = $this->Visession->VisessionSubject->find('list');
//        $this->set(compact('subjects'));
//        
//        if (AuthComponent::user('role') == "TUTOR") {
//            $this->Session->setFlash(__('tutor not allowed'), 'flash/success');
//            $this->redirect(array('controller' => 'pages', 'action' => 'index'));
//        }
//
//        $this->Visession->recursive = 0;
//        $this->set('visessions', $this->paginate());
        
        //may 20, 2014
//        $this->loadModel('Subject');
//     $this->set('subjects', $this->Subject->find('all',array('fields'=>array('Subject.description'))));
                //end of May 20, 2014
     
        $subjects2 = $this->Visession->VisessionSubject->find('list');
        $this->set(compact('subjects2'));
        
//        print_r($subjects2);
    }

    public function add() {
        $this->autoRender = false;

        $msg = "";

        $id = AuthComponent::user('id');

        $this->Visession->create();

        $dt = new DateTime();
        $this->Visession->set(array(
            'user_id' => $id,
            'student_id' => $id,
//            'phono_id' => $this->request->data['phonoId'],
            'is_available' => true,
            'date_session' => $dt->format('Y-m-d H:i:s')
        ));
        if ($this->Visession->save()) {
            $msg = "vi session added";
        } else {
            $msg = "error adding vi session";
        }

        return json_encode($msg);
    }

    public function list_tutors($subjectId = null) {

        $this->autoRender = false; // We don't render a view in this example
//        $this->request->onlyAllow('ajax'); // No direct access via browser URL

        $this->loadModel('TutorsSubject');
//        if ($this->request->data) {
            $subject_id = $this->request->data['subjectId'];

            $data = $this->TutorsSubject->find('all', array('conditions' => array('AND' => array('TutorsSubject.subject_id =' => $subject_id),
                    array('Tutors.sip_address <>' => ''))
            ));
//        }

        return json_encode($data);
    }

    public function get_tutors($subjectId = null) {

        $this->autoRender = false; // We don't render a view in this example
//        $this->request->onlyAllow('ajax'); // No direct access via browser URL
        
        
        echo $subjectId;
        
        $this->loadModel('TutorsSubject');
        $data = $this->TutorsSubject->find('all', array('conditions' => array('AND' => array('TutorsSubject.subject_id =' => $subjectId),
                array('Tutors.phono_id <>' => ''))
        ));

        return json_encode($data);
    }

}
