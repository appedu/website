<?php
class ACLTestController extends AppController {
	public $plugin = null;

	public $components = array(
                'Auth',
                'Session',
                'Cookie',
				'Acl',
				   'Security' => array(
				        'csrfUseOnce' => false
				    )
        );

	public $helpers = array(
		'Html',
		'Form',
		'Session',
		'Time',
		'Text'
	);
	

	public function beforeFilter(){
		parent::beforeFilter();
		if(true){
			$this->Auth->allow('view', 'index');
		}
	}

	public function index(){
		// $this->layout = 'Users.Users/login';
		$this->set('model', 'User');

		// $this->render('Users.Users/login');
		//$this->Acl->deny('Administrator/1', 'Admin.ControlObject', 'read');

		// pr($this->Auth->user());

		// pr($result = $this->Acl->check('Administrator/1', 'Admin.ActionLog', 'create'));

		// $this->Category->recursive = -1;

		$this->loadModel('Questions');
		$recursive = 1;
		pr($this->Questions->find('all'));

		//pr($this->Session);
	}
}
