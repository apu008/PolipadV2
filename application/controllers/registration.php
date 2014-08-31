<?php
class Registration extends Controller {

	function Registration()
	{
		parent::Controller();	
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->helper('form');
		$this->load->model('reg_model');
		$this->load->library('cd_access');
		$this->load->model('user_model');	
		$this->load->model('cd_model');	
		$this->load->library('email');
	}
	

	function addmember()
	{
				
			
			$this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email|callback_email_check');
			$this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[conf_password]');
			$this->form_validation->set_rules('conf_password', 'Confirm Password', 'trim|required');
			$this->form_validation->set_rules('name', 'Full Name', 'trim|required');
			$this->form_validation->set_error_delimiters('<span class="strong_challenge"><br>','</span>');		
			
			
			if($this->form_validation->run() == FALSE )
			{
				
				
				$data['name'] = $this->input->post('name');
				//$data['username'] = $this->input->post('username');
				$data['email'] = $this->input->post('email');
				$data['msg'] = $this->uri->segment(3,0);
				//$data['password1'] = $this->input->post('password1');			
				$datas['content'] = $this->load->view('welcome', $data, true);
				$this->load->view('main', $datas);
			}
			else
			{
				//$user_id = $this->session->userdata('user_id');
				//$add_date = date('Y-m-d');
				$un = explode('@',$this->input->post('email'));
				$un = str_replace('.','',$un[0]);
				$reg = array(
					//'username'=> $this->input->post('email'),
					'name'=> $this->input->post('name'),
					'username'=> $un,
					'email'=> $this->input->post('email'),
					'password'=> $this->input->post('password1'),
					'role_id'=> '2',
					
					
				);
				$pro_id = $this->reg_model->manage_reg($reg, '');
				
				/*if($sro->num_rows() != 0)
				{
				$prodata = $sro->row_array();
				$sha = array(
						'cd_user_id'=> $pro_id,
						);
						$sid = $this->share_model->manage_share_user($sha, $sid);
				}
				// send email
				
				$this->email->initialize($this->config->item('email_config'));
		
				$msg = '<p>Hello. You are almost done with registering at dasneto.com. We send this e-mail to make sure no one else is using your e-mail.</p>';
				$msg .= '<p>Please '.anchor('registration/confirm/'.$pro_id, 'click').' to confirm.';
				$msg .= '<p>From your friends at Polipad.</p>';
				
				$this->email->to($this->input->post('email'));
				$this->email->from('dasneto.com', 'Account Info');
				$this->email->bcc('sayabu@gmail.com');
				$this->email->bcc('mahmudapu@yahoo.com');
				$this->email->bcc('reaz.rahman@yahoo.com');
				
				$this->email->subject('Polipad Account Confirmation');
				$this->email->message($msg);
				
				$this->email->send();
				// send email*/
				$success = $this->cd_access->login( $this->input->post('email'), $this->input->post('password1'));
				if( $success )
				{
					$role_id = $this->session->userdata('role_id');
					if($role_id == 1)
					{ 
						redirect('admin/index');
					}
					elseif($role_id == 2)
					{ 
						redirect('candidate/index');
					}
					else
					{
						redirect('polipads');
					}
					
				}
				
			}
		
	}
	
	
	
	function updatepicture()
	{
				
			$this->form_validation->set_rules('upimage', 'Image', 'callback_picUpload1');
			
			$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');		
			$user_id = $this->session->userdata('user_id');
			$post_user = $this->user_model->get_info($this->session->userdata('user_id'));
							$purow = $post_user->row_array();
							
			
		if($user_id == '')
		{
			redirect('welcome/index');
		}
		else
		{
			
			if($this->form_validation->run() == FALSE )
			{
				$pagetitle = 'Update Profile Picture..:: Polipad ::..';
				$this->session->set_userdata('pageTitle', $pagetitle);
				$data['ppic'] = $purow['photo'];
				//$data['username'] = $uinfo['username'];
						
				$datas['content'] = $this->load->view('update_profile_picture.php', $data, true);
				$this->load->view('main', $datas);
			}
			else
			{

				$pp = array(
								'photo'=> $this->session->userdata('album_image'),
							);
							
							
							$pp_id = $this->common_model->manage_table('cd_user', $pp, $user_id);
				
				redirect('candidate/index');
			}
		}
		
	}
	
	
	
	function picUpload1($str)
	{
		if(!isset($_FILES['userfile']) || $_FILES['userfile']['error'] == 4)
		{
			$this->form_validation->set_message('upimage', 'Please, upload an image.');
			return false;
			$this->session->unset_userdata('album_image');

		}
		else{
		//to get the image size
		$uploadedfile = $_FILES['userfile']['tmp_name'];
		
		
		//upload configuration		
		$config['upload_path'] = './user_pic/';
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
				$thSize = '200';
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
				$configBig['source_image'] = './user_pic/'.$image;
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

				
				unlink('./user_pic/'.$image);
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
	
	
	
	
	
	function updateaccount()
	{
				
			
			$user_id = $this->session->userdata('user_id');
			$userinfo = $this->user_model->get_info($user_id);
			if($user_id == '')
			{
				redirect('welcome/index');
			}
		else
		{
			
			if($userinfo->num_rows() > 0)
			{
				$uinfo = $userinfo->row_array();
			}
			
			
				$pagetitle = 'Change Account Information..:: Polipad ::..';
				$this->session->set_userdata('pageTitle', $pagetitle);
				$data['name'] = $uinfo['name'];
				
				$data['email'] = $uinfo['email'];
				
				$data['password1'] = $uinfo['password'];			
				$datas['content'] = $this->load->view('update_account.php', $data, true);
				$this->load->view('main', $datas);

			
		}
		
		
	}
	
	function updateaccountName()
	{
				
			
			$this->form_validation->set_rules('name', 'Full Name', 'trim|required');
			$this->form_validation->set_error_delimiters('<span class="strong_challenge"><br>','</span>');	
			$user_id = $this->session->userdata('user_id');
			$userinfo = $this->user_model->get_info($user_id);
			if($user_id == '')
			{
				redirect('welcome/index');
			}
		else
		{
			
			if($userinfo->num_rows() > 0)
			{
				$uinfo = $userinfo->row_array();
			}
			
			if($this->form_validation->run() == FALSE )
			{
				$pagetitle = 'Change Account Information: Name..:: Polipad ::..';
				$this->session->set_userdata('pageTitle', $pagetitle);
				$data['name'] = $uinfo['name'];
			
				$datas['content'] = $this->load->view('update_account_name.php', $data, true);
				$this->load->view('main', $datas);
			}
			else
			{

				$reg = array(
					
					'name'=> $this->input->post('name'),
					
				);
				$pro_id = $this->reg_model->manage_reg($reg, $user_id);
				
				
				$this->session->set_userdata('name', $this->input->post('name'));

				
				redirect('registration/updateaccount');
			}
		}
		
		
	}
	function updateaccountEmail()
	{
				
			
			$this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email|callback_email_check|matches[email1]');
			$this->form_validation->set_rules('email1', 'Re Enter Email', 'trim|required');
			$this->form_validation->set_error_delimiters('<span class="strong_challenge"><br>','</span>');	
			$user_id = $this->session->userdata('user_id');
			$userinfo = $this->user_model->get_info($user_id);
			if($user_id == '')
			{
				redirect('welcome/index');
			}
		else
		{
			
			if($userinfo->num_rows() > 0)
			{
				$uinfo = $userinfo->row_array();
			}
			
			if($this->form_validation->run() == FALSE )
			{
				$pagetitle = 'Change Account Information: Email..:: Polipad ::..';
				$this->session->set_userdata('pageTitle', $pagetitle);
				$data['oldemail'] = $uinfo['email'];
				
				$datas['content'] = $this->load->view('update_account_email.php', $data, true);
				$this->load->view('main', $datas);
			}
			else
			{

				$reg = array(
					
					'email'=> $this->input->post('email'),
					
				);
				$pro_id = $this->reg_model->manage_reg($reg, $user_id);
				
				redirect('registration/updateaccount');
			}
		}
		
		
	}
	
	function updateaccountPassword()
	{
			
				$this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[conf_password]');
				$this->form_validation->set_rules('password0', 'Old Password', 'trim|required|matches[old_password]');
				$this->form_validation->set_rules('conf_password', 'Confirm Password', 'trim|required');
			 $this->form_validation->set_message('matches', "We don't have this password in our database. Please try again");  

			$this->form_validation->set_error_delimiters('<span class="strong_challenge"><br>','</span>');	
			$user_id = $this->session->userdata('user_id');
			$userinfo = $this->user_model->get_info($user_id);
			if($user_id == '')
			{
				redirect('welcome/index');
			}
		else
		{
			
			if($userinfo->num_rows() > 0)
			{
				$uinfo = $userinfo->row_array();
			}
			
			if($this->form_validation->run() == FALSE )
			{
				$pagetitle = 'Change Account Information: Password..:: Polipad ::..';
				$this->session->set_userdata('pageTitle', $pagetitle);
				
				$data['password0'] = $uinfo['password'];			
				$datas['content'] = $this->load->view('update_account_password.php', $data, true);
				$this->load->view('main', $datas);
			}
			else
			{
				//$user_id = $this->session->userdata('user_id');
				//$add_date = date('Y-m-d');
				$reg = array(
					'password'=> $this->input->post('password1'),
				);
				$pro_id = $this->reg_model->manage_reg($reg, $user_id);
				redirect('registration/updateaccount');
			}
		}
		
		
	}

	function newinfo()
	{
				
			
				$pagetitle = 'New Account Information..:: Polipad ::..';
				$this->session->set_userdata('pageTitle', $pagetitle);
				$data['name'] = $this->session->userdata('name');
				$data['ps'] = $this->session->userdata('ps');
					
				$datas['content'] = $this->load->view('update_account_new_info', $data, true);
				$this->load->view('main', $datas);
			
		
	}
function confirmMember()
	{
				
			
				$pagetitle = 'Registration Confirmation..:: Polipad ::..';
				$this->session->set_userdata('pageTitle', $pagetitle);
				$data['name'] = $this->input->post('name');
				$data['lname'] = $this->input->post('lname');
				$data['email'] = $this->input->post('email');
				$data['company'] = $this->input->post('company');
				//$data['password1'] = $this->input->post('password1');			
				$datas['content'] = $this->load->view('confirmmember', $data, true);
				$this->load->view('main', $datas);
			
		
	}
function confirm()
	{
				
			$pid = $this->uri->segment(3,0);
			
			$reg = array(
					'status'=> '1',
				);
			$pro_id = $this->reg_model->manage_reg($reg, $pid);	
			redirect('registration/login');
		
	}	
	
	
public function login()	
	{	
	
		$this->form_validation->set_rules('username', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<span class="strong_challenge"><br>','</span>');		
		$username = $this->session->userdata('username');
		
			if( $this->form_validation->run() == FALSE ) 
			{
			$pcam = $this->common_model->get_can_published_cam();
			$data['pcam'] = $pcam;
			$pagetitle = 'Sign In..:: Polipad ::..';
				$this->session->set_userdata('pageTitle', $pagetitle);
			$data['msg'] = '';		
			$var['content'] = $this->load->view('welcome', $data, true );
			$this->load->view('main', $var);
			
			}
			else 
			{
				$success = $this->cd_access->login( $this->input->post('username'), $this->input->post('password'));
				if( $success )
				{
					$role_id = $this->session->userdata('role_id');
					/*if($role_id == 1)
					{ 
						redirect('admin/index');
					}
					elseif($role_id == 2)
					{*/ 
						$msg = $this->input->post('msg');
						if($msg>1){
							redirect('campaign/main/'.$msg);
						}
						else
						{
							redirect('candidate/index');
						}
					//}
					
					
				}
				else 
				{
					//$this->session->keep_flashdata('requested_page');				
					$data['msg'] = 1;
					$var['content'] = $this->load->view('welcome', $data, true );
					$this->load->view('main', $var);
				}
			}
		
	}	
		
function email_check($email)
	{
		if (!$this->reg_model->check_email($email))
		{
			$this->form_validation->set_message('email_check', '%s already exist');
			return false;
		}
		else
		{
			return true;
		}
	}	
function owner_email_check($email)
	{
		$user_id = $this->session->userdata('user_id');
		if ($this->reg_model->ow_check_email($email,$user_id))
		{
			$this->form_validation->set_message('owner_email_check', '%s already exist');
			return false;
		}
		else
		{
			return true;
		}
	}	
	function forgot_email_check($email)
	{
		$user_id = $this->session->userdata('user_id');
		if ($this->reg_model->ow_check_email($email,$user_id))
		{
			$this->form_validation->set_message('owner_email_check', '%s already exist');
			return true;
		}
		else
		{
			return false;
		}
	}	
function check_username()
	{
		$username = $this->input->post('username');
		$userCheckFound = $this->reg_model->check_username($username);
		if ($userCheckFound > 0)
		{
			$this->form_validation->set_message('check_username', '%s already exist');
			return false;
		} 
		else
		{
			return true;
		}
	}

public function forgot()	
	{	
	
		$this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email|callback_forgot_email_check');
		
		$this->form_validation->set_error_delimiters('<span class="strong_challenge">','</span>');		
		
		if( $this->form_validation->run() == FALSE ) {
			
			$pagetitle = 'Password Assistance..:: Polipad ::..';
				$this->session->set_userdata('pageTitle', $pagetitle);
			$data['msg'] = '';		
			$var['content'] = $this->load->view('forgotpass', $data, true );
			$this->load->view('main', $var);
			
		}else {
			$success = trim($this->input->post('email'));
			
			if (!$this->reg_model->check_email($success))
		{
				$iniBld = $this->reg_model->get_u_p($success);
				$irow = $iniBld->row_array();
				$user = $irow['email'];
				$pw = $irow['password'];
			// send email
				
				$this->email->initialize($this->config->item('email_config'));
		
				$msg = '<p>Hello. Here are your username and password.</p>';
				$msg .= '<p>Username: '.$user;
				$msg .= '<p>Password: '.$pw.'</p>';
				
				$this->email->to($this->input->post('email'));
				$this->email->from('polipad.net', 'Account Info Retrieve');
				$this->email->bcc('sayabu@gmail.com');
				$this->email->bcc('mahmudapu@yahoo.com');
				$this->email->bcc('campaign@polipad.net');
				
				$this->email->subject('Polipad password');
				$this->email->message($msg);
				
				$this->email->send();
				// send email
				
				redirect('registration/paswordassis');
		}
		else
		{
			$pagetitle = 'Password Assistance..:: Polipad ::..';
				$this->session->set_userdata('pageTitle', $pagetitle);
			$data['msg'] = '1';		
			$var['content'] = $this->load->view('forgotpass', $data, true );
			$this->load->view('main', $var);
		}
			
			
		}
	}	
		
function paswordassis()
	{
		$this->session->set_userdata('pageTitle', 'Password Assistance ::..');
		
		$data['msg'] = '';
		$datas['content'] = $this->load->view('forgotpass1', $data, true);
		$this->load->view('main', $datas);
	}

		
}
