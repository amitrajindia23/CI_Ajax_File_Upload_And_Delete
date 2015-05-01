<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('upload_model');
	}

	/**
	 * Index Page for this controller.
	**/
	public function index()
	{
		$fileList = $this->upload_model->getAllFiles();
		//echo '<pre>';print_r($fileList);exit;
		$data = array(
						'title' => 'Ajax File Upload | CI',
						'message' => '',
						'fileList' => $fileList
					);
		$this->load->view('upload/index',$data);
	}

	/*
	* Upload File
	*/
	public function fileupload(){
		//echo '<pre>';print_r($_FILES);
		//echo "<pre>";print_r($this->input->post());
		$config['upload_path'] = './assets/uploaded_files/';
		$config['allowed_types'] = 'doc|ppt|xlx|docx|txt|pdf';
		$config['max_size'] = 1024*8;
		$config['encrypt_name'] = True;

		$this->load->library('upload',$config);

		if(!$this->upload->do_upload()){
			echo "error";
		}
		else{
			$data = $this->upload->data();
			//echo '<pre>';print_r($data);exit;
			$fileName = $this->input->post('file-name');
			$filePath = 'assets/uploaded_files/'.$data['file_name'];
			$fileId = $this->upload_model->saveFile($fileName, $filePath);
			if($fileId){
				$result = $this->upload_model->getFileByFileId($fileId);
				$result->file_path = base_url().$result->file_path;
				echo json_encode($result);
			}
		}

	}

	/*
	* Delete file
	*/
	public function deletefile(){
		$fileId = $this->input->post('fileId');
		$result = $this->upload_model->deleteFile($fileId);
		$jsonArray = array();
		if($result){
			$jsonArray['message'] = 'deleted';
		}
		else{
			$jsonArray['message'] = 'notdeleted';
		}
		echo json_encode($jsonArray);
	}
}
