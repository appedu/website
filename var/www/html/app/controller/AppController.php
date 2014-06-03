<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $theme = "Cakestrap";
    public $components = array(
        'DebugKit.Toolbar',
        'Auth' => array(
            'authorize' => 'Controller',
            'loginAction' => '/users/login',
            'loginRedirect' => '/',
            'logoutRedirect' => '/'
        ), 'Session',
        'Users.RememberMe'
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->RememberMe->restoreLoginFromCookie();
        $this->set('server_root', Router::url('/'));
        
//may 20, 2014
$this->loadModel('Subject');
$this->set('subjects', $this->Subject->find('all'));

$this->loadModel('Notification');
/* Get New Count */
$this->set('notificationCount', $this->Notification->find('count', array('conditions' => array('Notification.user_id' => $this->Auth->user('id'), 'isChecked' => false), 'order' => 'Notification.created DESC')));

$this->Notification->Behaviors->load('Containable');
$this->Notification->contain(array('InitUser', 'Question', 'Group'));

$this->set('notifications', $this->Notification->find('all', array('conditions' => array('Notification.user_id' => $this->Auth->user('id')), 'order' => 'Notification.created DESC', 'limit' => 20)));

// /* Update after checking the notifcations */
$this->Notification->updateAll(array('isChecked' => true), array('Notification.user_id' => $this->Auth->user('id'), 'isChecked' => false));

$this->set('model', 'User');

// pr($this->request->params);
if(array_key_exists('group_slug', $this->request->params)){
$this->loadModel("Group");
$this->Group->recursive = -1;
$this->set('target_group', $this->Group->findBySlug($this->request->params['group_slug']));
}

if(array_key_exists('myarchive', $this->request->params)){
$this->set('myarchive', 'true');
}

if(array_key_exists('group_id', $this->request->query)){

}
$this->loadModel('Topic');
$this->loadModel('SourceType');

$this->SourceType->recursive = -1;
$this->Topic->Behaviors->load('Containable');
$this->Topic->contain('Subject');
// $this->Topic->recursive = -1;

$this->set('topics', $this->Topic->find('all'));
$this->set('source_types', $this->SourceType->find('all'));

//end of May 20, 2014
    }

public function index() {
//may 19, 2014
$this->loadModel('Subject');
$this->set('subjects', $this->Subject->find('all'));

$this->loadModel('Notification');
/* Get New Count */
$this->set('notificationCount', $this->Notification->find('count', array('conditions' => array('Notification.user_id' => $this->Auth->user('id'), 'isChecked' => false), 'order' => 'Notification.created DESC')));

$this->Notification->Behaviors->load('Containable');
$this->Notification->contain(array('InitUser', 'Question', 'Group'));

$this->set('notifications', $this->Notification->find('all', array('conditions' => array('Notification.user_id' => $this->Auth->user('id')), 'order' => 'Notification.created DESC', 'limit' => 20)));

// /* Update after checking the notifcations */
$this->Notification->updateAll(array('isChecked' => true), array('Notification.user_id' => $this->Auth->user('id'), 'isChecked' => false));

$this->set('model', 'User');

// pr($this->request->params);
if(array_key_exists('group_slug', $this->request->params)){
$this->loadModel("Group");
$this->Group->recursive = -1;
$this->set('target_group', $this->Group->findBySlug($this->request->params['group_slug']));
}

if(array_key_exists('myarchive', $this->request->params)){
$this->set('myarchive', 'true');
}
//end of may 19, 2014
    }

    public function isAuthorized($user = null) {
        // Any registered user can access public functions
        if (empty($this->request->params['admin'])) {
            return true;
        }

        // Only admins can access admin functions
        if (isset($this->request->params['admin'])) {
            return (bool) ($user['role'] === 'ADMIN');
        }

        // Default deny
        return false;
    }

    public function appError($error) {
        if (strpos($this->request->url, 'admin') !== 0) {
            $this->Session->setFlash($error->getMessage(), 'flash/error');
            $this->redirect('/');
        } else {
            $this->Session->setFlash($error->getMessage(), 'flash/error');
            $this->redirect(array('controller' => $this->request->params['controller'], 'action' => 'index', 'admin' => true));
        }
    }

    

}
