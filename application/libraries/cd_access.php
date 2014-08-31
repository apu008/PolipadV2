<?php
	
class Cd_access 
{
	var $CI;
	
	/**
	 * jsms_access::jsms_access()
	 * 
	 * @return
	 */
	public function Cd_access()
	{
		$this->CI = & get_instance();
		$this->CI->load->library('encrypt');
	}
	
	/**
	 * jsms_access::register_user()
	 * 
	 * @param mixed $data
	 * @return
	 */
	public function register_user( $data )
	{	
		$data['password'] = $this->CI->encrypt->sha1( $data['password'] );
		$this->CI->db->insert('cd_user', $data);
	}
	
	/**
	 * jsms_access::login()
	 * 
	 * @param mixed $username
	 * @param mixed $password
	 * @return
	 */
	public function login( $username, $password )
	{
		$this->CI->db->where('email', $username);
		//$this->CI->db->where('status', '1');
		$this->CI->db->where('password', $password );
		//$this->CI->db->where('password', $this->CI->encrypt->sha1($password ) );
		
		$rslt = $this->CI->db->get('cd_user');
		if( $rslt->num_rows() > 0 )
		{
			$this->CI->session->set_userdata('username', $rslt->row()->username);			
			$this->CI->session->set_userdata('user_id', $rslt->row()->id);
			$this->CI->session->set_userdata('role_id', $rslt->row()->role_id);	
			$this->CI->session->set_userdata('emailid', $rslt->row()->email);
			$this->CI->session->set_userdata('name', $rslt->row()->name);		
			return true;
		}
		else 
		{
			return false;
		}				
	}	
		

	
}	
	
?>