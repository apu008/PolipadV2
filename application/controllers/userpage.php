<?php
class Userpage extends Controller {

	function Userpage()
	{
		parent::Controller();	
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->helper('form');
		$this->load->library('cd_access');
		$this->load->model('common_model');
		$this->load->model('user_model');
		$this->load->model('candidate_model');
	}
	
	/*function index()
	{
		
		$this->session->sess_destroy();
		$this->session->set_userdata('pageTitle', 'Welcome to..:: Polipad ::..');
		$pcam = $this->common_model->get_can_published_cam();
		$data['msg'] = $this->uri->segment(3,0);
		$data['pcam'] = $pcam;
		$datas['content'] = $this->load->view('welcome', $data, true);
		$this->load->view('main', $datas);
	}*/
	
function index($camurl = '')
	{		
		$camurl = $camurl;
		
		if($camurl == '')
		{
			redirect('welcome/index');
		}
		else
		{
			
			
			$cb = $this->common_model->get_cam_id($camurl);

			

			if($cb->num_rows() > 0){

				$cbrow = $cb->row_array();

				$this->session->set_userdata('cam_id', $cbrow['cam_id']);

				redirect('campaign/main/'.$cbrow['cam_id']);

			}

			else

			{

				redirect('candidate/index');

			}
			
			
	
			
		}
	}



	
}
