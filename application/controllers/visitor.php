<?php

class Visitor extends Controller
{
	
	function Visitor()
	{
		parent::Controller();
		$this->load->model('candidate_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('email');
		$this->load->model('common_model');
		$this->load->model('user_model');
	}
	
	
	
	public function campaign()
	{
			$user_id = $this->session->userdata('user_id');
		
			$cid = $this->uri->segment(3,0);
			if($cid >0){
				$this->session->set_userdata('cam_id', $cid);
				
			}
			else
			{
				redirect('candidate/index');
			}
			
			$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign');
			$cam_id = $this->session->userdata('cam_id');
			$data['cam_id'] = $cam_id;
			$data['isadmin'] = $this->session->userdata('role_id');
			$data['activeuser'] = $this->user_model->get_info($user_id);
			$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
			$data['ccta'] = $this->candidate_model->get_cam('cam_call_to_action',$cam_id);
			$data['cwy'] = $this->candidate_model->get_cam('cam_why_you',$cam_id);
			$data['cj'] = $this->candidate_model->get_cam('cam_justify',$cam_id);
			$data['cb'] = $this->candidate_model->get_cam('cam_basic',$cam_id);
			$data['cay'] = $this->candidate_model->get_cam('cam_about_you',$cam_id);
			
			$datas['content'] = $this->load->view('campaign', $data, true);
			$this->load->view('main', $datas);

	}
	public function updates()
	{
			$user_id = $this->session->userdata('user_id');
		
			if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
			else
			{
				
			
			$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign');
			$cam_id = $this->session->userdata('cam_id');
			$data['cam_id'] = $cam_id;
			$data['isadmin'] = $this->session->userdata('role_id');
			$data['activeuser'] = $this->user_model->get_info($user_id);
			$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
			//the update data here

			$data['cb'] = $this->candidate_model->get_cam('cam_basic',$cam_id);
			$data['cay'] = $this->candidate_model->get_cam('cam_about_you',$cam_id);
			$datas['content'] = $this->load->view('visitor_update', $data, true);
			$this->load->view('main', $datas);
			}
	}
	
	public function ideas()
	{
			$user_id = $this->session->userdata('user_id');
		
			if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
			else
			{
				
			
			$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign');
			$cam_id = $this->session->userdata('cam_id');
			$data['cam_id'] = $cam_id;
			$data['isadmin'] = $this->session->userdata('role_id');
			$data['activeuser'] = $this->user_model->get_info($user_id);
			$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
			//the update data here

			$data['cb'] = $this->candidate_model->get_cam('cam_basic',$cam_id);
			$data['cay'] = $this->candidate_model->get_cam('cam_about_you',$cam_id);
			$datas['content'] = $this->load->view('visitor_ideas', $data, true);
			$this->load->view('main', $datas);
			}
	}
	
	public function supporters()
	{
			$user_id = $this->session->userdata('user_id');
		
			if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
			else
			{
				
			
			$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign');
			$cam_id = $this->session->userdata('cam_id');
			$data['cam_id'] = $cam_id;
			$data['isadmin'] = $this->session->userdata('role_id');
			$data['activeuser'] = $this->user_model->get_info($user_id);
			$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
			//the update data here

			$data['cb'] = $this->candidate_model->get_cam('cam_basic',$cam_id);
			$data['cay'] = $this->candidate_model->get_cam('cam_about_you',$cam_id);
			$datas['content'] = $this->load->view('visitor_supporters', $data, true);
			$this->load->view('main', $datas);
			}
	}
	public function feedback()
	{
			$user_id = $this->session->userdata('user_id');
		
			if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
			else
			{
				
			
			$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign');
			$cam_id = $this->session->userdata('cam_id');
			$data['cam_id'] = $cam_id;
			$data['isadmin'] = $this->session->userdata('role_id');
			$data['activeuser'] = $this->user_model->get_info($user_id);
			$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
			//the update data here

			$data['cb'] = $this->candidate_model->get_cam('cam_basic',$cam_id);
			$data['cay'] = $this->candidate_model->get_cam('cam_about_you',$cam_id);
			$datas['content'] = $this->load->view('visitor_feedback', $data, true);
			$this->load->view('main', $datas);
			}
	}
	
}	
?>