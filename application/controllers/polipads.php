<?php
class Polipads extends Controller {

	function Polipads()
	{
		parent::Controller();	
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->helper('form');
		$this->load->library('cd_access');
		$this->load->library('email');
	}
	
	function index()
	{
		
		$this->session->sess_destroy();
		$this->session->set_userdata('pageTitle', 'Welcome to..:: Polipad ::..');
		$data['msg'] = '';
		$datas['content'] = $this->load->view('polipad', $data, true);
		$this->load->view('mainlanding', $datas);
	}
	
	
	
	
	
	public function involved()
	{
		
			
			$this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email');
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');	

			if($this->form_validation->run() == FALSE )
			{
				
				redirect('polipads');
			}
			else
			{
			
					$cam_abt = array(
					'email'=> $this->input->post('email'),
					'interest'=> $this->input->post('interest'),
					);
					$this->common_model->manage_table('involved', $cam_abt);
					$ins = $this->input->post('interest');
					
					// send email
				
				$this->email->initialize($this->config->item('email_config'));
		
				$msg = '<p>Hello! Thank you for interest to volunteer with Polipad. You are interested to: '.$ins.'</p>';
				$msg = '<p>We are excited and looking forward to working with you. We will contact you within a day or two with a list of assignments that you might be interested to do.</p>';
				
				$msg .= '<p>In the mean time, would consider <a href="http://www.polipad.net/welcome/index"> signing up for a Polipad account.</a></p>';
				$msg .= '<p>Thanks again for wanting to make a change in politics.</p>';
				$msg .= '<p>Your Polipad Team.</p>';
				
				//$msg .= '<p>Username: '.$user;
				
				
				$this->email->to($this->input->post('email'));
				$this->email->from('polipad.net', 'Interns needed');
				$this->email->bcc('sayabu@gmail.com');
				$this->email->bcc('mahmudapu@yahoo.com');
				$this->email->bcc('campaign@polipad.net');
				
				$this->email->subject('Polipad Get Involved');
				$this->email->message($msg);
				
				$this->email->send();
				// send email
					

					redirect('polipads/success');
			}
	}
	
	function success()
	{
		
		$this->session->sess_destroy();
		$this->session->set_userdata('pageTitle', 'Welcome to..:: Polipad ::..Invitation Success');
		$data['msg'] = '';
		$datas['content'] = $this->load->view('getinvolvedsucess', $data, true);
		$this->load->view('main', $datas);
	}	
	
	function about()
	{
		
		$this->session->sess_destroy();
		$this->session->set_userdata('pageTitle', 'Welcome to..:: Polipad ::..About Us');
		$data['msg'] = '';
		$datas['content'] = $this->load->view('about', $data, true);
		$this->load->view('main', $datas);
	}	
	
	function getinvolved()
	{
		
		$this->session->sess_destroy();
		$this->session->set_userdata('pageTitle', 'Welcome to..:: Polipad ::..Interns needed');
		$data['msg'] = '';
		$datas['content'] = $this->load->view('getinvolved', $data, true);
		$this->load->view('main', $datas);
	}
	function microCampaign()
	{
		
		$this->session->sess_destroy();
		$this->session->set_userdata('pageTitle', 'Welcome to..:: Polipad ::..Micro-Campaign Platform');
		$data['msg'] = '';
		$datas['content'] = $this->load->view('microCam', $data, true);
		$this->load->view('main', $datas);
	}
}
	
