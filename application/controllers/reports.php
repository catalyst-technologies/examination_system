<?php 
defined('BASEPATH') or exit ('No direct access script allowed.');

class reports extends CI_Controller 
{

	public function __construct()
	{
	
		parent::__construct();
		
	}

	public function index()
	{	
		$data['res'] = array(
			'page_title' 	=> 'Online Examination System',
			'title'			=>'Examination System',
			'greetings'		=>'Howdy,'
			);
		$data['data'] 		= $this->session->userdata();
		$data['url'] 		= base_url();
		$data['admin_data'] = $this->model->GetInformation($_SESSION['session_id']);
		$data['passed'] 	= $this->model->CountPassingStudents();
		$data['failed'] 	= $this->model->CountFailedStudents();
		$this->load->view('template/components/header',$data);
		$this->load->view('template/pages/admin/navs/navs');
		$this->load->view('template/pages/admin/reports',$data);

	}

}