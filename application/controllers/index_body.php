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
		$data['idea'] = $this -> Projects_model -> showIdeasrand();
		$data = array_merge($data, $this -> Common_model -> global_data());
		
		$this -> load -> view('header', $data);
		$this -> load -> view('index');
		$this -> load -> view('footer');
	}

	public function index2() {
		$data = array('css' => 'home.css', 'title' => '找人才-创新空间人', 'js' => 'talent_index.js');
		$data['username'] = $this -> session -> userdata('username');
		$data['email'] = $this -> session -> userdata('email');
		$data = array_merge($data, $this -> Common_model -> global_data());
		
		
		$this -> load -> view('header', $data);
		$this -> load -> view('home');
		$this -> load -> view('footer2');
	}


}
?>