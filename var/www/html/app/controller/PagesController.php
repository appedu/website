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
class PagesController extends AppController {
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

	public $components = array(
		'Acl',
		'Security' => array(
			'csrfUseOnce' => false
		),
		'Auth'
    );
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', 'Appedu');
		$this->Auth->allow('index', 'tos');
	}

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() {
//               May 14, 2014
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
//               end of May 14, 2014
	}

	public function post(){
	}

	public function edit(){

	}

	public function circles(){
		$this->loadModel('Group');

		$this->set('circles', $this->Group->find('all'));
	}

	public function profile(){
		$this->set('me', $this->Auth->user());
	}

	public function group_create(){
		$this->loadModel('Focus');
		$this->set('focus', $this->Focus->find('all'));
		$this->set('me', $this->Auth->user());
	}

	public function questions(){
		$this->loadModel('Question');
		$this->Question->recursive = 3;

		$this->Question->Behaviors->load('Containable');
		$this->Question->contain(array('Answer.Comment.User', 'Answer.Attachment', 'Attachment' => array('order'=>'Attachment.seq'), 'Topic.Subject', 'Tag', 'User', 'Answer.User', 'FollowUser' => array('conditions' => array('user_id' => $this->Auth->user('id')))));

		$question = $this->Question->findBySlugId($this->request->param('slug_id'));
		$this->set('question', $question);
		$this->set('followCount', sizeof($question['FollowUser']));

		unset($question['FollowUser']);
		$this->Question->addScoreForEvent($question, 'view');
		if (!isset($this->request->params['slug']) && !empty($question['Question']['slug']) && strlen($question['Question']['slug']) == strlen(utf8_decode($question['Question']['slug']))){
			$this->redirect(array('action' => 'questions', 'slug_id' => $question['Question']['slug_id'], 'slug' => $question['Question']['slug']));
		}

		$this->layout = 'questions';
	}

	public function tos(){

	}

	public function userdetail(){
		if(array_key_exists('user_slug', $this->request->params)){
			$this->loadModel("User");
			$this->User->recursive = -1;
			$user = $this->User->findBySlug($this->request->params['user_slug'], array('username', 'gender', 'form_and_class', 'dob', 'file_profile', 'file_cover'));
			$this->set('me', $user['User']);
		}else{
			$this->redirect('/');
		}
	}

	public function groupadmin(){			
		if(array_key_exists('group_slug', $this->request->params) && $this->Auth->user('id')!=''){
			$this->loadModel("Group");
			$this->Group->Behaviors->load('Containable');
			$this->Group->contain(array('GroupsUser'=>array('order'=>'GroupsUser.status'), 'User'));
			$this->loadModel('GroupsUser');
			$group = $this->Group->findBySlug($this->request->params['group_slug']);
			$user_id = $this->Auth->user('id');

			if(!empty($group)){
				$is_admin = $this->GroupsUser->find('first', array('conditions'=>array('group_id'=>$group['Group']['id'], 'user_id'=>$user_id, 'status'=>'ADMIN'), 'recursive'=>-1));

				if(!empty($is_admin)){
					$this->loadModel('Focus');
					$focus = $this->Focus->find('all', array('recursive'=>-1));
					$this->set('group_info', $group);
					$this->set('focus', $focus);
				}else{
					$this->redirect('/');
				}
			}else{
				$this->redirect('/');
			}
		}else{
			$this->redirect('/');
		}
	}
        
        
        
        public function dial_tutor(){
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
	}
}
