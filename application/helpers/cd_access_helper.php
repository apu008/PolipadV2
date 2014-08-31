<?php

	/**
	 * jsms_access::check_logged_in()
	 * 
	 * @return
	 */
	function check_logged_in($redirect = FALSE)
	{
		$CI = & get_instance();		
		
		if( $CI->session->userdata('username') == '' ) 
		{
			if( $redirect == FALSE ) return FALSE;
			$CI->session->unset_userdata('username');
			$CI->session->set_flashdata('requested_page', $CI->uri->uri_string());			
			redirect('welcome/index');
		}
		return TRUE;
	}
		
	
	/**
	 * jsms_access::is_superadmin()
	 * @example is_superadmin()
	 * @example is_superadmin(FALSE)
	 * @param bool $redirect
	 * @return
	 */
	function is_superadmin( $redirect = TRUE )
	{
		$CI = & get_instance();
		
		$is_logged = check_logged_in( FALSE );
		
		if( $is_logged == FALSE  )
		{
			if( $redirect == FALSE ) return FALSE;
			else {
				$CI->session->set_flashdata('requested_page', $CI->uri->uri_string());			
				redirect('user/login');
			}
			 
		}
		
		$username = $CI->session->userdata('username');
		$CI->db->from('cd_user');
		$CI->db->where('username',(string) $username);
		$CI->db->join('role_name', 'role_name.role_id = cd_user.role_id');
		$CI->db->where('role_name', 'superadmin');
		$rslt = $CI->db->get();		
		
		if( $rslt->num_rows() == 0 )
		{	
			if( $redirect == FALSE )	return FALSE;
			
			if( $is_logged )
			{
				flashMsg('error', "You don't have Access for this resource.");
				redirect('user/home');
			}			
			$CI->session->unset_userdata('username');
			$CI->session->set_flashdata('requested_page', $CI->uri->uri_string());			
			redirect('user/login');
		}
		
		
		return TRUE;
		
	}
	
	/**
	 * jsms_access::check_permission()
	 * 
	 * @param mixed $perm
	 * @param bool $redirect
	 * @return
	 */
	function check_permission( $perm, $redirect = TRUE )
	{		
	
		$CI = & get_instance();
		
		if( is_superadmin(FALSE) == true ) return TRUE;
		
		$is_logged = check_logged_in(FALSE);
		
		if( ! $is_logged )
		{
			if( $redirect )
			{
				$CI->session->set_flashdata('requested_page', $CI->uri->uri_string());			
				redirect('user/login');
			}else 
				return FALSE;
		}
				
		
		$username = $CI->session->userdata('username');
		
		$CI->db->from('cd_user');
		$CI->db->where('username',(string) $username);
		$CI->db->join('role_name', 'role_name.role_id = cd_user.role_id');
		$CI->db->join('role_access', 'role_access.role_id = cd_user.role_id');
		$CI->db->join('role_access_name', 'role_access_name.role_perm_id = role_access.role_perm_id' );
		$CI->db->where('role_perm_text', trim($perm) );		
		$rslt = $CI->db->get();			
		
		if( $rslt->num_rows() == 0 )
		{
			if( $redirect == FALSE )	return FALSE;
			
			if( $is_logged )
			{
				flashMsg('error', "You don't have Access for this resource.");
				redirect('user/home');
			}
						
			$CI->session->unset_userdata('username');
			$CI->session->set_flashdata('requested_page', $CI->uri->uri_string());			
			redirect('user/login');
		}
		
		return TRUE;
		
	}