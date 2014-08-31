<?php
class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->helper('form');
		$this->load->library('cd_access');
		$this->load->model('common_model');
	}
	
	function index()
	{
		
		$this->session->sess_destroy();
		$this->session->set_userdata('pageTitle', 'Welcome to..:: Polipad ::..');
		$pcam = $this->common_model->get_can_published_cam();
		$data['msg'] = $this->uri->segment(3,0);
		$data['pcam'] = $pcam;
		$datas['content'] = $this->load->view('welcome', $data, true);
		$this->load->view('main', $datas);
	}
	
public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome/index');
	}	
	
}
