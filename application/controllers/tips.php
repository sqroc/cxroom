<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Tips extends CI_Controller {

	public function index() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}

		$data = array('title' => '创业词条', 'js' => 'eggs_index.js');

		$data['email'] = $this -> session -> userdata('email');
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		$row = $this -> Users_model -> queryuser($data['email']);
		$data['intro'] = $row -> intro;
		$data['gender'] = $row -> gender;
		$data['province'] = $row -> province;
		$data['contact_email'] = $row -> contact_email;
		$data['qq'] = $row -> qq;
		$data['telphone'] = $row -> telphone;
		$data['phone'] = $row -> phone;
		$data['person_pic'] = $row -> person_pic;
		$data['tips'] = $this -> Projects_model -> showTips();
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
		$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		$this -> load -> view('eggs/header.php', $data);
		$this -> load -> view('tips/index.php', $data);

	}

	public function more() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$data['tip'] = $this -> Projects_model -> showTipsrand();
		$this -> load -> view('tips/more.php', $data);

	}

	public function addvoattention() {
		if ($this -> Projects_model -> addvoattention()) {
			echo json_encode(array("state" => "ok"));

		} else {
			echo json_encode(array("state" => "no"));

		}

	}

}
