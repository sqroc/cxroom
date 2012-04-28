<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Index_body extends CI_Controller {

	public function index() {
		$sta = $this -> session -> userdata('user');
		$data = array('title' => '创新空间', 'css' => 'index.css', 'js' => 'index.js', );
		//if (!isset($sta) || $sta!="login_ok"){
		//	redirect('/login');
		//}
		$data['username'] = $this -> session -> userdata('username');
		$data['email'] = $this -> session -> userdata('email');
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		if($data['email'] !=NULL)
		{
			$row = $this -> Users_model -> queryuser($data['email']);
			$data['intro'] = $row -> intro;
			$data['gender'] = $row -> gender;
			$data['province'] = $row -> province;
			$data['contact_email'] = $row -> contact_email;
			$data['qq'] = $row -> qq;
			$data['telphone'] = $row -> telphone;
			$data['phone'] = $row -> phone;
			$data['person_pic'] = $row -> person_pic;
		}
		
		if ($this -> session -> userdata('uid') != NULL) {
			$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
			$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		}

		$this -> load -> view('header', $data);
		$this -> load -> view('index');
		$this -> load -> view('footer');
	}

}
?>