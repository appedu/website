<?php
App::uses('AppModel', 'Model');
/**
 * Notification Model
 *
 * @property User $User
 * @property Question $Question
 * @property Group $Group
 * @property User $User
 */
class Notification extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'description';

	/* TYPE
		0 : Question
		1 : Group
		2 : User
	*/



	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'question_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'InitUser' => array(
			'className' => 'User',
			'foreignKey' => 'init_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function pushNotification($user_ids, $text, $addition){
		App::import('model','Notification');
		// $data = '{"where": {"deviceType": "ios"}, "data":{"aps": {"badge": 7,"alert": "good message"}}}';
		$trimmed_text = substr($text, 0, 100);

		foreach ($user_ids as $user) {
			$notificationCount = $this->Notification->find('count', array('conditions' => array('Notification.user_id' => $user, 'isChecked' => false)));
			$payload = array('aps'=>array('alert'=>$trimmed_text, 'badge'=>$notificationCount, 'sound'=>'default'), 'ad'=>$addition);
			$data_arr = array('where'=>array('userId'=>$user), 'data'=>$payload);
			$data = json_encode($data_arr);
	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, "https://api.parse.com/1/push");
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Parse-Application-Id: lCcufzow7Mwkiw4s5HQY2sdZ7IhboPFKkBkW8qyV", "X-Parse-REST-API-Key: VfPDwedHgJV5L9JFixTszSxX0EEymeEy0QMvgZlF", "Content-Type: application/json", "Content-length: ".strlen($data)));
	        curl_setopt($ch, CURLOPT_HEADER, TRUE); 
	        curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	        $head = curl_exec($ch);
	        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
	        curl_close($ch);
		}
	}

	public function addNotificationForComment($user_id, $question_id, $comment){
		/* Add Follower Notification */
		App::import('model','Question');
		App::import('model','Notification');
		$user_ids = array();
		$this->Question = new Question();
		$this->Notification = new Notification();

		$this->Question->Behaviors->load('Containable');
		$this->Question->contain(array('FollowUser'));
		$question = $this->Question->findById($question_id);
		$user_init = $this->User->findById($user_id);

		$notice_type = 0;

		foreach ($question['FollowUser'] as $user_follow) {
			if ($user_init['User']['id'] == $user_follow['id'])
				continue;

			array_push($user_ids, $user_follow['id']);
			$notification_new = array();
			$notification_new['description'] = $user_init['User']['username'] . ' commented on ' . $question['Question']['title'] . ': ' . $comment;
			$notification_new['type'] = $notice_type;
			$notification_new['isChecked'] = false;
			$notification_new['isPushed'] = false;
			$notification_new['user_id'] = $user_follow['id'];
			$notification_new['init_user_id'] = $user_id;
			$notification_new['question_id'] = $question_id;
			$this->save($notification_new);
		}

		if(count($user_ids)>0){
			$this->pushNotification($user_ids, $user_init['User']['username'] . ' commented on ' . $question['Question']['title'], array('type'=>$notice_type, 'question_id'=>$question_id));
		}
	}

	public function addNotificationForAnswer($user_id, $question_id){
		/* Add Follower Notification */
		App::import('model','Question');
		App::import('model','Notification');
		$this->Question = new Question();
		$this->Notification = new Notification();

		$this->Question->Behaviors->load('Containable');
		$this->Question->contain(array('FollowUser'));
		$question = $this->Question->findById($question_id);
		$user_init = $this->User->findById($user_id);

		$user_ids = array();
		$notice_type = 0;

		foreach ($question['FollowUser'] as $user_follow) {
			if ($user_init['User']['id'] == $user_follow['id'])
				continue;
			
			array_push($user_ids, $user_follow['id']);
			$notification_new = array();
			$notification_new['description'] = $user_init['User']['username'] . ' answered on ' . $question['Question']['title'];
			$notification_new['type'] = $notice_type;
			$notification_new['isChecked'] = false;
			$notification_new['isPushed'] = false;
			$notification_new['user_id'] = $user_follow['id'];
			$notification_new['init_user_id'] = $user_id;
			$notification_new['question_id'] = $question_id;
			$this->save($notification_new);
		}

		if(count($user_ids)>0){
			$this->pushNotification($user_ids, $user_init['User']['username'] . ' answered on ' . $question['Question']['title'], array('type'=>$notice_type, 'question_id'=>$question_id));
		}
	}	

	public function addNotificationForShare($user_id, $question_id){
		/* Add Follower Notification */
		App::import('model','Question');
		App::import('model','Notification');
		$this->Question = new Question();
		$this->Notification = new Notification();

		$this->Question->Behaviors->load('Containable');
		$this->Question->contain(array('FollowUser', 'User'));
		$question = $this->Question->findById($question_id);

		$notice_type = 0;
		$user_ids = array();
		
		if ($question['User']['id'] == $user_id){
			$user_init = $this->User->findById($user_id);	

			foreach ($question['FollowUser'] as $user_follow) {
				if ($user_init['User']['id'] == $user_follow['id'])
					continue;

				array_push($user_ids, $user_follow['id']);
				$notification_new = array();
				$notification_new['description'] = $user_init['User']['username'] . ' shared your question: ' . $question['Question']['title'];
				$notification_new['type'] = $notice_type;
				$notification_new['isChecked'] = false;
				$notification_new['isPushed'] = false;
				$notification_new['user_id'] = $user_follow['id'];
				$notification_new['init_user_id'] = $user_id;
				$notification_new['question_id'] = $question_id;
				$this->save($notification_new);
			}

			if(count($user_ids)>0){
				$this->pushNotification($user_ids, $user_init['User']['username'] . ' shared your question: ' . $question['Question']['title'], array('type'=>$notice_type, 'question_id'=>$question_id));
			}
		}
	}	

	public function addNotificationForSharedGroup($user_id, $question_id, $group_id){
		/* Add Follower Notification */
		App::import('model','Question');
		App::import('model','Notification');
		App::import('model','Group');
		$this->Question = new Question();
		$this->Notification = new Notification();
		$this->Group = new Group();

		$this->Group->Behaviors->load('Containable');
		$this->Group->contain(array('GroupsUser'));
		$group = $this->Group->findById($group_id);

		$this->Question->recusive = -1;
		$question = $this->Question->findById($question_id);
		
		$user_init = $this->User->findById($user_id);

		$notice_type = 0;

		$user_id_admin = null;
		foreach ($group['GroupsUser'] as $user){
			if ($user['status'] == 'ADMIN')
				$user_id_admin = $user['user_id'];
		}

		if ($user_id_admin != $user_id){
			$notification_new = array();
			$notification_new['description'] = $user_init['User']['username'] . ' posted in your Circle ' . $group['Group']['name'] . ' : ' . $question['Question']['title'];
			$notification_new['type'] = $notice_type;
			$notification_new['isChecked'] = false;
			$notification_new['isPushed'] = false;
			$notification_new['user_id'] = $user_id_admin;
			$notification_new['init_user_id'] = $user_id;
			$notification_new['question_id'] = $question_id;
			$this->save($notification_new);

			$this->pushNotification(array($user_id_admin), $user_init['User']['username'] . ' posted in your Circle ' . $group['Group']['name'], array('type'=>$notice_type, 'question_id'=>$question_id));
		}
	}

	public function addNotificationForJoin($user_id, $group_id){
		/* Add Follower Notification */
		App::import('model','Notification');
		App::import('model','Group');
		$this->Notification = new Notification();

		$this->Group->Behaviors->load('Containable');
		$this->Group->contain(array('GroupsUser'));
		$group = $this->Group->findById($group_id);

		$user_init = $this->User->findById($user_id);	
		$notice_type = 2;

		$user_id_admin = null;
		foreach ($group['GroupsUser'] as $user){
			if ($user['status'] == 'ADMIN')
				$user_id_admin = $user['user_id'];
		}

		if ($user_id_admin != $user_id){
			$notification_new = array();
			$notification_new['description'] = $user_init['User']['username'] . ' joined in your Circle ' . $group['Group']['name'];
			$notification_new['type'] = $notice_type;
			$notification_new['isChecked'] = false;
			$notification_new['isPushed'] = false;
			$notification_new['user_id'] = $user_id_admin;
			$notification_new['init_user_id'] = $user_id;
			$notification_new['group_id'] = $group_id;
			$this->save($notification_new);

			$this->pushNotification(array($user_id_admin), $user_init['User']['username'] . ' joined in your Circle ' . $group['Group']['name'], array('type'=>$notice_type, 'group_id'=>$group_id));
		}
	}

	public function addNotificationForRequest($user_id, $group_id){
		/* Add Follower Notification */
		App::import('model','Notification');
		App::import('model','Group');
		$this->Notification = new Notification();

		$this->Group->Behaviors->load('Containable');
		$this->Group->contain(array('GroupsUser'));
		$group = $this->Group->findById($group_id);

		$notice_type = 1;

		$user_init = $this->User->findById($user_id);	

		$user_id_admin = null;
		foreach ($group['GroupsUser'] as $user){
			if ($user['status'] == 'ADMIN')
				$user_id_admin = $user['user_id'];
		}

		if ($user_id_admin != $user_id){
			$notification_new = array();
			$notification_new['description'] = $user_init['User']['username'] . ' requested to join your Circle ' . $group['Group']['name'];
			$notification_new['type'] = $notice_type;
			$notification_new['isChecked'] = false;
			$notification_new['isPushed'] = false;
			$notification_new['user_id'] = $user_id_admin;
			$notification_new['init_user_id'] = $user_id;
			$notification_new['group_id'] = $group_id;
			$this->save($notification_new);

			$this->pushNotification(array($user_id_admin), $user_init['User']['username'] . ' requested to join your Circle ' . $group['Group']['name'], array('type'=>$notice_type, 'group_id'=>$group_id));
		}
	}
}
