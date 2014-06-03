<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::uses('Component', 'Controller');

// Array
//         (
//             [name] => backup.jpg
//             [type] => image/jpeg
//             [tmp_name] => /private/var/tmp/phpV4r2jB
//             [error] => 0
//             [size] => 376891
//         )

class UploaderComponent extends Component {
	public $file_ids = array();
	public $components = array('Auth');
	private $attachment_dir = 'attachment/';
	private $count = 0;
	private $app_user_id = '';

	public function fileUploadFromApp($upload_info = array(), $question_id = '', $answer_id = '', $i_attachment = 0, $user_id){
		$this->app_user_id = $user_id;

		$this->fileUpload($upload_info, $question_id, $answer_id, $i_attachment);
	}

	public function fileUpload($upload_info = array(), $question_id = '', $answer_id = '', $i_attachment = 0){
		if(!is_array($upload_info)){
			return false;
		}
		$user_id = ($this->Auth->user('id')=='')?(($this->app_user_id=='')?'':$this->app_user_id):$this->Auth->user('id');
		if(!array_key_exists('name', $upload_info) ||
			!array_key_exists('type', $upload_info) ||
			!array_key_exists('tmp_name', $upload_info) ||
			!array_key_exists('error', $upload_info) ||
			!array_key_exists('size', $upload_info) ||
			($user_id=='') || 
			(strpos($upload_info['type'],'image')===false && strpos($upload_info['type'],'video') === false)){
			// not a file upload array
			return false;
		}
		
		$tmp = pathinfo($upload_info['name']);
		$ext = $tmp['extension'];

		$new_file_name = $this->generateRandomName() . '.' . $ext;
		$new_path = $this->attachment_dir . $new_file_name;
		$new_full_path = WWW_ROOT . $new_path;

		$data = array();

		if($upload_info['error']==0 && $upload_info['size']>0){
			//if(strpos($upload_info['type'], 'image')!==false){
				// imageUpload($upload_info);
			// }else{
				// pr(is_uploaded_file ( string $filename ));

				if(move_uploaded_file($upload_info['tmp_name'], $new_full_path)){
					$this->Attachment = ClassRegistry::init('Attachment');

					$data['Attachment'] = array();
					$data['Attachment']['file_name'] = $new_file_name;
					$data['Attachment']['file_path'] = $new_path;
					$data['Attachment']['file_ext'] = $ext;
					$data['Attachment']['file_size'] = $upload_info['size'];
					$data['Attachment']['seq'] = $i_attachment;
					// $data['Attachment']['raw_name'] = $new_full_path;
					$data['Attachment']['original_name'] = $upload_info['name'];
					if(strpos($upload_info['type'], 'image')!==false)
						$data['Attachment']['type'] = 0;
					else 
						$data['Attachment']['type'] = 1;
					$data['Attachment']['user_id'] = $user_id;
					if($question_id!=''){
						$data['Attachment']['question_id'] = $question_id;
					}
					if($answer_id!=''){
						$data['Attachment']['answer_id'] = $answer_id;
					}

					if($question_id!='' || $answer_id!=''){
						$this->Attachment->create();
						$this->Attachment->save($data);
						array_push($this->file_ids, $this->Attachment->id);
					}

					// pr($this->file_ids);
				}else{
					// pr('cant up?');
				}
			// }
		}

		return $data;
	}

	// public function imageUpload($upload_info){
	// 	if($upload_info['error']==0 && $upload_info['size']>0){

	// 	}
	// }

	public function generateRandomName(){
		$name = date('isY') . mt_rand(). ''. ($this->count++) . '' . date('Hdm') . mt_rand();
		return $name;
	}
}
