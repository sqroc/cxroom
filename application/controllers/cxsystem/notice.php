<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice extends CI_Controller {
	
	public function index()
	{
		$sta = $this->session->userdata('user');
		$data = array('title'=>'提示', 'mode'=>'no' );
 		if (!isset($sta) || $sta!="login_ok"){
 			redirect('/login');
 		}else{
 			$data['username'] = $this->session->userdata('username');
 		}
		$this->load->view('common_notice',$data);
	}	
	
}

?>