<?php

class Sharecampaign extends Controller
{
	
	function Sharecampaign()
	{
		parent::Controller();
		$this->load->model('candidate_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('email');
		$this->load->model('common_model');
		$this->load->model('user_model');
		$this->load->helper('ckeditor');
	}
	
	
	
	public function main()
	{
			$user_id = $this->session->userdata('user_id');
		$stpn = $this->uri->segment(4,0);
			$cid = $this->uri->segment(3,0);
			if($cid >0){
				$this->session->set_userdata('cam_id', $cid);
				
			}
			else
			{
				redirect('candidate/index');
			}
			
			
			$cam_id = $this->session->userdata('cam_id');
			$data['cam_id'] = $cam_id;
			$data['stpn'] = $stpn;
			$data['isadmin'] = $this->session->userdata('role_id');
			$data['activeuser'] = $this->user_model->get_info($user_id);
			$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
			$data['ccta'] = $this->candidate_model->get_cam('cam_call_to_action',$cam_id);
			$data['cwy'] = $this->candidate_model->get_cam('cam_why_you',$cam_id);
			$data['cj'] = $this->candidate_model->get_cam('cam_justify',$cam_id);
			$cb = $this->candidate_model->get_cam('cam_basic',$cam_id);
			$data['cb'] = $cb;
			$cbrow = $cb->row_array();
			$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign - Main - '.$cbrow['cam_title']);
			$data['cay'] = $this->candidate_model->get_cam('cam_about_you',$cam_id);
			$data['events'] = $this->candidate_model->get_cam('cam_events',$cam_id);
			$uplist = $this->candidate_model->get_cam('cam_updates',$cam_id, 10);
			$data['uplist'] = $uplist;
			
			
			if($this->candidate_model->is_unique_visitor($this->session->userdata('user_id'),$cam_id))
			{
				$remote  = $_SERVER['REMOTE_ADDR'];
				$country = $this->visitor_country();
				$add_date = date('Y-m-d');
				
				$cam_abt = array(
					'ip_add'=> $remote,
					'country'=> $country,
					'cam_id'=> $cam_id,
					'can_id'=> $this->session->userdata('user_id'),
					'add_date'=> $add_date,
					);
					$this->common_model->manage_table('visitors', $cam_abt);
			}
			
			$datas['content'] = $this->load->view('cam_main_2', $data, true);
			$this->load->view('maincam', $datas);

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
				
			$cam_id = $this->session->userdata('cam_id');
			$data['cam_id'] = $cam_id;
			$cb = $this->candidate_model->get_cam('cam_basic',$cam_id);
			$data['cb'] = $cb;
			$cbrow = $cb->row_array();
			$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign - Update - '.$cbrow['cam_title']);
			//$data['isadmin'] = $this->session->userdata('role_id');
			//$data['activeuser'] = $this->user_model->get_info($user_id);
			$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
			//the update data here
			$uplist = $this->candidate_model->get_cam('cam_updates',$cam_id, 10);
			$data['uplist'] = $uplist;
			
			$datas['content'] = $this->load->view('cam_update_2', $data, true);
			$this->load->view('maincam', $datas);
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
				
				$this->form_validation->set_rules('idea_title', 'Idea Title', 'required');
				$this->form_validation->set_rules('details', 'Details', 'required');
				$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');
				if($this->form_validation->run() == FALSE )
				{
					
					$cam_id = $this->session->userdata('cam_id');
					$data['cam_id'] = $cam_id;
					$cb = $this->candidate_model->get_cam('cam_basic',$cam_id);
					$data['cb'] = $cb;
					$cbrow = $cb->row_array();
					$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign - Ideas - '.$cbrow['cam_title']);
					$data['isadmin'] = $this->session->userdata('role_id');
					$data['activeuser'] = $this->user_model->get_info($user_id);
					$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
					$data['ideas'] = $this->candidate_model->get_cam('cam_ideas',$cam_id);	
					
					
					
		
					
						
					$datas['content'] = $this->load->view('cam_ideas_2', $data, true);
					$this->load->view('maincam', $datas);
				}
				else
			{
				
				$can_id = $this->session->userdata('user_id');
				$cam_id = $this->session->userdata('cam_id');
				$add_date = date('Y-m-d');

					
					$cam_abt = array(
					'idea_title'=> $this->input->post('idea_title'),
					'details'=> $this->input->post('details'),
					'cam_id'=> $cam_id,
					'user_id'=> $can_id,
					'add_date'=> $add_date,
					);
					$this->common_model->manage_table('cam_ideas', $cam_abt);
						
					redirect('campaign/ideas');
			}
			}
	}
	public function add_idea()
	{
		if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
		else
		{
			$this->form_validation->set_rules('idea_title', 'Idea Title', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			
					
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');	
			$cam_id = $this->session->userdata('cam_id');
			
			if($this->form_validation->run() == FALSE )
			{
							
				$data['cam_id'] = $cam_id;
					$cb = $this->candidate_model->get_cam('cam_basic',$cam_id);
					$data['cb'] = $cb;
					$cbrow = $cb->row_array();
					$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign - Ideas - Add - '.$cbrow['cam_title']);
					$uplist = $this->candidate_model->get_cam('cam_ideas',$cam_id);
					$data['uplist'] = $uplist;
					$data['idea_title'] = $this->input->post('idea_title');
					$data['details'] = $this->input->post('details');
					//Ckeditor's configuration
		$data['ckeditor'] = array(
			//ID of the textarea that will be replaced
			'id' 	=> 	'details',
			'path'	=>	'js/ckeditor',
			//Optionnal values
			'config' => array(
				'width' 	=> 	"80%",	//Setting a custom width
			),
			//Replacing styles from the "Styles tool"
			'styles' => array(
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)
			)
		);
		

				$datas['content'] = $this->load->view('cam_ideas_add', $data, true);
				$this->load->view('main', $datas);

			}
			else
			{
				
				$can_id = $this->session->userdata('user_id');
				$cam_id = $this->session->userdata('cam_id');
				$add_date = date('Y-m-d');

					
					$cam_abt = array(
					'idea_title'=> $this->input->post('idea_title'),
					'details'=> $this->input->post('details'),
					'cam_id'=> $cam_id,
					'user_id'=> $can_id,
					'add_date'=> $add_date,
					);
					$this->common_model->manage_table('cam_ideas', $cam_abt);

					redirect('campaign/ideas');
			}
			
		}
	}
	public function idea_edit()
	{
		if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
		else
		{
			
			$this->form_validation->set_rules('idea_title', 'Idea Title', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');	
			$cam_id = $this->session->userdata('cam_id');
			$cid = $this->uri->segment(3,0);
			if($this->form_validation->run() == FALSE )
			{
				
				if($this->candidate_model->is_idea_this_can($this->session->userdata('user_id'),$cid))
				{
					$data['cam_id'] = $cam_id;
				$cb = $this->candidate_model->get_cam('cam_basic',$cam_id);
					$data['cb'] = $cb;
					$cbrow = $cb->row_array();
					$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign - Ideas - Edit - '.$cbrow['cam_title']);
					$poste = $this->candidate_model->get_post('cam_ideas',$cid);
					$row = $poste->row_array();
					
					$data['pid'] = $cid;
					$data['idea_title'] = $row['idea_title'];
					$data['details'] = $row['details'];
					
					//Ckeditor's configuration
		$data['ckeditor'] = array(
			//ID of the textarea that will be replaced
			'id' 	=> 	'details',
			'path'	=>	'js/ckeditor',
			//Optionnal values
			'config' => array(
				'width' 	=> 	"80%",	//Setting a custom width
			),
			//Replacing styles from the "Styles tool"
			'styles' => array(
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)
			)
		);
		

				$datas['content'] = $this->load->view('cam_ideas_edit', $data, true);
				$this->load->view('main', $datas);
				}
				else
				{
					redirect('campaign/ideas');
				}
			}
			else
			{
				
				$can_id = $this->session->userdata('user_id');


					$cam_abt = array(
					'idea_title'=> $this->input->post('idea_title'),
					'details'=> $this->input->post('details'),
					
					);
					$this->common_model->manage_table('cam_ideas', $cam_abt, $this->input->post('pid'));

					redirect('campaign/ideas');
			}
			
		}
	}		
public function idea_view()
	{
		if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
		else
		{
			
			$cam_id = $this->session->userdata('cam_id');
			$cid = $this->uri->segment(3,0);
			$this->form_validation->set_rules('iid', 'iid', 'required');
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');	
			if($this->form_validation->run() == FALSE )
			{
				
				
					$data['cam_id'] = $cam_id;
				$cb = $this->candidate_model->get_cam('cam_basic',$cam_id);
					$data['cb'] = $cb;
					$cbrow = $cb->row_array();
					$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign - Ideas - View - '.$cbrow['cam_title']);
					$poste = $this->candidate_model->get_post('cam_ideas',$cid);
					$row = $poste->row_array();
					$data['iid'] = $cid;
					$data['idea_title'] = $row['idea_title'];
					$data['details'] = $row['details'];
					$data['add_date'] = $row['add_date'];

				$datas['content'] = $this->load->view('cam_idea_view_2', $data, true);
				$this->load->view('main', $datas);
				}
				else
				{
					$can_id = $this->session->userdata('user_id');
					$cam_id = $this->session->userdata('cam_id');
					$add_date = date('Y-m-d');
					
					$iid = $this->input->post('iid');
					if($this->candidate_model->is_idea_vote_by_can($this->session->userdata('user_id'),$iid))
					{
						if($this->input->post('vote') !=''){
							$cam_abt = array(
							'vote'=> $this->input->post('vote'),
							'user_id'=> $can_id,
							'cam_id'=> $cam_id,
							'idea_id'=> $iid,
							'add_date'=> $add_date,
							);
							$this->common_model->manage_table('cam_ideas_vote', $cam_abt);
						}
					}
					if($this->input->post('comments') !=''){
							$cam_abt = array(
							'comments'=> $this->input->post('comments'),
							'user_id'=> $can_id,
							'cam_id'=> $cam_id,
							'idea_id'=> $iid,
							'add_date'=> $add_date,
							);
							$this->common_model->manage_table('cam_ideas_comments', $cam_abt);
						}
					redirect('campaign/idea_view/'.$iid);
				}
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
				
				$this->form_validation->set_rules('vote', 'Vote', 'required');
				$this->form_validation->set_rules('comments', 'comments', 'required');
				$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');
				if($this->form_validation->run() == FALSE )
				{
					
					$cam_id = $this->session->userdata('cam_id');
					$data['cam_id'] = $cam_id;
					$cb = $this->candidate_model->get_cam('cam_basic',$cam_id);
					$data['cb'] = $cb;
					$cbrow = $cb->row_array();
					$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign - Supporters - '.$cbrow['cam_title']);
					$data['isadmin'] = $this->session->userdata('role_id');
					$data['activeuser'] = $this->user_model->get_info($user_id);
					$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
					$data['supporters'] = $this->candidate_model->get_cam_sup_all('cam_supporters',$cam_id);		
					$datas['content'] = $this->load->view('cam_supporters_2', $data, true);
					$this->load->view('maincam', $datas);
				}
				else
				{
					
					$can_id = $this->session->userdata('user_id');
					$cam_id = $this->session->userdata('cam_id');
					$add_date = date('Y-m-d');
	
					if($this->candidate_model->is_cam_vote_by_can($this->session->userdata('user_id'),$cam_id))
					{
						$cam_abt = array(
						'vote'=> $this->input->post('vote'),
						'comments'=> $this->input->post('comments'),
						'cam_id'=> $cam_id,
						'user_id'=> $can_id,
						'add_date'=> $add_date,
						);
						$this->common_model->manage_table('cam_supporters', $cam_abt);
					}
						redirect('campaign/supporters');
				}
			}
		}
		
		
		public function support_if()
		{
			$user_id = $this->session->userdata('user_id');
		
					
			if(!$this->session->userdata('cam_id'))
			{
				redirect('candidate/index');
			}
			else
			{
				
					
					$cam_id = $this->session->userdata('cam_id');
					$data['cam_id'] = $cam_id;
					$cb = $this->candidate_model->get_cam('cam_basic',$cam_id);
					$data['cb'] = $cb;
					$cbrow = $cb->row_array();
					$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign - Support if... - '.$cbrow['cam_title']);
					$data['isadmin'] = $this->session->userdata('role_id');
					$data['activeuser'] = $this->user_model->get_info($user_id);
					$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
					$data['supporters'] = $this->candidate_model->get_cam_not_sup('cam_supporters',$cam_id);		
					$datas['content'] = $this->load->view('cam_support_if_2', $data, true);
					$this->load->view('maincam', $datas);
				
			}
		}
		
		
		public function add_support()
		{
			$user_id = $this->session->userdata('user_id');
		
					
			if(!$this->session->userdata('cam_id'))
			{
				redirect('candidate/index');
			}
			else
			{
				
				$this->form_validation->set_rules('vote', 'Vote', 'required');
				$this->form_validation->set_rules('comments', 'comments', 'required');
				$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');
				if($this->form_validation->run() == FALSE )
				{
					
					$cam_id = $this->session->userdata('cam_id');
					$cb = $this->candidate_model->get_cam('cam_basic',$cam_id);
					$data['cb'] = $cb;
					$cbrow = $cb->row_array();
					$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign - Supporters - '.$cbrow['cam_title']);
					$data['cam_id'] = $cam_id;
					$data['isadmin'] = $this->session->userdata('role_id');
					$data['activeuser'] = $this->user_model->get_info($user_id);
					$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
					$data['supporters'] = $this->candidate_model->get_cam_sup('cam_supporters',$cam_id);		
					$datas['content'] = $this->load->view('cam_add_supporters', $data, true);
					$this->load->view('maincam', $datas);
				}
				else
				{
					
					$can_id = $this->session->userdata('user_id');
					$cam_id = $this->session->userdata('cam_id');
					$add_date = date('Y-m-d');
	
					if($this->candidate_model->is_cam_vote_by_can($this->session->userdata('user_id'),$cam_id))
					{
						$cam_abt = array(
						'vote'=> $this->input->post('vote'),
						'comments'=> $this->input->post('comments'),
						'cam_id'=> $cam_id,
						'user_id'=> $can_id,
						'add_date'=> $add_date,
						);
						$this->common_model->manage_table('cam_supporters', $cam_abt);
					}
						redirect('campaign/supporters');
				}
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
				
				$this->form_validation->set_rules('comments', 'comments', 'required');
				$cid = $this->uri->segment(3,0);
				if($cid == 0)
				{
					$s = "desc";
				}
				else
				{
					$s = "asc";	
				}
				$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');
				if($this->form_validation->run() == FALSE )
				{
					
					$cam_id = $this->session->userdata('cam_id');
					$data['cam_id'] = $cam_id;
					$cb = $this->candidate_model->get_cam('cam_basic',$cam_id);
					$data['cb'] = $cb;
					$cbrow = $cb->row_array();
					$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign - Feedback - '.$cbrow['cam_title']);
					$data['isadmin'] = $this->session->userdata('role_id');
					$data['activeuser'] = $this->user_model->get_info($user_id);
					$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
					$data['fb'] = $this->candidate_model->get_cam_feed('cam_feedback',$cam_id,$s);		
					$datas['content'] = $this->load->view('cam_feedback_2', $data, true);
					$this->load->view('maincam', $datas);
				}
				else
			{
				
				$can_id = $this->session->userdata('user_id');
				$cam_id = $this->session->userdata('cam_id');
				$add_date = date('Y-m-d');

					
					$cam_abt = array(
					'comments'=> formatTextToHTML($this->input->post('comments')),
					'cam_id'=> $cam_id,
					'user_id'=> $can_id,
					'add_date'=> $add_date,
					);
					$this->common_model->manage_table('cam_feedback', $cam_abt);

					redirect('campaign/feedback');
			}
			}
	}
	
	function visitor_country()
	{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

    if($ip_data && $ip_data->geoplugin_countryName != null)
    {
        $result = $ip_data->geoplugin_countryName;
    }

    return $result;
}


public function plan_attend_event()
		{
			$user_id = $this->session->userdata('user_id');
			$add_date = date('Y-m-d');
						$eid = $this->uri->segment(3,0);
						$cam_id = $this->uri->segment(4,0);
		
			if($this->session->userdata('user_id')>0)
			{		
				
				if(!$this->session->userdata('cam_id'))
				{
					redirect('candidate/index');
				}
				else
				{
					
						if($this->candidate_model->is_planed_by_can($this->session->userdata('user_id'),$eid))
						{
							$cam_abt = array(
							'event_id'=> $eid,
							'cam_id'=> $cam_id,
							'user_id'=> $user_id,
							
							);
							$this->common_model->manage_table('cam_events_plan_attend', $cam_abt);
						}
							redirect('campaign/main/'.$cam_id);
	
				}
			}
			else
			{
				redirect('campaign/main/'.$cam_id);
			}
		}

}	
?>