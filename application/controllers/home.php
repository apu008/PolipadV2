<?php

class Home extends Controller
{
	
	function Home()
	{
		parent::Controller();
	}
	
	public function index()
	{		
		$this->view();
	}
	
	public function view()
	{
		if($this->session->userdata('username'))
			//redirect('general/userhome');
		$this->session->set_userdata('pageTitle', 'Polipad :: Home');
		$data = '';
		$datas['content'] = $this->load->view('home', $data, true);
		$this->load->view('main', $datas);
	}
}	
?>