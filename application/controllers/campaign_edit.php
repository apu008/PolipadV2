<?php

class Campaign_edit extends Controller
{
	
	function Campaign_edit()
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
public function updates()
	{
		if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
		else
		{
			$this->form_validation->set_rules('post_title', 'Post Title', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			$this->form_validation->set_rules('upimage', 'Image', 'callback_picUpload1');
					
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');	
			$cam_id = $this->session->userdata('cam_id');
			
			if($this->form_validation->run() == FALSE )
			{
				
				
				$data['cam_id'] = $cam_id;
					$cam = $this->candidate_model->get_cam('cam_basic',$cam_id);
					$cbrow = $cam->row_array();
					$data['cam_title'] = $cbrow['cam_title'];
					$this->session->set_userdata('pageTitle', 'Polipad ::  Edit Campaign:- Updates and more - '.$cbrow['cam_title']);
				if($this->candidate_model->is_cam_this_can($this->session->userdata('user_id'),$cam_id))
				{
					$uplist = $this->candidate_model->get_cam('cam_updates',$cam_id, 10);
					$data['uplist'] = $uplist;
					$data['post_title'] = $this->input->post('post_title');
					$data['details'] = $this->input->post('details');
					$data['caption'] = $this->input->post('caption');
					
					
		

				$datas['content'] = $this->load->view('edit_updates', $data, true);
				$this->load->view('main', $datas);
				}
				else
				{
					redirect('candidate/index');
				}
			}
			else
			{
				
				$can_id = $this->session->userdata('user_id');
				$cam_id = $this->session->userdata('cam_id');
				$add_date = date('Y-m-d');

					
					$cam_abt = array(
					'post_title'=> $this->input->post('post_title'),
					'details'=> formatTextToHTML($this->input->post('details')),
					'cam_id'=> $cam_id,
					'add_date'=> $add_date,
					);
					$ncid = $this->common_model->manage_table('cam_updates', $cam_abt);
					
					if(!isset($_FILES['userfile1']) || $_FILES['userfile1']['error'] == 4)
					{
						
						$pp = array(
								
								'picture'=> $this->session->userdata('album_image'),
								'caption'=> $this->input->post('caption'),
								
							);
							
							
							$pp_id = $this->common_model->manage_table('cam_updates', $pp, $ncid);
					}
					
					
					
					$cam_up = array(
								'last_update'=>$add_date,
							);
					$c_id = $this->common_model->manage_table('campaign', $cam_up, $cam_id);

					redirect('campaign_edit/updates');
			}
			
		}
	}	
public function updates_edit()
	{
		if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
		else
		{
			$this->form_validation->set_rules('post_title', 'Post Title', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			$this->form_validation->set_rules('upimage', 'Image', 'callback_picUpload1');
					
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');	
			$cam_id = $this->session->userdata('cam_id');
			$cid = $this->uri->segment(3,0);
			if($this->form_validation->run() == FALSE )
			{
				
				$cam = $this->candidate_model->get_cam('cam_basic',$cam_id);
					$cbrow = $cam->row_array();
					$data['cam_title'] = $cbrow['cam_title'];
					$this->session->set_userdata('pageTitle', 'Polipad ::  Edit Campaign:- Updates and more (Edit Post) - '.$cbrow['cam_title']);
				if($this->candidate_model->is_cam_this_can($this->session->userdata('user_id'),$cam_id))
				{
					$data['cam_id'] = $cam_id;
				
					$poste = $this->candidate_model->get_post('cam_updates',$cid);
					$row = $poste->row_array();
					
					$data['pid'] = $cid;
					$data['post_title'] = $row['post_title'];
					$data['details'] = $row['details'];
					$data['picture'] = $row['picture'];
					$data['caption'] = $row['caption'];
					
				

				$datas['content'] = $this->load->view('edit_updates_post_edit', $data, true);
				$this->load->view('main', $datas);
				}
				else
				{
					redirect('candidate/index');
				}
			}
			else
			{
				
				$can_id = $this->session->userdata('user_id');


					$cam_abt = array(
					'post_title'=> $this->input->post('post_title'),
					'details'=> formatTextToHTML($this->input->post('details')),
					
					);
					$this->common_model->manage_table('cam_updates', $cam_abt, $this->input->post('pid'));
					
					
					if($this->session->userdata('album_image') != 0)
					{

						
						unlink('./cam_pics/'.$this->input->post('ppic'));
						
						$pp = array(
								
								'picture'=> $this->session->userdata('album_image'),
								'caption'=> $this->input->post('caption'),
								
							);
							
							
							$pp_id = $this->common_model->manage_table('cam_updates', $pp, $this->input->post('pid'));
					}
					
					
					
					$cam_up = array(
								'last_update'=>$add_date,
							);
					$c_id = $this->common_model->manage_table('campaign', $cam_up, $cam_id);
					redirect('campaign_edit/updates');
			}
			
		}
	}		

public function updates_view()
	{
		if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
		else
		{
			
			$cam_id = $this->session->userdata('cam_id');
			$cid = $this->uri->segment(3,0);
			if($this->form_validation->run() == FALSE )
			{
				
				
					$data['cam_id'] = $cam_id;
				$cam = $this->candidate_model->get_cam('cam_basic',$cam_id);
					$cbrow = $cam->row_array();
					$data['cam_title'] = $cbrow['cam_title'];
					$this->session->set_userdata('pageTitle', 'Polipad ::  Edit Campaign:- Updates and more (View Post) - '.$cbrow['cam_title']);
					$poste = $this->candidate_model->get_post('cam_updates',$cid);
					$row = $poste->row_array();
					
					$data['post_title'] = $row['post_title'];
					$data['details'] = $row['details'];
					$data['picture'] = $row['picture'];
					$data['caption'] = $row['caption'];
					$data['add_date'] = $row['add_date'];

				$datas['content'] = $this->load->view('edit_updates_post_view', $data, true);
				$this->load->view('main', $datas);
				}
				else
				{
					redirect('candidate/index');
				}
		}
	}		
public function ideas()
	{
		if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
		else
		{
			$this->form_validation->set_rules('idea_title', 'Idea Title', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			$this->form_validation->set_rules('upimage', 'Image', 'callback_picUpload1');
					
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');	
			$cam_id = $this->session->userdata('cam_id');
			
			if($this->form_validation->run() == FALSE )
			{
								
				$data['cam_id'] = $cam_id;
				$cam = $this->candidate_model->get_cam('cam_basic',$cam_id);
				$cbrow = $cam->row_array();
				$data['cam_title'] = $cbrow['cam_title'];
					$this->session->set_userdata('pageTitle', 'Polipad ::  Edit Campaign:- Ideas - '.$cbrow['cam_title']);
				if($this->candidate_model->is_cam_this_can($this->session->userdata('user_id'),$cam_id))
				{
					$uplist = $this->candidate_model->get_cam('cam_ideas',$cam_id);
					$data['uplist'] = $uplist;
					$data['idea_title'] = $this->input->post('idea_title');
					$data['caption'] = $this->input->post('caption');
					$data['details'] = $this->input->post('details');

				$datas['content'] = $this->load->view('edit_ideas', $data, true);
				$this->load->view('main', $datas);
				}
				else
				{
					redirect('candidate/index');
				}
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
					$ncid=$this->common_model->manage_table('cam_ideas', $cam_abt);
					
					
					
					if(!isset($_FILES['userfile1']) || $_FILES['userfile1']['error'] == 4)
					{
						$pp = array(
								
								'idea_pic'=> $this->session->userdata('album_image'),
								'caption'=> $this->input->post('caption'),
								
							);
							
							
							$pp_id = $this->common_model->manage_table('cam_ideas', $pp, $ncid);
						
					}
					
					
					
					$cam_up = array(
								'last_update'=>$add_date,
							);
					$c_id = $this->common_model->manage_table('campaign', $cam_up, $cam_id);
					
					redirect('campaign_edit/ideas');
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
			$this->form_validation->set_rules('upimage', 'Image', 'callback_picUpload1');
			$this->form_validation->set_rules('idea_title', 'Idea Title', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');	
			$cam_id = $this->session->userdata('cam_id');
			$cid = $this->uri->segment(3,0);
			if($this->form_validation->run() == FALSE )
			{
				
				if($this->candidate_model->is_cam_this_can($this->session->userdata('user_id'),$cam_id))
				{
					$data['cam_id'] = $cam_id;
					$cam = $this->candidate_model->get_cam('cam_basic',$cam_id);
				$cbrow = $cam->row_array();
				$data['cam_title'] = $cbrow['cam_title'];
					$this->session->set_userdata('pageTitle', 'Polipad ::  Edit Campaign:- Idea (Edit Idea) - '.$cbrow['cam_title']);
					$poste = $this->candidate_model->get_post('cam_ideas',$cid);
					$row = $poste->row_array();
					
					$data['pid'] = $cid;
					$data['idea_title'] = $row['idea_title'];
					$data['details'] = $row['details'];
					$data['idea_pic'] = $row['idea_pic'];
					$data['caption'] = $row['caption'];

				$datas['content'] = $this->load->view('edit_ideas_edit', $data, true);
				$this->load->view('main', $datas);
				}
				else
				{
					redirect('candidate/index');
				}
			}
			else
			{
				
				$can_id = $this->session->userdata('user_id');


					$cam_abt = array(
					'idea_title'=> $this->input->post('idea_title'),
					'details'=> formatTextToHTML($this->input->post('details')),
					
					);
					
					$this->common_model->manage_table('cam_ideas', $cam_abt, $this->input->post('pid'));
					
					if($this->session->userdata('album_image') != 0)
					{
						
						unlink('./cam_pics/'.$this->input->post('ppic'));
						
						$pp = array(
								
								'idea_pic'=> $this->session->userdata('album_image'),
								'caption'=> $this->input->post('caption'),
								
							);
							
							
							$pp_id = $this->common_model->manage_table('cam_ideas', $pp, $this->input->post('pid'));
					}
					else
					{
						$pp = array(
								
								
								'caption'=> $this->input->post('caption'),
								
							);
							
							
							$pp_id = $this->common_model->manage_table('cam_ideas', $pp, $this->input->post('pid'));
					}

					redirect('campaign_edit/ideas');
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
					$cam = $this->candidate_model->get_cam('cam_basic',$cam_id);
				$cbrow = $cam->row_array();
				$data['cam_title'] = $cbrow['cam_title'];
					$this->session->set_userdata('pageTitle', 'Polipad ::  Edit Campaign:- Idea (View Idea) - '.$cbrow['cam_title']);
					$poste = $this->candidate_model->get_post('cam_ideas',$cid);
					$row = $poste->row_array();
					$data['iid'] = $cid;
					$data['idea_title'] = $row['idea_title'];
					$data['details'] = $row['details'];
					$data['add_date'] = $row['add_date'];
					$data['idea_pic'] = $row['idea_pic'];
					$data['caption'] = $row['caption'];

				$datas['content'] = $this->load->view('edit_idea_view', $data, true);
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
					redirect('campaign_edit/idea_view/'.$iid);
				}
		}
	}		
	
public function events()
	{
		if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
		else
		{
			$this->form_validation->set_rules('event_title', 'Event Title', 'required');
			$this->form_validation->set_rules('event_date', 'event_date', 'required');
			
					
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');	
			$cam_id = $this->session->userdata('cam_id');
			
			if($this->form_validation->run() == FALSE )
			{
				
				
				$data['cam_id'] = $cam_id;
				$cam = $this->candidate_model->get_cam('cam_basic',$cam_id);
				$cbrow = $cam->row_array();
				$data['cam_title'] = $cbrow['cam_title'];
					$this->session->set_userdata('pageTitle', 'Polipad ::  Edit Campaign:- Events - '.$cbrow['cam_title']);
					
				if($this->candidate_model->is_cam_this_can($this->session->userdata('user_id'),$cam_id))
				{
					$uplist = $this->candidate_model->get_cam('cam_events',$cam_id, 10);
					$data['uplist'] = $uplist;
					$data['event_title'] = $this->input->post('event_title');
					$data['event_date'] = $this->input->post('event_date');
					$data['startd'] = $this->input->post('startd');
					$data['startdam'] = $this->input->post('startdam');
					$data['endd'] = $this->input->post('endd');
					$data['enddam'] = $this->input->post('enddam');
					$data['place'] = $this->input->post('place');
					$data['description'] = $this->input->post('description');

				$datas['content'] = $this->load->view('edit_events', $data, true);
				$this->load->view('main', $datas);
				}
				else
				{
					redirect('candidate/index');
				}
			}
			else
			{
				
				$can_id = $this->session->userdata('user_id');
				$cam_id = $this->session->userdata('cam_id');
				$add_date = date('Y-m-d');

					
					$cam_abt = array(
					'event_title'=> $this->input->post('event_title'),
					'event_date'=> $this->input->post('event_date'),
					'cam_id'=> $cam_id,
					'can_id'=> $can_id,
					'add_date'=> $add_date,
					'start_on'=> $this->input->post('startd'),
					'startdam'=> $this->input->post('startdam'),
					'ends_at'=> $this->input->post('endd'),
					'enddam'=> $this->input->post('enddam'),
					'place'=> $this->input->post('place'),
					'description'=> $this->input->post('description'),
					
					);
					$this->common_model->manage_table('cam_events', $cam_abt);
					$cam_up = array(
								'last_update'=>$add_date,
							);
					$c_id = $this->common_model->manage_table('campaign', $cam_up, $cam_id);
					redirect('campaign_edit/events');
			}
			
		}
	}	
public function events_edit()
	{
		if(!$this->session->userdata('cam_id'))
		{
			redirect('candidate/index');
		}
		else
		{
			$this->form_validation->set_rules('event_title', 'event_title ', 'required');
			$this->form_validation->set_rules('event_date', 'event_date', 'required');
			
					
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');	
			$cam_id = $this->session->userdata('cam_id');
			$cid = $this->uri->segment(3,0);
			if($this->form_validation->run() == FALSE )
			{
				
				if($this->candidate_model->is_cam_this_can($this->session->userdata('user_id'),$cam_id))
				{
					$data['cam_id'] = $cam_id;
					$cam = $this->candidate_model->get_cam('cam_basic',$cam_id);
				$cbrow = $cam->row_array();
				$data['cam_title'] = $cbrow['cam_title'];
					$this->session->set_userdata('pageTitle', 'Polipad ::  Edit Campaign:- Events (Edit Post) - '.$cbrow['cam_title']);
					$poste = $this->candidate_model->get_post('cam_events',$cid);
					$row = $poste->row_array();
					
					$data['pid'] = $cid;
					$data['event_title'] = $row['event_title'];
					$data['event_date'] = $row['event_date'];
					$data['startd'] = $row['start_on'];
					$data['startdam'] = $row['startdam'];
					$data['endd'] = $row['ends_at'];
					$data['enddam'] = $row['enddam'];
					$data['place'] = $row['place'];
					$data['description'] = $row['description'];

				$datas['content'] = $this->load->view('edit_event_edit', $data, true);
				$this->load->view('main', $datas);
				}
				else
				{
					redirect('candidate/index');
				}
			}
			else
			{
				
				$can_id = $this->session->userdata('user_id');


					$cam_abt = array(
					'event_title'=> $this->input->post('event_title'),
					'event_date'=> $this->input->post('event_date'),
					'start_on'=> $this->input->post('startd'),
					'startdam'=> $this->input->post('startdam'),
					'ends_at'=> $this->input->post('endd'),
					'enddam'=> $this->input->post('enddam'),
					'place'=> $this->input->post('place'),
					'description'=> $this->input->post('description'),
					
					);
					$this->common_model->manage_table('cam_events', $cam_abt, $this->input->post('pid'));

					redirect('campaign_edit/events');
			}
			
		}
	}		


	
	
	
	
	
	
function picUpload($str)
	{
		if(!isset($_FILES['userfile']) || $_FILES['userfile']['error'] == 4)
		{
			//$this->form_validation->set_message('picUpload', 'Please, upload an image.');
			//
			$this->session->unset_userdata('album_image');
			//return false;
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
		
}	
?>