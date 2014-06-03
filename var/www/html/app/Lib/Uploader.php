<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::uses('Controller', 'Controller');

// Array
//         (
//             [name] => backup.jpg
//             [type] => image/jpeg
//             [tmp_name] => /private/var/tmp/phpV4r2jB
//             [error] => 0
//             [size] => 376891
//         )

class Uploader extends AppController {
	public $uses = array('Attachment');
	public $file_ids = array();

	public $components = array('Auth');

	public $question_id = '';
	public $answer_id = '';

	private $attachment_dir = 'attachment/';

	// function Uploader($q='', $a='') {
	// 	parent::__construct();
	// 	$question_id = $q;
	// 	$answer_id = $a;
	// }

	public function fileUpload($upload_info = array()){
		if(!is_array($upload_info)){
			return false;
		}
		if(!array_key_exists('name', $upload_info) ||
			!array_key_exists('type', $upload_info) ||
			!array_key_exists('tmp_name', $upload_info) ||
			!array_key_exists('error', $upload_info) ||
			!array_key_exists('size', $upload_info) ||
			$this->Auth->user('id')==''){
			// not a file upload array
			return false;
		}
		
		$ext = explode('.', $upload_info['name']);
		if(count($ext)<2){
			$ext = '';
		}else{
			$ext = '.'. $ext[1];
		}
		$new_file_name = $this->generateRandomName() . $ext;
		$new_path = $attachment_dir . $new_file_name;
		$new_full_path = WWW_ROOT . $new_path;

		pr($new_full_path);

		if($upload_info['error']==0 && $upload_info['size']>0){
			// if(strpos($upload_info['type'], 'image')!==false){
				// imageUpload($upload_info);
			// }else{
				if(move_uploaded_file($upload_info['type'], $new_full_path)){
					$data = array();
					$data['Attachment'] = array();
					$data['Attachment']['file_name'] = $new_file_name;
					$data['Attachment']['file_path'] = $new_path;
					$data['Attachment']['file_ext'] = $ext;
					$data['Attachment']['file_size'] = $upload_info['size'];
					// $data['Attachment']['raw_name'] = $new_full_path;
					$data['Attachment']['original_name'] = $upload_info['name'];
					$data['Attachment']['type'] = 0;
					$data['Attachment']['user_id'] = $this->Auth->user('id');
					if($question_id!=''){
						$data['Attachment']['question_id'] = $question_id;
					}
					if($answer_id!=''){
						$data['Attachment']['answer_id'] = $answer_id;
					}

					$this->Attachment->save($data);

					array_push($file_ids, $this->Attachment->id);
				}
			// }
		}
	}

	// public function imageUpload($upload_info){
	// 	if($upload_info['error']==0 && $upload_info['size']>0){

	// 	}
	// }

	public function generateRandomName(){
		$name = date('isY') . mt_rand() . date('Hdm');
		return $name;
	}
}
