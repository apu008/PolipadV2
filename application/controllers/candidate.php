<?php

class Candidate extends Controller
{
	
	function Candidate()
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
	
	public function index()
	{		
		$username = $this->session->userdata('username');
		$role_id = $this->session->userdata('role_id');
		if($username == '')
		{
			redirect('welcome/index');
		}
		else
		{
			if($role_id == 2)
			{ 
				
				
				
				$this->session->set_userdata('pageTitle', 'Polipad :: My Page');
				$reg = $this->candidate_model->get_can_home_setting($this->session->userdata('user_id'));
				$drcam = $this->candidate_model->get_can_draft_cam($this->session->userdata('user_id'));
				$pvcam = $this->candidate_model->get_can_private_cam($this->session->userdata('user_id'));
				$scam = $this->candidate_model->get_can_submit_cam($this->session->userdata('user_id'));
				$pcam = $this->candidate_model->get_can_published_cam($this->session->userdata('user_id'));
				$rcam = $this->candidate_model->get_can_rejected($this->session->userdata('user_id'));
				$dcam = $this->candidate_model->get_can_discuss($this->session->userdata('user_id'));
				$ocam = $this->candidate_model->get_can_published_cam_others($this->session->userdata('user_id'));
				$data['reg'] = $reg;
				$data['drcam'] = $drcam;
				$data['scam'] = $scam;
				$data['pcam'] = $pcam;
				$data['ocam'] = $ocam;
				$data['rcam'] = $rcam;
				$data['dcam'] = $dcam;
				$data['pvcam'] = $pvcam;
				$datas['content'] = $this->load->view('candidate_mypage', $data, true);
				$this->load->view('main', $datas);
				
				
				
			
			}
			else
			{
				redirect('polipads');
			}
			
		}
	}
	
	function url_check($url)
	{
		if (!$this->candidate_model->check_url($url))
		{
			$this->form_validation->set_message('url_check', '%s already exist');
			return false;
		}
		else
		{
			return true;
		}
	}
	public function basics()
	{
		
		
		
		$username = $this->session->userdata('username');
		$role_id = $this->session->userdata('role_id');
		if($username == '')
		{
			redirect('candidate/index');
		}
		else
		{
			$this->form_validation->set_rules('upimage', 'Image', 'callback_picUpload1');
			$this->form_validation->set_rules('cam_from', 'From', 'required');
			$this->form_validation->set_rules('upimage1', 'Image', 'callback_picUpload');
			$this->form_validation->set_rules('cam_title', 'Campaign Title', 'required');
			
			
			$this->form_validation->set_rules('type_of_cam', 'Type of Campaign', 'required');
					
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');		
			$cid = $this->uri->segment(3,0);
			
				if($cid >0)
				{
					$this->form_validation->set_rules('cam_url', 'Campaign URL', 'trim|required');
				}
				else
				{
					$this->form_validation->set_rules('cam_url', 'Campaign URL', 'trim|required|callback_url_check');
				}
			
			
			$camefrom = $this->uri->segment(4,0);
			
			if($this->form_validation->run() == FALSE )
			{
				$this->session->set_userdata('pageTitle', 'Polipad :: Start New Campaign:- Basics');
				$reg = $this->candidate_model->get_can_home_setting($this->session->userdata('user_id'));
				$data['reg'] = $reg;
				$data['cid'] = $cid;
				$data['camefrom'] = $camefrom;
				if($cid >0)
				{
					if($this->candidate_model->is_cam_this_can($this->session->userdata('user_id'),$cid))
					{
						$this->session->set_userdata('cam_id', $cid);
						$cam = $this->candidate_model->get_cam('cam_about_you',$cid);
						$camb = $this->candidate_model->get_cam('cam_basic',$cid);
						$row = $cam->row_array();
						
						$data['cam_from'] = $row['cam_from'];
						
						
						$data['ppic'] = $row['profile_pic'];
						$data['iid'] = $row['id'];
						$cam = $this->candidate_model->get_cam('cam_basic',$cid);
				
						if($camb->num_rows() > 0)
						{
							$rowb = $camb->row_array();
							$data['cam_url'] = str_replace(' ','',$rowb['cam_url']);
							$data['cam_title'] = $rowb['cam_title'];
							$data['type_of_cam'] = $rowb['type_of_cam'];
							$data['cam_pic'] = $rowb['cam_pic'];
							
						}
						else
						{
							$data['cam_title'] = '';	
							$data['cam_url'] = '';	
							$data['type_of_cam'] = '';	
							$data['cam_pic'] = '';
							
						}
					}
					else
					{
						redirect('candidate/index');
					}
				}
				else
				{
					$this->session->unset_userdata('cam_id');
					$qq = $this->db->query('select * from cam_about_you where can_id = '.$this->session->userdata('user_id').' order by id DESC limit 1');
					$data['qq'] = $qq;
					if($qq->num_rows() > 0)
					{
						$row = $qq->row_array();
						$data['cam_from'] = $row['cam_from'];
						
						$data['ppic'] = $row['profile_pic'];
						$data['cam_url'] = str_replace(' ','',$this->input->post('cam_url'));
						$data['cam_title'] = $this->input->post('cam_title');
						$data['type_of_cam'] = '';	
						$data['cam_pic'] = '';
					}
					else
					{
						$data['cam_from'] = $this->input->post('cam_from');
						
						$data['ppic'] = '';	
						$data['cam_title'] = $this->input->post('cam_title');
						$data['cam_url'] = str_replace(' ','',$this->input->post('cam_url'));
						$data['type_of_cam'] = $this->input->post('type_of_cam');
						$data['cam_pic'] = '';
						
					}
				}
				
					
				
				
				$datas['content'] = $this->load->view('candidate_basic', $data, true);
				$this->load->view('main', $datas);
			}
			else
			{
				
				$scam = $this->session->userdata('cam_id');
				$menushow=0;
				if($scam >0)
				{
						
						$cam_abt = array(
						'cam_from'=> $this->input->post('cam_from'),
						
					);
					$c_id = $this->common_model->manage_table('cam_about_you', $cam_abt, $this->input->post('iid'));
					
					
					$add_date = date('Y-m-d');
					
					$lastup = array(
						
						'last_update'=>$add_date,
						
					);
					$lup = $this->common_model->manage_table('campaign', $lastup, $scam);
					
					
					
					if(!isset($_FILES['userfile']) || $_FILES['userfile']['error'] == 4)
					{
						
			
					}
					else{
							
							$cam = $this->candidate_model->get_cam('cam_about_you',$scam);
							$row = $cam->row_array();
							$dimage = $row['profile_pic'];
							//unlink('./cam_pics/'.$dimage);
							$pp = array(
								'profile_pic'=> $this->session->userdata('album_image'),
							);
							
							
							$pp_id = $this->common_model->manage_table('cam_about_you', $pp, $this->input->post('iid'));
					}
					$menushow=0;
				}
				else
				{
					$can_id = $this->session->userdata('user_id');
					$add_date = date('Y-m-d');
					
					$cam = array(
						'can_id'=> $can_id,
						'cam_start_date'=> $add_date,
						'launched_on'=>$add_date,
						'last_update'=>$add_date,
						
					);
					$cam_id = $this->common_model->manage_table('campaign', $cam);
					
					$cam_abt = array(
						'can_id'=> $can_id,
						'cam_id'=> $cam_id,
						'cam_from'=> $this->input->post('cam_from'),
						
					);
					$c_id = $this->common_model->manage_table('cam_about_you', $cam_abt);
					$menushow=1;
					if(!isset($_FILES['userfile']) || $_FILES['userfile']['error'] == 4)
					{
						$pp = array(
								'profile_pic'=> $this->input->post('ppic'),
							);
							
							
							$pic_id = $this->common_model->manage_table('cam_about_you', $pp, $c_id);
			
					}
					else{
							$pp = array(
								'profile_pic'=> $this->session->userdata('album_image'),
							);
							
							$pp_id = $this->common_model->manage_table('cam_about_you', $pp, $c_id);
					}
						$this->session->set_userdata('cam_id', $cam_id);
				}
				
				
				if($scam > 0)
				{
					$camb = $this->candidate_model->get_cam('cam_basic',$scam);
					$rowb = $camb->row_array();
					$bid = $rowb['id'];
					$cam_abt = array(
					'cam_title'=> $this->input->post('cam_title'),
					'cam_url'=> str_replace(' ','',$this->input->post('cam_url')),
					'type_of_cam'=> $this->input->post('type_of_cam'),
					

					);
					$this->common_model->manage_table('cam_basic', $cam_abt, $bid);
					//$c_id = $bid;
				}
				else
				{
					$cam_abt = array(
					'can_id'=> $can_id,
					'cam_id'=> $cam_id,
					'cam_title'=> $this->input->post('cam_title'),
					'cam_url'=> str_replace(' ','',$this->input->post('cam_url')),
					'type_of_cam'=> $this->input->post('type_of_cam'),
					
					);
					$bid = $this->common_model->manage_table('cam_basic', $cam_abt);
					
					$cam_abt = array(
						'can_id'=> $can_id,
						'cam_id'=> $cam_id,
						'call_to_action'=> '',
						
					);
					$c_id = $this->common_model->manage_table('cam_call_to_action', $cam_abt);
					
					$cam_abt = array(
						'can_id'=> $can_id,
						'cam_id'=> $cam_id,
						'why_you'=> '',
						
					);
					$c_id = $this->common_model->manage_table('cam_why_you', $cam_abt);
					
					$cam_abt = array(
						'can_id'=> $can_id,
						'cam_id'=> $cam_id,
						'justify'=> '',
						
					);
					$c_id = $this->common_model->manage_table('cam_justify', $cam_abt);
					
					
				}
				
				if(!isset($_FILES['userfile1']) || $_FILES['userfile1']['error'] == 4)
				{
					
		
				}
				else{
						$pp = array(
							
							'cam_pic'=> $this->session->userdata('album_image1'),
							
						);
						
						
						$pp_id = $this->common_model->manage_table('cam_basic', $pp, $bid);
				}
				
				
				
					redirect('candidate/core/'.$menushow);
				
			}
		}
		
	}
	function picUpload1($str)
	{
		if(!isset($_FILES['userfile']) || $_FILES['userfile']['error'] == 4)
		{
			//$this->form_validation->set_message('picUpload', 'Please, upload an image.');
			//return false;
			$this->session->unset_userdata('album_image');

		}
		else{
		//to get the image size
		$uploadedfile = $_FILES['userfile']['tmp_name'];
		
		
		//upload configuration		
		$config['upload_path'] = './cam_pics/';
		$config['allowed_types'] = 'gif|jpeg|jpg|png|bmp'; 
		$config['encrypt_name'] = 'FALSE';
		$config['max_size'] = 0;
		
		$this->load->library('upload', $config);
$this->load->library('image_lib');
		
			if($this->upload->do_upload())
			{
	
				$data1 = array('userfile' => $this->upload->data());
				$image= $data1['userfile']['file_name'];
				
				
				list($width,$height)=getimagesize($uploadedfile);
				$thSize = '480';
					if ($width >= $height) 
					{
						$thmodheight = $thSize;
						$thmodwidth = (int)(($thmodheight*$width) / $height );
					}
					else 
					{
						$thmodwidth = $thSize;
						$thmodheight = (int)(($thmodwidth*$height) / $width );
					} 
					
					
					
				
				$configBig = array();
				$configBig['image_library'] = 'gd2';
				$configBig['source_image'] = './cam_pics/'.$image;
				$configBig['create_thumb'] = TRUE;
				$configBig['maintain_ratio'] = FALSE;
				
				$configBig['width'] = $thmodwidth;
				$configBig['height'] = $thmodheight;
				$configBig['thumb_marker'] =  "_".$this->session->userdata('username')."_";
				$this->image_lib->initialize($configBig);
				$this->image_lib->resize();
				$this->image_lib->clear();
				unset($configBig);

				
				$filename1 = $data1['userfile']['raw_name'].'_'.$this->session->userdata('username').'_'.$data1['userfile']['file_ext'];

				
				unlink('./cam_pics/'.$image);
				$this->session->unset_userdata('album_image');
				$this->session->set_userdata('album_image', $filename1);

			}
	
			else
			{

			$this->form_validation->set_message('imageUpload', $this->upload->display_errors());

			return false;

		}
		}
	}
	function picUpload($str)
	{
		if(!isset($_FILES['userfile1']) || $_FILES['userfile1']['error'] == 4)
		{
			//$this->form_validation->set_message('picUpload', 'Please, upload an image.');
			//return false;
			$this->session->unset_userdata('album_image1');

		}
		else{
		//to get the image size
		$uploadedfile = $_FILES['userfile1']['tmp_name'];
		
		
		//upload configuration		
		$config['upload_path'] = './cam_pics/';
		$config['allowed_types'] = 'gif|jpeg|jpg|png|bmp'; 
		$config['encrypt_name'] = 'FALSE';
		$config['max_size'] = 0;
		
		$this->load->library('upload', $config);
$this->load->library('image_lib');
		
			if($this->upload->do_upload('userfile1'))
			{
	
				$data1 = array('userfile' => $this->upload->data());
				$image= $data1['userfile']['file_name'];
				
				
				list($width,$height)=getimagesize($uploadedfile);
				$thSize = '640';
					if ($width >= $height) 
					{
						$thmodwidth = $thSize;
						$thmodheight = (int)(($thmodwidth*$height) / $width );
					} 
					else 
					{
						$thmodheight = $thSize;
						$thmodwidth = (int)(($thmodheight*$width) / $height );
					}
					
					
				
				$configBig = array();
				$configBig['image_library'] = 'gd2';
				$configBig['source_image'] = './cam_pics/'.$image;
				$configBig['create_thumb'] = TRUE;
				$configBig['maintain_ratio'] = FALSE;
				
				$configBig['width'] = $thmodwidth;
				$configBig['height'] = $thmodheight;
				$configBig['thumb_marker'] =  "_".$this->session->userdata('username')."_";
				$this->image_lib->initialize($configBig);
				$this->image_lib->resize();
				$this->image_lib->clear();
				unset($configBig);

				
				$filename1 = $data1['userfile']['raw_name'].'_'.$this->session->userdata('username').'_'.$data1['userfile']['file_ext'];

				
				unlink('./cam_pics/'.$image);
				$this->session->unset_userdata('album_image1');
				$this->session->set_userdata('album_image1', $filename1);

			}
	
			else
			{

			$this->form_validation->set_message('imageUpload', $this->upload->display_errors());

			return false;

		}
		}
	}
	
	public function core()
	{
		if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
		else
		{
			
			$this->form_validation->set_rules('camid', 'Campaign id', 'required');
			$camefrom = $this->uri->segment(3,0);
			$data['camefrom'] = $camefrom;		
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');	
			$cam_id = $this->session->userdata('cam_id');
			
			if($this->form_validation->run() == FALSE )
			{
				$this->session->set_userdata('pageTitle', 'Polipad :: Start New Campaign:- Core Campaign');
				
				$data['cam_id'] = $cam_id;
				
				$cam = $this->candidate_model->get_cam('cam_basic',$cam_id);
				$ccta = $this->candidate_model->get_cam('cam_call_to_action',$cam_id);
				$cwy = $this->candidate_model->get_cam('cam_why_you',$cam_id);
				$cj = $this->candidate_model->get_cam('cam_justify',$cam_id);
				$cwyrow = $cwy->row_array();
				$cctarow = $ccta->row_array();
				$cjrow = $cj->row_array();
				$row = $cam->row_array();
				
					
					
					$data['cam_title'] = $row['cam_title'];
					$data['cam_goal'] = $row['cam_goal'];
					$data['cgid'] = $row['id'];
					if($cj->num_rows() > 0)
					{
					$data['justify'] = $cjrow['justify'];
					$data['jid'] = $cjrow['id'];
					}
					else
					{
						$data['justify'] = '';
						$data['jid'] = '';
					}
					if($cwy->num_rows() > 0)
					{
					$data['why_you'] = $cwyrow['why_you'];
					$data['wid'] = $cwyrow['id'];
					}
					else
					{
						$data['why_you'] = '';
						$data['wid'] = '';
					}
					if($ccta->num_rows() > 0)
					{
					$data['call_to_action'] = $cctarow['call_to_action'];
					$data['aid'] = $cctarow['id'];
					}
					else
					{
						$data['call_to_action'] = '';
						$data['aid'] = '';
					}
				
				$datas['content'] = $this->load->view('candidate_core', $data, true);
				$this->load->view('main', $datas);
			}
			else
			{
				
				$can_id = $this->session->userdata('user_id');
				$cam_id = $this->session->userdata('cam_id');
				$add_date = date('Y-m-d');
				
				
					
					$cam_abt = array(
					'cam_goal'=> formatTextToHTML($this->input->post('cam_goal')),
					);
					$this->common_model->manage_table('cam_basic', $cam_abt, $this->input->post('cgid'));
					
					$cam_abt = array(
					'justify'=> formatTextToHTML($this->input->post('justify')),
					);
					$this->common_model->manage_table('cam_justify', $cam_abt, $this->input->post('jid'));
					
					$cam_abt = array(
					'why_you'=> formatTextToHTML($this->input->post('why_you')),
					);
					$this->common_model->manage_table('cam_why_you', $cam_abt, $this->input->post('wid'));
					
					$cam_abt = array(
					'call_to_action'=> formatTextToHTML($this->input->post('call_to_action')),
					);
					$this->common_model->manage_table('cam_call_to_action', $cam_abt, $this->input->post('aid'));
					
					
					$add_date = date('Y-m-d');
					
					$lastup = array(
						
						'last_update'=>$add_date,
						
					);
					$lup = $this->common_model->manage_table('campaign', $lastup, $cam_id);
					
				$cams = $this->candidate_model->get_cam('campaign',$cam_id);
				$rows = $cams->row_array();	
				
				if($this->input->post('save2'))
				{
					redirect('campaign_edit/updates');
				}
				else{
				if($rows['status'] == '2')
				{
					redirect('campaign_edit/updates');
				}
				else
				{
					redirect('candidate/preview');
				}
				}
			}
			
		}
	}
	
	public function pitchWizard()
	{
		if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
		else
		{
			
			$this->form_validation->set_rules('pastpresent', 'Past & present', 'required');
			//$camefrom = $this->uri->segment(3,0);
			//$data['camefrom'] = $camefrom;		
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');	
			$cam_id = $this->session->userdata('cam_id');
			
			if($this->form_validation->run() == FALSE )
			{
				$this->session->set_userdata('pageTitle', 'Polipad :: Start New Campaign:- Pitch Wizard');
				
				$data['cam_id'] = $cam_id;
				$cj = $this->candidate_model->get_cam('cam_justify',$cam_id);
				
				$cjrow = $cj->row_array();
				
					$data['jid'] = $cjrow['id'];
					
				
				$data['pastpresent'] = $this->input->post('pastpresent');
				$data['yourvision'] = $this->input->post('yourvision');
				$data['benefits'] = $this->input->post('benefits');
				$data['future'] = $this->input->post('future');
				
				
				$datas['content'] = $this->load->view('candidate_pitch', $data, true);
				$this->load->view('main', $datas);
			}
			else
			{
				
				$can_id = $this->session->userdata('user_id');
				$cam_id = $this->session->userdata('cam_id');
				$add_date = date('Y-m-d');
				
					
					$pastpresent = formatTextToHTML($this->input->post('pastpresent'));
					$yourvision = formatTextToHTML($this->input->post('yourvision'));
					$benefits = formatTextToHTML($this->input->post('benefits'));
					$future = formatTextToHTML($this->input->post('future'));
					
					$justify = $pastpresent;
					
					if($yourvision !='')
					{
						$justify = $justify.'<br>'.$yourvision;
					}
					if($benefits !='')
					{
						$justify = $justify.'<br>'.$benefits;
					}
					if($future !='')
					{
						$justify = $justify.'<br>'.$future;
					}
					
					
					
					//aita
					$cam_abt = array(
					'justify'=> $justify,
					);
					$this->common_model->manage_table('cam_justify', $cam_abt, $this->input->post('jid'));
					
					
					
					
					$add_date = date('Y-m-d');
					
					$lastup = array(
						
						'last_update'=>$add_date,
						
					);
					$lup = $this->common_model->manage_table('campaign', $lastup, $cam_id);
					
			redirect('candidate/core');
			}
			
		}
	}
	
	public function preview()
	{
			$user_id = $this->session->userdata('user_id');
		
			$cid = $this->uri->segment(3,0);
			if($cid >0){
				$this->session->set_userdata('cam_id', $cid);
				
			}
			else
			{
				
				$this->session->set_userdata('cam_id', $this->session->userdata('cam_id'));
			}
			
			$this->session->set_userdata('pageTitle', 'Polipad :: Preview and Submit');
			$cam_id = $this->session->userdata('cam_id');
			$data['cam_id'] = $cam_id;
			$data['isadmin'] = $this->session->userdata('role_id');
			$data['userinfo'] = $this->user_model->get_info($user_id);
			$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
			$data['ccta'] = $this->candidate_model->get_cam('cam_call_to_action',$cam_id);
			$data['cwy'] = $this->candidate_model->get_cam('cam_why_you',$cam_id);
			$data['cj'] = $this->candidate_model->get_cam('cam_justify',$cam_id);
			$data['cb'] = $this->candidate_model->get_cam('cam_basic',$cam_id);
			$data['cay'] = $this->candidate_model->get_cam('cam_about_you',$cam_id);
			$data['events'] = $this->candidate_model->get_cam('cam_events',$cam_id);
			
			$datas['content'] = $this->load->view('candidate_preview', $data, true);
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
				
			$cam_id = $this->session->userdata('cam_id');
			$data['cam_id'] = $cam_id;
			$cb = $this->candidate_model->get_cam('cam_basic',$cam_id);
			$data['cb'] = $cb;
			$cbrow = $cb->row_array();
			if($cb->num_rows() > 0)
						{
			$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign - Update - '.$cbrow['cam_title']);
						}
			//$data['isadmin'] = $this->session->userdata('role_id');
			//$data['activeuser'] = $this->user_model->get_info($user_id);
			$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
			//the update data here
			$uplist = $this->candidate_model->get_cam('cam_updates',$cam_id, 10);
			$data['uplist'] = $uplist;
			
			$datas['content'] = $this->load->view('can_update', $data, true);
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
					if($cb->num_rows() > 0)
						{
			$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign - Ideas - '.$cbrow['cam_title']);
						}
					
					$data['isadmin'] = $this->session->userdata('role_id');
					$data['activeuser'] = $this->user_model->get_info($user_id);
					$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
					$data['ideas'] = $this->candidate_model->get_cam('cam_ideas',$cam_id);	
					
					
					
					
						
					$datas['content'] = $this->load->view('can_ideas', $data, true);
					$this->load->view('maincam', $datas);
				}
				else
			{
				
				$can_id = $this->session->userdata('user_id');
				$cam_id = $this->session->userdata('cam_id');
				$add_date = date('Y-m-d');

					
					$cam_abt = array(
					'idea_title'=> $this->input->post('idea_title'),
					'details'=> formatTextToHTML($this->input->post('details')),
					'cam_id'=> $cam_id,
					'user_id'=> $can_id,
					'add_date'=> $add_date,
					);
					$this->common_model->manage_table('cam_ideas', $cam_abt);
						
					redirect('candidate/ideas');
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
					if($cb->num_rows() > 0)
						{
			$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign - Supporters - '.$cbrow['cam_title']);
						}
					
					$data['isadmin'] = $this->session->userdata('role_id');
					$data['activeuser'] = $this->user_model->get_info($user_id);
					$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
					$data['supporters'] = $this->candidate_model->get_cam_sup('cam_supporters',$cam_id);		
					$datas['content'] = $this->load->view('can_supporters', $data, true);
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
						redirect('candidate/supporters');
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
					if($cb->num_rows() > 0)
						{
			$this->session->set_userdata('pageTitle', 'Polipad :: View Campaign - Feedback - '.$cbrow['cam_title']);
						}
					
					$data['isadmin'] = $this->session->userdata('role_id');
					$data['activeuser'] = $this->user_model->get_info($user_id);
					$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
					$data['fb'] = $this->candidate_model->get_cam_feed('cam_feedback',$cam_id,$s);		
					$datas['content'] = $this->load->view('can_feedback', $data, true);
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

					redirect('candidate/feedback');
			}
			}
	}
	
	
	
	
	
	
	
	public function previewShare()
	{
			$user_id = $this->session->userdata('user_id');
			
			$cid = $this->uri->segment(3,0);
			if($cid >0){
				$this->session->set_userdata('cam_id', $cid);
				
			}
			else
			{
				
				$this->session->set_userdata('cam_id', $this->session->userdata('cam_id'));
			}
			$this->form_validation->set_rules('shareemails', 'Email', 'trim|required');
			$this->form_validation->set_rules('share_com', 'Message', 'trim|required');
			
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');
			
			$this->session->set_userdata('pageTitle', 'Polipad :: Preview and Share');
			$cam_id = $this->session->userdata('cam_id');
			if($this->form_validation->run() == FALSE )
			{
			$data['cam_id'] = $cam_id;
			$data['isadmin'] = $this->session->userdata('role_id');
			$data['userinfo'] = $this->user_model->get_info($user_id);
			$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
			$data['ccta'] = $this->candidate_model->get_cam('cam_call_to_action',$cam_id);
			$data['cwy'] = $this->candidate_model->get_cam('cam_why_you',$cam_id);
			$data['cj'] = $this->candidate_model->get_cam('cam_justify',$cam_id);
			$data['cb'] = $this->candidate_model->get_cam('cam_basic',$cam_id);
			$data['cay'] = $this->candidate_model->get_cam('cam_about_you',$cam_id);
			$data['events'] = $this->candidate_model->get_cam('cam_events',$cam_id);
			
			$data['shareemails'] = $this->input->post('shareemails');
			$data['share_com'] = $this->input->post('share_com');
			
			//Ckeditor's configuration
		$data['ckeditor'] = array(
			//ID of the textarea that will be replaced
			'id' 	=> 	'share_com',
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
			$datas['content'] = $this->load->view('candidate_preview_share', $data, true);
			$this->load->view('main', $datas);
			}
			else
			{
				$emails = trim($this->input->post('shareemails'));
				$sptemail = explode(',',$emails);
				$add_date = date('Y-m-d');
				$uemail = trim($this->session->userdata('username'));
				for($i=0; $i<count($sptemail); $i++)
				{
					$ee = trim($sptemail[$i]);
						
						$sha = array(
						'email'=> trim($sptemail[$i]),
						'cam_id'=> $this->session->userdata('cam_id'),
						'shared_date'=> $add_date,
						);
						$this->common_model->manage_table('cam_share', $sha);
						
						// send email
						$this->email->initialize($this->config->item('email_config'));
						
						
						
						$to = $ee;

						$mail_subject = 'Shared Campaign';
						
						$msg = $this->input->post('share_com');
						
						$msg .= "<p><hr /></p>";
						$msg .= "<p>This e-mail is sent from Polipad.</p>";
						$msg .= '<p>Polipad Team.</p>';
						$msg .= '<p>www.polipad.net</p>';
						
						$this->email->from($uemail);
						//$this->email->to('reaz.rahman@yahoo.com');
						$this->email->to($to);
						//$this->email->cc('shibly@proedge-asso.com');
						//$this->email->bcc('mahmudapu@yahoo.com');
						
						$this->email->subject($mail_subject);
						$this->email->message($msg);
						
						$this->email->send();
						 
						//mail($to,$mail_subject,$msg,$headers);
				}
						$ccm= array(
						'status'=> 3,
						);
						$this->common_model->manage_table('campaign', $ccm, $this->session->userdata('cam_id')); 
						redirect('candidate/previewafsh');
			}

	}
	public function previewafsh()
	{
			$user_id = $this->session->userdata('user_id');
		
			$cid = $this->uri->segment(3,0);
			if($cid >0){
				$this->session->set_userdata('cam_id', $cid);
				
			}
			else
			{
				
				$this->session->set_userdata('cam_id', $this->session->userdata('cam_id'));
			}
			
			$this->session->set_userdata('pageTitle', 'Polipad :: Preview and Submit');
			$cam_id = $this->session->userdata('cam_id');
			$data['cam_id'] = $cam_id;
			$data['isadmin'] = $this->session->userdata('role_id');
			$data['userinfo'] = $this->user_model->get_info($user_id);
			$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
			$data['ccta'] = $this->candidate_model->get_cam('cam_call_to_action',$cam_id);
			$data['cwy'] = $this->candidate_model->get_cam('cam_why_you',$cam_id);
			$data['cj'] = $this->candidate_model->get_cam('cam_justify',$cam_id);
			$data['cb'] = $this->candidate_model->get_cam('cam_basic',$cam_id);
			$data['cay'] = $this->candidate_model->get_cam('cam_about_you',$cam_id);
			$data['events'] = $this->candidate_model->get_cam('cam_events',$cam_id);
			
			$datas['content'] = $this->load->view('candidate_preview_after_share', $data, true);
			$this->load->view('main', $datas);

	}
	public function camsubmitconfirm()
	{
			$user_id = $this->session->userdata('user_id');
		
			$cid = $this->uri->segment(3,0);
			if($cid >0){
				$this->session->set_userdata('cam_id', $cid);
				
			}
			else
			{
				
				$this->session->set_userdata('cam_id', $this->session->userdata('cam_id'));
			}
			
			$this->session->set_userdata('pageTitle', 'Polipad :: Preview and Submit');
			$cam_id = $this->session->userdata('cam_id');
			$data['cam_id'] = $cam_id;
			$data['isadmin'] = $this->session->userdata('role_id');
			$data['userinfo'] = $this->user_model->get_info($user_id);
			$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
			$data['ccta'] = $this->candidate_model->get_cam('cam_call_to_action',$cam_id);
			$data['cwy'] = $this->candidate_model->get_cam('cam_why_you',$cam_id);
			$data['cj'] = $this->candidate_model->get_cam('cam_justify',$cam_id);
			$data['cb'] = $this->candidate_model->get_cam('cam_basic',$cam_id);
			$data['cay'] = $this->candidate_model->get_cam('cam_about_you',$cam_id);
			$data['events'] = $this->candidate_model->get_cam('cam_events',$cam_id);
			
			$datas['content'] = $this->load->view('candidate_preview_submit_confirm', $data, true);
			$this->load->view('main', $datas);

	}
	
	public function camsubmit()
	{
		$user_id = $this->session->userdata('user_id');
		if(!$this->session->userdata('cam_id'))
		{
			$cid = $this->uri->segment(3,0);
			if($cid >0){
				$this->session->set_userdata('cam_id', $cid);
				redirect('candidate/preview');
			}
			else
			{
				redirect('candidate/index');
			}
		}
		else
		{
			
			$cam_id = $this->session->userdata('cam_id');
			if($this->candidate_model->is_cam_this_can($this->session->userdata('user_id'),$cam_id))
			{
			
				$cam = $this->candidate_model->get_cam('cam_basic',$cam_id);
				if($cam->num_rows() ==  0)
				{
					$cam_abt = array(
					'can_id'=> $this->session->userdata('user_id'),
					'cam_id'=> $cam_id,
					'cam_title'=> '',
					'type_of_cam'=> '',
					'cam_goal'=> '',
					'cam_video'=> '',
					);
					$c_id = $this->common_model->manage_table('cam_basic', $cam_abt);
				}
				
				$cam = $this->candidate_model->get_cam('cam_justify',$cam_id);
				
				if($cam->num_rows() ==  0)
				{

				$cam_abt = array(
						'can_id'=> $this->session->userdata('user_id'),
						'cam_id'=> $cam_id,
						'justify'=> '',
						
					);
					$c_id = $this->common_model->manage_table('cam_justify', $cam_abt);
				}
$cam = $this->candidate_model->get_cam('cam_why_you',$cam_id);
				
				if($cam->num_rows() == 0)
				{
$cam_abt = array(
						'can_id'=> $this->session->userdata('user_id'),
						'cam_id'=> $cam_id,
						'why_you'=> '',
						
					);
					$c_id = $this->common_model->manage_table('cam_why_you', $cam_abt);
				}

$cam = $this->candidate_model->get_cam('cam_call_to_action',$cam_id);
				
				if($cam->num_rows() == 0)
				{
$cam_abt = array(
						'can_id'=> $this->session->userdata('user_id'),
						'cam_id'=> $cam_id,
						'call_to_action'=> '',
						
					);
					$c_id = $this->common_model->manage_table('cam_call_to_action', $cam_abt);
				}		
			
			
			$cam_st = array(
						'status'=>1,
					);
					$c_id = $this->common_model->manage_table('campaign', $cam_st, $cam_id);
					redirect('candidate/camsubmitafter');
					
		}
			
		}
	}
	
public function camsubmitafter()
	{
			$user_id = $this->session->userdata('user_id');
		
			$cid = $this->uri->segment(3,0);
			if($cid >0){
				$this->session->set_userdata('cam_id', $cid);
				
			}
			else
			{
				
				$this->session->set_userdata('cam_id', $this->session->userdata('cam_id'));
			}
			
			$this->session->set_userdata('pageTitle', 'Polipad :: Preview and Submit');
			$cam_id = $this->session->userdata('cam_id');
			$data['cam_id'] = $cam_id;
			$data['isadmin'] = $this->session->userdata('role_id');
			$data['userinfo'] = $this->user_model->get_info($user_id);
			$data['cam'] = $this->candidate_model->get_cam('campaign',$cam_id);
			$data['ccta'] = $this->candidate_model->get_cam('cam_call_to_action',$cam_id);
			$data['cwy'] = $this->candidate_model->get_cam('cam_why_you',$cam_id);
			$data['cj'] = $this->candidate_model->get_cam('cam_justify',$cam_id);
			$data['cb'] = $this->candidate_model->get_cam('cam_basic',$cam_id);
			$data['cay'] = $this->candidate_model->get_cam('cam_about_you',$cam_id);
			$data['events'] = $this->candidate_model->get_cam('cam_events',$cam_id);
			
			$datas['content'] = $this->load->view('candidate_preview_submit_after', $data, true);
			$this->load->view('main', $datas);

	}	
}	
?>