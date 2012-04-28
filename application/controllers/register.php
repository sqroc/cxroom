<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index() {
		$data = array('title' => '用户注册', 'css' => 'register.css', 'js' => 'reg_check.js');
		$data['randvalue'] = rand(0, 10000000000);
		$data['username'] = NULL;
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$this -> load -> view('header', $data);
		$this -> load -> view('register');
		$this -> load -> view('footer');
	}

	function reg() {
		$flag = 1;
		$randvalue = $this -> input -> post('randvalue');
		$sta = $this -> session -> userdata('randvalue');
		if (!isset($sta)) {
			$this -> session -> set_userdata('randvalue', $randvalue);
		} else {
			if ($randvalue != $sta) {
				$this -> session -> set_userdata('randvalue', $randvalue);
			} else {
				//重复提交
				$flag = 0;
				$data = array('title' => '友情提示', 'warm' => '您的表单已经成功提交！请勿重复刷新，您可以选择以下入口进入！', 'pic' => 'warm.gif');
				$this -> load -> view("wrong", $data);
			}
		}
		if ($flag == 1) {
			if ($this -> Users_model -> reg()) {
				$data = array('title' => '注册成功', 'css' => 'register.css');
				$data['email'] = $this -> session -> userdata('email');
				$data['username'] = $this -> session -> userdata('username');
				$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
				$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
				$this -> load -> view('header', $data);
				$this -> load -> view('reg_succeed');
				$this -> load -> view('footer');

			} else {
				$data = array('title' => '友情提示', 'warm' => '对不起，邀请码不正确！本次注册失败了！您可以选择以下入口进入重新注册！', 'pic' => 'wrong.gif');
				$this -> load -> view("wrong", $data);
			}
		}
	}

	function checkmail() {
		if ($this -> Users_model -> checkmail()) {
			echo json_encode(array("state" => "T"));
		} else {
			echo json_encode(array("state" => "F"));
		}
	}

	function checkcode() {
		if ($this -> Users_model -> check_invite_code()) {
			echo json_encode(array("state" => "T"));
		} else {
			echo json_encode(array("state" => "F"));
		}
	}

}
?>