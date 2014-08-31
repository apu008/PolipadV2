<?php

/*
	Authentication System for Polipad
*/

class Polipad_security
{
	
	private $db;	
	private $ci;
	
	public function Polipad_security()
	{
		$ci = & get_instance();
		$this->db = $ci->db;
		$this->session = $ci->session;
		$this->ci = $ci;
		$this->input = $ci->input;
		$this->uri = $ci->uri;
		$this->config = $ci->config;
	}
	
	/*  This Section Processes Login Form */	
	function process_login()
	{
		//$this->ci->load->library('encrypt');
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');//$this->ci->encrypt->sha1( $this->input->post('password') );
		$curPage = $this->session->userdata('curPage');
		if($username == '' || $password == '') 
		{
			$this->session->set_userdata('login_error', 'Required field/s left blank.');
			redirect($curPage);
		}//end of if
		else
		{
			$result = $this->db->get_where('members', array('userName'=> $username, 'password'=> $password));
		
			if( $result->num_rows() == 0 )
			{
					$this->session->set_userdata('login_error', 'Incorrect username and/or password!');
					redirect($curPage);
			}
			else
			{
				$row = $result->row_array();
				$memStatus = $row['memStatus'];
				if($memStatus == '0')
				{
					$this->session->set_userdata('login_error', 'You are blocked by Admin.');
					redirect($curPage);
				}
				else
				{
					$this->session->set_userdata('memberID', $row['memberID']); 
					$this->session->set_userdata("username", $row['userName']); 
					$this->session->set_userdata('email', $row['email']); 
					//$this->session->set_userdata('firstName', $row['firstName']); 
					//$this->session->set_userdata('lastName', $row['lastName']); 
					//$this->session->set_userdata('blogID', $row['blogID']); 
					//$this->session->set_userdata('primaryImage', $row['primaryImage']);
					$hqName = $row['hqName'];
					$this->session->set_userdata('hq', $hqName);
					
					if($hqName)
						redirect($hqName.'/campaign/userhome');
					else
						redirect('general/userhome');		
				}
			}
		}//end of else
	}
	
}

?>